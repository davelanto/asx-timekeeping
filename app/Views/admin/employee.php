<section id="employee" class="employee">
    <div class="container mt-4 mb-5">
        <div id="employee--title" class="text-black opacity-75 fw-bolder my-5">
            Employee Record
        </div>
        <?php if($session->has('success')):?>
            <div class="alert alert-primary text-center fw-semibold mx-auto me-2 mt-2 mb-3 alert-dismissible fade show" role="alert"> <?=$session->success;?> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
        <?php endif;?>
        <div class="row mb-3 menu-button">
            <div class="col-6">
                <form action="/search-employee" method="post">
                    <div class="row g-2 align-items-cente">
                        <div class="col-5">
                            <input type="text" class="form-control" id="searchBar" name="search" placeholder="Search">
                        </div>
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-6 ms-auto text-end">
                <button class="btn btn-outline-primary rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#modalEmployee" id="btnAddEmployee"><i class="fa-solid fa-plus fa-lg"></i> New Employee
                </button>
                <button class="btn btn-outline-dark opacity-75 rounded-pill" id="btnEditEmployee"><i class="fa-solid fa-pen-to-square fa-lg"></i>
                    Edit Employee
                </button>
                <button class="btn btn-outline-danger rounded-pill" id="btnDeleteEmployee"><i class="fa-solid fa-user fa-lg"></i> Activate/De-activate Employee
                </button>
            </div>
        </div>
        <div class="col-md-12 p-0 shadow table-wrapper">
            <table class="table table-borderless bg-light table-responsive">
                <thead class="bg-opacity-10 bg-black fw-semibold">
                <tr aria-readonly="true">
                    <td>QR Code</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Branch</td>
                    <td>Department</td>
                    <td>Designation</td>
                    <td>Created Date</td>
                    <td>Updated Date</td>
                    <td>Active</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $employee): ?>
                    <tr class="<?= isset($session->posts['EmID']) && $session->posts['EmID'] == $employee->EmID ? 'table-active' : '' ;?>">
                        <td hidden><?= $employee->EmID; ?></td>
                        <td><?= $employee->EmAltID; ?></td>
                        <td><?= $employee->EmFirstName; ?></td>
                        <td><?= $employee->EmLastName; ?></td>
                        <td><?= $employee->BrName; ?></td>
                        <td><?= $employee->DeName; ?></td>
                        <td><?= $employee->EdName; ?></td>
                        <td><?= date('Y-m-d', strtotime($employee->EmCreatedAt)); ?></td>
                        <td><?= date('Y-m-d', strtotime($employee->EmUpdatedAt)); ?></td>
                        <td><?= is_null($employee->EmDeletedAt) ? 'Yes' : 'No'; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?= $pager->makeLinks($page, $perPage, $total, 'custom_pagination'); ?>
    </div>

    <div class="modal fade" id="modalEmployee" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="modalEmployee" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalEmployee">New Employee</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/save-employee" method="POST">
                    <input type="hidden" name="EmID" value="<?= $session->posts['EmID'] ?? '' ?>">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="altID" class="form-label">Employee ID:</label>
                            <input type="text" class="form-control <?=(isset($session->errors['EmAltID'])) ? 'is-invalid' : '';?>" name="altID" value="<?= $session->posts['EmAltID'] ?? '' ?>" required>
                            <div id="altIDFeedback" class="invalid-feedback">
                                <?= $session->errors['EmAltID'] ?? '';?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="firstname" class="form-label">First name:</label>
                                    <input type="text" class="form-control <?=isset($session->errors['EmFirstName']) ? 'is-invalid' : '';?>" name="firstname" value="<?= $session->posts['EmFirstName'] ?? '' ?>" required>
                                    <div id="firstnameFeedback" class="invalid-feedback">
                                        <?=$session->errors['EmFirstName'] ?? '';?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="lastname" class="form-label">Last name:</label>
                                    <input type="text" class="form-control <?=isset($session->errors['EmLastName']) ? 'is-invalid' : '';?>" name="lastname" value="<?= $session->posts['EmLastName'] ?? '' ?>" required>
                                    <div id="lastnameFeedback" class="invalid-feedback">
                                        <?=$session->errors['EmLastName'] ?? '';?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="branch" class="form-label">Branch:</label>
                                    <select class="form-select <?=isset($session->errors['EmBrID']) ? 'is-invalid' : '';?>" name="branch" aria-label="Branches" required>
                                        <option  disabled>--Select branch--</option>
                                        <?php foreach ($branches as $branch): ?>
                                            <option <?= isset($session->posts['EmBrID']) && $session->posts['EmBrID'] == $branch->BrID ? 'selected' : '' ;?> value="<?= $branch->BrID ?>"><?= $branch->BrName ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="branchFeedback" class="invalid-feedback">
                                        <?=$session->errors['EmBrID'] ?? '';?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="department" class="form-label">Department:</label>
                                    <select class="form-select <?=isset($session->errors['EmDeID']) ? 'is-invalid' : '';?>" name="department" aria-label="Department" required>
                                        <option selected disabled>--Select Department--</option>
                                        <?php foreach ($departments as $department): ?>
                                            <option <?= isset($session->posts['EmDeID']) && $session->posts['EmDeID'] == $department->DeID ? 'selected' : '' ;?> value="<?= $department->DeID; ?>"><?= $department->DeName; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="departmentFeedback" class="invalid-feedback">
                                        <?=$session->errors['EmDeID'] ?? ''; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="designation" class="form-label">Designation:</label>
                                <select class="form-select <?=isset($session->errors['EmEdID']) ? 'is-invalid' : '';?>" name="designation" aria-label="Designation" required>
                                    <option selected disabled>--Select Designation--</option>
                                    <?php foreach ($designations as $designation): ?>
                                        <option <?= isset($session->posts['EmEdID']) && $session->posts['EmEdID'] == $designation->EdID ? 'selected' : '' ;?> value="<?= $designation->EdID; ?>"><?= $designation->EdName; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div id="designationFeedback" class="invalid-feedback">
                                    <?=$session->errors['EmEdID'] ?? '';?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary rounded-pill px-4 m-0">Save</button>
                        <button type="button" class="btn btn-danger rounded-pill px-4" data-bs-dismiss="modal">Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function (){
        var showModal = <?=$session->has('errors') ? 'true' : 'false';?>;
        if (showModal){
            $('#modalEmployee').modal('toggle');
        }
        $(".alert-primary").fadeTo(4000, 500).slideUp(500, function() {
            $(".alert-primary").slideUp(500);
        });
    });
</script>
<script src="<?= base_url('/js/scripts/employee.js'); ?>"></script>