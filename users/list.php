<?php require_once '../component/header.php'; ?>
<?php require_once '../component/sidebar.php'; ?>

    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">

                        <?php
                            // Session message (set by users/add.php, edit.php, delete.php, status.php)
                            if(isset($_SESSION['message'])){
                                $msg = $_SESSION['message'];
                                $alert_class = $msg['type'] === 'success' ? 'alert-success' : 'alert-danger';
                                echo '<div class="alert ' . $alert_class . '">
                                        <strong>' . $msg['title'] . '</strong> ' . $msg['message'] . '
                                      </div>';
                                unset($_SESSION['message']);
                            }

                            // Fetch all users with their role name, latest first
                            $users = $crud->common_query('SELECT users.*, roles.role_name FROM `users` JOIN roles on roles.id=users.role_id ORDER BY users.id DESC');
                        ?>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5>Users</h5>
                                        <a href="<?php echo $base_url; ?>users/create.php" class="btn btn-primary">
                                            <i class="feather icon-plus"></i> Add User
                                        </a>
                                    </div>
                                    <div class="card-body table-border-style">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>SL</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Role</th>
                                                        <th>Status</th>
                                                        <th class="text-end">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if($users['status']): ?>
                                                        <?php $sl = 1; foreach($users['data'] as $user): ?>
                                                        <tr>
                                                            <td><?php echo $sl++; ?></td>
                                                            <td><?php echo htmlspecialchars($user->full_name); ?></td>
                                                            <td><?php echo htmlspecialchars($user->email); ?></td>
                                                            <td><?php echo htmlspecialchars($user->phone); ?></td>
                                                            <td><?php echo htmlspecialchars($user->role_name); ?></td>
                                                            <td>
                                                                <?php if($user->status == 'Active'): ?>
                                                                    <span class="badge bg-success">Active</span>
                                                                <?php else: ?>
                                                                    <span class="badge bg-danger">Inactive</span>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="text-end">
                                                                <a href="update.php?id=<?php echo $user->id; ?>" class="btn btn-sm btn-warning">
                                                                    <i class="feather icon-edit"></i>
                                                                </a>
                                                                <?php if($user->id != $_SESSION['user_id']): ?>
                                                                    <?php if($user->status == 'Active'): ?>
                                                                        <a href="status.php?id=<?php echo $user->id; ?>&status=Inactive"
                                                                            class="btn btn-sm btn-secondary"
                                                                            onclick="return confirm('Deactivate this user?');">
                                                                            <i class="feather icon-slash"></i>
                                                                        </a>
                                                                    <?php else: ?>
                                                                        <a href="status.php?id=<?php echo $user->id; ?>&status=Active"
                                                                            class="btn btn-sm btn-success"
                                                                            onclick="return confirm('Activate this user?');">
                                                                            <i class="feather icon-check"></i>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                    <a href="delete.php?id=<?php echo $user->id; ?>"
                                                                        class="btn btn-sm btn-danger"
                                                                        onclick="return confirm('Delete this user?');">
                                                                        <i class="feather icon-trash-2"></i>
                                                                    </a>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <tr><td colspan="7" class="text-center">No users found.</td></tr>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once '../component/footer.php'; ?>
