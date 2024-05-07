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
        <?php require 'resources.php'; ?>
    </head>

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">

            <?php include 'includes/admin_navigation.php'; ?>

            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__wobble" src="../assets/img/yourdevlogo.png" alt="YourDev Logo" height="100"
                    width="100">
            </div>

            <div class="content-wrapper">

                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Dashboard</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>150</h3>

                                        <p>New Orders</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>53<sup style="font-size: 20px">%</sup></h3>

                                        <p>Bounce Rate</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>44</h3>

                                        <p>User Registrations</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>65</h3>

                                        <p>Unique Visitors</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col col-sm-6 col-md-3">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">CPU Traffic</span>
                                        <span class="info-box-number">
                                            10
                                            <small>%</small>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>

                            <div class="col col-sm-6 col-md-3">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-danger elevation-1"><i
                                            class="fas fa-thumbs-up"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Likes</span>
                                        <span class="info-box-number">41,410</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>


                            <div class="col col-sm-6 col-md-3">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-success elevation-1"><i
                                            class="fas fa-shopping-cart"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Sales</span>
                                        <span class="info-box-number">760</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>

                            <div class="col col-sm-6 col-md-3">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-warning elevation-1"><i
                                            class="fas fa-users"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">New Members</span>
                                        <span class="info-box-number">2,000</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>

                        </div>

                        <div class="row">
                            <!-- Left col -->
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header border-0">
                                        <div class="d-flex justify-content-between">
                                            <h3 class="card-title">Online Store Visitors</h3>
                                            <a href="javascript:void(0);">View Report</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <p class="d-flex flex-column">
                                                <span class="text-bold text-lg">820</span>
                                                <span>Visitors Over Time</span>
                                            </p>
                                            <p class="ml-auto d-flex flex-column text-right">
                                                <span class="text-success">
                                                    <i class="fas fa-arrow-up"></i> 12.5%
                                                </span>
                                                <span class="text-muted">Since last week</span>
                                            </p>
                                        </div>
                                        <!-- /.d-flex -->

                                        <div class="position-relative mb-4">
                                            <canvas id="visitors-chart" height="200"></canvas>
                                        </div>

                                        <div class="d-flex flex-row justify-content-end">
                                            <span class="mr-2">
                                                <i class="fas fa-square text-primary"></i> This Week
                                            </span>

                                            <span>
                                                <i class="fas fa-square text-gray"></i> Last Week
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- TABLE: LATEST ORDERS -->
                                <div class="card">
                                    <div class="card-header border-transparent">
                                        <h3 class="card-title">Latest Orders</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <thead>
                                                    <tr>
                                                        <th>Order ID</th>
                                                        <th>Item</th>
                                                        <th>Status</th>
                                                        <th>Popularity</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                                        <td>Call of Duty IV</td>
                                                        <td><span class="badge badge-success">Shipped</span></td>
                                                        <td>
                                                            <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                                90,80,90,-70,61,-83,63</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                                        <td>Samsung Smart TV</td>
                                                        <td><span class="badge badge-warning">Pending</span></td>
                                                        <td>
                                                            <div class="sparkbar" data-color="#f39c12" data-height="20">
                                                                90,80,-90,70,61,-83,68</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                                        <td>iPhone 6 Plus</td>
                                                        <td><span class="badge badge-danger">Delivered</span></td>
                                                        <td>
                                                            <div class="sparkbar" data-color="#f56954" data-height="20">
                                                                90,-80,90,70,-61,83,63</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                                        <td>Samsung Smart TV</td>
                                                        <td><span class="badge badge-info">Processing</span></td>
                                                        <td>
                                                            <div class="sparkbar" data-color="#00c0ef" data-height="20">
                                                                90,80,-90,70,-61,83,63</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                                        <td>Samsung Smart TV</td>
                                                        <td><span class="badge badge-warning">Pending</span></td>
                                                        <td>
                                                            <div class="sparkbar" data-color="#f39c12" data-height="20">
                                                                90,80,-90,70,61,-83,68</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                                        <td>iPhone 6 Plus</td>
                                                        <td><span class="badge badge-danger">Delivered</span></td>
                                                        <td>
                                                            <div class="sparkbar" data-color="#f56954" data-height="20">
                                                                90,-80,90,70,-61,83,63</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                                        <td>Call of Duty IV</td>
                                                        <td><span class="badge badge-success">Shipped</span></td>
                                                        <td>
                                                            <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                                90,80,90,-70,61,-83,63</div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer clearfix">
                                        <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New
                                            Order</a>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View
                                            All Orders</a>
                                    </div>
                                    <!-- /.card-footer -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->

                            <div class="col-md-4">
                                <!-- Info Boxes Style 2 -->
                                <div class="info-box mb-3 bg-warning">
                                    <span class="info-box-icon"><i class="fas fa-tag"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Inventory</span>
                                        <span class="info-box-number">5,200</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                                <div class="info-box mb-3 bg-success">
                                    <span class="info-box-icon"><i class="far fa-heart"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Mentions</span>
                                        <span class="info-box-number">92,050</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                                <div class="info-box mb-3 bg-danger">
                                    <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Downloads</span>
                                        <span class="info-box-number">114,381</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                                <div class="info-box mb-3 bg-info">
                                    <span class="info-box-icon"><i class="far fa-comment"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Direct Messages</span>
                                        <span class="info-box-number">163,921</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Browser Usage</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="chart-responsive">
                                                    <canvas id="pieChart" height="150"></canvas>
                                                </div>
                                                <!-- ./chart-responsive -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-md-4">
                                                <ul class="chart-legend clearfix">
                                                    <li><i class="far fa-circle text-danger"></i> Chrome</li>
                                                    <li><i class="far fa-circle text-success"></i> IE</li>
                                                    <li><i class="far fa-circle text-warning"></i> FireFox</li>
                                                    <li><i class="far fa-circle text-info"></i> Safari</li>
                                                    <li><i class="far fa-circle text-primary"></i> Opera</li>
                                                    <li><i class="far fa-circle text-secondary"></i> Navigator</li>
                                                </ul>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer p-0">
                                        <ul class="nav nav-pills flex-column">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    United States of America
                                                    <span class="float-right text-danger">
                                                        <i class="fas fa-arrow-down text-sm"></i>
                                                        12%</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    India
                                                    <span class="float-right text-success">
                                                        <i class="fas fa-arrow-up text-sm"></i> 4%
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    China
                                                    <span class="float-right text-warning">
                                                        <i class="fas fa-arrow-left text-sm"></i> 0%
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /.footer -->
                                </div>
                                <!-- /.card -->

                                <!-- PRODUCT LIST -->
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Recently Added Products</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <ul class="products-list product-list-in-card pl-2 pr-2">
                                            <li class="item">
                                                <div class="product-img">
                                                    <img src="dist/img/default-150x150.png" alt="Product Image"
                                                        class="img-size-50">
                                                </div>
                                                <div class="product-info">
                                                    <a href="javascript:void(0)" class="product-title">Samsung TV
                                                        <span class="badge badge-warning float-right">$1800</span></a>
                                                    <span class="product-description">
                                                        Samsung 32" 1080p 60Hz LED Smart HDTV.
                                                    </span>
                                                </div>
                                            </li>
                                            <!-- /.item -->
                                            <li class="item">
                                                <div class="product-img">
                                                    <img src="dist/img/default-150x150.png" alt="Product Image"
                                                        class="img-size-50">
                                                </div>
                                                <div class="product-info">
                                                    <a href="javascript:void(0)" class="product-title">Bicycle
                                                        <span class="badge badge-info float-right">$700</span></a>
                                                    <span class="product-description">
                                                        26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                                                    </span>
                                                </div>
                                            </li>
                                            <!-- /.item -->
                                            <li class="item">
                                                <div class="product-img">
                                                    <img src="dist/img/default-150x150.png" alt="Product Image"
                                                        class="img-size-50">
                                                </div>
                                                <div class="product-info">
                                                    <a href="javascript:void(0)" class="product-title">
                                                        Xbox One <span class="badge badge-danger float-right">
                                                            $350
                                                        </span>
                                                    </a>
                                                    <span class="product-description">
                                                        Xbox One Console Bundle with Halo Master Chief Collection.
                                                    </span>
                                                </div>
                                            </li>
                                            <!-- /.item -->
                                            <li class="item">
                                                <div class="product-img">
                                                    <img src="dist/img/default-150x150.png" alt="Product Image"
                                                        class="img-size-50">
                                                </div>
                                                <div class="product-info">
                                                    <a href="javascript:void(0)" class="product-title">PlayStation 4
                                                        <span class="badge badge-success float-right">$399</span></a>
                                                    <span class="product-description">
                                                        PlayStation 4 500GB Console (PS4)
                                                    </span>
                                                </div>
                                            </li>
                                            <!-- /.item -->
                                        </ul>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer text-center">
                                        <a href="javascript:void(0)" class="uppercase">View All Products</a>
                                    </div>
                                    <!-- /.card-footer -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.col -->
                    </div>

            </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include 'includes/admin_footer.php' ?>
        </div>
    </body>

</html>