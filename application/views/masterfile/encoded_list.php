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
                                                onchange="changeLocationFilter();">
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
                                        <!-- <div class="btn-group"> -->
                                            <a href="<?php echo base_url(); ?>index.php/masterfile/encoded_list/<?php echo $location_id; ?>?status=encoded"
                                            class="btn btn-success btn-fill">

                                                Encoded
                                                <span class="badge">
                                                    <?php echo $encoded_count; ?>
                                                </span>
                                            </a>

                                            <!-- <a href="<?php echo base_url(); ?>index.php/masterfile/encoded_list/<?php echo $location_id; ?>?status=additional"
                                            class="btn btn-info btn-fill">

                                                Additional
                                                <span class="badge">
                                                    <?php echo $additional_count; ?>
                                                </span>
                                            </a> -->
                                        <!-- </div> -->
                                    </div>
                                    <div class=" text-right">
                                        <button type="button"
                                                class="btn btn-default btn-fill"
                                                data-toggle="collapse"
                                                data-target="#filterPanel">
                                            <span class="ti-filter"></span>
                                        </button>
                                    </div>
                                    <a href="<?php echo base_url(); ?>index.php/masterfile/export_encoded_list/<?php echo $location_id; ?>?filter=<?php echo $this->input->get('filter');?>&date_from=<?php echo $this->input->get('date_from');?>&date_to=<?php echo $this->input->get('date_to');?>&year=<?php echo $this->input->get('year');?>&cv_no=<?php echo $this->input->get('cv_no');?>&encoded=<?php echo $this->input->get('encoded');?>"
                                    class="btn btn-success btn-fill">
                                        <span class="ti-download"></span> Export Excel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr style="margin-bottom:0px">

                    <!-- FILTER -->
                    <div class="collapse" id="filterPanel">
                        <div class="content">

                            <form method="GET">

                                <div class="row">

                                    <div class="col-md-2">
                                        <label>Date From</label>
                                        <input type="date"
                                            name="date_from"
                                            class="form-control"
                                            value="<?php echo $this->input->get('date_from'); ?>">
                                    </div>

                                    <div class="col-md-2">
                                        <label>Date To</label>
                                        <input type="date"
                                            name="date_to"
                                            class="form-control"
                                            value="<?php echo $this->input->get('date_to'); ?>">
                                    </div>

                                    <div class="col-md-2">
                                        <label>Year</label>
                                        <select class="form-control" name="year">
                                            <option value="">All</option>

                                            <?php for($y=date('Y'); $y>=2020; $y--){ ?>
                                            <option value="<?php echo $y;?>"
                                                <?php echo ($this->input->get('year')==$y)?'selected':'';?>>
                                                <?php echo $y;?>
                                            </option>
                                            <?php } ?>

                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <label>CV Number</label>
                                        <input type="text"
                                            name="cv_no"
                                            class="form-control"
                                            placeholder="Search CV No"
                                            value="<?php echo $this->input->get('cv_no'); ?>">
                                    </div>

                                    <div class="col-md-2">
                                        <label>E-Filing</label>
                                        <select class="form-control" name="encoded">

                                            <option value="">All</option>

                                            <option value="1"
                                                <?php echo ($this->input->get('encoded')=='1')?'selected':'';?>>
                                                Encoded
                                            </option>

                                            <option value="0"
                                                <?php echo ($this->input->get('encoded')==='0')?'selected':'';?>>
                                                Not Encoded
                                            </option>

                                        </select>
                                    </div>

                                    <div class="col-md-1">
                                        <label>&nbsp;</label>

                                        <button type="submit"
                                                class="btn btn-info btn-fill btn-block">

                                            <span class="ti-search"></span>

                                        </button>

                                    </div>

                                    <div class="col-md-1">
                                        <label>&nbsp;</label>

                                        <a href="<?php echo base_url();?>index.php/masterfile/encoded_list/<?php echo $location_id;?>"
                                        class="btn btn-default btn-fill btn-block">

                                            <span class="ti-reload"></span>

                                        </a>

                                    </div>

                                </div>

                            </form>

                        </div>
                    </div>

                    <div class="content">
                        <table class="datatable-dashv1-list custom-datatable-overright"
                                id="encodingList">

                            <thead>
                                <tr>
                                    <th width="15%">Date</th>
                                    <th width="15%">CV Number</th>
                                    <th width="20%">Location</th>
                                    <th width="15%">E-Filing</th>
                                    <!-- <th width="20%">Additional Files</th> -->
                                    <!-- <th width="5%" align="center">
                                        <span class="ti-menu"></span>
                                    </th> -->
                                </tr>
                            </thead>

                            <tbody>
                                <?php if(!empty($check)){ ?>
                                    <?php foreach($check as $c){ ?>
                                        <tr>

                                            <td>
                                                <?php echo (!empty($c['cv_date']))
                                                    ? date('m/d/Y',strtotime($c['cv_date']))
                                                    : ''; ?>
                                            </td>

                                            <td><?php echo $c['cv_no']; ?></td>

                                            <td><?php echo $location_name; ?></td>

                                            <td>
                                                <?php if($c['encoded']==1){ ?>
                                                    <span class="label label-success">
                                                        Encoded
                                                    </span>
                                                <?php } else { ?>
                                                    <span class="label label-default">
                                                        Pending
                                                    </span>
                                                <?php } ?>
                                            </td>

                                            <!-- <td>
                                                <?php if($c['additional']==1){ ?>
                                                    <span class="label label-info">
                                                        Available
                                                    </span>
                                                <?php } else { ?>
                                                    <span class="label label-default">
                                                        None
                                                    </span>
                                                <?php } ?>
                                            </td> -->

                                            <!-- <td align="center">
                                                <button
                                                    class="btn btn-warning btn-fill btn-xs manageFileBtn"
                                                    data-toggle="modal"
                                                    data-target="#manageFiles"
                                                    data-cv_id="<?php echo $c['cv_id'];?>"
                                                    data-cv_no="<?php echo $c['cv_no'];?>"
                                                    data-encoded="<?php echo $c['encoded'];?>"
                                                    data-additional="<?php echo $c['additional'];?>">

                                                    <span class="ti-pencil"></span>
                                                </button>
                                            </td> -->

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
<script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
<script>
    $(document).on('click','.manageFileBtn',function(){

        var cv_id = $(this).data('cv_id');
        var cv_no = $(this).data('cv_no');
        var encoded = $(this).data('encoded');
        var additional = $(this).data('additional');

        $('#modal_cv_id').val(cv_id);
        $('#modal_cv_no').text(cv_no);

        $('#modal_encoded').prop('checked', encoded == 1);
        $('#modal_additional').prop('checked', additional == 1);

    });
</script>
<script>
    function changeLocationFilter()
    {
        var location_id = $('#location').val();

        window.location =
            "<?php echo base_url(); ?>index.php/masterfile/encoded_list/" +
            location_id;
    }
</script>
<script>
    $(document).ready( function () {
        $('#encodingList').DataTable({
            pageLength: 25,
            deferRender: true,
            ordering: true,
            responsive: true
        });
    } );                     
</script>