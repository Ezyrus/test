<?php
include '../config/config.php';
include '../server/admin_login-verification.php';
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
                                                    <th>System Access</th>
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

                        <div class="row">
                            <div class="col">
                                <div class="card card-primary card-secondary">
                                    <div class="overlay dark" id="reloadOverlay">
                                        <i class="fas fa-3x fa-sync-alt"></i>
                                    </div>

                                    <div class="card-header bg-danger">
                                        <h5 class="card-title">Archived Administrators</h5>
                                    </div>

                                    <div class="card-body">
                                        <table id="table_systemAdminsArchive" class="table responsive">
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
                                    <label for="createPicturePreview_systemAdmin">Picture: </label>
                                    <span id="createPictureFileName"
                                        class="text-muted font-weight-normal font-italic"></span>
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
                                            title="Admin Access Type">
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
                                    <label for="readPicturePreview_systemAdmin">Picture: <span id="readPictureFileName"
                                            class="text-muted font-weight-normal font-italic"></span></label>
                                    <img alt="Admin Picture" id="readPicturePreview_systemAdmin" class="w-100 mb-2">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col">
                                    <label for="readFullName_systemAdmin">Full Name</label>
                                    <input type="text" class="form-control text-capitalize"
                                        id="readFullName_systemAdmin" name="readFullName_systemAdmin"
                                        placeholder="Full Name" readonly>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-7">
                                    <label for="readUsername_systemAdmin">Username</label>
                                    <input type="text" class="form-control" id="readUsername_systemAdmin"
                                        name="readUsername_systemAdmin" placeholder="Username" readonly>
                                </div>

                                <div class="col-5">
                                    <label for="readId_systemAdmin">Admin ID</label>
                                    <input type="text" class="form-control" id="readId_systemAdmin"
                                        name="readId_systemAdmin" placeholder="ID" readonly>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col">
                                    <label for="readType_systemAdmin">Type
                                        <span class="d-inline-block " tabindex="0" data-toggle="tooltip"
                                            title="Admin Access Type">
                                            <i class="fas fa-question-circle"></i>
                                        </span>
                                    </label>
                                    <select class="form-control" id="readType_systemAdmin" name="readType_systemAdmin"
                                        readonly disabled>
                                        <option value="ad3">Encoder</option>
                                        <option value="ad2">Admin</option>
                                        <option value="ad1">Super Admin</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <label for="readSystemAccess_systemAdmin">System Access
                                        <span class="d-inline-block " tabindex="0" data-toggle="tooltip"
                                            title="Admin System Permission">
                                            <i class="fas fa-question-circle"></i>
                                        </span>
                                    </label>
                                    <select class="form-control" id="readSystemAccess_systemAdmin"
                                        name="readSystemAccess_systemAdmin" readonly disabled>
                                        <option value="1">Authorize Access</option>
                                        <option value="0">Revoke Access</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-5">
                                    <label for="readAddedBy_systemAdmin">Added By</label>
                                    <input type="text" class="form-control text-capitalize" id="readAddedBy_systemAdmin"
                                        name="readAddedBy_systemAdmin" placeholder="Added By" readonly>
                                </div>

                                <div class="col-7">
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

        <!--- Update Administrator ----->
        <div class="modal fade" id="updateModal_systemAdmin" tabindex="-1" data-bs-backdrop="static" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="updateForm_systemAdmin">

                        <div class="modal-header bg-primary">
                            <h1 class="modal-title fs-5 text-center">Update System Administrator</h1>
                        </div>

                        <div class="modal-body">
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="updatePicturePreview_systemAdmin">Picture: </label>
                                    <span id="updatePictureFileName"
                                        class="text-muted font-weight-normal font-italic"></span>
                                    <img alt="Admin Picture" id="updatePicturePreview_systemAdmin" class="w-100 mb-2">
                                    <input type="file" class="form-control" id="updatePicture_systemAdmin"
                                        name="updatePicture_systemAdmin">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col">
                                    <label for="updateFullName_systemAdmin">Full Name</label>
                                    <input type="text" class="form-control text-capitalize"
                                        id="updateFullName_systemAdmin" name="updateFullName_systemAdmin"
                                        placeholder="Full Name" required>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-7">
                                    <label for="updateUsername_systemAdmin">Username</label>
                                    <input type="text" class="form-control" id="updateUsername_systemAdmin"
                                        name="updateUsername_systemAdmin" placeholder="Username" readonly>
                                </div>

                                <div class="col-5">
                                    <label for="updateId_systemAdmin">Admin ID</label>
                                    <input type="text" class="form-control" id="updateId_systemAdmin"
                                        name="updateId_systemAdmin" placeholder="ID" readonly>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col">
                                    <label for="updateType_systemAdmin">Type
                                        <span class="d-inline-block " tabindex="0" data-toggle="tooltip"
                                            title="Admin Access Type">
                                            <i class="fas fa-question-circle"></i>
                                        </span>
                                    </label>
                                    <select class="form-control" id="updateType_systemAdmin"
                                        name="updateType_systemAdmin" required>
                                        <option value="ad3">Encoder</option>
                                        <option value="ad2">Admin</option>
                                        <option value="ad1">Super Admin</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <label for="updateSystemAccess_systemAdmin">System Access
                                        <span class="d-inline-block " tabindex="0" data-toggle="tooltip"
                                            title="Admin System Permission">
                                            <i class="fas fa-question-circle"></i>
                                        </span>
                                    </label>
                                    <select class="form-control" id="updateSystemAccess_systemAdmin"
                                        name="updateSystemAccess_systemAdmin" required>
                                        <option value="1">Authorize Access</option>
                                        <option value="0">Revoke Access</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-5">
                                    <label for="updateAddedBy_systemAdmin">Added By</label>
                                    <input type="text" class="form-control text-capitalize"
                                        id="updateAddedBy_systemAdmin" name="updateAddedBy_systemAdmin"
                                        placeholder="Added By" readonly>
                                </div>

                                <div class="col-7">
                                    <label for="updateDateRegistered_systemAdmin">Date Registered </label>
                                    <input type="text" class="form-control" id="updateDateRegistered_systemAdmin"
                                        name="updateDateRegistered_systemAdmin" placeholder="Date Registered" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer justify-content-between bg-gray-light">
                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="updateSubmitBtn_admin">Update</button>
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
                            $('#reloadOverlay').show();
                            $('#table_systemAdmins').DataTable().ajax.reload(function () { // Reload DataTable
                                $('#reloadOverlay').hide();
                                toastr.info("Table has been reloaded", "", {
                                    positionClass: "toast-top-center",
                                    // preventDuplicates: true,
                                });
                            });
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
                    }, {
                        extend: 'collection',
                        text: '<i class="fas fa-filter"></i> Filter System Access',
                        className: 'filter-btn',
                        autoClose: true,
                        buttons: [
                            {
                                text: 'Authorized',
                                action: function (e, dt, node, config) {
                                    dt.column(5).search('Authorized').draw();
                                }
                            }, {
                                text: 'Revoked Access',
                                action: function (e, dt, node, config) {
                                    dt.column(5).search('Revoked Access').draw();
                                }
                            }, {
                                text: 'Clear Filter',
                                action: function (e, dt, node, config) {
                                    dt.column(5).search('').draw();
                                }
                            }
                        ]
                    }],
                    dom: 'Bfrtip',
                    responsive: true,
                    stateSave: true,
                    ajax: {
                        url: '../server/populate_system-admins.php',
                        type: 'GET',
                        dataSrc: 'system_admins'
                    },
                    columns: [{
                        data: 'id',
                        render: function (data, type, row) {
                            return 'ADMIN' + data;
                        }
                    }, {
                        data: 'picture',
                        render: function (data, type, row) {
                            return '<img src="../assets/img/admin_pictures/' + data + '" width="100" alt="Admin Picture">';
                        }
                    }, {
                        data: 'fullname',
                        render: function (data, type, row) {
                            return data.charAt(0).toUpperCase() + data.slice(1);
                        }

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
                        data: 'system_access',
                        render: function (data, type, row) {
                            if (data == 1) {
                                return '<span class="badge badge-success">Authorized</span>';
                            } else {
                                return '<span class="badge badge-danger">Revoked Access</span>';
                            }
                        }
                    }, {
                        data: 'added_by',
                        render: function (data, type, row) {
                            return '<span class="badge badge-info text-capitalize">Admin ' + data + '</span>';
                        }
                    }, {
                        data: 'date_registered',
                        render: function (data, type, row) {
                            return '<span class="badge badge-warning">' + formatDateTime(data) + '</span>';
                        }
                    }, {
                        data: null,
                        render: function (data, type, row) {
                            return '<div class="btn-group" role="group" aria-label="System Administrator Actions">' +
                                '<button type="button" class="btn bg-secondary" data-bs-toggle="modal" data-bs-target="#readModal_systemAdmin" data-id="' + row.id + '" data-role="readBtn_systemAdmin"><i class="fa-solid fa-eye fa-xl" style="color: white;"></i></button>' +
                                '<button type="button" class="btn bg-primary" data-bs-toggle="modal" data-bs-target="#updateModal_systemAdmin" data-id="' + row.id + '" data-role="updateBtn_systemAdmin"><i class="fa-solid fa-pen-to-square fa-xl" style="color: white;"></i></button>' +
                                '<button type="button" class="btn bg-danger" data-id="' + row.id + '" data-role="deleteBtn_systemAdmin"><i class="fa-solid fa-trash fa-xl" style="color: white;"></i></button>' +
                                '</div>';
                        }
                    }]
                });

                $("#togglePassword").on("change", function () {
                    var passwordField = $("#createPassword_systemAdmin");
                    var isChecked = $(this).is(":checked");
                    passwordField.attr("type", isChecked ? "text" : "password");
                });

                const createPicture_systemAdmin = $("#createPicture_systemAdmin");
                const createPicturePreview_systemAdmin = $("#createPicturePreview_systemAdmin");
                createPicture_systemAdmin.on("change", function () {
                    if (createPicture_systemAdmin[0].files.length > 0) {
                        const selectedFile = createPicture_systemAdmin[0].files[0];
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            createPicturePreview_systemAdmin.attr("src", e.target.result);
                            createPicturePreview_systemAdmin.show();
                        };
                        reader.readAsDataURL(selectedFile);
                    } else {
                        createPicturePreview_systemAdmin.hide();
                    }
                    $('#createPictureFileName').text(createPicture_systemAdmin.val().split("\\").pop());
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
                            $('#reloadOverlay').show();
                            $('#table_systemAdmins').DataTable().ajax.reload(function () {
                                $('#reloadOverlay').hide();
                                toastr.success(responseData.message)
                            });
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
            $(document).on('click', 'button[data-role=readBtn_systemAdmin]', function () {
                $.ajax({
                    url: '../server/read_admin.php',
                    type: 'POST',
                    data: {
                        "id_systemAdmin": $(this).attr('data-id'),
                    },
                    dataType: 'json',
                    success: function (responseData) {
                        if (responseData.status) {
                            $('#readPicturePreview_systemAdmin').attr('src', '../assets/img/admin_pictures/' + responseData.systemAdminsData.picture);
                            $('#readPictureFileName').text(responseData.systemAdminsData.picture);
                            $('#readFullName_systemAdmin').val(responseData.systemAdminsData.fullname);
                            $('#readUsername_systemAdmin').val(responseData.systemAdminsData.username);
                            $('#readId_systemAdmin').val(responseData.systemAdminsData.id);
                            $('#readType_systemAdmin').val(responseData.systemAdminsData.type);
                            $('#readSystemAccess_systemAdmin').val(responseData.systemAdminsData.system_access)
                            $('#readAddedBy_systemAdmin').val("Admin " + responseData.systemAdminsData.added_by);
                            $('#readDateRegistered_systemAdmin').val(formatDateTime(responseData.systemAdminsData.date_registered));
                        }
                    },
                    error: function (xhr, status, error) {
                        toastr.error("Error occured please contact developers immediately.")
                    }
                })
            })

            // Update Admin: Populate Fields
            $(document).on('click', 'button[data-role=updateBtn_systemAdmin]', function () {
                $.ajax({
                    url: '../server/read_admin.php',
                    type: 'POST',
                    data: {
                        "id_systemAdmin": $(this).attr('data-id'),
                    },
                    dataType: 'json',
                    success: function (responseData) {
                        if (responseData.status) {
                            $('#updatePicturePreview_systemAdmin').attr('src', '../assets/img/admin_pictures/' + responseData.systemAdminsData.picture);
                            $('#updatePictureFileName').text(responseData.systemAdminsData.picture);
                            $('#updateFullName_systemAdmin').val(responseData.systemAdminsData.fullname);
                            $('#updateUsername_systemAdmin').val(responseData.systemAdminsData.username);
                            $('#updateId_systemAdmin').val(responseData.systemAdminsData.id);
                            $('#updateType_systemAdmin').val(responseData.systemAdminsData.type);
                            $('#updateSystemAccess_systemAdmin').val(responseData.systemAdminsData.system_access)
                            $('#updateAddedBy_systemAdmin').val("Admin " + responseData.systemAdminsData.added_by);
                            $('#updateDateRegistered_systemAdmin').val(formatDateTime(responseData.systemAdminsData.date_registered));
                        }
                    },
                    error: function (xhr, status, error) {
                        toastr.error("Error occured please contact developers immediately.")
                    }
                })

                const updatePicture_systemAdmin = $("#updatePicture_systemAdmin");
                const updatePicturePreview_systemAdmin = $("#updatePicturePreview_systemAdmin");
                updatePicture_systemAdmin.on("change", function () {
                    if (updatePicture_systemAdmin[0].files.length > 0) {
                        const selectedFile = updatePicture_systemAdmin[0].files[0];
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            updatePicturePreview_systemAdmin.attr("src", e.target.result);
                            updatePicturePreview_systemAdmin.show();
                        };
                        reader.readAsDataURL(selectedFile);
                    } else {
                        updatePicturePreview_systemAdmin.hide();
                    }
                    $('#updatePictureFileName').text(updatePicture_systemAdmin.val().split("\\").pop());
                });
            })

            // Update Admin: Update Fields
            $("#updateForm_systemAdmin").on("submit", function (e) {
                e.preventDefault();
                $.ajax({
                    url: '../server/update_admin.php',
                    type: 'POST',
                    data: new FormData(this),
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function (responseData) {
                        if (responseData.status) {
                            $('#reloadOverlay').show();
                            $('#table_systemAdmins').DataTable().ajax.reload(function () {
                                $('#reloadOverlay').hide();
                                toastr.success(responseData.message);
                            });
                            $('#updateModal_systemAdmin').modal('hide'); // Hide modal
                            $(this).trigger("reset"); // Reset form
                        }
                    },
                    error: function (xhr, status, error) {
                        toastr.error("Error occured please contact developers immediately.")
                    }
                })
            })

            $(document).on('click', 'button[data-role=deleteBtn_systemAdmin]', function () {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '../server/delete_admin.php',
                            type: 'POST',
                            data: {
                                "id_systemAdmin": $(this).attr('data-id')
                            },
                            dataType: 'json',
                            success: function (responseData) {
                                if (responseData.status) {
                                    $('#reloadOverlay').show();
                                    $('#table_systemAdmins').DataTable().ajax.reload(function () {
                                        $('#reloadOverlay').hide();
                                        toastr.success(responseData.message);
                                    });
                                } else {
                                    toastr.error(responseData.message);
                                }
                            },
                            error: function (xhr, status, error) {
                                toastr.error("Error occurred. Please contact developers immediately.");
                            }
                        });
                    }
                });
            })
        </script>

    </body>

</html>