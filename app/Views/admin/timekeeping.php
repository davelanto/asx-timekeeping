<section id="timekeeping" class="timekeeping">
    <div class="innerContainer px-3">
        <div class="container-fluid p-0">
            <div id="timekeeping--title" class="text-black opacity-75 fw-bolder my-sm-5 my-4">
                Daily Timekeeping
            </div>
            <div class="row mb-3 menu-button">
                <div class="col-4">
                    <form action="/" method="post">
                        <div class="row g-2 align-items-center">
                            <div class="col-8">
                                <input type="text" class="form-control form-control-sm" id="search" name="search" placeholder="Search" value="<?=$search;?>">
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-sm btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container-fluid p-0 shadow-sm mb-3 table-responsive master-table">
            <table class="table table-borderless bg-light">
                <thead class="bg-opacity-10 bg-black">
                <tr class="fw-semibold">
                    <td>QR</td>
                    <td>Name</td>
                    <td>Branch</td>
                    <td>Department</td>
                    <td>Status</td>
                    <td>Record Status</td>
                    <td>Time Log</td>
                </tr>
                </thead>
                <tbody class="table-group-divider p-0 ">
                <?php if ($data): ?>
                <?php foreach ($data as $record): ?>
                <tr>
                    <td class="fw-semibold"><?=$record->EmAltID;?></td>
                    <td><?=$record->name;?></td>
                    <td><?=$record->BrName;?></td>
                    <td><?=$record->DeName;?></td>
                    <td class=" fw-normal">
                        <?php if ($record->TklStatus == 1): ?>
                            Time In
                        <?php elseif ($record->TklStatus == 2): ?>
                            Time Out
                        <?php elseif ($record->TklStatus == 3): ?>
                            Break In
                        <?php elseif ($record->TklStatus == 4): ?>
                            Break Out
                        <?php elseif ($record->TklStatus == 5): ?>
                            OT In
                        <?php else: ?>
                            OT Out
                        <?php endif; ?>
                    </td>
                    <td>Late</td>
                    <td><?=date('h:i A - M d Y',strtotime($record->TklLog));?></td>
                </tr>
                <?php endforeach;?>
                <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">No Record found</td>
                </tr>
                <?php endif;?>
                </tbody>
            </table>
        </div>
        <?=$pager_links?>
    </div>
    <?php if ($session->has('records')): ?>
        <div class="modal fade" id="timekeepingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="timekeepingModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-3" id="timekeepingModalTitle"><?= $session->records[0]->EmFirstName . " " . $session->records[0]->EmLastName; ?></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-4 border border-primary border-3">
                                    <div class="mx-auto text-center">
                                        <img src="<?= base_url('/images/timekeeping.svg'); ?>" class="mt-3" alt="">
                                        <div class="container-fluid mt-4 p-0 m-0">
                                            <table class="table border-primary table-sm text-start">
                                                <tbody>
                                                <tr>
                                                    <td>Branch:</td>
                                                    <td class="fw-semibold"><?= $session->records[0]->BrName; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Department:</td>
                                                    <td class="fw-semibold"><?= $session->records[0]->DeName; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Designation:</td>
                                                    <td class="fw-semibold"><?= $session->records[0]->EdName; ?></td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="container-fluid table-responsive">
                                        <h5 class="opacity-75">Up to 6 most recent Logs</h5>
                                        <table class="table table-bordered">
                                            <thead class="bg-primary text-light">
                                            <tr>
                                                <td>Date</td>
                                                <td>Logs</td>
                                                <td>Record Status</td>
                                            </tr>
                                            </thead>
                                            <body>
                                            <?php foreach ($session->records as $logs): ?>
                                            <tr>
                                                <td><?=date('M d, Y h:i A', strtotime($logs->TklLog))?></td>
                                                <td>
                                                    <?php if ($logs->TklStatus == 1): ?>
                                                        Time In
                                                    <?php elseif ($logs->TklStatus == 2): ?>
                                                        Time Out
                                                    <?php elseif ($logs->TklStatus == 3): ?>
                                                        Break In
                                                    <?php elseif ($logs->TklStatus == 4): ?>
                                                        Break Out
                                                    <?php elseif ($logs->TklStatus == 5): ?>
                                                        OT In
                                                    <?php else: ?>
                                                        OT Out
                                                    <?php endif; ?>
                                                </td>
                                                <td>On-Time</td>
                                            </tr>
                                            <?php endforeach; ?>
                                            </body>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <div class="text-center mx-auto">
                            <form action="/commit-log" method="post">
                                <input type="hidden" name="EmID" value="<?=$session->records[0]->EmID;?>">
                                <input type="submit" class="btn btn-outline-primary btn-lg rounded-3 px-4" name="commitRecord" value="Time In" <?=$session->todaysrecord['timein'] ?? '';?>>
                                <input type="submit" class="btn btn-outline-danger btn-lg" name="commitRecord" value="Break In" <?=$session->todaysrecord['breakin'] ?? '';?>>
                                <input type="submit" class="btn btn-outline-danger btn-lg" name="commitRecord" value="Break Out" <?=$session->todaysrecord['breakout'] ?? '';?>>
                                <input type="submit" class="btn btn-outline-primary btn-lg" name="commitRecord" value="Time Out" <?=$session->todaysrecord['timeout'] ?? '';?>>
                                <input type="submit" class="btn btn-outline-dark btn-lg" name="commitRecord" value="Overtime In" <?=$session->todaysrecord['otin'] ?? '';?>>
                                <input type="submit" class="btn btn-outline-dark btn-lg" name="commitRecord" value="Overtime Out" <?=$session->todaysrecord['otout'] ?? '';?>>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>
<script>
    $(document).ready(function (){
        let newrecord = '<?=$session->newrecord ?? "" ?>';
        if (newrecord !=''){
            $("table tbody tr:first").addClass('row-active');
            setTimeout(function(){
                $("table tbody tr:first").removeClass('row-active');
            }, 3000);
        }

    });
</script>
<script src="<?=base_url('js/scripts/timekeeping.js');?>"></script>