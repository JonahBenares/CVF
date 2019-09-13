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