<?php require_once '../component/header.php'; ?>
<?php require_once '../component/sidebar.php'; ?>


    <!-- SELECT ``, ``, `supplier_id`, ``, ``, `purchase_price`, `selling_price`, `stock`, ``, `barcode`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by` FROM `products` WHERE 1 -->
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Add Product</h5> 
                                    </div>
                                    <div class="card-body">
                                        <form action="<?php echo $base_url; ?>product/add.php" method="POST">
                                            <div class="mb-3 row">
                                                <label class="form-label col-sm-2 col-form-label">Product Name</label>
                                                <div class="col-sm-10">
                                                    <input autocomplete="off" name="product_name" type="text" class="form-control" placeholder="Product Name">
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3 row">
                                                <label class="form-label col-sm-2 col-form-label">Category</label>
                                                <div class="col-sm-10">
                                                    <select name="category_id" class="form-select form-control">
                                                        <option value="">Select Category</option>
                                                        <?php
                                                            // Fetch all categories for the dropdown
                                                            $categories = $crud->common_select('categories');
                                                            if($categories['status']){
                                                                foreach($categories['data'] as $cat){
                                                        ?>
                                                                    <option value="<?php echo $cat->categories_id; ?>"><?php echo htmlspecialchars($cat->name); ?></option>
                                                        <?php   }
                                                            } else { ?>
                                                                <option value="">No categories available</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="form-label col-sm-2 col-form-label">Supplier</label>
                                                <div class="col-sm-10">
                                                    <select name="supplier_id" class="form-select form-control">
                                                        <option value="">Select Supplier</option>
                                                        <?php
                                                            // Fetch all suppliers for the dropdown
                                                            $suppliers = $crud->common_select('suppliers');
                                                            if($suppliers['status']){
                                                                foreach($suppliers['data'] as $supplier){
                                                        ?>
                                                                    <option value="<?php echo $supplier->suppliers_id; ?>"><?php echo htmlspecialchars($supplier->supplier_name); ?></option>
                                                        <?php   }
                                                            } else { ?>
                                                                <option value="">No suppliers available</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="form-label col-sm-2 col-form-label">Brand</label>
                                                <div class="col-sm-10">
                                                    <input autocomplete="off" name="brand" type="text" class="form-control" placeholder="Brand">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="form-label col-sm-2 col-form-label">Purchase Price</label>
                                                <div class="col-sm-10">
                                                    <input autocomplete="off" name="purchase_price" type="text" class="form-control" placeholder="Purchase Price">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="form-label col-sm-2 col-form-label">Selling Price</label>
                                                <div class="col-sm-10">
                                                    <input autocomplete="off" name="selling_price" type="text" class="form-control" placeholder="Selling Price">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="form-label col-sm-2 col-form-label">Barcode</label>
                                                <div class="col-sm-10">
                                                    <input autocomplete="off" name="barcode" type="text" class="form-control" placeholder="Barcode">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="form-label col-sm-2 col-form-label">Opening Stock</label>
                                                <div class="col-sm-10">
                                                    <input autocomplete="off" name="opening_stock" type="text" class="form-control" placeholder="Opening Stock">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="form-label col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Add Product</button>
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
