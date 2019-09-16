<div class="modal fade" id="uploadfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload File
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>                                        
            </div>
            <form method='POST' action='upload_excel' enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="file" class="form-control" name="csv">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h4 class="title">CHECK VOUCHER</h4>  
                                    <p class="category" style="color:#040606"><b><?php echo $location_name; ?></b></p>
                                </div>
                                <div class="col-lg-4">
                                    <form method="POST" action="<?php echo base_url(); ?>index.php/masterfile/generateLocation">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <select class="form-control" name = "location">
                                                    <option selected="" value = ''>--Select Location here--</option>
                                                    <?php foreach($location AS $l){ ?>
                                                    <option value = "<?php echo $l->location_id;?>"><?php echo $l->location_name; ?></option>
                                                    <?php } ?>
                                                </select>   
                                            </div>
                                        </div>  
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <input type="submit" class="btn btn-info btn-fill btn-block btn-xs" value="Select" name=""> 
                                            </div>
                                        </div> 
                                    </form>  
                                </div>
                            </div>
                           <!--  <div class="row">
                                <div class="col-lg-12">
                                    <center>                             
                                        <h4 class="title">CHECK VOUCHER</h4>  
                                    </center>      
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-4">
                                    <select class="form-control">
                                    <option>asdasd</option>
                                    </select>   
                                </div>
                                <div class="col-lg-4"></div>
                            </div>  
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-4">
                                    <input type="button" class="btn btn-info btn-fill btn-block btn-xs" value="Select" name=""> 
                                </div>
                                <div class="col-lg-4"></div>
                            </div>    
                            <br>
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-4">
                                    <center>
                                        <h5>Location</h5>
                                    </center>
                                </div>
                                <div class="col-lg-4"></div>
                            </div>     -->                                               
                        </div>
                        <br>
                        <br>
                        <?php if(!empty($check)){ ?>
                    	<div class="datatable-dashv1-list custom-datatable-overright">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <th width="15%">Date</th>
                                	<th width="50%">Payee</th>
                                	<th width="20%">Reference</th>
                                	<th width="10%">Status</th>
                                	<th width="5%" align="center"><span class="ti-menu"></span></th>
                                </thead>
                                <tbody>
                                    <?php foreach($check AS $c){ ?>
                                    <tr>
                                    	<td><?php echo $c->cv_date; ?></td>
                                    	<td><?php echo $c->payee; ?></td>
                                    	<td><?php echo $c->reference; ?></td>
                                    	<td>
                                            <?php if($c->saved == 1){ ?>
                                            <span class = "label label-info label-sm">Saved</span>
                                            <?php } else { ?>
                                            <span class = "label label-warning label-sm">Pending</span>
                                            <?php } ?>
                                        </td>
                                    	<td align="center">
                                    		<a href="<?php echo base_url(); ?>index.php/masterfile/form/<?php echo $c->cv_id; ?>" class="btn btn-xs btn-warning btn-fill">
                                    			<span class="ti-eye"></span>
                                    		</a>
                                    	</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


        