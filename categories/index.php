<?php require_once "../component/header.php"; ?>
<!-- Sidebar Start -->
<?php require_once "../component/sidebar.php"; ?>
<!-- Sidebar End -->
            <!-- Main Content -->
            <div class="main-content">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex align-items-lg-center  flex-column flex-md-row flex-lg-row mt-3">
                            <div class="flex-grow-1">
                                <h3 class="mb-2 text-color-2">Categories</h3>
                            </div>
                            <div class="mt-3 mt-lg-0">
                                <div class="d-flex align-items-center">
                                  <!-- Date Range Button -->
                                  <div class="cursor-pointer bg-white d-flex align-items-center text-color-1 px-3 py-2 rounded-2 text-normal fw-bolder letter-spacing-26 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                      <i class="fa-solid fa-filter me-3"></i>
                                      Filter by
                                    <i class="fa-solid fa-chevron-right ms-3 text-size-sm"></i>
                                    <ul class="dropdown-menu">
                                      <li><a class="dropdown-item" href="#">Newest</a></li>
                                      <li><a class="dropdown-item" href="#">Oldest</a></li>
                                   </ul>
                                  </div>
                                  <!-- Add Category Button -->
                                   <a href="<?= $base_url; ?>categories/create.php" class="cursor-pointer ms-4 bg-white bg-primary text-white d-flex align-items-center px-3 py-2 rounded-2 text-normal fw-bolder letter-spacing-26">
                                      <i class="fa-solid fa-plus me-3"></i>
                                      Add Category
                                   </a>
                                </div>
                            </div>
                        </div><!-- end card header -->
                    </div>
                    <!--end col-->
                </div>
                <div class="mt-4">
                  <div class="card shadow-sm border-0">
                    <div class="card-body p-0">
                        <div class="table-responsive table-rounded-top">
                          <table class="table align-middle">
                            <thead>
                              <tr>
                                <th><input type="checkbox" id="select-all" class="custom-checkbox"></th>
                                <th>Category Name</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th class="text-center"><i class="fas fa-ellipsis-h"></i></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              // Fetch categories from the database
                              if(isset($_GET['page']) && is_numeric($_GET['page'])){
                                  $page = (int)$_GET['page'];
                              } else {
                                  $page = 1;
                              }
                              $limit = 10; // Number of categories per page
                              $offset = ($page - 1) * $limit;
                              $categories = $crud->common_select("categories", "*", [], "LIMIT $limit OFFSET $offset");
                              if ($categories['status'] && !empty($categories['data'])) {
                                foreach ($categories['data'] as $category) {
                              ?>
                                <tr>
                                  <td><input type="checkbox" class="custom-checkbox row-checkbox"></td>
                                  <td><?php echo $category->category_name; ?></td>
                                  <td><?php echo date("d M Y, h:i A", strtotime($category->created_at)); ?></td>
                                  <td><?php echo date("d M Y, h:i A", strtotime($category->updated_at)); ?></td>
                                  <td>
                                    <a onclick="categoryDetails(<?= $category->id ?>)" href="#" class="btn btn-sm btn-info me-2"><i class="fa-solid fa-eye"></i></a>
                                    <a href="<?= $base_url ?>categories/edit.php?id=<?= $category->id ?>" class="btn btn-sm btn-primary mb-2 mb-lg-0 me-0 me-lg-2"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger" onclick="deleteCategory(<?= $category->id ?>)"><i class="fa-solid fa-trash-can"></i></a>
                                  </td>
                                </tr>
                                <?php } } else { ?>
                                <tr>
                                  <td colspan="5" class="text-center py-4">No categories found.</td>
                                </tr>
                                <?php } ?>
                              </tbody>
                          </table>
                        </div>

                <div class="pb-3 ps-3 mt-3 d-flex justify-content-center justify-content-md-between justify-content-lg-between flex-wrap flex-md-nowrap">
                  <nav aria-label="Page navigation" class="mb-3 mb-md-0 mb-lg-0">
                    <ul class="pagination">
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous"><i class="fa-solid fa-chevron-left text-size-12"></i></a>
                      </li>
                      <li class="page-item active"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#"><i class="fas fa-ellipsis-h"></i></a></li>
                      <li class="page-item">
                      <a class="page-link" href="#" aria-label="Next"><i class="fa-solid fa-chevron-right text-size-12"></i></a>
                      </li>
                    </ul>
                  </nav>
                    <div class="d-flex justify-content-end">
                        <div class="page-selector">
                          <span>PAGE</span>
                          <select class="form-select" aria-label="Select page">
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select>
                          <span>OF 1</span>
                        </div>
                    </div>
                </div>
        </div> 
        </div> 
    </div>

         
        <?php require_once "../component/footer.php"; ?>