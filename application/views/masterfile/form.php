<style type="text/css">
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
        border:1px solid #9e9e9e!important;
    }
    .bor-all{
        border: 1px solid #9e9e9e!important; 
    }
    .bor-top{
        border-top: 1px solid #9e9e9e!important; 
    }
    .bor-bottom{
        border-bottom: 1px solid #9e9e9e!important; 
    }
    .bor-right{
        border-right: 1px solid #9e9e9e!important; 
    }
    .bor-left{
        border-left: 1px solid #9e9e9e!important; 
    }
    .padding-left{
        padding-left: 1px solid #9e9e9e!important; 
    }
    .nomarg{
        margin: 0px;
    }
    .text-red{
        color: red!important;
    }
    .text-blue{
        color: blue!important;
    }
    .emphasis{
        /*border-bottom: 1px solid red!important;*/
        background-color: #f0b7b7!important;
    }
</style>
<div class="main-panel">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
                <a href="javascript:history.go(-1)" class="btn btn-success btn-md p-l-100 p-r-100"><span class="ti-arrow-left"></span> Back</a>            
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="ti-panel"></i>
                            <p>Stats</p>
                        </a>
                    </li>
                    <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-settings"></i>
                                <p>Settings</p>
                                <b class="caret"></b>
                          </a>
                          <ul class="dropdown-menu">
                            <li><a href="#">Logout</a></li>
                          </ul>
                    </li>
                    <!-- <li>
                        <a href="#">
                            <i class="ti-settings"></i>
                            <p>Settings</p>
                        </a>
                    </li> -->
                </ul>

            </div>
        </div>
    </nav>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="card">
                    <form method="POST" action = "<?php echo base_url();?>index.php/masterfile/insert_update">
                    	<div class="datatable-dashv1-list custom-datatable-overright">
                            <table class="table table-s">
                                <tr>
                                    <td width="5%" style="border: 0px!important"><br></td>
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
                                <?php foreach($voucher AS $v){ ?>
                                <tr>
                                    <td colspan="5" class="no-bord">
                                        <center>
                                            <img src="<?php echo base_url(); ?>uploads/<?php echo $v['logo'];?>" style="width:100px">
                                        </center>
                                    </td>
                                    <td colspan="10" class="no-bord">
                                        <center>
                                            <b><?php echo $v['location_name'];?> </b><br>
                                            <small><?php echo $v['address'];?></small><br>
                                            <small>TIN: / Tel. No.: <?php echo $v['contact_no'];?></small><br>
                                        </center> 
                                    </td>
                                    <td colspan="5" class="no-bord"></td>
                                </tr>
                                <tr>
                                    <td colspan="20" class="no-bord"><br></td>
                                </tr>
                                <tr>
                                    <td colspan="10" class="no-bord"><h5 class="nomarg"><b class="text-blue">CHECK VOUCHER</b></h5></td>
                                    <td colspan="10" class="no-bord"><h5 class="nomarg"><b class="text-red pull-right"><?php echo $v['cv_no'];?></b></h5></td>
                                </tr>
                                <tr>
                                    <td colspan="20" class="no-bord"><br></td>
                                </tr>
                                <tr>
                                    <td colspan="10" class="bor-bottom bor-top bor-left">Payee: <?php echo $v['payee'];?></td>
                                    <td colspan="10" class="bor-bottom bor-top bor-right">CV Date: <?php echo $v['cv_date'];?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="bor-bottom bor-right bor-left">Date <br><?php echo date('m/d/Y',strtotime($v['transaction_date']));?><br><br><br></td>
                                    <td colspan="2" class="bor-bottom bor-right">Type<br><br><br><br></td>
                                    <td colspan="3" class="bor-bottom bor-right">Reference<br><?php echo $v['reference'];?><br><br><br></td>
                                    <td colspan="3" class="bor-bottom bor-right">Original Amt.<br><?php echo $v['original_amount'];?><br><br><br></td>
                                    <td colspan="4" class="bor-bottom bor-right">Balance Due<br><br><br><br></td>
                                    <td colspan="2" class="bor-bottom bor-right">Discount<br><br><br><br></td>
                                    <td colspan="4" class="bor-bottom bor-right">Payment<br><?php echo $v['payment'];?><br><br><br></td>
                                </tr>
                                <tr>
                                    <td colspan="20" class="no-bord"><br></td>
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
                                    <td colspan="20" class="no-bord"><br></td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="bor-right bor-top bor-left">Prepared by:</td>
                                    <td colspan="7" class="bor-right bor-top">Checked by:</td>
                                    <td colspan="7" class="bor-right bor-top">Approved by:</td>
                                </tr>
                                <tr>
                                    <?php if($saved==0){ ?>
                                    <td colspan="6" class="bor-right bor-left"><input type="text" name = "prepared_by" class="form-control emphasis" placeholder="type here.." name=""></td>
                                    <?php } else{ ?>
                                    <td colspan="6" class="bor-right bor-left"><?php echo $v['prepared_by']; ?></td>
                                    <?php } ?>

                                    <?php if($saved==0){ ?>
                                    <td colspan="7" class="bor-right "><input type="text" name = "checked_by" class="form-control emphasis" placeholder="type here.." name=""></td>
                                    <?php }else { ?>
                                    <td colspan="7" class="bor-right "><?php echo $v['checked_by'];?></td>
                                    <?php } ?>

                                    <?php if($saved==0){ ?>
                                    <td colspan="7" class="bor-right "><input type="text" name = "approved_by" class="form-control emphasis" placeholder="type here.." name=""></td>
                                    <?php }else { ?>
                                    <td colspan="7" class="bor-right "><?php echo $v['approved_by'];?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td colspan="6" class="bor-top bor-right bor-left">Released by:</td>
                                    <td colspan="7" class="bor-top bor-right">Received by/Date:</td>
                                    <td colspan="7" class="bor-top bor-right">OR/SI/AR No.:</td>
                                </tr>
                                 <tr>
                                    <?php if($saved==0){ ?>
                                    <td colspan="6" class="bor-bottom bor-right bor-left"><input type="text" name = "released_by" class="form-control emphasis" placeholder="type here.." name=""></td>
                                    <?php } else { ?>
                                    <td colspan="6" class="bor-bottom bor-right bor-left"><?php echo $v['released_by'];?></td>
                                    <?php } ?>

                                    <?php if($saved==0){ ?>
                                    <td colspan="7" class="bor-bottom bor-right"><input type="text" name = "received_by" class="form-control emphasis" placeholder="type here.." name=""></td>
                                    <?php }else { ?>
                                    <td colspan="7" class="bor-bottom bor-right"><?php echo $v['received_by'];?></td>
                                    <?php } ?>

                                    <?php if($saved==0){ ?>
                                    <td colspan="7" class="bor-bottom bor-right"><input type="text" name = "or_no" class="form-control emphasis" placeholder="type here.." name=""></td>
                                    <?php } else { ?>
                                    <td colspan="7" class="bor-bottom bor-right"><?php echo $v['or_no'];?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td colspan="20"><br></td>
                                </tr>
                                <tr>
                                    <td colspan="16" class="bor-bottom bor-left bor-top">Description: <b><?php echo $v['description'];?></b></td>
                                    <td colspan="4" class="bor-bottom bor-right bor-top" align = "right"><b><?php echo $v['payment'];?></b></td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <center>
                            <input type="hidden" name="cv_id" value = "<?php echo $cv_id; ?>">
                            <?php if($saved==0){ ?>
                                <input type="submit" class="btn btn-md btn-warning btn-fill" name="button" value="Print">
                            <?php }else { ?>
                                <a href="<?php echo base_url(); ?>index.php/masterfile/print_cv/<?php echo $cv_id; ?>" class="btn btn-md btn-warning btn-fill">
                                    Print
                                </a>
                            <?php } ?>
                        </center>                        
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


        