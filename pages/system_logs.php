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
                                <h1 class="m-0">System Logs</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item font-italic active">System</li>
                                    <li class="breadcrumb-item active">Logs</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-6">
                                <div class="card card-primary card-secondary">
                                    <div class="overlay" id="logInLogOutTable_reloadOverlay">
                                        <i class="fas fa-3x fa-sync-alt"></i>
                                    </div>

                                    <div class="card-body">
                                        <table id="logInLogOutTable_systemLogs" class="table responsive table-hover">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="text-center text-nowrap" style="width: 50px;">Logs ID
                                                    </th>
                                                    <th class="text-center text-nowrap" style="width: 100px;">Performed
                                                        By</th>
                                                    <th class="text-center" style="width: 50px;">Action</th>
                                                    <th>Description</th>
                                                    <th style="width: 100px;">Date</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="card card-primary card-secondary">
                                    <div class="overlay" id="createUpdateDelete_reloadOverlay">
                                        <i class="fas fa-3x fa-sync-alt"></i>
                                    </div>

                                    <div class="card-body">
                                        <table id="createUpdateDeleteTable_systemLogs"
                                            class="table responsive table-hover">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="text-center text-nowrap" style="width: 50px;">Logs ID
                                                    </th>
                                                    <th class="text-center text-nowrap" style="width: 100px;">Performed
                                                        By</th>
                                                    <th class="text-center" style="width: 50px;">Action</th>
                                                    <th>Description</th>
                                                    <th style="width: 100px;">Date</th>
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

        <script>
            $(document).ready(function () {
                $('#logInLogOutTable_reloadOverlay').hide();
                $('#createUpdateDelete_reloadOverlay').hide();

                $('#logInLogOutTable_systemLogs').DataTable({
                    buttons: [{
                        text: '<i class="fa-solid fa-rotate-right"></i>',
                        className: 'reload-btn',
                        action: function (e, dt, node, config) {
                            $('#logInLogOutTable_reloadOverlay').show();
                            dt.search('')              // Clear global search
                            dt.columns().search('')    // Clear individual column search
                            dt.order([[0, 'asc']])     // Reset sorting to the first column (adjust as needed)
                            dt.page('first')           // Reset pagination to the first page
                            dt.draw(false);
                            $('#logInLogOutTable_systemLogs').DataTable().ajax.reload(function () { // Reload DataTable
                                $('#logInLogOutTable_reloadOverlay').hide();
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
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf"></i> PDF'
                    }, {
                        extend: 'collection',
                        text: '<i class="fas fa-filter"></i> Filter Action',
                        className: 'filter-btn',
                        autoClose: true,
                        buttons: [
                            {
                                text: 'Login',
                                action: function (e, dt, node, config) {
                                    dt.column(2).search('login').draw();
                                }
                            }, {
                                text: 'Logout',
                                action: function (e, dt, node, config) {
                                    dt.column(2).search('logout').draw();
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
                        url: '../server/populate_system-logs.php?systemLogsType=logInLogOut',
                        type: 'GET',
                        dataSrc: 'system_logs'
                    },
                    columns: [{
                        data: 'logs_id',
                        render: function (data, type, row) {
                            return '<span class="badge badge-secondary">LOGS' + data + '</span>';
                        }
                    }, {
                        data: 'fullname',
                        render: function (data, type, row) {
                            return data.charAt(0).toUpperCase() + data.slice(1);
                        }
                    }, {
                        data: 'action',
                        render: function (data, type, row) {
                            if (data === "login") {
                                return '<span class="badge badge-success text-uppercase">' + data + '</span>';
                            } else if (data === "logout") {
                                return '<span class="badge badge-danger text-uppercase">' + data + '</span>';
                            }
                        }
                    }, {
                        data: 'description',
                        render: function (data, type, row) {
                            return data.charAt(0).toUpperCase() + data.slice(1);
                        }
                    }, {
                        data: 'date',
                        render: function (data, type, row) {
                            return '<span class="badge badge-warning">' + formatDateTime(data) + '</span>';
                        }
                    }]
                });

                $('#createUpdateDeleteTable_systemLogs').DataTable({
                    buttons: [{
                        text: '<i class="fa-solid fa-rotate-right"></i>',
                        className: 'reload-btn',
                        action: function (e, dt, node, config) {
                            $('#createUpdateDelete_reloadOverlay').show();
                            dt.search('')              // Clear global search
                            dt.columns().search('')    // Clear individual column search
                            dt.order([[0, 'asc']])     // Reset sorting to the first column (adjust as needed)
                            dt.page('first')           // Reset pagination to the first page
                            dt.draw(false);
                            $('#createUpdateDeleteTable_systemLogs').DataTable().ajax.reload(function () { // Reload DataTable
                                $('#createUpdateDelete_reloadOverlay').hide();
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
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf"></i> PDF'
                    }, {
                        extend: 'collection',
                        text: '<i class="fas fa-filter"></i> Filter Action',
                        className: 'filter-btn',
                        autoClose: true,
                        buttons: [
                            {
                                text: 'Create',
                                action: function (e, dt, node, config) {
                                    dt.column(2).search('create').draw();
                                }
                            }, {
                                text: 'Update',
                                action: function (e, dt, node, config) {
                                    dt.column(2).search('update').draw();
                                }
                            }, {
                                text: 'Delete',
                                action: function (e, dt, node, config) {
                                    dt.column(2).search('delete').draw();
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
                        url: '../server/populate_system-logs.php?systemLogsType=createUpdateDelete',
                        type: 'GET',
                        dataSrc: 'system_logs'
                    },
                    columns: [{
                        data: 'logs_id',
                        render: function (data, type, row) {
                            return '<span class="badge badge-secondary">LOGS' + data + '</span>';
                        }
                    }, {
                        data: 'fullname',
                        render: function (data, type, row) {
                            return data.charAt(0).toUpperCase() + data.slice(1);
                        }
                    }, {
                        data: 'action',
                        render: function (data, type, row) {
                            if (data === "create") {
                                return '<span class="badge badge-success text-uppercase">' + data + '</span>';
                            } else if (data === "update") {
                                return '<span class="badge badge-primary text-uppercase">' + data + '</span>';
                            } else {
                                return '<span class="badge badge-danger text-uppercase">' + data + '</span>';
                            }
                        }
                    }, {
                        data: 'description',
                        render: function (data, type, row) {
                            return data.charAt(0).toUpperCase() + data.slice(1);
                        }
                    }, {
                        data: 'date',
                        render: function (data, type, row) {
                            return '<span class="badge badge-warning">' + formatDateTime(data) + '</span>';
                        }
                    }]
                });

            });

        </script>

    </body>

</html>