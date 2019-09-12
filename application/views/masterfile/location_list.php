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
            <form method='POST' action='' enctype="">
                <div class="modal-body">
                    <div class="form-group">
                        Location Name
                        <input type="text" class="form-control " name="" placeholder="type here ..">
                    </div>
                    <div class="form-group">
                        Address
                        <input type="text" class="form-control " name="" placeholder="type here ..">
                    </div>
                    <div class="form-group">
                        Conteact No.
                        <input type="text" class="form-control " name="" placeholder="type here ..">
                    </div>
                    <div class="form-group">
                        Logo
                        <input type="file" class="form-control " name="" placeholder="">
                    </div>
                </div>
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
                                	<th width="20%">Contact No.</th>
                                	<th width="20%">Logo</th>
                                	<th width="5%" align="center"><span class="ti-menu"></span></th>
                                </thead>
                                <tbody>
                                    <tr>
                                    	<td></td>
                                    	<td></td>
                                    	<td></td>
                                    	<td></td>
                                    	<td align="center">
                                    		<a href="" class="btn btn-xs btn-warning btn-fill">
                                    			<span class="ti-eye"></span>
                                    		</a>
                                    	</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


        