<section id="employee" class="employee">
    <div class="container mt-4 mb-5">
        <div id="employee--title" class="text-black opacity-75 fw-bolder my-5">
            Employee Record
        </div>
        <?php if($session->has('success')):?>
            <div class="alert alert-primary text-center fw-semibold mx-auto me-2 mt-2 mb-3 alert-dismissible fade show" role="alert"> A new employee has been added! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
        <?php endif;?>
        <div class="row mb-3 menu-button">
            <div class="col-3">
                <input type="text" class="form-control" id="searchBar" placeholder="Search">
            </div>
            <div class="col-6 ms-auto text-end">
                <button class="btn btn-outline-dark rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#modalEmployee"><i class="fa-solid fa-plus"></i> New Employee
                </button>
                <button class="btn btn-outline-dark opacity-75 rounded-pill"><i class="fa-solid fa-pen-to-square"></i>
                    Update Employee
                </button>
                <button class="btn btn-outline-danger rounded-pill"><i class="fa-solid fa-trash"></i> Delete Employee
                </button>
            </div>
        </div>
        <div class="col-md-12 p-0 shadow table-wrapper">
            <table class="table table-borderless bg-light table-responsive">
                <thead class="bg-opacity-10 bg-black fw-semibold">
                <tr>
                    <td>ID</td>
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
                <?php foreach ($employees as $employee): ?>
                    <tr>
                        <td><?= $employee->EmAltID; ?></td>
                        <td><?= $employee->EmFirstName; ?></td>
                        <td><?= $employee->EmLastName; ?></td>
                        <td><?= $employee->BrName; ?></td>
                        <td><?= $employee->DeName; ?></td>
                        <td><?= $employee->EdName; ?></td>
                        <td><?= $employee->EmCreatedAt; ?></td>
                        <td><?= $employee->EmUpdatedAt; ?></td>
                        <td><?= $employee->EmDeletedAt; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modalEmployee" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="modalEmployee" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalEmployee">New Employee</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/new-employee" method="POST">
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
                                        <option selected disabled>--Select branch--</option>
                                        <?php foreach ($branches as $branch): ?>
                                            <option value="<?= $branch->BrID ?>"><?= $branch->BrName ?></option>
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
                                            <option value="<?= $department->DeID; ?>"><?= $department->DeName; ?></option>
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
                                        <option value="<?= $designation->EdID; ?>"><?= $designation->EdName; ?></option>
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