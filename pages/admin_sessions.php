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
                <img class="animation__wobble" src="../assets/img/yourdevlogo.png" alt="YouDev Logo" height="100"
                    width="100">
            </div>

            <div class="content-wrapper">

                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Admin Sessions</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item font-italic active">System</li>
                                    <li class="breadcrumb-item active">Admin Sessions</li>
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
                                        <table id="table_adminSessions" class="table responsive">
                                            <thead>
                                                <tr>
                                                    <th>Session ID</th>
                                                    <th>Admin ID</th>
                                                    <th>Status</th>
                                                    <th>Logged In</th>
                                                    <th>Logged Out</th>
                                                    <th>Expected End Session Time</th>
                                                    <th>Action</th>
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

        <!--- Read Administrator ----->
        <div class="modal fade" id="readModal_adminSessions" tabindex="-1" data-bs-backdrop="static" role="dialog"
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

        <script>
            $(document).ready(function () {
                $('#reloadOverlay').hide();

                $('#table_adminSessions').DataTable({
                    buttons: [{
                        text: '<i class="fa-solid fa-rotate-right"></i>',
                        className: 'reload-btn',
                        action: function (e, dt, node, config) {
                            $('#reloadOverlay').show();
                            $('#table_adminSessions').DataTable().ajax.reload(function () { // Reload DataTable
                                $('#reloadOverlay').hide();
                                toastr.info("Table has been reloaded", "", {
                                    positionClass: "toast-top-center",
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
                        text: '<i class="fas fa-filter"></i> Filter Status',
                        className: 'filter-btn',
                        autoClose: true,
                        buttons: [
                            {
                                text: 'Online',
                                action: function (e, dt, node, config) {
                                    dt.column(2).search('Online').draw();
                                }
                            }, {
                                text: 'Offline',
                                action: function (e, dt, node, config) {
                                    dt.column(2).search('Offline').draw();
                                }
                            }, {
                                text: 'Clear Filter',
                                action: function (e, dt, node, config) {
                                    dt.column(2).search('').draw();
                                }
                            }
                        ]
                    }],
                    dom: 'Bfrtip',
                    responsive: true,
                    stateSave: true,
                    ajax: {
                        url: '../server/populate_admin-sessions.php',
                        type: 'GET',
                        dataSrc: 'admin_sessions'
                    },
                    columns: [{
                        data: 'session_d',
                        render: function (data, type, row) {
                            return 'SESSION' + data;
                        }
                    }, {
                        data: 'admin_id',
                        render: function (data, type, row) {
                            return 'ADMIN' + data;
                        }
                    }, {
                        data: 'fullname',
                        render: function (data, type, row) {
                            return data.charAt(0).toUpperCase() + data.slice(1);
                        }
                    }, {
                        data: 'status'
                    }, {
                        data: 'logged_in',
                        render: function (data, type, row) {
                            return formatDateTime(data)
                        }
                    }, {
                        data: 'logged_out',
                        render: function (data, type, row) {
                            return formatDateTime(data)
                        }
                    }, {
                        data: null,
                        render: function (data, type, row) {
                            return '<div class="btn-group" role="group" aria-label="System Administrator Actions">' +
                                '<button type="button" class="btn bg-secondary" data-bs-toggle="modal" data-bs-target="#readModal_systemAdmin" data-id="' + row.session_id + '" data-role="readBtn_systemAdmin"><i class="fa-solid fa-eye fa-xl" style="color: white;"></i></button>' +
                                '<button type="button" class="btn bg-danger" data-id="' + row.session_id + '" data-role="deleteBtn_systemAdmin"><i class="fa-solid fa-trash fa-xl" style="color: white;"></i></button>' +
                                '</div>';
                        }
                    }]
                });
            });


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
                            $('#readId_systemAdmin').val(responseData.systemAdminsData.admin_id);
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
       
       </script>

    </body>

</html>