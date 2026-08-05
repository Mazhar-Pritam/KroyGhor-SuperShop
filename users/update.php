<?php require_once '../component/header.php'; ?>
<?php require_once '../component/sidebar.php'; ?>
<?php
    $id = $_GET['id'];
    $result = $crud->common_select('users', '*', ['id' => $id]);
    $user = $result['data'][0];
?>
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Edit User</h5>
                                    </div>
                                    <div class="card-body">

                                        <?php
                                            // Session message (set by users/edit.php on validation error)
                                            if(isset($_SESSION['message'])){
                                                $msg = $_SESSION['message'];
                                                $alert_class = $msg['type'] === 'success' ? 'alert-success' : 'alert-danger';
                                                echo '<div class="alert ' . $alert_class . '">
                                                        <strong>' . $msg['title'] . '</strong> ' . $msg['message'] . '
                                                      </div>';
                                                unset($_SESSION['message']);
                                            }
                                        ?>

                                        <form action="<?php echo $base_url; ?>users/edit.php?id=<?php echo $id; ?>" method="POST">
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
                                                                    <option value="<?php echo $role->id; ?>" <?php echo ($role->id == $user->role_id) ? 'selected' : ''; ?>><?php echo htmlspecialchars($role->role_name); ?></option>
                                                        <?php   }
                                                            } else { ?>
                                                                <option value="">No roles available</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label class="form-label">Status</label>
                                                    <select name="status" class="form-select form-control" required <?php echo ($user->id == $_SESSION['user_id']) ? 'disabled' : ''; ?>>
                                                        <option value="Active" <?php echo ($user->status == 'Active') ? 'selected' : ''; ?>>Active</option>
                                                        <option value="Inactive" <?php echo ($user->status == 'Inactive') ? 'selected' : ''; ?>>Inactive</option>
                                                    </select>
                                                    <?php if($user->id == $_SESSION['user_id']): ?>
                                                        <input type="hidden" name="status" value="<?php echo htmlspecialchars($user->status); ?>">
                                                        <small class="text-muted">You cannot change your own status.</small>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label class="form-label">Full Name</label>
                                                    <input autocomplete="off" value="<?php echo htmlspecialchars($user->full_name); ?>" name="full_name" type="text" class="form-control" placeholder="Full Name" required>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label class="form-label">Phone</label>
                                                    <input autocomplete="off" value="<?php echo htmlspecialchars($user->phone); ?>" name="phone" type="text" class="form-control" placeholder="Phone">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label class="form-label">Email</label>
                                                    <input autocomplete="off" value="<?php echo htmlspecialchars($user->email); ?>" name="email" type="email" class="form-control" placeholder="Email" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label class="form-label">New Password</label>
                                                    <input autocomplete="off" name="password" type="password" class="form-control" placeholder="Leave blank to keep current password">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label class="form-label">Confirm New Password</label>
                                                    <input autocomplete="off" name="confirm_password" type="password" class="form-control" placeholder="Confirm New Password">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="form-label col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Update</button>
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
