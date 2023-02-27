 <div class="container">
     <div id="setting--title" class="text-black opacity-75 fw-bolder my-5">
         Settings
     </div>
     <div class="col-lg-12 alert-notification">
         <?php if($session->has('success')):?>
             <div class="alert alert-primary text-center fw-semibold mx-auto me-2 mt-2 alert-dismissible fade show" role="alert"> <?=$session->success;?> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
         <?php endif;?>
     </div>
     <div class="row">
         <div class="col-lg-5 mx-lg-5 ">
             <section id="branch" class="branch">
                 <div id="branch--title" class="text-black opacity-75 fw-bolder mb-3">
                     Branch List
                 </div>
                 <div class="row mb-3 menu-button">
                     <div class="col-8">
                         <form action="/setting" method="post">
                             <div class="row g-2 align-items-cente">
                                 <div class="col-8">
                                     <input type="text" class="form-control form-control-sm" id="searchBar" name="searchBranch" placeholder="Search" value="<?= $searchBranch;?>">
                                 </div>
                                 <div class="col-4">
                                     <button type="submit" class="btn btn-sm btn-primary">Search</button>
                                 </div>
                             </div>
                         </form>
                     </div>
                     <div class="col-4 ms-auto text-end">
                         <button class="btn btn-danger opacity-75 btn-sm rounded-pill px-4" data-bs-toggle="modal"
                                 data-bs-target="#modalBranch" id="btnNewBranch">
                             <i class="fa-solid fa-building "></i> New
                         </button>
                     </div>
                 </div>
                 <div class="col-12 mb-2">
                     <table class="table table-borderless bg-light table-responsive text-center">
                         <thead class="bg-opacity-10 bg-black fw-semibold">
                         <tr aria-readonly="true">
                             <td>Branch</td>
                             <td>Created Date</td>
                             <td>Actions</td>
                         </tr>
                         </thead>
                         <tbody>
                         <?php foreach ($branches as $branch): ?>
                             <tr>
                                 <td hidden><?= $branch->BrID; ?></td>
                                 <td><?= $branch->BrName; ?></td>
                                 <td><?= date('Y-m-d', strtotime($branch->BrCreatedAt)); ?></td>
                                 <td>
                                     <div class="d-grid gap-2 d-md-block">
                                         <button class="btn btn-primary rounded-pill btn-sm" id="btnEditBranch" type="button"><i class="fa-solid fa-pen-to-square"></i></button>
                                     </div>
                                 </td>
                             </tr>
                         <?php endforeach; ?>
                         </tbody>
                     </table>
                 </div>
                     <?= $pager_branch; ?>
             </section>
         </div>
         <div class="col-lg-5 mx-lg-5">
             <section id="department" class="department">
                 <div id="department--title" class="text-black opacity-75 fw-bolder mb-3">
                     Department List
                 </div>
                 <div class="row mb-3 menu-button">
                     <div class="col-8">
                         <form action="/setting" method="post">
                             <div class="row g-2 align-items-cente">
                                 <div class="col-8">
                                     <input type="text" class="form-control form-control-sm" id="searchBar" name="searchDepartment" placeholder="Search" value="<?=$searchDepartment?>">
                                 </div>
                                 <div class="col-4">
                                     <button type="submit" class="btn btn-sm btn-primary">Search</button>
                                 </div>
                             </div>
                         </form>
                     </div>
                     <div class="col-4 ms-auto text-end">
                         <button class="btn btn-danger opacity-75 btn-sm rounded-pill px-4" data-bs-toggle="modal"
                                 data-bs-target="#modalDepartment" id="btnNewDepartment">
                             <i class="fa-solid fa-people-group"></i> New
                         </button>
                     </div>
                 </div>
                 <div class="col-12 mb-2">
                     <table class="table table-borderless bg-light table-responsive text-center">
                         <thead class="bg-opacity-10 bg-black fw-semibold">
                         <tr aria-readonly="true">
                             <td>Department</td>
                             <td>Created Date</td>
                             <td>Actions</td>
                         </tr>
                         </thead>
                         <tbody>
                         <?php foreach ($departments as $department): ?>
                             <tr>
                                 <td hidden><?= $department->DeID; ?></td>
                                 <td><?= $department->DeName; ?></td>
                                 <td><?= date('Y-m-d', strtotime($department->DeCreatedAt)); ?></td>
                                 <td>
                                     <div class="d-grid gap-2 d-md-block">
                                         <button class="btn btn-primary rounded-pill btn-sm" id="btnEditDepartment" type="button"><i class="fa-solid fa-pen-to-square"></i></button>
                                     </div>
                                 </td>
                             </tr>
                         <?php endforeach; ?>
                         </tbody>
                     </table>
                 </div>
                     <?= $pager_department; ?>
             </section>
         </div>
         <div class="col-lg-5 mx-lg-5 mb-5">
             <section id="designation" class="designation">
                 <div id="designation--title" class="text-black opacity-75 fw-bolder mt-5 mb-3">
                     Designation List
                 </div>
                 <div class="row mb-3 menu-button">
                     <div class="col-8">
                         <form action="/setting" method="post">
                             <div class="row g-2 align-items-cente">
                                 <div class="col-8">
                                     <input type="text" class="form-control form-control-sm" id="searchBar" name="searchDesignation" placeholder="Search" value="<?=$searchDesignation;?>">
                                 </div>
                                 <div class="col-4">
                                     <button type="submit" class="btn btn-sm btn-primary">Search</button>
                                 </div>
                             </div>
                         </form>
                     </div>
                     <div class="col-4 ms-auto text-end">
                         <button class="btn btn-danger opacity-75 btn-sm rounded-pill px-4" data-bs-toggle="modal"
                                 data-bs-target="#modalDesignation" id="btnNewDesignation">
                             <i class="fa-solid fa-crown"></i> New
                         </button>
                     </div>
                 </div>
                 <div class="col-12 mb-2">
                     <table class="table table-borderless bg-light table-responsive text-center">
                         <thead class="bg-opacity-10 bg-black fw-semibold">
                         <tr aria-readonly="true">
                             <td>Designation</td>
                             <td>Created Date</td>
                             <td>Actions</td>
                         </tr>
                         </thead>
                         <tbody>
                         <?php foreach ($designations as $designation): ?>
                             <tr>
                                 <td hidden><?= $designation->EdID; ?></td>
                                 <td><?= $designation->EdName; ?></td>
                                 <td><?= date('Y-m-d', strtotime($designation->EdCreatedAt)); ?></td>
                                 <td>
                                     <div class="d-grid gap-2 d-md-block">
                                         <button class="btn btn-primary rounded-pill btn-sm" id="btnEditDesignation" type="button"><i class="fa-solid fa-pen-to-square"></i></button>
                                     </div>
                                 </td>
                             </tr>
                         <?php endforeach; ?>
                         </tbody>
                     </table>
                 </div>
                     <?= $pager_designation; ?>
             </section>
         </div>
     </div>
     <section id="setting" class="setting">
         <div class="modal fade" id="modalBranch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
              aria-labelledby="modalBranch" aria-hidden="true">
             <div class="modal-dialog modal-dialog-centered">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h1 class="modal-title fs-5" id="modalBranchTitle">New Branch</h1>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <form action="/save-branch" method="POST">
                         <input type="hidden" name="BrID" id="BrID" value="<?=$session->posts['BrID'] ?? '';?>">
                         <div class="modal-body">
                             <div class="mb-3">
                                 <label for="BrName" class="form-label">Branch Name:</label>
                                 <input type="text" class="form-control <?=(isset($session->errors['BrName'])) ? 'is-invalid' : '';?>"
                                        name="BrName" id="BrName" value="<?= $session->posts['BrName'] ?? '' ?>" required autofocus>
                                 <div id="altIDFeedback" class="invalid-feedback">
                                     <?= $session->errors['BrName'] ?? '';?>
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
         <div class="modal fade" id="modalDepartment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
              aria-labelledby="modalDepartment" aria-hidden="true">
             <div class="modal-dialog modal-dialog-centered">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h1 class="modal-title fs-5" id="modalDepartmentTitle">New Department</h1>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <form action="/save-department" method="POST">
                         <input type="hidden" name="DeID" id="DeID" value="<?=$session->posts['DeID'] ?? '';?>">
                         <div class="modal-body">
                             <div class="mb-3">
                                 <label for="DeName" class="form-label">Department Name:</label>
                                 <input type="text" class="form-control <?=(isset($session->errors['DeName'])) ? 'is-invalid' : '';?>"
                                        name="DeName" id="DeName" value="<?= $session->posts['DeName'] ?? '' ?>" required autofocus>
                                 <div id="altIDFeedback" class="invalid-feedback">
                                     <?= $session->errors['DeName'] ?? '';?>
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
         <div class="modal fade" id="modalDesignation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
              aria-labelledby="modalDesignation" aria-hidden="true">
             <div class="modal-dialog modal-dialog-centered">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h1 class="modal-title fs-5" id="modalDesignationTitle">New Designation</h1>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <form action="/save-designation" method="POST">
                         <input type="hidden" name="EdID" id="EdID" value="<?=$session->posts['EdID'] ?? '';?>">
                         <div class="modal-body">
                             <div class="mb-3">
                                 <label for="EdName" class="form-label">Designation:</label>
                                 <input type="text" class="form-control <?=(isset($session->errors['EdName'])) ? 'is-invalid' : '';?>"
                                        name="EdName" id="EdName" value="<?= $session->posts['EdName'] ?? '' ?>" required autofocus>
                                 <div id="altIDFeedback" class="invalid-feedback">
                                     <?= $session->errors['EdName'] ?? '';?>
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
 </div>
 <script>
     $(document).ready(function (){
         let showModal = '<?=$session->has('errors') ? true : false;?>';
         let branch = '<?=$session->posts['BrName']?? false; ?>';
         let department = '<?=$session->posts['DeName'] ?? false; ?>';
         let designation = '<?=$session->posts['EdName'] ?? false; ?>';
         if (showModal){
             if (branch){$('#modalBranch').modal('toggle');}
             if (department){$('#modalDepartment').modal('toggle');}
             if (designation){$('#modalDesignation').modal('toggle');}
         }
         $(".alert-primary").fadeTo(4000, 500).fadeOut(500, function() {
             $(".alert-primary").fadeOut(500);
         });
     });
 </script>
 <script src="<?= base_url('/js/scripts/setting.js'); ?>"></script>
