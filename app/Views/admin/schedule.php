
<div id="schedule" class="schedule">
    <div class="container mt-4 mb-5">
        <div id="schedule--title" class="text-black opacity-75 fw-bolder my-sm-5 my-4">
            Schedules
        </div>
        <div class="col-lg-12 alert-notification">
            <?php if($session->has('success')):?>
                <div class="alert alert-primary text-center fw-semibold mx-auto me-2 mt-2 alert-dismissible fade show" role="alert"> <?=$session->success;?> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
            <?php endif;?>
            <?php if($session->has('errors')):?>
                <div class="alert alert-danger text-center fw-semibold mx-auto me-2 mt-2 alert-dismissible fade show" role="alert">
                    <ul>
                    <?php foreach($session->errors as $error):?>
                        <li><?=$error;?></li>
                    <?php endforeach; ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
            <?php endif;?>
        </div>
        <div class="row mb-3 menu-button">
            <form action="/upload-schedule" method="post" enctype="multipart/form-data">
                <div class="row g-2">
                    <div class="col-3">
                        <div class="mb-3">
                            <input class="form-control form-control-sm" type="file" name="csvFile" id="formFile"
                                   required>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mb-3">
                            <button class="btn btn-danger btn-sm">Upload</button>
                        </div>
                    </div>

                </div>
            </form>
            <div class="col-lg-6 col-md-6 mb-3 mb-sm-0">
                <form action="/schedule" method="post" id="searchFrm">
                    <div class="row g-2 align-items-center">
                        <div class="col-sm-5 col-6">
                            <input type="hidden" name="calendar" value="">
                            <input type="text" class="form-control form-control-sm" id="searchBar" name="search" placeholder="Search" value="<?= $search ?? '';?>">
                        </div>
                        <div class="col-sm-5 col-6">
                            <button type="submit" class="btn btn-primary btn-sm">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 ms-auto">
                <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                    <i class="fa fa-calendar"></i>&nbsp;
                    <span></span> <i class="fa fa-caret-down"></i>
                </div>
            </div>
        </div>
        <div class="col-md-12 p-0 shadow table-wrapper table-responsive mb-3">
            <table class="table table-borderless bg-light">
                <thead class="bg-opacity-10 bg-black fw-semibold">
                <tr aria-readonly="true">
                    <td>QR Code</td>
                    <td>Full Name</td>
                    <td>Time In</td>
                    <td>Time Out</td>
                    <td>Created Date</td>
                    <td>Action</td>
                </tr>
                </thead>
                <tbody>
                <?php if($data): ?>
                    <?php foreach ($data as $schedule): ?>
                        <tr>
                            <td hidden><?= $schedule->ScID; ?></td>
                            <td><?= $schedule->EmAltID; ?></td>
                            <td><?= $schedule->name; ?></td>
                            <td><?= date('M-d h:i A',strtotime($schedule->ScTimeIn)); ?></td>
                            <td><?= date('M-d h:i A',strtotime($schedule->ScTimeOut)); ?></td>
                            <td><?= date('M-d h:i A',strtotime($schedule->ScCreatedAt)); ?></td>
                            <td><a href="/delete-schedule/<?= $schedule->ScID; ?>" class="btn btn-outline-dark btn-sm"><i class="fa-solid fa-trash"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" class="text-center" readonly>No result found</td>
                    </tr>
                <?php endif;?>
                </tbody>
            </table>
        </div>
        <?= $pager_links; ?>
    </div>

</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $(function() {

        var start = moment('<?=$from?>');
        var end = moment('<?=$to?>');

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            $('input[name="calendar"]').val(start.format('YYYY-MM-DD') + ',' + end.format('YYYY-MM-DD'));
        }

        $('#reportrange').daterangepicker({
            opens: 'left',
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);
        cb(start, end);
        $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
            $('input[name="calendar"]').val(picker.startDate.format('YYYY-MM-DD') + ',' + picker.endDate.format('YYYY-MM-DD'));
            $('#searchFrm').submit();
        });

    });
</script>