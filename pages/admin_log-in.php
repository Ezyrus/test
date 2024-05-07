<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>System | Log in</title>
        <?php require 'resources.php'; ?>
    </head>

    <body class="hold-transition login-page">

        <div class="login-box">

            <div class="card card-outline card-primary">

                <div class="card-header text-center">
                    <a href="#" class="h1"><b>Admin</b>LogIn</a>
                </div>

                <div class="card-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    <form method="post" id="admin_form">
                        <div class="input-group mb-3">
                            <input type="text" id="admin_username" name="admin_username" class="form-control"
                                placeholder="Username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" id="admin_password" name="admin_password" class="form-control"
                                placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-1">
                 
                            <div class="col">
                                <button type="submit" class="btn btn-outline-primary btn-block">Sign In</button>
                            </div>
                       
                        </div>
                    </form>

                    <p class="mb-0">
                        <a href="#">I forgot my password</a>
                    </p>
                    <p class="mb-0">
                        <a href="../index.php">Visit client page</a>
                    </p>
                </div>
          
            </div>
      
        </div>

    </body>

</html>