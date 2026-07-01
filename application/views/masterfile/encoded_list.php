<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-md-5">
                                <h4 class="title" style="margin-top:8px;">
                                    Encoded List
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
                                                <?php foreach ($location as $l) { ?>
                                                    <option value="<?php echo $l->location_id; ?>"
                                                        <?php echo ($location_id == $l->location_id) ? 'selected' : ''; ?>>
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
                                    <div class="text-right">
                                        <button type="button"
                                                class="btn btn-default btn-fill"
                                                id="toggleFilter">
                                            <span class="ti-filter"></span> Filter
                                        </button>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr style="margin-bottom:0px">

                    <!-- FILTER -->
                    <div id="filterPanel">
                        <div class="content" style="background:#fafafa;border-top:1px solid #e5e5e5;padding-top:20px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 style="margin-top:0;margin-bottom:0px;">
                                        <span class="ti-filter"></span>
                                        Filter Encoded List
                                    </h5>
                                </div>
                            </div>

                            <div class="panel-body">
                                <form method="GET">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Date From</label>
                                            <input type="date"
                                                name="date_from"
                                                class="form-control"
                                                value="<?php echo $this->input->get('date_from'); ?>">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Date To</label>
                                            <input type="date"
                                                name="date_to"
                                                class="form-control"
                                                value="<?php echo $this->input->get('date_to'); ?>">
                                        </div>
                                        <div class="col-md-2">
                                            <label>Year</label>
                                            <?php $selected_year = $this->input->get('year'); ?>
                                            <select class="form-control"
                                                name="year"
                                                id="year">
                                                <option value="">All</option>
                                                <?php for ($y = date('Y'); $y >= 2020; $y--) { ?>
                                                    <option value="<?php echo $y; ?>"
                                                        <?php echo ($selected_year == $y) ? 'selected' : ''; ?>>
                                                        <?php echo $y; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Payee</label>
                                            <select class="form-control"
                                                name="payee"
                                                id="payee">
                                                <option value="">All Payees</option>
                                                <?php foreach ($suppliers as $s) { ?>
                                                    <option value="<?php echo $s->supplier_id; ?>"
                                                        <?php echo ($this->input->get('payee') == $s->supplier_id) ? 'selected' : ''; ?>>
                                                        <?php echo $s->supplier_name; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>CV Number</label>
                                            <input type="text"
                                                class="form-control"
                                                name="cv_no"
                                                placeholder="Search CV Number"
                                                value="<?php echo $this->input->get('cv_no'); ?>">
                                        </div>
                                        <div class="col-md-2">
                                            <label>E-Filing</label>
                                            <select class="form-control"
                                                name="encoded">
                                                <option value="">All</option>
                                                <option value="1"
                                                    <?php echo ($this->input->get('encoded') == '1') ? 'selected' : ''; ?>>
                                                    Encoded
                                                </option>
                                                <option value="0"
                                                    <?php echo ($this->input->get('encoded') === '0') ? 'selected' : ''; ?>>
                                                    Not Encoded
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 text-right" style="padding-top:24px">
                                            <button type="submit"
                                                class="btn btn-info btn-fill">
                                                <span class="ti-search"></span>
                                                Apply Filters
                                            </button>
                                            <a href="<?php echo base_url(); ?>index.php/masterfile/encoded_list/<?php echo $location_id; ?>"
                                                class="btn btn-default btn-fill">
                                                <span class="ti-reload"></span>
                                                Reset
                                            </a>
                                            <a href="<?php echo base_url(); ?>index.php/masterfile/export_encoded_list/<?php echo $location_id; ?>?filter=<?php echo $this->input->get('filter'); ?>&date_from=<?php echo $this->input->get('date_from'); ?>&date_to=<?php echo $this->input->get('date_to'); ?>&year=<?php echo $this->input->get('year'); ?>&cv_no=<?php echo $this->input->get('cv_no'); ?>&encoded=<?php echo $this->input->get('encoded'); ?>&payee=<?php echo $this->input->get('payee'); ?>" class="btn btn-success btn-fill">
                                                <span class="ti-download"></span> Export Excel
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="content">
                        <table class="datatable-dashv1-list custom-datatable-overright"
                            id="encodingList">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>CV Number</th>
                                    <th>Payee</th>
                                    <th>E-Filing</th>
                                </tr>
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
    $(document).on('click', '.manageFileBtn', function() {

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
    function changeLocationFilter() {
        var location_id = $('#location').val();

        window.location =
            "<?php echo base_url(); ?>index.php/masterfile/encoded_list/" +
            location_id;
    }
</script>
<script>
    $(document).ready(function() {
        $('#encodingList').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 15,
            ordering: true,
            searching: true,
            ajax: {
                url: "<?php echo base_url(); ?>index.php/masterfile/encoded_list_ajax",
                type: "POST",
                data: function(d) {
                    console.log("Year:", $('#year').val());

                    d.location_id = "<?php echo $location_id; ?>";
                    d.date_from = $('input[name="date_from"]').val();
                    d.date_to = $('input[name="date_to"]').val();
                    d.year = "<?php echo $this->input->get('year'); ?>";
                    d.cv_no = $('input[name="cv_no"]').val();
                    d.encoded = $('select[name="encoded"]').val();
                    d.payee = $('#payee').val();
                }
            },
            order: [
                [0, 'desc']
            ]
        });
    });
</script>
<script>
    $(document).ready(function() {

        if (localStorage.getItem('filterPanel') == 'open') {
            $('#filterPanel').collapse('show');
        }

        $('#filterPanel').on('shown.bs.collapse', function() {
            localStorage.setItem('filterPanel', 'open');
        });

        $('#filterPanel').on('hidden.bs.collapse', function() {
            localStorage.setItem('filterPanel', 'closed');
        });

    });

    $(function(){

        if(localStorage.getItem('encodedFilter') == 'open'){
            $('#filterPanel').show();
        }

        $('#toggleFilter').click(function(){

            $('#filterPanel').slideToggle(200);

            if($('#filterPanel').is(':visible')){
                localStorage.setItem('encodedFilter','open');
            }else{
                localStorage.setItem('encodedFilter','closed');
            }

        });

    });
</script>