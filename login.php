<?php require_once 'component/header_auth.php'; ?>
    <div id="pcoded" class="pcoded load-height">
        
        <section class="login-block with-header">
            <!-- Container-fluid starts -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Authentication card start -->
                        <form action="" method="POST" class="md-float-material form-material m-t-40 m-b-40">
                            <div class="auth-box card">
                                <div class="card-body">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <h3 class="text-center txt-primary">Sign In</h3>
                                        </div>
                                    </div>

                                    <div class="mb-3 form-primary">
                                        <input type="text" name="email" class="form-control" required=""
                                            placeholder="Your Email Address">
                                        <span class="form-bar"></span>
                                    </div>
                                    <div class="mb-3 form-primary">
                                        <input type="password" name="password" class="form-control" required=""
                                            placeholder="Password">
                                        <span class="form-bar"></span>
                                    </div>
                                    
                                    
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary btn-md waves-effect text-center m-b-20">
                                                   Login
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p class="text-inverse text-start m-b-0">Thank you.</p>
                                            <p class="text-inverse text-start"><a href="index.html"><b
                                                        class="f-w-600">Back to website</b></a></p>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                            if($_POST){
                                $_POST['password'] = sha1($_POST['password']);

                                // Prepare and execute the SQL statement
                                $rs = $crud->common_query("
                                                    SELECT 
                                                    users.*, roles.role_name, roles.access
                                                    FROM `users`
                                                    join roles on roles.id=users.role_id
                                                    WHERE
                                                    users.email = '{$_POST['email']}'
                                                    AND
                                                    users.password = '{$_POST['password']}'
                                                ");

                                if ($rs['status']) {
                                    // User found, set session variables
                                    $user = $rs['data'][0];
                                    $_SESSION['user_id'] = $user->id; // Store user ID in session
                                    $_SESSION['user_name'] = $user->full_name; // Store user name in session
                                    $_SESSION['user_email'] = $user->email; // Store user email in session
                                    $_SESSION['user_phone'] = $user->phone; // Store user phone in session
                                    $_SESSION['user_role'] = $user->role_name; // Store user role in session
                                    $_SESSION['access'] = $user->access; // Store user access in session
                                    $_SESSION['is_logged_in'] = true; // Set a flag to indicate the user is logged in
                                    // Redirect to dashboard or home page
                                    echo '<script>window.location.href = "dashboard.php";</script>';
                                } else {
                                    echo '<div class="alert alert-danger">Invalid email or password.</div>';
                                }
                            }
                        ?>
                        <!-- Authentication card end -->
                    </div>
                    <!-- end of col-sm-12 -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of container-fluid -->
        </section>
    </div>

<?php require_once 'component/footer.php'; ?>