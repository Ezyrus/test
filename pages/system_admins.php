<?php
include '../config/config.php';
// include '../server/admin_login-verification.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-OSCA | Administrators</title>
    <script src="../assets/js/systemchange.js?v=<?php echo time(); ?>" defer></script>
    <?php require 'resources.php'; ?>
</head>
<style>
#gallery-modal .modal-img {
    width: 100%;
}
</style>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <?php include 'includes/admin_navigation.php'; ?>

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="../assets/images/logo/osca_logo2.png" alt="AdminLTELogo" height="100"
                width="100">
        </div>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">System Administrators</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item font-italic active">System</li>
                                <li class="breadcrumb-item active">System Admins</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <!-- container-fluid -->
                <div class="container-fluid">
                    <!-- main rows -->

                    <div class="row">
                        <div class="col">

                            <!-- card -->
                            <div class="card card-primary card-secondary">

                                <div class="card-body">
                                    <table id="table_systemAdmins" class="table responsive">
                                        <thead>
                                            <tr>
                                                <th>Admin ID</th>
                                                <th>Profile</th>
                                                <th>Username</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Time Added</th>
                                                <th class="text-nowrap w-auto text-center">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php
                                                $query = "SELECT * FROM `system_admins`";
                                                $result = mysqli_query(getDatabase(), $query);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                            <tr id="<?php echo $row['admin_id']; ?>">
                                                <td>
                                                    <?php echo $row['admin_id']; ?>
                                                </td>
                                                <td>
                                                    <img src="../assets/images/admin_pictures/<?php echo $row['admin_picture']; ?>"
                                                        alt="profile image" width="100">
                                                </td>
                                                <td>
                                                    <?php echo $row['username']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['full_name']; ?>
                                                </td>
                                                <td>
                                                    <?php if ($row['type_id'] == "ad1") {
                                                                echo "Super Admin";
                                                            } else if ($row['type_id'] == "ad2") {
                                                                echo "Assistant Admin";
                                                            } else if ($row['type_id'] == "ad3") {
                                                                echo "Admin";
                                                            } else {
                                                                echo "Encoder";
                                                            }
                                                            ?>
                                                </td>
                                                <td>
                                                    <?php $formattedTimeAdded = formatDatetime($row['time_added']);
                                                            echo "<span class='badge badge-info'>$formattedTimeAdded</span>"; ?>
                                                </td>

                                                <td class="text-center" style="width: 10%;">
                                                    <div class="btn-group" role="group"
                                                        aria-label="System Administrator Actions">
                                                        <button type="button" class="btn bg-green"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#readModal_systemAdministrator"
                                                            data-id="<?php echo $row['admin_id']; ?>"
                                                            data-role="readBtn_systemAdministrator">
                                                            <i class="fa-solid fa-eye fa-xl" style="color: white;"></i>
                                                        </button>

                                                        <button type="button" class="btn bg-blue" data-bs-toggle="modal"
                                                            data-bs-target="#updateModal_systemAdministrator"
                                                            data-id="<?php echo $row['admin_id']; ?>"
                                                            data-role="updateBtn_systemAdministrator">
                                                            <i class="fa-solid fa-pen-to-square fa-xl"
                                                                style="color: white;"></i>
                                                        </button>

                                                        <button type="button" class="btn bg-red"
                                                            data-id="<?php echo $row['admin_id']; ?>"
                                                            data-role="deleteBtn_systemAdministrator">
                                                            <i class="fa-solid fa-trash fa-xl"
                                                                style="color: white;"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php } ?>

                                        </tbody>

                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            <!-- card -->
                            <div class="card card-primary card-secondary left">
                                <div class="card-header">
                                    <div class="card-title">Admin Types</div>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <table id="table_adminTypes" class="table responsive">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php
                                                $query = "SELECT * FROM `system_admin-types` ";
                                                $result = mysqli_query(getDatabase(), $query);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                            <tr id="<?php echo $row['type_id']; ?>">
                                                <td>
                                                    <?php echo $row['type_id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['name']; ?>
                                                </td>
                                            </tr>
                                            <?php } ?>

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /. main rows -->
                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include 'includes/admin_footer.php' ?>
    </div>

    <!--- Create Administrator ----->
    <div class="modal fade" id="createModal_systemAdministrator" tabindex="-1" data-bs-backdrop="static" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="createForm_systemAdministrator">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Add System Administrator</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <img alt="Member Picture" id="addPreview_adminprofile" class="img-fluid"
                                    style="width: 200px; height: 200px;">
                            </div>
                            <div class="col">
                                <input type="file" class="form-control form-control-border" id="add_adminprofile"
                                    accept="image/*" name="add_adminprofile">

                                <label for="createFullName_admin">Full Name</label>
                                <input type="text" class="form-control" id="createFullName_admin"
                                    name="createFullName_admin" placeholder="Fullname">

                                <label for="createUsername_admin">Username</label>
                                <input type="text" class="form-control" id="createUsername_admin"
                                    name="createUsername_admin" placeholder="Username">
                            </div>
                        </div>
                        <div class="row py-1">
                            <div class="col">
                                <label for="createPassword_admin">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="createPassword_admin"
                                        name="createPassword_admin" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="row py-1">
                            <div class="col">
                                <input type="checkbox" id="togglePassword">
                                <label class="form-check-label" for="togglePassword"><b>Show Password</b></label>
                            </div>
                        </div>

                        <div class="row py-1">
                            <div class="col">
                                <label for="createType_admin">Type</label>
                                <select class="form-control" id="createType_admin" name="createType_admin">
                                    <option value="ad4">Encoder</option>
                                    <option value="ad3">Admin</option>
                                    <option value="ad2">Assistant Admin</option>
                                    <option value="ad1">Super Admin</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary w-100" id="createSubmitBtn_admin">Add
                            Admin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Read Administrator -->
    <div class="modal fade" id="readModal_systemAdministrator" tabindex="-1" data-bs-backdrop="static" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="readForm_systemAdministrator">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">View System Administrator</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <img alt="Member Picture" id="readPreview_adminprofile"
                                    class="img-fluid clickable-image" style="width: 200px; height: 200px;">
                            </div>
                            <div class="col">
                                <label for="readFullName_admin">Full Name</label>
                                <input type="text" class="form-control border-0" id="readFullName_admin"
                                    name="readFullName_admin" placeholder="Fullname" readonly>

                                <label for="readUsername_admin">Username</label>
                                <input type="text" class="form-control border-0" id="readUsername_admin"
                                    name="readUsername_admin" placeholder="Username" readonly>


                            </div>

                        </div>

                        <div class="row py-1">
                            <div class="col">
                                <label for="readPassword_admin">Password</label>
                                <input type="text" class="form-control border-0" id="readPassword_admin"
                                    name="readPassword_admin" placeholder="Password" readonly>
                            </div>
                        </div>

                        <div class="row py-1">
                            <div class="col">
                                <label for="readType_admin">Type</label>
                                <select class="form-control border-0" id="readType_admin" name="readType_admin" readonly
                                    disabled>
                                    <option value="ad4">Encoder</option>
                                    <option value="ad3">Admin</option>
                                    <option value="ad2">Assistant Admin</option>
                                    <option value="ad1">Super Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary w-100">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update Administrator -->
    <div class="modal fade" id="updateModal_systemAdministrator" tabindex="-1" data-bs-backdrop="static" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="updateform_systemAdministrator">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Edit System Administrator</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control form-control-border" id="updateadmin_id"
                                    name="updateadmin_id" readonly hidden>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <img alt="Member Picture" id="updatePreview_adminprofile" class="img-fluid clickable-update"
                                    style="width: 200px; height: 200px;">
                            </div>
                            <div class="col">
                                <label for="UpdatePreview_Imageadmin">Image Preview:
                                    <span id="selectedFileName"
                                        class="text-muted font-weight-normal font-italic"></span>
                                </label>
                                <input type="file" class="form-control form-control-border" id="update_adminprofile"
                                    accept="image/*" name="update_adminprofile">

                                <label for="updateFullName_admin">Full Name</label>
                                <input type="text" class="form-control border-0" id="updateFullName_admin"
                                    name="updateFullName_admin" placeholder="Fullname">

                                <label for="updateUsername_admin">Username</label>
                                <input type="text" class="form-control border-0" id="updateUsername_admin"
                                    name="updateUsername_admin" placeholder="Username">


                            </div>

                        </div>

                        <div class="row py-1">
                            <div class="col">
                                <label for="updatePassword_admin">Password</label>
                                <input type="text" class="form-control border-0" id="updatePassword_admin"
                                    name="updatePassword_admin" placeholder="Password">
                            </div>
                        </div>

                        <div class="row py-1">
                            <div class="col">
                                <label for="updateType_admin">Type</label>
                                <select class="form-control border-0" id="updateType_admin" name="updateType_admin"
                                    disabled>
                                    <option value="ad4">Encoder</option>
                                    <option value="ad3">Admin</option>
                                    <option value="ad2">Assistant Admin</option>
                                    <option value="ad1">Super Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary w-100">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>
    <script>
    // Add event listener to all images with class 'clickable-image'
    var clickableImages = document.querySelectorAll('.clickable-image');
       clickableImages.forEach(function(image) {
        image.addEventListener('click', function() {
            // Close the original modal if it's open
            var originalModal = document.getElementById('readModal_systemAdministrator');
            if (originalModal) {
                var originalModalInstance = bootstrap.Modal.getInstance(originalModal);
                if (originalModalInstance) {
                    originalModalInstance.hide();
                }
            }

            // Get the source of the clicked image
            var imageUrl = this.src;

            // Create a modal element for the image
            var modal = document.createElement('div');
            modal.classList.add('modal', 'fade');
            modal.innerHTML = `
             <div class="modal-dialog modal-md">
               <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <img src="${imageUrl}" class="img-fluid w-100">
            </div>
               </div>
             </div>
                 `;

                   // Append modal to body
            document.body.appendChild(modal);

            // Show the modal for the image
            var modalInstance = new bootstrap.Modal(modal);
            modalInstance.show();

            // Add event listener to close button
            var closeButton = modal.querySelector('.btn-close');
            closeButton.addEventListener('click', function() {
                modalInstance.hide();
            });

            // Remove the modal from DOM when it's hidden
            modal.addEventListener('hidden.bs.modal', function() {
                modal.remove();

                // Reopen the original modal
                if (originalModal) {
                    var originalModalInstance = new bootstrap.Modal(originalModal);
                    originalModalInstance.show();
                }
            });
        });
    });
        // update modal event listener to all images with class 'clickable-image'
        var clickableImages = document.querySelectorAll('.clickable-update');
           clickableImages.forEach(function(image) {
             image.addEventListener('click', function() {
            console.log("Image clicked");
            // Close the original modal if it's open
            var updatemodal = document.getElementById('updateModal_systemAdministrator');
            if (updatemodal) {
                var updatemodalInstance = bootstrap.Modal.getInstance(updatemodal);
                if (updatemodalInstance) {
                    updatemodalInstance.hide();
                }
            }

            // Get the source of the clicked image
            var imageUrl = this.src;

            // Create a modal element for the image
            var modal = document.createElement('div');
            modal.classList.add('modal', 'fade');
            modal.innerHTML = `
           <div class="modal-dialog modal-md">
             <div class="modal-content">
               <div class="modal-header">
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
           <img src="${imageUrl}" class="img-fluid w-100">
               </div>
             </div>
           </div>
               `;

            // Append modal to body
            document.body.appendChild(modal);

            // Show the modal for the image
            var modalInstance = new bootstrap.Modal(modal);
            modalInstance.show();

            // Add event listener to close button
            var closeButton = modal.querySelector('.btn-close');
            closeButton.addEventListener('click', function() {
                modalInstance.hide();
            });

            // Remove the modal from DOM when it's hidden
            modal.addEventListener('hidden.bs.modal', function() {
                modal.remove();

                // Reopen the original modal
                if (updatemodal) {
                    var updatemodalInstance = new bootstrap.Modal(updatemodal);
                    updatemodalInstance.show();
                }
            });
        });
    });


    //show password

    $(document).ready(function() {
        $("#togglePassword").on("change", function() {
            var passwordField = $("#createPassword_admin");
            var isChecked = $(this).is(":checked");
            passwordField.attr("type", isChecked ? "text" : "password");
        });
    });

    $(document).ready(function() {
        $('#table_systemAdmins').DataTable({
            buttons: [{
                    text: '<i class="fas fa-user-plus"></i>',
                    className: 'add-btn',
                    action: function(e, dt, node, config) {
                        $('#createModal_systemAdministrator').modal('show');
                    }
                },
                {
                    extend: 'colvis',
                    text: '<i class="fas fa-columns"></i> Columns'
                },
            ],
            dom: 'Bfrtip',
            responsive: true,
            stateSave: true
        });
    });
    const fileInput = $("#add_adminprofile");
    const imagePreview = $("#addPreview_adminprofile");
    imagePreview.hide();
    fileInput.on("change", function() {

        if (fileInput[0].files.length > 0) {
            const selectedFile = fileInput[0].files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.attr("src", e.target.result);
                imagePreview.show();
            };
            reader.readAsDataURL(selectedFile);
        } else {
            imagePreview.hide();
        }
    });
    // Create Admin: Submit Fields
    $('#createForm_systemAdministrator').on('submit', function(e) {
        e.preventDefault();
        if ($('#createForm_systemAdministrator').valid()) {
            $.ajax({
                type: 'POST',
                url: '../server/create_admin.php',
                data: new FormData(this),
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response_createadmin) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    if (response_createadmin.status) {
                        Toast.fire({
                            icon: "success",
                            title: response_createadmin.message
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 1500);
                        systemChanges(response_createadmin.admin_id,
                            response_createadmin.action,
                            response_createadmin.description);
                    } else {
                        Toast.fire({
                            icon: "error",
                            title: response_createadmin.message
                        });
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error('An error occurred, please contact the developer immediately.');
                }
            });
        } else {
            validate_form.focusInvalid();
        }
    })

    // Read admin : Populate Fields 
    $(document).on('click', 'button[data-role=readBtn_systemAdministrator]', function() {
        $.ajax({
            type: "POST",
            url: "../server/read_admin.php",
            data: {
                id: $(this).attr('data-id'),
            },
            dataType: "json",
            success: function(response_viewadmin) {

                $('#readPreview_adminprofile').attr('src', '../assets/images/admin_pictures/' +
                    response_viewadmin.admin_picture);
                $('#readFullName_admin').val(response_viewadmin.full_name);
                $('#readUsername_admin').val(response_viewadmin.username);
                $('#readPassword_admin').val(response_viewadmin.password);
                $('#readType_admin').val(response_viewadmin.type_id);

            }
        })

    });

    // update view admin : Populate Fields 
    $(document).on('click', 'button[data-role=updateBtn_systemAdministrator]', function() {
        $.ajax({
            type: "POST",
            url: "../server/read_admin.php",
            data: {
                id: $(this).attr('data-id'),
            },
            dataType: "json",
            success: function(response_viewadmin) {
                $('#updateadmin_id').val(response_viewadmin.admin_id);
                $('#updatePreview_adminprofile').attr('src', '../assets/images/admin_pictures/' +
                    response_viewadmin.admin_picture);
                $('#updateFullName_admin').val(response_viewadmin.full_name);
                $('#updateUsername_admin').val(response_viewadmin.username);
                $('#updatePassword_admin').val(response_viewadmin.password);
                $('#updateType_admin').val(response_viewadmin.type_id);

            }
        })

    });
    $(document).ready(function() {
        const fileInput = $("#update_adminprofile");
        const imagePreview = $("#updatePreview_adminprofile");
        fileInput.on("change", function() {
            if (fileInput[0].files.length > 0) {
                const selectedFile = fileInput[0].files[0];
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.attr("src", e.target.result);
                    imagePreview.show();
                };
                reader.readAsDataURL(selectedFile);
            } else {
                imagePreview.hide();
            }
            $('#selectedFileName').text(fileInput.val().split("\\").pop()); // Extract the file name
        });
    });
    // Update client_admin : Update Fields 
    $('#updateform_systemAdministrator').on('submit', function(e) {
        e.preventDefault();
        if ($('#updateform_systemAdministrator').valid()) {
            $('#updateModal_systemAdministrator').modal('hide');
            Swal.fire({
                title: 'Do you want to save the changes?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Save',
                denyButtonText: `Don't save`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "../server/update_admin.php",
                        type: "POST",
                        data: new FormData(this),
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function(response_Updateadmin) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.onmouseenter = Swal.stopTimer;
                                    toast.onmouseleave = Swal.resumeTimer;
                                }
                            });
                            if (response_Updateadmin.status) {
                                Toast.fire({
                                    icon: "success",
                                    title: response_Updateadmin.message
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 1500);
                                systemChanges(response_Updateadmin.admin_id,
                                    response_Updateadmin.action,
                                    response_Updateadmin.description);
                            } else {
                                toastr.error(response_Updateadmin.message, '', {
                                    closeButton: false,
                                });
                            }
                        },
                        error: function(error) {
                            toastr.error('An Error occurred: ' + error, '', {
                                positionClass: 'toast-top-end',
                                closeButton: false
                            });
                        }
                    });
                } else if (result.isDenied) {
                    toastr.info('Changes are not saved', '', {
                        closeButton: false
                    });
                }
            });
        } else {
            validate_form.focusInvalid();
        }

    });
    // Delete admin: Delete Fields
    $(document).on('click', 'button[data-role=deleteBtn_systemAdministrator]', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "../server/delete_admin.php",
                    data: {
                        id: $(this).attr('data-id'),
                    },
                    dataType: "json",
                    success: function(response_deleteadmin) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        if (response_deleteadmin.status) {
                            Toast.fire({
                                icon: "success",
                                title: response_deleteadmin.message
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 1500);

                            systemChanges(response_deleteadmin.admin_id,
                                response_deleteadmin.action,
                                response_deleteadmin.description);

                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: response_deleteadmin.message,
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    },
                    error: function(error) {
                        toastr.error('Error occurred: ' + error, '', {
                            positionClass: 'toast-top-end',
                            closeButton: false
                        });
                    }
                });
            }
        })
    });

    jQuery.validator.addMethod("alphabeticWithSpace", function(value, element) {
        return this.optional(element) || /^[a-zA-Z\s ]+$/.test(value);
    }, "Please enter alphabetic characters only.");
    // Form validation
    var validate_form = $('#createForm_systemAdministrator').validate({
        rules: {
            add_adminprofile: {
                required: true,
                accept: "image/jpeg, image/png"
            },
            createFullName_admin: {
                required: true,
                minlength: 5,
                alphabeticWithSpace: true
            },
            createUsername_admin: {
                required: true,
                minlength: 5,
            },
            createPassword_admin: {
                required: true,
                pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/
            },
            createType_admin: {
                required: true,
            },
        },

        messages: {
            add_adminprofile: {
                required: 'Please provide a valid picture !',
                accept: 'Please select a valid JPG or PNG image file',
            },
            createFullName_admin: {
                alphabeticWithSpace: "Please enter alphabetic characters only."
            },
            createUsername_admin: {
                required: 'Please provide a valid username !', //have additonal condition
            },
            createPassword_admin: {
                required: "Please enter a password.",
                pattern: "Password must contain at least one uppercase letter, one lowercase letter, and one digit. It should be at least 8 characters long."
            },
            createType_admin: {
                required: 'Please provide a valid Admin type !', //have additonal condition
            },
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            error.insertAfter(element);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            $(element).addClass('is-valid');
        }

    });

    jQuery.validator.addMethod("alphabeticWithSpace", function(value, element) {
        return this.optional(element) || /^[a-zA-Z\s ]+$/.test(value);
    }, "Please enter alphabetic characters only.");
    // Form validation
    var validate_form = $('#updateform_systemAdministrator').validate({
        rules: {
            update_adminprofile: {
                accept: "image/jpeg, image/png"
            },
            updateFullName_admin: {
                required: true,
                minlength: 5,
                alphabeticWithSpace: true
            },
            updateUsername_admin: {
                required: true,
                minlength: 5,
            },
            updatePassword_admin: {
                required: true,
            },
        },

        messages: {
            update_adminprofile: {
                accept: 'Please select a valid JPG or PNG image file',
            },
            updateFullName_admin: {
                alphabeticWithSpace: "Please enter alphabetic characters only."
            },
            updateUsername_admin: {
                required: 'Please provide a valid username !', //have additonal condition
            },
            updatePassword_admin: {
                required: "Please enter a password.",
            },
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            error.insertAfter(element);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            $(element).addClass('is-valid');
        }

    });
    </script>
</body>

</html>