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
                                        <h5>Add Supplier</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?php echo $base_url; ?>supplier/add.php" method="POST">
                                            <div class="mb-3 row">
                                                <label class="form-label col-sm-2 col-form-label">Supplier Name</label>
                                                <div class="col-sm-10">
                                                    <input autocomplete="off" name="supplier_name" type="text" class="form-control" placeholder="Supplier Name" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="form-label col-sm-2 col-form-label">Contact Person</label>
                                                <div class="col-sm-10">
                                                    <input autocomplete="off" name="contact_person" type="text" class="form-control" placeholder="Contact Person">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="form-label col-sm-2 col-form-label">Phone</label>
                                                <div class="col-sm-10">
                                                    <input autocomplete="off" name="phone" type="text" class="form-control" placeholder="Phone">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="form-label col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input autocomplete="off" name="email" type="email" class="form-control" placeholder="Email">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="form-label col-sm-2 col-form-label">Address</label>
                                                <div class="col-sm-10">
                                                    <textarea name="address" class="form-control" rows="2" placeholder="Address"></textarea>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="form-label col-sm-2 col-form-label">City</label>
                                                <div class="col-sm-10">
                                                    <input autocomplete="off" name="city" type="text" class="form-control" placeholder="City">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="form-label col-sm-2 col-form-label">Country</label>
                                                <div class="col-sm-10">
                                                    <input autocomplete="off" name="country" type="text" class="form-control" placeholder="Country">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="form-label col-sm-2 col-form-label">Status</label>
                                                <div class="col-sm-10">
                                                    <select name="status" class="form-select form-control">
                                                        <option value="1">Active</option>
                                                        <option value="2">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="form-label col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Add Supplier</button>
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
