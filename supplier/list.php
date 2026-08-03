<?php require_once '../component/header.php'; ?>
<?php require_once '../component/sidebar.php'; ?>

    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">

                        <?php
                            // Session message (set by supplier/add.php, edit.php, delete.php)
                            if(isset($_SESSION['message'])){
                                $msg = $_SESSION['message'];
                                $alert_class = $msg['type'] === 'success' ? 'alert-success' : 'alert-danger';
                                echo '<div class="alert ' . $alert_class . '">
                                        <strong>' . $msg['title'] . '</strong> ' . $msg['message'] . '
                                      </div>';
                                unset($_SESSION['message']);
                            }

                            // Fetch all suppliers, latest first
                            $suppliers = $crud->common_query('SELECT * FROM `suppliers` WHERE deleted_at IS NULL ORDER BY id DESC');
                        ?>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5>Suppliers</h5>
                                        <a href="<?php echo $base_url; ?>supplier/create.php" class="btn btn-primary">
                                            <i class="feather icon-plus"></i> Add Supplier
                                        </a>
                                    </div>
                                    <div class="card-body table-border-style">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Supplier Name</th>
                                                        <th>Contact Person</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th>City</th>
                                                        <th>Country</th>
                                                        <th>Status</th>
                                                        <th class="text-end">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if($suppliers['status']): ?>
                                                        <?php $sl = 1; foreach($suppliers['data'] as $sup): ?>
                                                        <tr>
                                                            <td><?php echo $sl++; ?></td>
                                                            <td><?php echo htmlspecialchars($sup->supplier_name); ?></td>
                                                            <td><?php echo htmlspecialchars($sup->contact_person); ?></td>
                                                            <td><?php echo htmlspecialchars($sup->phone); ?></td>
                                                            <td><?php echo htmlspecialchars($sup->email); ?></td>
                                                            <td><?php echo htmlspecialchars($sup->city); ?></td>
                                                            <td><?php echo htmlspecialchars($sup->country); ?></td>
                                                            <td>
                                                                <?php if($sup->status == 1): ?>
                                                                    <span class="badge bg-success">Active</span>
                                                                <?php else: ?>
                                                                    <span class="badge bg-secondary">Inactive</span>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="text-end">
                                                                <button type="button" class="btn btn-sm btn-warning"
                                                                    data-bs-toggle="modal" data-bs-target="#editSupplierModal"
                                                                    data-id="<?php echo $sup->id; ?>"
                                                                    data-supplier_name="<?php echo htmlspecialchars($sup->supplier_name); ?>"
                                                                    data-contact_person="<?php echo htmlspecialchars($sup->contact_person); ?>"
                                                                    data-phone="<?php echo htmlspecialchars($sup->phone); ?>"
                                                                    data-email="<?php echo htmlspecialchars($sup->email); ?>"
                                                                    data-address="<?php echo htmlspecialchars($sup->address); ?>"
                                                                    data-city="<?php echo htmlspecialchars($sup->city); ?>"
                                                                    data-country="<?php echo htmlspecialchars($sup->country); ?>"
                                                                    data-status="<?php echo $sup->status; ?>"
                                                                    onclick="fillEditForm(this)">
                                                                    <i class="feather icon-edit"></i>
                                                                </button>
                                                                <a href="delete.php?id=<?php echo $sup->id; ?>"
                                                                    class="btn btn-sm btn-danger"
                                                                    onclick="return confirm('Delete this supplier?');">
                                                                    <i class="feather icon-trash-2"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <tr><td colspan="9" class="text-center">No suppliers found.</td></tr>
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

    <!-- Edit Supplier Modal -->
    <div class="modal fade" id="editSupplierModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="edit.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Supplier</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit_id">
                        <div class="mb-3">
                            <label class="form-label">Supplier Name</label>
                            <input type="text" name="supplier_name" id="edit_supplier_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contact Person</label>
                            <input type="text" name="contact_person" id="edit_contact_person" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" id="edit_phone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" id="edit_email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea name="address" id="edit_address" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">City</label>
                            <input type="text" name="city" id="edit_city" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Country</label>
                            <input type="text" name="country" id="edit_country" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" id="edit_status" class="form-select form-control">
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Supplier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Edit button e click korle modal er field gula purano data diye fill kore dey
        function fillEditForm(btn){
            document.getElementById('edit_id').value = btn.getAttribute('data-id');
            document.getElementById('edit_supplier_name').value = btn.getAttribute('data-supplier_name');
            document.getElementById('edit_contact_person').value = btn.getAttribute('data-contact_person');
            document.getElementById('edit_phone').value = btn.getAttribute('data-phone');
            document.getElementById('edit_email').value = btn.getAttribute('data-email');
            document.getElementById('edit_address').value = btn.getAttribute('data-address');
            document.getElementById('edit_city').value = btn.getAttribute('data-city');
            document.getElementById('edit_country').value = btn.getAttribute('data-country');
            document.getElementById('edit_status').value = btn.getAttribute('data-status');
        }
    </script>

<?php require_once '../component/footer.php'; ?>
