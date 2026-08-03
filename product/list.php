<?php require_once '../component/header.php'; ?>
<?php require_once '../component/sidebar.php'; ?>

    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">

                        <?php
                            // Session message (set by category/add.php, edit.php, delete.php)
                            if(isset($_SESSION['message'])){
                                $msg = $_SESSION['message'];
                                $alert_class = $msg['type'] === 'success' ? 'alert-success' : 'alert-danger';
                                echo '<div class="alert ' . $alert_class . '">
                                        <strong>' . $msg['title'] . '</strong> ' . $msg['message'] . '
                                      </div>';
                                unset($_SESSION['message']);
                            }

                            // Fetch all products, latest first
                            $categories = $crud->common_query('SELECT products.*, categories.name as category_name, suppliers.supplier_name, (select sum(quantity) from stock_transfers WHERE stock_transfers.product_id=products.id) as stock FROM `products` JOIN categories on categories.categories_id=products.category_id JOIN suppliers on suppliers.id=products.supplier_id ');
                        ?>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5>Products</h5>
                                        <a href="<?php echo $base_url; ?>product/create.php" class="btn btn-primary">
                                            <i class="feather icon-plus"></i> Add Product
                                        </a>
                                    </div>
                                    <div class="card-body table-border-style">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Purchase Price</th>
                                                        <th>Selling Price</th>
                                                        <th>Stock</th>
                                                        <th>Added On</th>
                                                        <th class="text-end">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if($categories['status']): ?>
                                                        <?php $sl = 1; foreach($categories['data'] as $cat): ?>
                                                        <tr>
                                                            <td><?php echo $sl++; ?></td>
                                                            <td><?php echo htmlspecialchars($cat->product_name); ?></td>
                                                            <td><?php echo htmlspecialchars($cat->purchase_price); ?></td>
                                                            <td><?php echo htmlspecialchars($cat->selling_price); ?></td>
                                                            <td><?php echo htmlspecialchars($cat->stock); ?></td>
                                                            <td><?php echo htmlspecialchars($cat->created_at); ?></td>
                                                            <td class="text-end">
                                                                <button type="button" class="btn btn-sm btn-warning"
                                                                    data-bs-toggle="modal" data-bs-target="#editCategoryModal"
                                                                    data-id="<?php echo $cat->categories_id; ?>"
                                                                    data-name="<?php echo htmlspecialchars($cat->name); ?>"
                                                                    data-description="<?php echo htmlspecialchars($cat->description); ?>"
                                                                    onclick="fillEditForm(this)">
                                                                    <i class="feather icon-edit"></i>
                                                                </button>
                                                                <a href="delete.php?id=<?php echo $cat->categories_id; ?>"
                                                                    class="btn btn-sm btn-danger"
                                                                    onclick="return confirm('Delete this category?');">
                                                                    <i class="feather icon-trash-2"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <tr><td colspan="5" class="text-center">No categories found.</td></tr>
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

    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="add.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="edit.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit_id">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" id="edit_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" id="edit_description" class="form-control" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Edit button e click korle modal er field gula purano data diye fill kore dey
        function fillEditForm(btn){
            document.getElementById('edit_id').value = btn.getAttribute('data-id');
            document.getElementById('edit_name').value = btn.getAttribute('data-name');
            document.getElementById('edit_description').value = btn.getAttribute('data-description');
        }
    </script>

<?php require_once '../component/footer.php'; ?>
