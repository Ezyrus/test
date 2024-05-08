<?php
include '../config/config.php';
// include '../server/admin_login-verification.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your System | Administrator</title>
    <?php require 'resources.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <?php include 'includes/admin_navigation.php'; ?>

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="../assets/img/yourdevlogo.png" alt="AdminLTELogo" height="100" width="100">
        </div>

        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">System Administrators</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item font-italic active">System</li>
                                <li class="breadcrumb-item active">Administrators</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">

                    <div class="row">

                        <div class="col">
                            <div class="card card-primary card-secondary">

                                <div class="card-body">
                                    <table id="table_systemAdmins" class="table responsive">
                                        <thead>
                                            <tr>
                                                <th>Admin ID</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Username</th>
                                                <th>Active</th>
                                                <th>Added by</th>
                                                <th>Date Registered</th>
                                                <th class="text-nowrap w-auto text-center">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM `system_admins`";
                                            $result = mysqli_query(getDatabase(), $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <tr id="<?php echo $row['id']; ?>">
                                                    <td>
                                                        <?php echo $row['id']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['full_name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['username']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['type']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['is_active']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['added_by']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['date_registered']; ?>
                                                    </td>
                                                    <td class="text-center" style="width: 10%;">
                                                        <div class="btn-group" role="group" aria-label="System Administrator Actions">
                                                            <button type="button" class="btn bg-green" data-bs-toggle="modal" data-bs-target="#readModal_systemAdministrator" data-id="<?php echo $row['id']; ?>" data-role="readBtn_systemAdministrator">
                                                                <i class="fa-solid fa-eye fa-xl" style="color: white;"></i>
                                                            </button>

                                                            <button type="button" class="btn bg-blue" data-bs-toggle="modal" data-bs-target="#updateModal_systemAdministrator" data-id="<?php echo $row['id']; ?>" data-role="updateBtn_systemAdministrator">
                                                                <i class="fa-solid fa-pen-to-square fa-xl" style="color: white;"></i>
                                                            </button>

                                                            <button type="button" class="btn bg-red" data-id="<?php echo $row['admin_id']; ?>" data-role="deleteBtn_systemAdministrator">
                                                                <i class="fa-solid fa-trash fa-xl" style="color: white;"></i>
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

                </div>

            </section>

        </div>

        <?php include 'includes/admin_footer.php' ?>

    </div>

    <!--- Create Administrator ----->
    <div class="modal fade" id="createModal_systemAdmin" tabindex="-1" data-bs-backdrop="static" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="createForm_systemAdmin">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">System Administrator</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col">
                                <label for="createFullName_systemAdmin">Full Name</label>
                                <input type="text" class="form-control" id="createFullName_systemAdmin" name="createFullName_systemAdmin" placeholder="Full Name">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col">
                                <label for="createUsername_systemAdmin">Username</label>
                                <input type="text" class="form-control" id="createUsername_systemAdmin" name="createUsername_systemAdmin" placeholder="Username">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="createPassword_systemAdmin">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="createPassword_systemAdmin" name="createPassword_systemAdmin" placeholder="Password">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col">
                                <input type="checkbox" id="togglePassword">
                                <label class="form-check-label" for="togglePassword"><b>Show Password</b></label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="createType_systemAdmin">Type</label>
                                <select class="form-control" id="createType_systemAdmin" name="createType_systemAdmin">
                                    <option value="ad3">Encoder</option>
                                    <option value="ad2">Admin</option>
                                    <option value="ad1">Super Admin</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="createSubmitBtn_admin">Add
                            Admin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Read Administrator -->
    <div class="modal fade" id="readModal_systemAdministrator" tabindex="-1" data-bs-backdrop="static" role="dialog" aria-hidden="true">
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
                                <img alt="Member Picture" id="readPreview_adminprofile" class="img-fluid clickable-image" style="width: 200px; height: 200px;">
                            </div>
                            <div class="col">
                                <label for="readFullName_admin">Full Name</label>
                                <input type="text" class="form-control border-0" id="readFullName_admin" name="readFullName_admin" placeholder="Fullname" readonly>

                                <label for="readUsername_admin">Username</label>
                                <input type="text" class="form-control border-0" id="readUsername_admin" name="readUsername_admin" placeholder="Username" readonly>


                            </div>

                        </div>

                        <div class="row py-1">
                            <div class="col">
                                <label for="readPassword_admin">Password</label>
                                <input type="text" class="form-control border-0" id="readPassword_admin" name="readPassword_admin" placeholder="Password" readonly>
                            </div>
                        </div>

                        <div class="row py-1">
                            <div class="col">
                                <label for="readType_admin">Type</label>
                                <select class="form-control border-0" id="readType_admin" name="readType_admin" readonly disabled>
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

    <script>
        $(document).ready(function() {
            $('#table_systemAdmins').DataTable({
                buttons: [{
                    text: '<i class="fas fa-user-plus"></i>',
                    className: 'add-btn',
                    action: function(e, dt, node, config) {
                        $('#createModal_systemAdmin').modal('show');
                    }
                }, {
                    extend: 'copy',
                    text: '<i class="fas fa-copy"></i> Copy'
                }, {
                    extend: 'excel',
                    text: '<i class="fas fa-file-excel"></i> Excel'
                }, {
                    extend: 'pdf',
                    text: '<i class="fas fa-file-pdf"></i> PDF'
                }, {
                    extend: 'colvis',
                    text: '<i class="fas fa-columns"></i> Columns'
                }],
                dom: 'Bfrtip',
                responsive: true,
                stateSave: true
            });

            $("#togglePassword").on("change", function() {
                var passwordField = $("#createPassword_systemAdmin");
                var isChecked = $(this).is(":checked");
                passwordField.attr("type", isChecked ? "text" : "password");
            });
        });

        // Create Admin: Submit Fields
        $('#createForm_systemAdmin').on('submit', function(e) {
            e.preventDefault();
            if ($('#createForm_systemAdmin').valid()) {
                $.ajax({
                    type: 'POST',
                    url: '../server/create_admin.php',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response_createAdmin) {
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
                        if (response_createAdmin.status) {
                            Toast.fire({
                                icon: "success",
                                title: response_createAdmin.message
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 1500);
                            systemChanges(response_createAdmin.admin_id,
                                response_createAdmin.action,
                                response_createAdmin.description);
                        } else {
                            Toast.fire({
                                icon: "error",
                                title: response_createAdmin.message
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

        // Create Form Validation
        jQuery.validator.addMethod("alphabeticWithSpace", function(value, element) {
            return this.optional(element) || /^[a-zA-Z\s ]+$/.test(value);
        }, "Please enter alphabetic characters only.");
        var validate_form = $('#createForm_systemAdmin').validate({
            rules: {
                add_adminprofile: {
                    required: true,
                    accept: "image/jpeg, image/png"
                },
                createFullName_systemAdmin: {
                    required: true,
                    minlength: 5,
                    alphabeticWithSpace: true
                },
                createUsername_systemAdmin: {
                    required: true,
                    minlength: 5,
                },
                createPassword_systemAdmin: {
                    required: true,
                    pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/
                },
                createType_systemAdmin: {
                    required: true,
                },
            },

            messages: {
                add_adminprofile: {
                    required: 'Please provide a valid picture !',
                    accept: 'Please select a valid JPG or PNG image file',
                },
                createFullName_systemAdmin: {
                    alphabeticWithSpace: "Please enter alphabetic characters only."
                },
                createUsername_systemAdmin: {
                    required: 'Please provide a valid username !', //have additonal condition
                },
                createPassword_systemAdmin: {
                    required: "Please enter a password.",
                    pattern: "Password must contain at least one uppercase letter, one lowercase letter, and one digit. It should be at least 8 characters long."
                },
                createType_systemAdmin: {
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

        // Update Form Validation
        jQuery.validator.addMethod("alphabeticWithSpace", function(value, element) {
            return this.optional(element) || /^[a-zA-Z\s ]+$/.test(value);
        }, "Please enter alphabetic characters only.")
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