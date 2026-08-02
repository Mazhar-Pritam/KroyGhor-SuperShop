<?php require_once '../component/header.php'; ?>
<?php require_once '../component/sidebar.php'; ?>

    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">

                        <?php
                            // Session message (set by product/add.php, edit.php, delete.php)
                            if(isset($_SESSION['message'])){
                                $msg = $_SESSION['message'];
                                $alert_class = $msg['type'] === 'success' ? 'alert-success' : 'alert-danger';
                                echo '<div class="alert ' . $alert_class . '">
                                        <strong>' . $msg['title'] . '</strong> ' . $msg['message'] . '
                                      </div>';
                                unset($_SESSION['message']);
                            }

                            // Fetch all products, latest first
                            $products = $crud->common_select('products', "*", [], "AND", "product_id", "DESC");
                        ?>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5>Products</h5>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                                            <i class="feather icon-plus"></i> Add Product
                                        </button>
                                    </div>
                                    <div class="card-body table-border-style">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Brand</th>
                                                        <th>Purchase Price</th>
                                                        <th>Selling Price</th>
                                                        <th>Stock</th>
                                                        <th>Expiry Date</th>
                                                        <th>Barcode</th>
                                                        <th class="text-end">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if($products['status']): ?>
                                                        <?php $sl = 1; foreach($products['data'] as $p): ?>
                                                        <tr>
                                                            <td><?php echo $sl++; ?></td>
                                                            <td><?php echo htmlspecialchars($p->product_name); ?></td>
                                                            <td><?php echo htmlspecialchars($p->brand); ?></td>
                                                            <td><?php echo htmlspecialchars($p->purchase_price); ?></td>
                                                            <td><?php echo htmlspecialchars($p->selling_price); ?></td>
                                                            <td><?php echo htmlspecialchars($p->stock); ?></td>
                                                            <td><?php echo htmlspecialchars($p->expiry_date); ?></td>
                                                            <td><?php echo htmlspecialchars($p->barcode); ?></td>
                                                            <td class="text-end">
                                                                <button type="button" class="btn btn-sm btn-warning"
                                                                    data-bs-toggle="modal" data-bs-target="#editProductModal"
                                                                    data-id="<?php echo $p->product_id; ?>"
                                                                    data-category="<?php echo htmlspecialchars($p->category_id); ?>"
                                                                    data-supplier="<?php echo htmlspecialchars($p->supplier_id); ?>"
                                                                    data-name="<?php echo htmlspecialchars($p->product_name); ?>"
                                                                    data-brand="<?php echo htmlspecialchars($p->brand); ?>"
                                                                    data-purchase="<?php echo htmlspecialchars($p->purchase_price); ?>"
                                                                    data-selling="<?php echo htmlspecialchars($p->selling_price); ?>"
                                                                    data-stock="<?php echo htmlspecialchars($p->stock); ?>"
                                                                    data-expiry="<?php echo htmlspecialchars($p->expiry_date); ?>"
                                                                    data-barcode="<?php echo htmlspecialchars($p->barcode); ?>"
                                                                    onclick="fillEditForm(this)">
                                                                    <i class="feather icon-edit"></i>
                                                                </button>
                                                                <a href="delete.php?id=<?php echo $p->product_id; ?>"
                                                                    class="btn btn-sm btn-danger"
                                                                    onclick="return confirm('Delete this product?');">
                                                                    <i class="feather icon-trash-2"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <tr><td colspan="9" class="text-center">No products found.</td></tr>
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

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="add.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" name="product_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Brand</label>
                            <input type="text" name="brand" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category ID</label>
                            <input type="number" name="category_id" class="form-control" placeholder="Category table na hole thak khali">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Supplier ID</label>
                            <input type="number" name="supplier_id" class="form-control" placeholder="Supplier table na hole thak khali">
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-6">
                                <label class="form-label">Purchase Price</label>
                                <input type="number" step="0.01" name="purchase_price" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Selling Price</label>
                                <input type="number" step="0.01" name="selling_price" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-6">
                                <label class="form-label">Stock</label>
                                <input type="number" name="stock" class="form-control" value="0">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Expiry Date</label>
                                <input type="date" name="expiry_date" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Barcode</label>
                            <input type="text" name="barcode" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div class="modal fade" id="editProductModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="edit.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit_id">
                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" name="product_name" id="edit_product_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Brand</label>
                            <input type="text" name="brand" id="edit_brand" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category ID</label>
                            <input type="number" name="category_id" id="edit_category" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Supplier ID</label>
                            <input type="number" name="supplier_id" id="edit_supplier" class="form-control">
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-6">
                                <label class="form-label">Purchase Price</label>
                                <input type="number" step="0.01" name="purchase_price" id="edit_purchase" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Selling Price</label>
                                <input type="number" step="0.01" name="selling_price" id="edit_selling" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-6">
                                <label class="form-label">Stock</label>
                                <input type="number" name="stock" id="edit_stock" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Expiry Date</label>
                                <input type="date" name="expiry_date" id="edit_expiry" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Barcode</label>
                            <input type="text" name="barcode" id="edit_barcode" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Edit button e click korle modal er field gula purano data diye fill kore dey
        function fillEditForm(btn){
            document.getElementById('edit_id').value = btn.getAttribute('data-id');
            document.getElementById('edit_category').value = btn.getAttribute('data-category');
            document.getElementById('edit_supplier').value = btn.getAttribute('data-supplier');
            document.getElementById('edit_product_name').value = btn.getAttribute('data-name');
            document.getElementById('edit_brand').value = btn.getAttribute('data-brand');
            document.getElementById('edit_purchase').value = btn.getAttribute('data-purchase');
            document.getElementById('edit_selling').value = btn.getAttribute('data-selling');
            document.getElementById('edit_stock').value = btn.getAttribute('data-stock');
            document.getElementById('edit_expiry').value = btn.getAttribute('data-expiry');
            document.getElementById('edit_barcode').value = btn.getAttribute('data-barcode');
        }
    </script>

<?php require_once '../component/footer.php'; ?>
