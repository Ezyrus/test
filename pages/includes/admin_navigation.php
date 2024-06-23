<!-- Header Navigation Bar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="../index.php" class="nav-link">Visit Landing Page</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Time: <span id="currentTime"></span></a>
        </li>
    </ul>

    <!-- Right links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>

<!-- Main Sidebar  -->
<aside class="main-sidebar sidebar-dark-primary elevation-3">
    <a href="#" class="brand-link">
        <img src="./../assets/img/yourdevlogo.png" alt="YourDev Logo" class="brand-image elevation-3">
        <span class="brand-text font-weight-medium">Your System</span>
    </a>


    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="./../assets/img/<?php echo $_SESSION["adminLogged"]["picture"]; ?>"
                    class="img-circle elevation-2" alt="Admin Image">
            </div>
            <div class="info">
                <a href="#" class="d-block text-capitalize font-weight-medium">
                    ADMIN
                    <span id="adminLoggedId" data-id="<?php echo $_SESSION["adminLogged"]["admin_id"]; ?>">
                        <?php echo $_SESSION["adminLogged"]["admin_id"]; ?>
                    </span> | <?php echo $_SESSION["adminLogged"]["username"]; ?>
                </a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="dashboard.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header">Manage Client Page</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-table-list"></i>
                        <p>
                            Services
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-clipboard-question"></i>
                        <p>
                            F.A.Q
                        </p>
                    </a>
                </li>
                <li class="nav-header">System</li>
                <li class="nav-item">
                    <a href="system_admins.php" class="nav-link">
                        <i class="nav-icon fa-solid fa-user"></i>
                        <p>Administrators <span class="badge badge-success right">1</span></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="admin_sessions.php" class="nav-link">
                        <i class="nav-icon fa-solid fa-user-clock"></i>
                        <p>Admin Sessions <span class="badge badge-warning right">0</span></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="system_logs.php" class="nav-link">
                        <i class="nav-icon fa-solid fa-clock-rotate-left"></i>
                        <p>Logs <span class="badge badge-success right">1</span></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-gears"></i>
                        <p>Settings</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../server/admin_logout.php" class="nav-link">
                        <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                        <p>Logout <span class="badge badge-success right">1</span></p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>