<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterfile extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->model('super_model');
    	/**
    	 * Index Page for this controller.
    	 *
    	 * Maps to the following URL
    	 * 		http://example.com/index.php/welcome
    	 *	- or -
    	 * 		http://example.com/index.php/welcome/index
    	 *	- or -
    	 * Since this controller is set as the default controller in
    	 * config/routes.php, it's displayed at http://example.com/
    	 *
    	 * So any other public methods not prefixed with an underscore will
    	 * map to /index.php/welcome/<method_name>
    	 * @see https://codeigniter.com/user_guide/general/urls.html
    	 */

	  function arrayToObject($array){
            if(!is_array($array)) { return $array; }
            $object = new stdClass();
            if (is_array($array) && count($array) > 0) {
                foreach ($array as $name=>$value) {
                    $name = strtolower(trim($name));
                    if (!empty($name)) { $object->$name = arrayToObject($value); }
                }
                return $object;
            } 
            else {
                return false;
            }
        }

	}

	public function index(){
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$data['count']=$this->super_model->count_custom_where('check_voucher',"saved='0'");
		$this->load->view('masterfile/dashboard',$data);
		$this->load->view('template/footer');

	}

	public function login(){
        if($this->input->post()){
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $count=$this->super_model->login_user($username,$password);
            if($count>0){   
                $password1 =md5($this->input->post('password'));
                $fetch=$this->super_model->select_custom_where("users", "username = '$username' AND (password = '$password' OR password = '$password1')");
                foreach($fetch AS $d){
                    $userid = $d->user_id;
                    $username = $d->username;
                    $fullname = $d->fullname;
                }
                $newdata = array(
                   'user_id'=> $userid,
                   'username'=> $username,
                   'fullname'=> $fullname,
                   'logged_in'=> TRUE
                );
                $this->session->set_userdata($newdata);
                redirect(base_url());
            }
            else{
                $this->session->set_flashdata('error_msg', 'Username And Password Do not Exist!');
                $this->load->view('masterfile/login');      
            }
        } else {
            $this->load->view('masterfile/login');    
        }
    }

    public function user_logout(){
        $this->session->sess_destroy();
        echo "<script>alert('You have successfully logged out.'); 
        window.location ='".base_url()."'; </script>";
    }

	public function report_list(){
		$location_id=$this->uri->segment(3);
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$data['check']=$this->super_model->select_custom_where('check_voucher',"location_id = '$location_id'");
		//$data['check']=$this->super_model->select_all_order_by('check_voucher','cv_date',"ASC");
		$data['location']=$this->super_model->select_all_order_by('location','location_name',"ASC");
		$this->load->view('masterfile/report_list',$data);
		$this->load->view('template/footer');
	}

	public function generateLocation(){
           $location_id= $this->input->post('location'); 
           ?>
           <script>
            window.location.href ='<?php echo base_url(); ?>index.php/masterfile/report_list/<?php echo $location_id; ?>'</script> <?php
    }

	public function upload_excel(){
        $dest= realpath(APPPATH . '../uploads/excel/');
        $error_ext=0;
        if(!empty($_FILES['csv']['name'])){
             $exc= basename($_FILES['csv']['name']);
             $exc=explode('.',$exc);
             $ext1=$exc[1];
            if($ext1=='php' || $ext1!='xlsx'){
                $error_ext++;
            } 
            else {
                $filename1='Quickbooks.'.$ext1;
                $location = $this->input->post('location');

                /*$cv_format = date("Y");
		        $cv_prefix= $this->super_model->select_column_custom_where("check_voucher", "cv_no", "cv_date LIKE '$cv_format%'");
		        $rows=$this->super_model->count_custom_where("check_voucher","cv_no = '$cv_prefix'");
		        foreach($this->super_model->select_all("check_voucher") AS $cv){
		        	foreach($this->super_model->select_row_where("cv_series","location_id",$cv->location_id) AS $c){
		        		$location_id = $c->location_id;
		        	}
		        }*/

		      /*  if($location_id==$location){
			        if($rows==0){
			            $cv_no= "CV".$cv_format."-00100";
			        } else {
			            $series = $this->super_model->get_max_where("cv_series", "series","location_id ='$location'");
			            $next=$series+1;
			            $cv_no = "CV".$cv_format."-00".$next;
			        }
		        }else {
		        	$cv_no= "CV".$cv_format."-00100";
		        }*/

                if(move_uploaded_file($_FILES["csv"]['tmp_name'], $dest.'/'.$filename1)){
                    $this->readExcel_quickbooks($location);
                }   
            }
        }
    }

    public function readExcel_quickbooks($location){
        require_once(APPPATH.'../assets/js/phpexcel/Classes/PHPExcel/IOFactory.php');
        $objPHPExcel = new PHPExcel();
        $inputFileName =realpath(APPPATH.'../uploads/excel/Quickbooks.xlsx');
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch(Exception $e) {
            die('Error loading file"'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }

        $objPHPExcel->setActiveSheetIndex(1);
        $highestRow = $objPHPExcel->getActiveSheet(1)->getHighestRow(); 
        for($x=3;$x<=$highestRow;$x++){
        	$payee = trim($objPHPExcel->getActiveSheet(1)->getCell('F'.$x)->getValue());
        	$total = $objPHPExcel->getActiveSheet(1)->getCell('A'.$x)->getValue();
        	if($payee!=''){
        		$pay = $payee;
	        	$date = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($objPHPExcel->getActiveSheet(1)->getCell('D'.$x)->getValue()));
		        $check_no = trim($objPHPExcel->getActiveSheet(1)->getCell('B'.$x)->getValue());
		        $original_amount = trim($objPHPExcel->getActiveSheet(1)->getCell('R'.$x)->getValue());
		        $orig_amount = str_replace("-", "", $original_amount);
		        $description = trim($objPHPExcel->getActiveSheet(1)->getCell('H'.$x)->getValue());
		        $t = $x+2;
		        $reference = trim($objPHPExcel->getActiveSheet(1)->getCell('B'.$t)->getValue());
		        $transac_date = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($objPHPExcel->getActiveSheet(1)->getCell('D'.$t)->getValue()));
		        $cur_year=date('Y');
                //$year = $this->super_model->select_column_where("location","year","location_id",$location);
		        $check_existing = $this->super_model->count_custom_where("cv_series", "location_id='$location' AND year = '$cur_year'");
                //$cv_start = $this->super_model->select_column_where("location","cv_start","location_id",$location);
		        if($check_existing==0){
                      $cv_no= "CV".$cur_year."-00100";
		        	  //$cv_no= $cv_start.$year."-00100";
		        	  $left = "00100";
		        } else {
		        	$latest = $this->super_model->get_max_where("cv_series", "series","location_id='$location' AND year = '$cur_year'");
		        	$series = $latest+1;
		        	$left = str_pad($series, 5, '00', STR_PAD_LEFT);
		        	$cv_no = "CV".$cur_year."-".$left;
		        }	

		        $cv_data= array(
		            'year'=>$cur_year,
		            'series'=>$left,
		            'location_id'=>$location,
		        );
		        $this->super_model->insert_into("cv_series", $cv_data);

	    		$data=array(
		    		'payee'=>$pay,
		    		'cv_date'=>$date,
		    		'transaction_date'=>$transac_date,
		    		'check_no'=>$check_no,
		    		'original_amount'=>$orig_amount,
		    		'description'=>$description,
		    		'check_date'=>$date,
		    		'reference'=>$reference,
		    		'payment'=>$orig_amount,
		    		'location_id'=>$location,
		    		'cv_no'=>$cv_no,
		    	);
		    	$this->super_model->insert_into("check_voucher", $data);
	    	}
	        if($total == 'TOTAL'){
	     		$x = $x + 1;

	     	} else {
	     		$x=$x;
	     	}
        }

        echo "<script>alert('Successfully Uploaded!'); window.location = 'report_list';</script>";
    }

	public function form(){
		$cv_id = $this->uri->segment(3);
		$data['cv_id'] = $cv_id;
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		foreach($this->super_model->select_row_where("check_voucher","cv_id",$cv_id) AS $cv){
			$location_name = $this->super_model->select_column_where("location","location_name","location_id",$cv->location_id);
			$address = $this->super_model->select_column_where("location","address","location_id",$cv->location_id);
			$contact_no = $this->super_model->select_column_where("location","contact_no","location_id",$cv->location_id);
			$logo = $this->super_model->select_column_where("location","logo","location_id",$cv->location_id);
			$data['saved']=$cv->saved;
			$data['voucher'][] = array(
				'payee'=>$cv->payee,
				'cv_date'=>$cv->cv_date,
				'transaction_date'=>$cv->transaction_date,
				'check_no'=>$cv->check_no,
				'original_amount'=>$cv->original_amount,
				'description'=>$cv->description,
				'check_date'=>$cv->check_date,
				'reference'=>$cv->reference,
				'payment'=>$cv->payment,
				'prepared_by'=>$cv->prepared_by,
	            'checked_by'=>$cv->checked_by,
	            'approved_by'=>$cv->approved_by,
	            'released_by'=>$cv->released_by,
	            'received_by'=>$cv->received_by,
	            'or_no'=>$cv->or_no,
	            'cv_no'=>$cv->cv_no,
	            'location_name'=>$location_name,
	            'address'=>$address,
	            'contact_no'=>$contact_no,
	            'logo'=>$logo,
			);
		}
		$this->load->view('masterfile/form',$data);
		$this->load->view('template/footer');

	}

	public function print_cv(){
		$this->load->view('template/header');
		$cv_id = $this->uri->segment(3);
		$data['cv_id'] = $cv_id;
		foreach($this->super_model->select_row_where("check_voucher","cv_id",$cv_id) AS $cv){
			$location_name = $this->super_model->select_column_where("location","location_name","location_id",$cv->location_id);
			$address = $this->super_model->select_column_where("location","address","location_id",$cv->location_id);
			$contact_no = $this->super_model->select_column_where("location","contact_no","location_id",$cv->location_id);
			$logo = $this->super_model->select_column_where("location","logo","location_id",$cv->location_id);
			$data['saved']=$cv->saved;
			$data['voucher'][] = array(
				'payee'=>$cv->payee,
				'cv_date'=>$cv->cv_date,
				'transaction_date'=>$cv->transaction_date,
				'check_no'=>$cv->check_no,
				'original_amount'=>$cv->original_amount,
				'description'=>$cv->description,
				'check_date'=>$cv->check_date,
				'reference'=>$cv->reference,
				'payment'=>$cv->payment,
				'prepared_by'=>$cv->prepared_by,
	            'checked_by'=>$cv->checked_by,
	            'approved_by'=>$cv->approved_by,
	            'released_by'=>$cv->released_by,
	            'received_by'=>$cv->received_by,
	            'or_no'=>$cv->or_no,
	            'cv_no'=>$cv->cv_no,
	            'location_name'=>$location_name,
	            'address'=>$address,
	            'contact_no'=>$contact_no,
	            'logo'=>$logo,
			);
		}
		$this->load->view('masterfile/print_cv',$data);
		$this->load->view('template/footer');

	}

	/*public function save_cv(){
		$cv_id = trim($this->input->post('cv_id')," ");
		$data = array(
			'saved'=>1,
		);
		if($this->super_model->update_where("check_voucher", $data, "cv_id", $cv_id)){
            redirect(base_url().'index.php/masterfile/print_cv/'.$cv_id);
        }
	}*/

	public function insert_update(){
        $cv_id = trim($this->input->post('cv_id')," ");
        $prepared_by = trim($this->input->post('prepared_by')," ");
        $checked_by = trim($this->input->post('checked_by')," ");
        $approved_by = trim($this->input->post('approved_by')," ");
        $released_by = trim($this->input->post('released_by')," ");
        $received_by = trim($this->input->post('received_by')," ");
        $or_no = trim($this->input->post('or_no')," ");
        $data = array(
            'prepared_by'=>$prepared_by,
            'checked_by'=>$checked_by,
            'approved_by'=>$approved_by,
            'released_by'=>$released_by,
            'received_by'=>$received_by,
            'or_no'=>$or_no,
            'saved'=>1,
        );
        if($this->super_model->update_where("check_voucher", $data, "cv_id", $cv_id)){
            redirect(base_url().'index.php/masterfile/print_cv/'.$cv_id);
        }
    }

    public function location_list(){
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $data['location']=$this->super_model->select_all_order_by('location','location_name',"ASC");
        $this->load->view('masterfile/location_list',$data);
        $this->load->view('template/footer');
    }

    public function save_location(){
    	$location = trim($this->input->post('location')," ");
        $address = trim($this->input->post('address')," ");
        $contact_no = trim($this->input->post('contact_no')," ");
        $cv_start = trim($this->input->post('cv_start')," ");
        $year = trim($this->input->post('year')," ");
    	$error_ext=0;
        $dest= realpath(APPPATH . '../uploads/');
        if(!empty($_FILES['logo']['name'])){
             $logo= basename($_FILES['logo']['name']);
             $logo=explode('.',$logo);
             $ext1=$logo[1];
            
            if($ext1=='php' || ($ext1!='png' && $ext1 != 'jpg' && $ext1!='jpeg')){
                $error_ext++;
            } else {
                 $filename=$location.'.'.$ext1;
                 move_uploaded_file($_FILES["logo"]['tmp_name'], $dest.'/'.$filename);
            }

        } else {
            $filename="";
        }

        $rows_head = $this->super_model->count_rows("location");
        if($rows_head==0){
            $location_id=1;
        } else {
            $max = $this->super_model->get_max("location", "location_id");
            $location_id = $max+1;
        }

        $data_series = array(
            'location_id'=>$location_id,
            'series'=>$cv_start,
            'year'=>$year,
        );
        $this->super_model->insert_into("cv_series", $data_series);

        $data = array(
            'location_name'=>$location,
            'address'=>$address,
            'contact_no'=>$contact_no,
            'logo'=>$filename,
            'cv_start'=>$cv_start,
            'year'=>$year,
        );

        if($this->super_model->insert_into("location", $data)){
            redirect(base_url().'index.php/masterfile/location_list');
        }
    }

    public function update_location(){
        $location_id = trim($this->input->post('location_id')," ");
        $location_name = trim($this->input->post('location_name')," ");
        $address = trim($this->input->post('address')," ");
        $contact_no = trim($this->input->post('contact_no')," ");
        $error_ext=0;
        $dest= realpath(APPPATH . '../uploads/');
        if(!empty($_FILES['logo']['name'])){
            $logo= basename($_FILES['logo']['name']);
            $logo=explode('.',$logo);
            $ext1=$logo[1];
            
            if($ext1=='php' || ($ext1!='png' && $ext1 != 'jpg' && $ext1!='jpeg')){
                $error_ext++;
            } else {
                $filename1=$location_name.'.'.$ext1;
                echo $filename;
                move_uploaded_file($_FILES["logo"]['tmp_name'], $dest.'\/'.$filename1);
                $data_pic = array(
                    'logo'=>$filename1
                );
                $this->super_model->update_where("location", $data_pic, "location_id", $location_id);
            }
        }

        $data = array(
            'location_name'=>$location_name,
            'address'=>$address,
            'contact_no'=>$contact_no,
        );
        if($this->super_model->update_where("location", $data, "location_id", $location_id)){
            redirect(base_url().'index.php/masterfile/location_list');
        }
    }

    public function delete_location(){
        $location_id=$this->uri->segment(3);
        if($this->super_model->delete_where("location", "location_id", $location_id)){
             redirect(base_url().'index.php/masterfile/location_list');
        }  
    }

    public function upload(){
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $data['location']=$this->super_model->select_all_order_by('location','location_name',"ASC");
        $this->load->view('masterfile/upload',$data);
        $this->load->view('template/footer');
    }
}
