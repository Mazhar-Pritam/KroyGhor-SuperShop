<?php require_once '../component/header.php'; ?>
<?php require_once '../component/sidebar.php'; ?>

    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Add User</h5>
                                    </div>
                                    <div class="card-body">

                                        <?php
                                            // Session message (set by users/add.php on validation error)
                                            if(isset($_SESSION['message'])){
                                                $msg = $_SESSION['message'];
                                                $alert_class = $msg['type'] === 'success' ? 'alert-success' : 'alert-danger';
                                                echo '<div class="alert ' . $alert_class . '">
                                                        <strong>' . $msg['title'] . '</strong> ' . $msg['message'] . '
                                                      </div>';
                                                unset($_SESSION['message']);
                                            }
                                        ?>

                                        <form action="<?php echo $base_url; ?>users/add.php" method="POST">
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label class="form-label">Role</label>
                                                    <select name="role_id" class="form-select form-control" required>
                                                        <option value="">Select Role</option>
                                                        <?php
                                                            // Fetch all roles for the dropdown
                                                            $roles = $crud->common_select('roles');
                                                            if($roles['status']){
                                                                foreach($roles['data'] as $role){
                                                        ?>
                                                                    <option value="<?php echo $role->id; ?>"><?php echo htmlspecialchars($role->role_name); ?></option>
                                                        <?php   }
                                                            } else { ?>
                                                                <option value="">No roles available</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label class="form-label">Status</label>
                                                    <select name="status" class="form-select form-control" required>
                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label class="form-label">Full Name</label>
                                                    <input autocomplete="off" name="full_name" type="text" class="form-control" placeholder="Full Name" required>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label class="form-label">Phone</label>
                                                    <input autocomplete="off" name="phone" type="text" class="form-control" placeholder="Phone">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label class="form-label">Email</label>
                                                    <input autocomplete="off" name="email" type="email" class="form-control" placeholder="Email" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label class="form-label">Password</label>
                                                    <input autocomplete="off" name="password" type="password" class="form-control" placeholder="Password" required>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label class="form-label">Confirm Password</label>
                                                    <input autocomplete="off" name="confirm_password" type="password" class="form-control" placeholder="Confirm Password" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="form-label col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body end -->
<?php require_once '../component/footer.php'; ?>
