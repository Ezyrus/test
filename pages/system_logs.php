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
                            <div class="col">
                                <div class="card card-primary card-secondary">
                                    <div class="overlay" id="reloadOverlay">
                                        <i class="fas fa-3x fa-sync-alt"></i>
                                    </div>

                                    <div class="card-body">
                                        <table id="table_systemLogs" class="table responsive table-hover">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th style="width: 100px;">Logs ID</th>
                                                    <th class="text-nowrap" style="width: 200px;">Performed By</th>
                                                    <th style="width: 100px;">Action</th>
                                                    <th>Description</th>
                                                    <th style="width: 200px;">Date</th>
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
                $('#reloadOverlay').hide();

                $('#table_systemLogs').DataTable({
                    buttons: [{
                        text: '<i class="fa-solid fa-rotate-right"></i>',
                        className: 'reload-btn',
                        action: function (e, dt, node, config) {
                            $('#reloadOverlay').show();
                            $('#table_systemLogs').DataTable().ajax.reload(function () { // Reload DataTable
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
                        text: '<i class="fas fa-filter"></i> Filter Action',
                        className: 'filter-btn',
                        autoClose: true,
                        buttons: [
                            {
                                text: 'Login',
                                action: function (e, dt, node, config) {
                                    dt.column(2).search('Login').draw();
                                }
                            }, {
                                text: 'Logout',
                                action: function (e, dt, node, config) {
                                    dt.column(2).search('Logout').draw();
                                }
                            }, {
                                text: 'Clear Filter',
                                action: function (e, dt, node, config) {
                                    dt.column(4).search('').draw();
                                }
                            }
                        ]
                    }],
                    dom: 'Bfrtip',
                    responsive: true,
                    stateSave: true,
                    ajax: {
                        url: '../server/populate_system-logs.php',
                        type: 'GET',
                        dataSrc: 'system_logs'
                    },
                    columns: [{
                        data: 'logs_id',
                        render: function (data, type, row) {
                            return ' <span class="badge badge-secondary">LOGS' + data + "</span>";
                        }
                    }, {
                        data: 'fullname'
                    }, {
                        data: 'action',
                    }, {
                        data: 'description',
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