<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-md-5">
                                <h4 class="title" style="margin-top:8px;">
                                    CV FILE MONITORING <?php echo $location_id; ?>
                                </h4>
                            </div>
                            <div class="col-md-7">
                                <div style="display: flex;justify-content:flex-end;gap: 10px;">
                                    <div class="" style="width: 400px;margin-left:10px">
                                        <form>
                                            <select class="form-control"
                                                    name="location"
                                                    id="location"
                                                    onchange="onchangeLocation();">
                                                 <?php foreach($location as $l){ ?>
                                                    <option value="<?php echo $l->location_id;?>"
                                                        <?php echo ($location_id==$l->location_id) ? 'selected' : ''; ?>>
                                                        <?php echo $l->location_name; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </form>
                                    </div>
                                    <div class=" text-center">
                                        <div class="btn-group">
                                            <a href="<?php echo base_url(); ?>masterfile/encoded_list/<?php echo $location_id; ?>?status=encoded"
                                            class="btn btn-success btn-fill">
                                                Encoded
                                                <span class="badge">
                                                    <?php echo $encoded_count; ?>
                                                </span>
                                            </a>
                                            <a href="<?php echo base_url(); ?>masterfile/encoded_list/<?php echo $location_id; ?>"
                                            class="btn btn-info btn-fill">
                                                Additional
                                                <span class="badge">
                                                    <?php echo $additional_count; ?>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class=" text-right">
                                        <button type="button"
                                                class="btn btn-default btn-fill"
                                                data-toggle="collapse"
                                                data-target="#filterPanel">
                                            <span class="ti-filter"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr style="margin-bottom:0px">

                    <!-- FILTER -->
                    <div class="collapse" id="filterPanel">
                        <div class="content">

                            <div class="row">

                                <div class="col-md-2">
                                    <label>Date From</label>
                                    <input type="date" class="form-control">
                                </div>

                                <div class="col-md-2">
                                    <label>Date To</label>
                                    <input type="date" class="form-control">
                                </div>

                                <div class="col-md-2">
                                    <label>Year</label>
                                    <select class="form-control">
                                        <option value="">All</option>
                                        <?php for($y=date('Y'); $y>=2020; $y--){ ?>
                                            <option><?php echo $y; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label>CV Number</label>
                                    <input type="text"
                                           class="form-control"
                                           placeholder="Search CV No">
                                </div>

                                <div class="col-md-2">
                                    <label>E-Filing</label>
                                    <select class="form-control">
                                        <option value="">All</option>
                                        <option value="1">Encoded</option>
                                        <option value="0">Not Encoded</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label>Additional Files</label>
                                    <select class="form-control">
                                        <option value="">All</option>
                                        <option value="1">With Files</option>
                                        <option value="0">Without Files</option>
                                    </select>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-3">
                                    <label>&nbsp;</label>
                                    <button class="btn btn-info btn-fill btn-block">
                                        <span class="ti-search"></span> Apply Filter
                                    </button>
                                </div>

                                <div class="col-md-3">
                                    <label>&nbsp;</label>
                                    <button class="btn btn-default btn-fill btn-block">
                                        <span class="ti-reload"></span> Reset
                                    </button>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="content">
                        <table class="datatable-dashv1-list custom-datatable-overright"
                                id="myTable">

                            <thead>
                                <tr>
                                    <th width="15%">Date</th>
                                    <th width="15%">CV Number</th>
                                    <th width="20%">Location</th>
                                    <th width="15%">E-Filing</th>
                                    <th width="20%">Additional Files</th>
                                    <th width="15%">
                                        <span class="ti-menu"></span>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php if(!empty($check)){ ?>
                                <?php foreach($check as $c){ ?>
                                    <tr>
                                        <td><?php echo date('m/d/Y',strtotime($c['cv_date'])); ?></td>
                                        <td><?php echo $c['cv_no']; ?></td>
                                        <td><?php echo $location_name; ?></td>
                                        <td>

                                            <?php if($c['saved']==1){ ?>

                                                <span class="label label-success">
                                                    <span class="ti-check"></span> Encoded
                                                </span>

                                            <?php } else { ?>

                                                <span class="label label-danger">
                                                    Not Encoded
                                                </span>

                                            <?php } ?>

                                        </td>
                                        <td>
                                            -
                                        </td>
                                        <td align="center">

                                            <button
                                                class="btn btn-warning btn-fill btn-xs"
                                                data-toggle="modal">

                                                <span class="ti-pencil"></span>

                                            </button>

                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                            </tbody>        
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

function onchangeLocation()
{
    var location_id = document.getElementById('location').value;

    window.location.href =
        "<?php echo base_url(); ?>masterfile/encoded_list/" + location_id;
}

</script>