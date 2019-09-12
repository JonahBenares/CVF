<div class="modal fade" id="uploadfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Location
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>                                        
            </div>
            <form method='POST' action='<?php echo base_url(); ?>index.php/masterfile/save_location' enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        Location Name
                        <input type="text" class="form-control " name="location" placeholder="type here ..">
                    </div>
                    <div class="form-group">
                        Address
                        <input type="text" class="form-control " name="address" placeholder="type here ..">
                    </div>
                    <div class="form-group">
                        Conteact No.
                        <input type="text" class="form-control " name="contact_no" placeholder="type here ..">
                    </div>
                    <div class="form-group">
                        Logo
                        <input type="file" class="form-control " name="logo" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary btn-block" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="updateLocation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Location
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>                                        
            </div>
            <form method='POST' action='<?php echo base_url(); ?>index.php/masterfile/update_location' enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        Location Name
                        <input type="text" class="form-control " name="location_name" id = "location_name">
                    </div>
                    <div class="form-group">
                        Address
                        <input type="text" class="form-control " name="address" id = "address">
                    </div>
                    <div class="form-group">
                        Contact No.
                        <input type="text" class="form-control " name="contact_no" id = "contact_no">
                    </div>
                    <div class="form-group">
                        Logo
                        <input type="file" class="form-control " name="logo">
                    </div>
                </div>
                <input type="hidden" name = "location_id" id = "location_id">
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary btn-block" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>

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
                    <!-- <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="ti-panel"></i>
                            <p>Stats</p>
                        </a>
                    </li> -->
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
                        <div class="header">
                            <h4 class="title">Location
                                <button type="button" class="btn btn-primary btn-fill pull-right" data-toggle="modal" data-target="#uploadfile">
                                  <span class="ti-plus"></span> Add
                                </button> 
                            </h4>
                            <p class="category">..</p>
                        </div>
                    	<div class="datatable-dashv1-list custom-datatable-overright">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <th width="25%">Location Name</th>
                                	<th width="25%">Address</th>
                                	<th width="15%">Contact No.</th>
                                	<th width="15%">Logo</th>
                                	<th width="10%" align="center"><span class="ti-menu"></span></th>
                                </thead>
                                <tbody>
                                    <?php foreach($location AS $l){ ?>
                                    <tr>
                                    	<td><?php echo $l->location_name; ?></td>
                                    	<td><?php echo $l->address; ?></td>
                                    	<td><?php echo $l->contact_no; ?></td>
                                    	<td><img style = "width:150px;" src="<?php echo base_url() ?>uploads/<?php echo $l->logo; ?>" alt="your image" /></td>
                                    	<td>
                                    		<a href = "" type="button" class="btn btn-xs btn-info btn-fill" data-id="<?php echo $l->location_id; ?>" data-name = '<?php echo $l->location_name; ?>' data-myvalue = '<?php echo $l->address;?>' data-trigger = '<?php echo $l->contact_no; ?>' data-bb='<?php echo $l->logo; ?>' id ="updateLocation_button" data-toggle="modal" data-target="#updateLocation">
                                    			<span class="ti-pencil-alt"></span>
                                    		</a>
                                            <a href="<?php echo base_url(); ?>index.php/masterfile/delete_location/<?php echo $l->location_id;?>" onclick="confirmationDelete(this);return false;" class="btn btn-xs btn-danger btn-fill">
                                                <span class="ti-trash"></span>
                                            </a>
                                    	</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


        