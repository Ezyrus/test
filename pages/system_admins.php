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
                <img class="animation__wobble" src="../assets/img/yourdevlogo.png" alt="AdminLTELogo" height="100"
                    width="100">
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

                                    <div class="overlay" id="reloadOverlay">
                                        <i class="fas fa-3x fa-sync-alt"></i>
                                    </div>

                                    <div class="card-body">

                                        <table id="table_systemAdmins" class="table responsive">
                                            <thead>
                                                <tr>
                                                    <th>Admin ID</th>
                                                    <th>Picture</th>
                                                    <th>Full Name</th>
                                                    <th>Username</th>
                                                    <th>Type</th>
                                                    <th>Is Active?</th>
                                                    <th>Added By</th>
                                                    <th>Date Registered</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>

                                            <tbody>
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
        <div class="modal fade" id="createModal_systemAdmin" tabindex="-1" data-bs-backdrop="static" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="createForm_systemAdmin">

                        <div class="modal-header bg-success">
                            <h1 class="modal-title fs-5 text-center">Add System Administrator</h1>
                        </div>

                        <div class="modal-body">
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="createPicturePreview_systemAdmin">Picture Preview</label>
                                    <img alt="Admin Picture" id="createPicturePreview_systemAdmin" class="w-100 mb-2">
                                    <input type="file" class="form-control" id="createPicture_systemAdmin"
                                        name="createPicture_systemAdmin" required>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col">
                                    <label for="createFullName_systemAdmin">Full Name</label>
                                    <input type="text" class="form-control" id="createFullName_systemAdmin"
                                        name="createFullName_systemAdmin" placeholder="Full Name" required>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col">
                                    <label for="createUsername_systemAdmin">Username</label>
                                    <input type="text" class="form-control" id="createUsername_systemAdmin"
                                        name="createUsername_systemAdmin" placeholder="Username" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="createPassword_systemAdmin">Password</label>
                                    <input type="password" class="form-control" id="createPassword_systemAdmin"
                                        name="createPassword_systemAdmin" placeholder="Password" required>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col">
                                    <input type="checkbox" id="togglePassword">
                                    <label class="form-check-label" for="togglePassword"><b>Show
                                            Password</b></label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="createType_systemAdmin">Type
                                        <span class="d-inline-block " tabindex="0" data-toggle="tooltip"
                                            title="Admin's system access type">
                                            <i class="fas fa-question-circle"></i>
                                        </span>
                                    </label>
                                    <select class="form-control" id="createType_systemAdmin"
                                        name="createType_systemAdmin">
                                        <option value="ad3">Encoder</option>
                                        <option value="ad2">Admin</option>
                                        <option value="ad1">Super Admin</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer justify-content-between bg-gray-light">
                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="createSubmitBtn_admin">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!--- Read Administrator ----->
        <div class="modal fade" id="readModal_systemAdmin" tabindex="-1" data-bs-backdrop="static" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="readForm_systemAdmin">

                        <div class="modal-header bg-secondary">
                            <h1 class="modal-title fs-5 text-center">View System Administrator</h1>
                        </div>

                        <div class="modal-body">
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="readPicturePreview_systemAdmin">Picture Preview</label>
                                    <img alt="Admin Picture" id="readPicturePreview_systemAdmin" class="w-100 mb-2">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col">
                                    <label for="readFullName_systemAdmin">Full Name</label>
                                    <input type="text" class="form-control" id="readFullName_systemAdmin"
                                        name="readFullName_systemAdmin" placeholder="Full Name" readonly>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col">
                                    <label for="readUsername_systemAdmin">Username</label>
                                    <input type="text" class="form-control" id="readUsername_systemAdmin"
                                        name="readUsername_systemAdmin" placeholder="Username" readonly>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col">
                                    <label for="readType_systemAdmin">Type
                                        <span class="d-inline-block " tabindex="0" data-toggle="tooltip"
                                            title="Admin's system access type">
                                            <i class="fas fa-question-circle"></i>
                                        </span>
                                    </label>
                                    <select class="form-control" id="readType_systemAdmin" name="readType_systemAdmin"
                                        readonly>
                                        <option value="ad3">Encoder</option>
                                        <option value="ad2">Admin</option>
                                        <option value="ad1">Super Admin</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <label for="readIsActive_systemAdmin">Is Active?</label>
                                    <input type="text" class="form-control" id="readIsActive_systemAdmin"
                                        name="readIsActive_systemAdmin" placeholder="Is Active?" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="readIsActive_systemAdmin">Added By</label>
                                    <input type="text" class="form-control" id="readIsActive_systemAdmin"
                                        name="readIsActive_systemAdmin" placeholder="Added By" readonly>
                                </div>

                                <div class="col">
                                    <label for="readDateRegistered_systemAdmin">Date Registered </label>
                                    <input type="text" class="form-control" id="readDateRegistered_systemAdmin"
                                        name="readDateRegistered_systemAdmin" placeholder="Date Registered" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer justify-content-between bg-gray-light">
                            <button type="button" class="btn btn-default w-100" data-bs-dismiss="modal">Close</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                $('#reloadOverlay').hide();

                $('#table_systemAdmins').DataTable({
                    buttons: [{
                        text: '<i class="fas fa-user-plus"></i>',
                        className: 'add-btn',
                        action: function (e, dt, node, config) {
                            $('#createModal_systemAdmin').modal('show');
                            // File Preview
                            const fileInput = $("#createPicture_systemAdmin");
                            const imagePreview = $("#createPicturePreview_systemAdmin");
                            imagePreview.hide();
                            fileInput.on("change", function () {
                                if (fileInput[0].files.length > 0) {
                                    const selectedFile = fileInput[0].files[0];
                                    const reader = new FileReader();
                                    reader.onload = function (e) {
                                        imagePreview.attr("src", e.target.result);
                                        imagePreview.show();
                                    };
                                    reader.readAsDataURL(selectedFile);
                                } else {
                                    imagePreview.hide();
                                }
                            });
                        }
                    }, {
                        text: '<i class="fa-solid fa-rotate-right"></i>',
                        className: 'reload-btn',
                        action: function (e, dt, node, config) {
                            reloadTableOverlay()
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
                    stateSave: true,
                    ajax: {
                        url: '../server/populate_system-admins.php',
                        type: 'GET',
                        dataSrc: 'system_admins' // if your data is not wrapped in a specific key
                    },
                    columns: [{
                        data: 'id'
                    }, {
                        data: 'picture',
                        render: function (data, type, row) {
                            return '<img src="../assets/img/admin_pictures/' + data + '" width="100" alt="Admin Picture">';
                        }
                    }, {
                        data: 'fullname'
                    }, {
                        data: 'username'
                    }, {
                        data: 'type',
                        render: function (data, type, row) {
                            if (data == "ad3") {
                                return "Encoder";
                            } else if (data === "ad2") {
                                return "Admin";
                            } else {
                                return "Super Admin";
                            }
                        }
                    }, {
                        data: 'is_active',
                        render: function (data, type, row) {
                            if (data == 1) {
                                return '<span class="badge badge-success">Active</span>';
                            } else {
                                return '<span class="badge badge-danger">Inactive</span>';
                            }
                        }
                    }, {
                        data: 'added_by',
                        render: function (data, type, row) {
                            return '<span class="badge badge-primary text-capitalize">Admin ' + data + '</span>';
                        }
                    }, {
                        data: 'date_registered',
                        render: function (data, type, row) {
                            return '<span class="badge badge-warning">' + data + '</span>';
                        }
                    }, {
                        data: null,
                        render: function (data, type, row) {
                            return '<div class="btn-group" role="group" aria-label="System Administrator Actions">' +
                                '<button type="button" class="btn bg-secondary" data-bs-toggle="modal" data-bs-target="#readModal_systemAdmin" data-id="' + row.id + '" data-role="readBtn_systemAdmins"><i class="fa-solid fa-eye fa-xl" style="color: white;"></i></button>' +
                                '<button type="button" class="btn bg-blue" data-bs-toggle="modal" data-bs-target="#updateModal_systemAdmins" data-id="' + row.id + '" data-role="updateBtn_systemAdmins"><i class="fa-solid fa-pen-to-square fa-xl" style="color: white;"></i></button>' +
                                '<button type="button" class="btn bg-red" data-id="' + row.id + '" data-role="deleteBtn_systemAdmins"><i class="fa-solid fa-trash fa-xl" style="color: white;"></i></button>' +
                                '</div>';
                        }
                    }]
                });

                $("#togglePassword").on("change", function () {
                    var passwordField = $("#createPassword_systemAdmin");
                    var isChecked = $(this).is(":checked");
                    passwordField.attr("type", isChecked ? "text" : "password");
                });
            });

            // Create Admin: Submit Fields
            $("#createForm_systemAdmin").on("submit", function (e) {
                e.preventDefault();
                $.ajax({
                    // data: $(this).serialize(),
                    // contentType: "application/x-www-form-urlencoded; charset=UTF-8", //default
                    // processData: true, //default

                    data: new FormData(this), //multipart/form-data
                    contentType: false,
                    processData: false,
                    type: "POST",
                    url: "../server/create_admin.php",
                    dataType: "json",
                    headers: {
                        "Authorization": "Bearer token"
                    },
                    // statusCode: {
                    //     404: function () {
                    //         toastr.error("Status 404: URL Not Found")
                    //     },
                    //     500: function () {
                    //         toastr.error("Status 500: Server Error")
                    //     }
                    // },
                    success: function (responseData) {
                        if (responseData.status) {
                            toastr.success(responseData.message)

                            $('#createModal_systemAdmin').modal('hide'); // Hide modal
                            $(this).trigger("reset"); // Reset form
                        } else {
                            toastr.error(responseData.message)
                        }
                    },
                    error: function (xhr, status, error) {
                        // console.error("Xhr: ", xhr);
                        // console.error("Status: ", status); //"error", "abort", "timeout"
                        // console.error("Error: ", error);

                        toastr.error("Error occured please contact developers immediately.")
                    }
                })
            })

            // Read Admin: Populate Fields
            $(document).on('click', 'button[data-role=readBtn_systemAdmins]', function() {
                $.ajax ({
                    url: '',
                    type: 'POST',
                    data: '',
                    dataType: '',
                    success: function(responseData) {

                    },
                    error: function(xhr, status, error) {

                    }
                })
            })
            function reloadTableOverlay() {
                $('#reloadOverlay').show();
                $('#table_systemAdmins').DataTable().ajax.reload(function () { // Reload DataTable
                    $('#reloadOverlay').hide();
                    toastr.info("Table has been reloaded.", "", { positionClass: "toast-top-center" });
                });
            }
        </script>

    </body>

</html>