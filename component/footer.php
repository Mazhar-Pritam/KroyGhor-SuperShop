                </div>
            </div>
        </div>
    </div>

<!-- Required Jquery -->
    <script src="<?= $base_url ?>assets/plugins/jquery/dist/jquery.min.js"></script>
    <script src="<?= $base_url ?>assets/plugins/jquery-ui/dist/jquery-ui.min.js"></script>
    <script src="<?= $base_url ?>assets/plugins/%40popperjs/core/dist/umd/popper.min.js"></script>
    <script src="<?= $base_url ?>assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script src="<?= $base_url ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- Chart js -->
    <script src="<?= $base_url ?>assets/plugins/chart.js/dist/chart.umd.js"></script>
    <!-- amchart js -->
    <script src="<?= $base_url ?>assets/pages/widget/amchart/amcharts.js"></script>
    <script src="<?= $base_url ?>assets/pages/widget/amchart/serial.js"></script>
    <script src="<?= $base_url ?>assets/pages/widget/amchart/light.js"></script>
    <script src="<?= $base_url ?>assets/js/pcoded.min.js"></script>
    <!-- Theme persistence - saves user's dark/light mode preference -->
    <!-- <script src="<?= $base_url ?>assets/js/theme-persistence.html"></script> -->
    <script src="<?= $base_url ?>assets/js/vartical-layout.min.js"></script>
    <script src="<?= $base_url ?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?= $base_url ?>assets/js/script.js"></script>
    <script src="<?= $base_url ?>assets/js/SmoothScroll.js"></script>
    <script src="<?= $base_url ?>assets/pages/dashboard/custom-dashboard.js"></script>
    <script src="<?= $base_url ?>assets/js/bootstrap-growl.min.js"></script>
    <script src="<?= $base_url ?>assets/js/notification.js"></script>

    <script>
        $(document).ready(function() {
            <?php if (isset($_SESSION['notification'])): ?>
                notify('<?= $_SESSION['notification']['message'] ?>', '<?= $_SESSION['notification']['type'] ?>');
                <?php unset($_SESSION['notification']); ?>
            <?php endif; ?>
        });
    </script>
</body>

<!-- Mirrored from demo.dashboardpack.com/adminty-html/pages/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Jul 2026 05:07:08 GMT -->
</html>