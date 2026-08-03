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
                                            <h3 class="text-center txt-primary">Sign up</h3>
                                        </div>
                                    </div>
                                    <div class="mb-3 form-primary">
                                        <input type="text" name="full_name" class="form-control" required=""
                                            placeholder="Full Name">
                                        <span class="form-bar"></span>
                                    </div>
                                    
                                    <div class="mb-3 form-primary">
                                        <input type="text" name="phone" class="form-control" required=""
                                            placeholder="Phone Number">
                                        <span class="form-bar"></span>
                                    </div>
                                    
                                    <div class="mb-3 form-primary">
                                        <input type="text" name="email" class="form-control" required=""
                                            placeholder="Your Email Address">
                                        <span class="form-bar"></span>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-sm-6">
                                            <div class="form-primary">
                                                <input type="password" name="password" class="form-control" required=""
                                                    placeholder="Password">
                                                <span class="form-bar"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-primary">
                                                <input type="password" name="confirm-password" class="form-control"
                                                    required="" placeholder="Confirm Password">
                                                <span class="form-bar"></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary btn-md waves-effect text-center m-b-20">
                                                    Sign up now
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
                                
                                if($_POST['password'] !== $_POST['confirm-password']){
                                    echo "<script>alert('Password and Confirm Password do not match.');</script>";
                                    return;
                                } 

                                $_POST['password'] = sha1($_POST['password']);
                                unset($_POST['confirm-password']);


                                $result = $crud->common_insert('users', $_POST);
                                if($result['status']){

                                    $_SESSION['message'] = array(
                                        "type" => "success",
                                        "title" => "Success",
                                        "message" => "User registered successfully."
                                    );

                                    echo "<script>window.location='login.php'</script>";
                                }else{
                                    echo "<script>alert('Error: " . $result['message'] . "');</script>";
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