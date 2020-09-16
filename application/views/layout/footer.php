<?php if ($this->router->fetch_class() != 'login') { ?>
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020 Al Shirawi Co. LLC</a>. All rights reserved.</span>
    <!--              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>-->
        </div>
    </footer>
<?php } ?>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
</div>
<script type="text/javascript" src="<?= base_url() ?>public/assets/scripts/main.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<!--<script src="<?= base_url() ?>public/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>-->
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function ($) {
        var url = window.location.href;
        $('.vertical-nav-menu li ul li a[href="' + url + '"]').addClass('mm-active');
        $('.vertical-nav-menu li ul li a[href="' + url + '"]').closest('li').addClass('mm-active');
        $('.table').DataTable();       
    });
    
</script>
</body>
</html>