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
		$this->load->view('masterfile/dashboard');
		$this->load->view('template/footer');

	}

	public function report_list(){
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('masterfile/report_list');
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

        $highestRow = $objPHPExcel->getActiveSheet()->getHighestRow(); 
        //$cv_date = date('Y-m-d');
        $num = 3;
        for($x=3;$x<=$highestRow;$x++){

        	$payee = trim($objPHPExcel->getActiveSheet()->getCell('F'.$x)->getValue());
	        $date = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($objPHPExcel->getActiveSheet()->getCell('D'.$x)->getValue()));
	        $check_no = trim($objPHPExcel->getActiveSheet()->getCell('B'.$x)->getValue());
	        $original_amount = trim($objPHPExcel->getActiveSheet()->getCell('R'.$x)->getValue());
	        $description = trim($objPHPExcel->getActiveSheet()->getCell('H'.$x)->getValue());

	        if($payee!=''){
	        echo "Payee = " . $payee. ", date = " . $date . ", check_no = " .  $check_no . ", amount = " . $original_amount. ", description = ". $description . " = " .$x . "<br>";
	    	}
	     	 
	     	$total = $objPHPExcel->getActiveSheet()->getCell('A'.$x)->getValue();
	     	if($total == 'TOTAL'){
	     		$x = $x + 1;
	     	} else {
	     		$x=$x;
	     	}
	        
        }
    }

	public function form()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('masterfile/form');
		$this->load->view('template/footer');

	}

	public function print_cv()
	{
		$this->load->view('template/header');
		$this->load->view('masterfile/print_cv');
		$this->load->view('template/footer');

	}
}
