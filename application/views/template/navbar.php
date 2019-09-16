<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="warning">
    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    CV FORM
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="<?php echo base_url(); ?>index.php/masterfile/index">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url(); ?>index.php/masterfile/location_list">
                        <i class="ti-view-list"></i>
                        <p>Location</p>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url(); ?>index.php/masterfile/upload">
                        <i class="ti-upload"></i>
                        <p>Upload</p>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url(); ?>index.php/masterfile/report_list">
                        <i class="ti-panel"></i>
                        <p>Report</p>
                    </a>
                </li>
                <!-- <li>
                    <a href="user.html">
                        <i class="ti-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li>
                    <a href="table.html">
                        <i class="ti-view-list-alt"></i>
                        <p>Table List</p>
                    </a>
                </li> -->
            </ul>
    	</div>
    </div>  
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
                            Contact No.
                            <input type="text" class="form-control " name="contact_no" placeholder="type here ..">
                        </div>
                        <div class="form-group">
                            Logo
                            <input type="file" class="form-control " name="logo" placeholder="">
                        </div>
                        <div class="form-group">
                            CV Start
                            <input type="text" class="form-control " name="cv_start" placeholder="type here .." required="required">
                        </div>
                        <div class="form-group">
                            Choose Year:
                            <select class="form-control" name="year" required="required">
                                <option value='' selected="selected">-Select Year-</option>
                                <?php 
                                    $currently_selected = date('Y');
                                    $earliest_year = 2000; 
                                    $latest_year = date('Y'); 
                                    foreach (range( $latest_year, $earliest_year) as $i ) {
                                ?>
                                   <option value="<?php echo $i; ?>"><?php echo $i; ?></option>;
                                <?php } ?>
                                <!-- <?php
                                $curr_year = date('Y'); 
                                for($x=2019;$x<=$curr_year;$x++){ ?>
                                    <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                <?php } ?> -->
                            </select>
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
                            <li><a href="<?php echo base_url(); ?>index.php/masterfile/user_logout">Logout</a></li>
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