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

                                    <div class="card-body">
                                        <table id="table_systemAdmins" class="table responsive">
                                            <thead>
                                                <tr>
                                                    <th>Admin ID</th>
                                                    <th>Picture</th>
                                                    <th>Full Name</th>
                                                    <th>Type</th>
                                                    <th>Username</th>
                                                    <th>Active</th>
                                                    <th>Added By</th>
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
                                                            <?php echo $row['picture']; ?>
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
                                                            <div class="btn-group" role="group"
                                                                aria-label="System Administrator Actions">
                                                                <button type="button" class="btn bg-green"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#readModal_systemAdministrator"
                                                                    data-id="<?php echo $row['id']; ?>"
                                                                    data-role="readBtn_systemAdministrator">
                                                                    <i class="fa-solid fa-eye fa-xl"
                                                                        style="color: white;"></i>
                                                                </button>

                                                                <button type="button" class="btn bg-blue"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#updateModal_systemAdministrator"
                                                                    data-id="<?php echo $row['id']; ?>"
                                                                    data-role="updateBtn_systemAdministrator">
                                                                    <i class="fa-solid fa-pen-to-square fa-xl"
                                                                        style="color: white;"></i>
                                                                </button>

                                                                <button type="button" class="btn bg-red"
                                                                    data-id="<?php echo $row['admin_id']; ?>"
                                                                    data-role="deleteBtn_systemAdministrator">
                                                                    <i class="fa-solid fa-trash fa-xl"
                                                                        style="color: white;"></i>
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
                                        name="createPicture_systemAdmin">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col">
                                    <label for="createFullName_systemAdmin">Full Name</label>
                                    <input type="text" class="form-control" id="createFullName_systemAdmin"
                                        name="createFullName_systemAdmin" placeholder="Full Name">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col">
                                    <label for="createUsername_systemAdmin">Username:</label>
                                    <input type="text" class="form-control" id="createUsername_systemAdmin"
                                        name="createUsername_systemAdmin" placeholder="Username">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="createPassword_systemAdmin">Password</label>
                                    <input type="password" class="form-control" id="createPassword_systemAdmin"
                                        name="createPassword_systemAdmin" placeholder="Password">
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
                                        <span class="d-inline-block " tabindex="0"
                                            data-toggle="tooltip" title="Admin's system access type">
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

        <script>
            $(document).ready(function () {
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

                $("#togglePassword").on("change", function () {
                    var passwordField = $("#createPassword_systemAdmin");
                    var isChecked = $(this).is(":checked");
                    passwordField.attr("type", isChecked ? "text" : "password");
                });
            });

            $("#createForm_systemAdmin").on("submit", function (e) {
                e.preventDefault();
                $.ajax({
                    // data: $(this).serialize(),
                    // contentType: "application/x-www-form-urlencoded; charset=UTF-8", //default
                    // processData: true, //default

                    // data: new FormData(this), //multipart/form-data
                    // contentType: false,
                    // processData: false,
                    type: "POST",
                    url: "../server/create_admin.php",
                    dataType: "json",
                    headers: {
                        "Authorization": "Bearer token"
                    },
                    statusCode: {
                        404: function () {
                            toastr.error("Status 404: URL Not Found")
                        },
                        500: function () {
                            toastr.error("Status 500: Server Error")
                        }
                    },
                    success: function (responseData) {
                        toastr.success("Response: " + responseData.message)
                    },
                    error: function (xhr, status, error) {
                        console.error("Xhr: ", xhr);
                        console.error("Status: ", status); //"error", "abort", "timeout"
                        console.error("Error: ", error);

                        toastr.error("Error occured: " + error)
                    }
                })
            })

        </script>

    </body>

</html>