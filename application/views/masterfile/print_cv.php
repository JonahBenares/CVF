  	<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Accounting System</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon
    		============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/message/logo4.ico">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mixins.css">
	    <script src="<?php echo base_url(); ?>assets/js/all-scripts.js"></script> 
	</head>
  	<style type="text/css">
        html, body{
            background: #f1eee3!important;/*2d2c2c , f4f3ef*/
            font-size:12px!important;
        }
        .pad{
        	padding:0px 250px 0px 250px
        }
        @media print{
        	.pad{
        	padding:0px 0px 0px 0px
        	}
        }
        .table-bordered>tbody>tr>td, 
        .table-bordered>tbody>tr>th, 
        .table-bordered>tfoot>tr>td, 
        .table-bordered>tfoot>tr>th, 
        .table-bordered>thead>tr>td, 
        .table-bordered>thead>tr>th
        {
		    border: 1px solid #000!important;
		}
		.f13{
			font-size:13px!important;
		}
		.f10{
			font-size:10px!important;
		}
		.bor-btm{
			border-bottom: 1px solid #000;
		}
		.sel-des{
			border: 0px!important;
			width: 100%;
		}
		@media print{
			#prnt_btn, .reco, #printnotes{
				display: none;
			}
			html, body{
	            background: #fff!important;
	            font-size:12px!important;
	        }
	        .text-white{
				color: #fff;
			}
			.text-red{
				color: red!important;
			}
			.text-blue{
				color: blue!important;
			}
		}
		.text-white{
			color: #fff;
		}
		.text-red{
			color: red!important;
		}
		.text-blue{
			color: blue!important;
		}
		.emphasis{
			/*border-bottom: 1px solid red!important;*/
			background-color: #ffe5e5!important;
		}
		.bor-all{
	        border: 1px solid #000!important; 
	    }
	    .bor-top{
	        border-top: 1px solid #000!important; 
	    }
	    .bor-bottom{
	        border-bottom: 1px solid #000!important; 
	    }
	    .bor-right{
	        border-right: 1px solid #000!important; 
	    }
	    .bor-left{
	        border-left: 1px solid #000!important; 
	    }
	    .no-bord{
	    	border: 0px solid #000!important; 
	    }
	    .no-bord-top{
	    	border-top: 0px solid #000!important; 
	    }
	    .bor-bot-dash{
	        border-bottom: 1px dashed #000!important; 
	    }
	    .padding-left{
	        padding-left: 1px solid #000!important; 
	    }
		.table > thead > tr > th, 
	    .table > tbody > tr > th, 
	    .table > tfoot > tr > th, 
	    .table > thead > tr > td, 
	    .table > tbody > tr > td, 
	    .table > tfoot > tr > td {
	        padding: 0px!important;
	        vertical-align: middle;
	    }
	    .table-bord>tbody>tr>td, 
	    .table-bord>tbody>tr>th, 
	    .table-bord>tfoot>tr>td, 
	    .table-bord>tfoot>tr>th, 
	    .table-bord>thead>tr>td, 
	    .table-bord>thead>tr>th {
	        border:1px solid #000!important;
	    }
	    .nomarg{
	    	margin: 0px;
	    }

        .blue{
            background-image: url('<?php echo base_url(); ?>assets/img/png.png')!important;
            background-repeat:no-repeat!important;
            /*background-size: contain!important;*/
            background-position: center center!important;
        }
	    
    </style>    

    <div  class="pad">
    	<form method='POST' action="<?php echo base_url();?>index.php/masterfile/save_cv">  
    		<div  id="prnt_btn">
	    		<center>
			    	<div class="btn-group">
						<a href="javascript:history.go(-1)" class="btn btn-success btn-md p-l-100 p-r-100"><span class="ti-arrow-left"></span> Back</a>				
						<a  onclick="printPage()" class="btn btn-warning btn-md p-l-50 p-r-50"><span class="ti-printer"></span> Print</a>
                        <?php if($saved==0){ ?>		
						<input type='submit' class="btn btn-primary btn-md p-l-100 p-r-100" value="Save"> 	
                        <?php } ?>
					</div>
				</center>
			</div>
			<br>
            <div class="blue">
                <table class="table table-s" style="margin-bottom: 0px;border-bottom: 2px solid #000">
                    <tr>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                    </tr>
                    <tr>
                        <td class="" colspan="4" align="center" rowspan="3"><div style="width:100%;padding: 20px;border:1px solid #000">LOGO</div> </td>
                        <td colspan="3" class=""></td>
                        <td colspan="13" class=""> Company Name</td>  
                    </tr>  
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="13"> Address</td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="13"> TIN/TEL. NO</td>
                    </tr>  
                    <tr>
                        <td colspan="17"></td>
                        <td colspan="3">2/21/2019</td>
                    </tr>   
                    <tr><td colspan="20"><br></td></tr>      
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="15">POWER ONE CORP</td>
                        <td colspan="3">**500,000.00</td>
                    </tr>   
                    <tr>
                        <td colspan="1"></td>
                        <td colspan="16">Five Hundred Thousand and 00/100*********************************************************</td>
                        <td colspan="3"></td>
                    </tr>     
                    <tr><td colspan="20"><br><br><br><br><br><br></td></tr>              
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="15">Payment of Advances to POC( direct deposit fr CEN</td>
                        <td colspan="3"></td>
                    </tr>              
                </table>
            </div>
	    	<div style="background: #fff; border:0px solid #000" >
	    		<table class="table" >
                    <tr>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                        <td width="5%" style="border: 0px!important"></td>
                    </tr>
                    <tr>
                        <td colspan="20" class="no-bord"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="10" class="no-bord"><h5 class="nomarg"><b class="text-blue">CHECK VOUCHER</b></h5></td>
                        <td colspan="10" class="no-bord"><h5 class="nomarg"><b class="text-red pull-right">01-000001</b></h5></td>
                    </tr>
                    <tr>
                        <td colspan="20" class="no-bord"><br></td>
                    </tr>
                    <?php foreach($voucher AS $v){ ?>
                    <tr>
                        <td colspan="10" class="bor-bottom bor-top bor-left">Payee: <b><?php echo $v['payee'];?></b></td>
                        <td colspan="10" class="bor-bottom bor-top bor-right">CV Date: <b><?php echo $v['cv_date'];?></b></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bor-bottom bor-right bor-left"><?php echo $v['transaction_date'];?><br><br><br></td>
                        <td colspan="2" class="bor-bottom bor-right"><br><br><br></td>
                        <td colspan="3" class="bor-bottom bor-right"><?php echo $v['reference'];?><br><br><br></td>
                        <td colspan="3" class="bor-bottom bor-right"><?php echo $v['original_amount'];?><br><br><br></td>
                        <td colspan="4" class="bor-bottom bor-right"><br><br><br></td>
                        <td colspan="2" class="bor-bottom bor-right"><br><br><br></td>
                        <td colspan="4" class="bor-bottom bor-right"><?php echo $v['payment'];?><br><br><br><br></td>
                    </tr>
                    <tr>
                    	<td colspan="20"><br></td>
                    </tr>
                    <tr>
                        <td colspan="20" align="center" class="bor-all">CHECK DETAILS:</td>
                    </tr>
                    <tr>
                        <td colspan="5" class="bor-left bor-right">Bank</td>
                        <td colspan="5" class="bor-right">Check No</td>
                        <td colspan="5" class="bor-right">Check Date</td>
                        <td colspan="5" class="bor-right">Amount</td>
                    </tr>
                    <tr>
                        <td colspan="5" align="center" class="bor-bottom bor-left bor-right"><b></b></td>
                        <td colspan="5" align="center" class="bor-bottom bor-right"><b><?php echo $v['check_no'];?></b></td>
                        <td colspan="5" align="center" class="bor-bottom bor-right"><b><?php echo $v['check_date'];?></b></td>
                        <td colspan="5" align="center" class="bor-bottom bor-right"><b><?php echo $v['original_amount'];?></b></td>
                    </tr>
                    <tr>
                    	<td colspan="20"><br></td>
                    </tr>
                    <tr>
                        <td colspan="6" class="bor-right bor-top bor-left">Prepared by:</td>
                        <td colspan="7" class="bor-right bor-top">Checked by:</td>
                        <td colspan="7" class="bor-top bor-right">Approved by:</td>
                    </tr>
                    <tr>
                        <td colspan="6" class="bor-right bor-left"><br><b><?php echo $v['prepared_by'];?></b></td>
                        <td colspan="7" class="bor-right "><br><b><?php echo $v['checked_by'];?></b></td>
                        <td colspan="7" class="bor-right "><br><b><?php echo $v['approved_by'];?></b></td>
                    </tr>
                    <tr>
                        <td colspan="6" class="bor-top bor-right bor-left">Released by:</td>
                        <td colspan="7" class="bor-top bor-right">Received by/Date:</td>
                        <td colspan="7" class="bor-top bor-right">OR/SI/AR No.:</td>
                    </tr>
                    <tr>
                        <td colspan="6" class="bor-bottom bor-right bor-left"><br><b><?php echo $v['released_by'];?></b></td>
                        <td colspan="7" class="bor-bottom bor-right"><br><b><?php echo $v['received_by'];?></b></td>
                        <td colspan="7" class="bor-bottom bor-right"><br><b><?php echo $v['or_no'];?></b></td>
                    </tr>
                    <tr>
                    	<td colspan="20"><br></td>
                    </tr>
                    <tr>
                    	<td colspan="20" class="bor-all"><br></td>
                    </tr>
                    <tr>
                    	<td colspan="20" class="bor-bot-dash" align="center"><b class="text-blue">ORIGINAL COPY</b></td>
                    </tr>
                    <tr>
                    	<td colspan="20"><br></td>
                    </tr>
                    <tr>
                        <td colspan="10" class="bor-bottom bor-top bor-left">Payee: <b><?php echo $v['payee'];?></b></td>
                        <td colspan="10" class="bor-bottom bor-top bor-right">CV Date: <b><?php echo $v['cv_date'];?></b></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bor-bottom bor-right bor-left"><?php echo $v['transaction_date'];?><br><br><br></td>
                        <td colspan="2" class="bor-bottom bor-right"><br><br><br></td>
                        <td colspan="3" class="bor-bottom bor-right"><?php echo $v['reference'];?><br><br><br></td>
                        <td colspan="3" class="bor-bottom bor-right"><?php echo $v['original_amount'];?><br><br><br></td>
                        <td colspan="4" class="bor-bottom bor-right"><br><br><br></td>
                        <td colspan="2" class="bor-bottom bor-right"><br><br><br></td>
                        <td colspan="4" class="bor-bottom bor-right"><?php echo $v['payment'];?><br><br><br><br></td>
                    </tr>
                    <tr>
                    	<td colspan="20"><br></td>
                    </tr>
                    <tr>
                        <td colspan="20" align="center" class="bor-all">CHECK DETAILS:</td>
                    </tr>
                    <tr>
                        <td colspan="5" class="bor-left bor-right">Bank</td>
                        <td colspan="5" class="bor-right">Check No</td>
                        <td colspan="5" class="bor-right">Check Date</td>
                        <td colspan="5" class="bor-right">Amount</td>
                    </tr>
                    <tr>
                        <td colspan="5" align="center" class="bor-bottom bor-left bor-right"><b></b></td>
                        <td colspan="5" align="center" class="bor-bottom bor-right"><b><?php echo $v['check_no'];?></b></td>
                        <td colspan="5" align="center" class="bor-bottom bor-right"><b><?php echo $v['check_date'];?></b></td>
                        <td colspan="5" align="center" class="bor-bottom bor-right"><b><?php echo $v['original_amount'];?></b></td>
                    </tr>
                    <tr>
                        <td colspan="20"><br></td>
                    </tr>
                    <tr>
                        <td colspan="6" class="bor-right bor-top bor-left">Prepared by:</td>
                        <td colspan="7" class="bor-right bor-top">Checked by:</td>
                        <td colspan="7" class="bor-top bor-right">Approved by:</td>
                    </tr>
                    <tr>
                        <td colspan="6" class="bor-right bor-left"><br><b><?php echo $v['prepared_by'];?></b></td>
                        <td colspan="7" class="bor-right "><br><b><?php echo $v['checked_by'];?></b></td>
                        <td colspan="7" class="bor-right "><br><b><?php echo $v['approved_by'];?></b></td>
                    </tr>
                    <tr>
                        <td colspan="6" class="bor-top bor-right bor-left">Released by:</td>
                        <td colspan="7" class="bor-top bor-right">Received by/Date:</td>
                        <td colspan="7" class="bor-top bor-right">OR/SI/AR No.:</td>
                    </tr>
                    <tr>
                        <td colspan="6" class="bor-bottom bor-right bor-left"><br><b><?php echo $v['released_by'];?></b></td>
                        <td colspan="7" class="bor-bottom bor-right"><br><b><?php echo $v['received_by'];?></b></td>
                        <td colspan="7" class="bor-bottom bor-right"><br><b><?php echo $v['or_no'];?></b></td>
                    </tr>
                    <tr>
                        <td colspan="20" class="no-bord"><br></td>
                    </tr>
                    <tr>
                        <td colspan="10" class="no-bord"><h5 class="nomarg"><b class="text-blue">CHECK VOUCHER</b></h5></td>
                        <td colspan="10" class="no-bord"><h5 class="nomarg"><b class="text-red pull-right">01-000001</b></h5></td>
                    </tr> 
                    <tr>
                    	<td colspan="20" align="center"><b class="text-blue">DUPLICATE COPY</b></td>
                    </tr>
                    <?php } ?>
                    <tr>
                    	<td class="" colspan="4" align="center" rowspan="3"><div style="width:100%;padding: 15px;border:1px solid #000">LOGO</div></td>
                    	<td colspan="1" class=""></td>
                    	<td colspan="15" class=""> Company Name</td>  
                    </tr>  
                    <tr>
                    	<td colspan="1"></td>
                    	<td colspan="15"> Address</td>
                    </tr>
                    <tr>
                    	<td colspan="1"></td>
                    	<td colspan="15"> TIN/TEL. NO</td>
                    </tr>
                    <tr><td><br><br><br><br></td></tr>                                                     
                </table>		    
	    	</div>
            <input type="hidden" name="cv_id" value="<?php echo $cv_id; ?>">
    	</form>
    </div>
    <script type="text/javascript">
    	function printPage() {
		  window.print();
		}
    </script>