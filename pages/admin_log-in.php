<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Your System | Log In</title>
        <?php require 'resources.php'; ?>
    </head>

    <body class="hold-transition login-page">

        <div class="login-box">
            <div class="card card-outline card-success">

                <div class="card-header text-center">
                    <a href="#" class="h1"><b>Your</b>System</a>
                </div>

                <div class="card-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    <form method="post" id="validateForm_adminLogin">
                        <div class="input-group mb-3">
                            <input type="text" id="admin_username" name="admin_username" class="form-control"
                                placeholder="Username" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-solid fa-user text-success"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" id="admin_password" name="admin_password" class="form-control"
                                placeholder="Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock text-success"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-1">

                            <div class="col">
                                <button type="submit" class="btn btn-outline-success btn-block">Sign In</button>
                            </div>

                        </div>
                    </form>

                    <p class="mb-0">
                        <a href="#">I forgot my password</a>
                    </p>
                    <p class="mb-0">
                        <a href="../index.php" class="badge badge-success">Visit Client Page</a>
                    </p>
                </div>

            </div>
        </div>

        <script>
            $('#validateForm_adminLogin').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    url: "../server/admin_validation.php",
                    type: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function (responseData) {
                        if (responseData.status) {
                            toastr.success(responseData.message)

                            $('body').fadeOut(2500, function () {
                                location.replace('dashboard.php');
                            });

                        } else {
                            toastr.error(responseData.message)
                        }
                    },
                    error: function (responseData) {
                        toastr.error("Error occured please contact developers immediately.")
                    }
                })
            })
        </script>
    </body>

</html>