<?php require_once '../component/header.php'; ?>
<?php require_once '../component/sidebar.php'; ?>

    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">

                        <?php
                            // Session message (set by customer/add.php, edit.php, delete.php)
                            if(isset($_SESSION['message'])){
                                $msg = $_SESSION['message'];
                                $alert_class = $msg['type'] === 'success' ? 'alert-success' : 'alert-danger';
                                echo '<div class="alert ' . $alert_class . '">
                                        <strong>' . $msg['title'] . '</strong> ' . $msg['message'] . '
                                      </div>';
                                unset($_SESSION['message']);
                            }

                            // Fetch all customers, latest first
                            $customers = $crud->common_select('customers', "*", [], "AND", "customer_id", "DESC");
                        ?>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5>Customers</h5>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCustomerModal">
                                            <i class="feather icon-plus"></i> Add Customer
                                        </button>
                                    </div>
                                    <div class="card-body table-border-style">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Gender</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th>Address</th>
                                                        <th>Membership</th>
                                                        <th>Added On</th>
                                                        <th class="text-end">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if($customers['status']): ?>
                                                        <?php $sl = 1; foreach($customers['data'] as $c): ?>
                                                        <tr>
                                                            <td><?php echo $sl++; ?></td>
                                                            <td><?php echo htmlspecialchars($c->name); ?></td>
                                                            <td><?php echo htmlspecialchars($c->gender); ?></td>
                                                            <td><?php echo htmlspecialchars($c->phone); ?></td>
                                                            <td><?php echo htmlspecialchars($c->email); ?></td>
                                                            <td><?php echo htmlspecialchars($c->address); ?></td>
                                                            <td><?php echo htmlspecialchars($c->membership_type); ?></td>
                                                            <td><?php echo htmlspecialchars($c->created_at); ?></td>
                                                            <td class="text-end">
                                                                <button type="button" class="btn btn-sm btn-warning"
                                                                    data-bs-toggle="modal" data-bs-target="#editCustomerModal"
                                                                    data-id="<?php echo $c->customer_id; ?>"
                                                                    data-name="<?php echo htmlspecialchars($c->name); ?>"
                                                                    data-gender="<?php echo htmlspecialchars($c->gender); ?>"
                                                                    data-phone="<?php echo htmlspecialchars($c->phone); ?>"
                                                                    data-email="<?php echo htmlspecialchars($c->email); ?>"
                                                                    data-address="<?php echo htmlspecialchars($c->address); ?>"
                                                                    data-membership="<?php echo htmlspecialchars($c->membership_type); ?>"
                                                                    onclick="fillEditForm(this)">
                                                                    <i class="feather icon-edit"></i>
                                                                </button>
                                                                <a href="delete.php?id=<?php echo $c->customer_id; ?>"
                                                                    class="btn btn-sm btn-danger"
                                                                    onclick="return confirm('Delete this customer?');">
                                                                    <i class="feather icon-trash-2"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <tr><td colspan="9" class="text-center">No customers found.</td></tr>
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

    <!-- Add Customer Modal -->
    <div class="modal fade" id="addCustomerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="add.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Customer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <select name="gender" class="form-control">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Membership Type</label>
                            <input type="text" name="membership_type" class="form-control" placeholder="e.g. Regular, VIP">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Customer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Customer Modal -->
    <div class="modal fade" id="editCustomerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="edit.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Customer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit_id">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" id="edit_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <select name="gender" id="edit_gender" class="form-control">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" id="edit_phone" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" id="edit_email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" id="edit_address" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Membership Type</label>
                            <input type="text" name="membership_type" id="edit_membership" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Customer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function fillEditForm(btn){
            document.getElementById('edit_id').value = btn.getAttribute('data-id');
            document.getElementById('edit_name').value = btn.getAttribute('data-name');
            document.getElementById('edit_gender').value = btn.getAttribute('data-gender');
            document.getElementById('edit_phone').value = btn.getAttribute('data-phone');
            document.getElementById('edit_email').value = btn.getAttribute('data-email');
            document.getElementById('edit_address').value = btn.getAttribute('data-address');
            document.getElementById('edit_membership').value = btn.getAttribute('data-membership');
        }
    </script>

<?php require_once '../component/footer.php'; ?>
