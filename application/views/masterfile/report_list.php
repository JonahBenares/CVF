<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
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
                    <div class="header" style="padding-bottom:20px">
                        <div class="row">
                            <div class="col-md-5">
                                <h4 class="title" style="margin-top:8px;">
                                    CHECK VOUCHER
                                </h4>
                            </div>

                            <div class="col-md-7">
                                <div style="display:flex;justify-content:flex-end;gap:10px">

                                    <div style="width:350px">
                                        <select class="form-control" id="location">
                                            <?php foreach ($location as $l) { ?>
                                                <option value="<?php echo $l->location_id; ?>"
                                                    <?php echo ($location_id == $l->location_id) ? 'selected' : ''; ?>>
                                                    <?php echo $l->location_name; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <button class="btn btn-primary btn-fill"
                                        data-toggle="modal"
                                        data-target="#saveFile">
                                        <span class="ti-plus"></span>
                                        Add
                                    </button>

                                    <button class="btn btn-default btn-fill"
                                        data-toggle="collapse"
                                        data-target="#filterPanel">
                                        <span class="ti-filter"></span> Filter
                                    </button>

                                    <!-- <button class="btn btn-success btn-fill"
                                        id="exportBtn">
                                        <span class="ti-download"></span>
                                        Export Excel
                                    </button> -->

                                    <!-- <a href="<?php echo base_url(); ?>index.php/masterfile/cancelled/<?php echo $location_id; ?>"
                                        class="btn btn-danger btn-fill">
                                        <span class="ti-close"></span>
                                        Cancelled CV
                                    </a> -->

                                </div>
                            </div>
                        </div>
                    </div>

                    <hr style="margin:0px">

                    <div class="collapse" id="filterPanel">
                        <div class="content" style="background:#fafafa;border-top:1px solid #e5e5e5;padding-top:20px;">

                            <div class="row">
                                <div class="col-md-12">
                                    <h5 style="margin-top:0;margin-bottom:0px;">
                                        <span class="ti-filter"></span>
                                        Filter Check Voucher
                                    </h5>
                                </div>
                            </div>
                            <div class="panel-body">
                                <!-- ROW 1 -->
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>
                                                <span class="ti-user"></span>
                                                Payee
                                            </label>
                                            <select class="form-control" id="payee">
                                                <option value="">All Payees</option>
                                                <?php foreach ($supplier as $s) { ?>
                                                    <option value="<?php echo $s->supplier_id; ?>">
                                                        <?php echo $s->supplier_name; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>
                                                <span class="ti-credit-card"></span>
                                                Bank
                                            </label>
                                            <select class="form-control" id="bank">
                                                <option value="">All Banks</option>
                                                <?php foreach ($bank as $b) { ?>
                                                    <option value="<?php echo $b->bank_id; ?>">
                                                        <?php echo $b->bank_name; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>
                                                <span class="ti-close"></span>
                                                Cancelled
                                            </label>
                                            <select class="form-control" id="cancelled">
                                                <option value="">All</option>
                                                <option value="0">Active Only</option>
                                                <option value="1">Cancelled Only</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- ROW 2 -->
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Transaction Date From</label>
                                            <input
                                                type="date"
                                                id="t_from"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Transaction Date To</label>
                                            <input
                                                type="date"
                                                id="t_to"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>CV Date From</label>
                                            <input
                                                type="date"
                                                id="cv_from"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>CV Date To</label>
                                            <input
                                                type="date"
                                                id="cv_to"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!-- ROW 3 -->
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>CV No. From</label>
                                            <input
                                                type="text"
                                                id="cv_no_from"
                                                class="form-control"
                                                placeholder="Starting CV No">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>CV No. To</label>
                                            <input
                                                type="text"
                                                id="cv_no_to"
                                                class="form-control"
                                                placeholder="Ending CV No">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>&nbsp;</label>
                                        <div class="text-right">
                                            <button
                                                id="btnFilter"
                                                class="btn btn-info btn-fill">
                                                <span class="ti-search"></span>
                                                Apply Filters
                                            </button>
                                            <button
                                                id="btnClear"
                                                class="btn btn-default btn-fill">
                                                <span class="ti-reload"></span>
                                                Reset
                                            </button>
                                            <button
                                                id="btnExport"
                                                class="btn btn-success btn-fill">
                                                <span class="ti-download"></span>
                                                Export Filtered
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if (!empty($filt)) { ?>
                        <div class=' alert  alert-warning'><b>Filter Applied</b> - <?php echo $filt ?>, <a href='<?php echo base_url(); ?>index.php/masterfile/report_list' class='remove_filter alert-link pull-right btn btn-xs'><span class="ti-close"></span></a></div>
                    <?php } ?>

                    <div class="content">
                        <table class="datatable-dashv1-list custom-datatable-overright" id="reportTable">
                            <thead>
                                <th width="10%">Date</th>
                                <th width="30%">Payee</th>
                                <th width="17%">Reference</th>
                                <th width="17%">Amount</th>
                                <th width="17%">CV No.</th>
                                <th width="7">Status</th>
                                <th width="17%" align="center"><span class="ti-menu"></span></th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
<script>
    $(document).ready(function() {

    var table = $('#reportTable').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 15,
        ordering: true,
        searching: true,
        ajax: {
            url: "<?php echo base_url(); ?>index.php/masterfile/report_list_ajax",
            type: "POST",
            data: function(d) {
                d.location_id = $('#location').val();
                d.payee = $('#payee').val();
                d.bank = $('#bank').val();
                d.cancelled = $('#cancelled').val();
                d.t_from = $('#t_from').val();
                d.t_to = $('#t_to').val();
                d.cv_from = $('#cv_from').val();
                d.cv_to = $('#cv_to').val();
                d.cv_no_from = $('#cv_no_from').val();
                d.cv_no_to = $('#cv_no_to').val();
            }
        },
        order: [[0, 'desc']]
    });

    // Location changed
    $('#location').on('change', function () {

        // Clear filters if you want
        $('#payee').val('');
        $('#bank').val('');
        $('#cancelled').val('');
        $('#t_from').val('');
        $('#t_to').val('');
        $('#cv_from').val('');
        $('#cv_to').val('');
        $('#cv_no_from').val('');
        $('#cv_no_to').val('');

        // Reload DataTable using the new location
        table.ajax.reload();
    });

    $('#btnFilter').click(function () {
        table.ajax.reload();
    });

    $('#btnClear').click(function () {

        $('#payee').val('');
        $('#bank').val('');
        $('#cancelled').val('');
        $('#t_from').val('');
        $('#t_to').val('');
        $('#cv_from').val('');
        $('#cv_to').val('');
        $('#cv_no_from').val('');
        $('#cv_no_to').val('');

        table.ajax.reload();
    });

});
</script>