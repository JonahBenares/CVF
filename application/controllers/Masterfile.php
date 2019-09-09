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

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$data['count']=$this->super_model->count_custom_where('check_voucher',"saved='0'");
		$this->load->view('masterfile/dashboard',$data);
		$this->load->view('template/footer');

	}

	public function report_list(){
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$data['check']=$this->super_model->select_all_order_by('check_voucher','cv_date',"ASC");
		$this->load->view('masterfile/report_list',$data);
		$this->load->view('template/footer');
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
                if(move_uploaded_file($_FILES["csv"]['tmp_name'], $dest.'/'.$filename1)){
                    $this->readExcel_quickbooks();
                }   
            }
        }
    }

    public function readExcel_quickbooks(){
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
}
