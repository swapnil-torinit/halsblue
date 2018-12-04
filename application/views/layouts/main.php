<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="<?php echo site_url('resources/img/favicon.ico') ?>" type="image/x-icon">
<link rel="icon" href="<?php echo site_url('resources/img/favicon.ico') ?>" type="image/x-icon">

<title><?php echo isset($ptitle) ? $ptitle : 'Dashboard - Hals.Blue'; ?></title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css'); ?>">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo site_url('resources/css/font-awesome.min.css'); ?>">
<!-- Ionicons -->
<link rel="stylesheet" href="<?php echo site_url('resources/ionicons.min.css'); ?>">

<!-- Datetimepicker -->
<link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap-datetimepicker.min.css'); ?>">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo site_url('resources/css/AdminLTE.min.css'); ?>">
<!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?php echo site_url('resources/css/_all-skins.min.css'); ?>">
<link rel="stylesheet" href="<?php // echo site_url('resources/css/jquery.dataTables.min.css');?>">
    <link rel="stylesheet" href="<?php echo 'https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css'; ?>">

<link rel="stylesheet" href="<?php echo site_url('resources/css/custom.css'); ?>">
<link href="<?php echo site_url('resources/css/select2.min.css'); ?>" rel="stylesheet" />
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">HalsBlue</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><img src="<?php echo base_url(); ?>resources/img/logo.jpg" width="100px"></span> </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="<?php echo site_url('resources/img/noavatar.png'); ?>" class="user-image" alt="User Image"> <span class="hidden-xs"><?php echo strtoupper($this->session->userdata('username')); ?></span> </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header"> <img src="<?php echo site_url('resources/img/noavatar.png'); ?>" class="img-circle" alt="User Image">
                <p> Welcome, <?php echo strtoupper($this->session->userdata('username')); ?> </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left"> <a href="<?=base_url()?>admin/edit/<?=$this->session->userdata('id');?>" class="btn btn-default btn-flat">Profile</a> </div>
                <div class="pull-right"> <a href="<?=base_url()?>admin/logout" class="btn btn-default btn-flat">Sign out</a> </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
<?php
$method     = $this->router->method;
$get_id     = $this->uri->segment(3);
$uri_string = $this->router->uri->uri_string;
// echo $uri_string ;
//print_r($this->router->uri->uri_string);
?>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php echo ($method == 'index') ? 'active' : ''; ?>"> <a href="<?php echo site_url(); ?>"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> </a> </li>


        <li class="<?php echo ($uri_string == 'invoice/add' || $uri_string == 'invoice/index') ? 'active' : ''; ?>"> <a href="#"> <i class="fa fa-file-text-o"></i> <span>Invoice</span> </a>
          <ul class="treeview-menu">
            <li class="<?php echo ($uri_string == 'invoice/add') ? 'active' : ''; ?>"> <a href="<?php echo site_url('invoice/add'); ?>"><i class="fa fa-plus"></i> Add Invoice</a> </li>
            <li class="<?php echo ($uri_string == 'invoice/index') ? 'active' : ''; ?>"> <a href="<?php echo site_url('invoice/index'); ?>"><i class="fa fa-list-ul"></i> Listing</a> </li>
          </ul>
        </li>



        <li class="<?php echo ($uri_string == 'product/add' || $uri_string == 'product/index' || $uri_string == 'car_make/add' || $uri_string == 'car_make/index' || $uri_string == 'carmodel/add' || $uri_string == 'carmodel/index' || $uri_string == 'variations/add'
    || $uri_string == 'variations/index' || $uri_string == 'brand/index' || $uri_string == 'category/add' || $uri_string == 'category/index' || $uri_string == 'brand/add') ? 'active' : ''; ?>"> <a href="#"> <i class="fa fa-car"></i> <span>Products</span> </a>
          <ul class="treeview-menu">
            <li class="<?php echo ($uri_string == 'product/add') ? 'active' : ''; ?>"> <a href="<?php echo site_url('product/add'); ?>"><i class="fa fa-plus"></i> Add Product</a> </li>
            <li class="<?php echo ($uri_string == 'product/index') ? 'active' : ''; ?>"> <a href="<?php echo site_url('product/index'); ?>"><i class="fa fa-list-ul"></i> Listing</a> </li>
            <li class="<?php echo ($uri_string == 'car_make/add' || $uri_string == 'car_make/index') ? 'active' : ''; ?>"> <a href="#"> <i class="fa fa-desktop"></i> <span>Car make</span> </a>
              <ul class="treeview-menu">
                <li class="<?php echo ($uri_string == 'car_make/add') ? 'active' : ''; ?>"> <a href="<?php echo site_url('car_make/add'); ?>"><i class="fa fa-plus"></i> Add</a> </li>
                <li class="<?php echo ($uri_string == 'car_make/index') ? 'active' : ''; ?>"> <a href="<?php echo site_url('car_make/index'); ?>"><i class="fa fa-list-ul"></i> Listing</a> </li>
              </ul>
            </li>
            <li class="<?php echo ($uri_string == 'carmodel/add' || $uri_string == 'carmodel/index') ? 'active' : ''; ?>"> <a href="#"> <i class="fa fa-desktop"></i> <span>Car model</span> </a>
              <ul class="treeview-menu">
                <li class="<?php echo ($uri_string == 'carmodel/add') ? 'active' : ''; ?>"> <a href="<?php echo site_url('carmodel/add'); ?>"><i class="fa fa-plus"></i> Add</a> </li>
                <li class="<?php echo ($uri_string == 'carmodel/index') ? 'active' : ''; ?>"> <a href="<?php echo site_url('carmodel/index'); ?>"><i class="fa fa-list-ul"></i> Listing</a> </li>
              </ul>
            </li>
            <li class="<?php echo ($uri_string == 'variations/add' || $uri_string == 'variations/index') ? 'active' : ''; ?>"> <a href="#"> <i class="fa fa-desktop"></i> <span>Variations</span> </a>
              <ul class="treeview-menu">
                <li class="<?php echo ($uri_string == 'variations/add') ? 'active' : ''; ?>"> <a href="<?php echo site_url('variations/add'); ?>"><i class="fa fa-plus"></i> Add Variations</a> </li>
                <li class="<?php echo ($uri_string == 'variations/index') ? 'active' : ''; ?>"> <a href="<?php echo site_url('variations/index'); ?>"><i class="fa fa-list-ul"></i> Listing</a> </li>
              </ul>
            </li>


            <li class="<?php echo ($uri_string == 'category/add' || $uri_string == 'category/index') ? 'active' : ''; ?>"> <a href="#"> <i class="fa fa-desktop"></i> <span>Category</span> </a>
              <ul class="treeview-menu">
                <li class="<?php echo ($uri_string == 'category/add') ? 'active' : ''; ?>"> <a href="<?php echo site_url('category/add'); ?>"><i class="fa fa-plus"></i> Add</a> </li>
                <li class="<?php echo ($uri_string == 'category/index') ? 'active' : ''; ?>"> <a href="<?php echo site_url('category/index'); ?>"><i class="fa fa-list-ul"></i> Listing</a> </li>
              </ul>
            </li>
            <li class="<?php echo ($uri_string == 'brand/add' || $uri_string == 'brand/index') ? 'active' : ''; ?>"> <a href="#"> <i class="fa fa-desktop"></i> <span>Brand</span> </a>
              <ul class="treeview-menu">
                <li class="<?php echo ($uri_string == 'brand/add') ? 'active' : ''; ?>"> <a href="<?php echo site_url('brand/add'); ?>"><i class="fa fa-plus"></i> Add</a> </li>
                <li class="<?php echo ($uri_string == 'brand/index') ? 'active' : ''; ?>"> <a href="<?php echo site_url('brand/index'); ?>"><i class="fa fa-list-ul"></i> Listing</a> </li>
              </ul>
            </li>
          </ul>
        </li>

        <li class="<?php echo ($uri_string == 'stock/modify' || $uri_string == 'stock/showlogall' || $uri_string == 'stock/import') ? 'active' : ''; ?>"> <a href="#"> <i class="fa fa-scribd"></i> <span>Inventory/Stock</span> </a>
          <ul class="treeview-menu">
              <li class="<?php echo ($uri_string == 'stock/modify') ? 'active' : ''; ?>"> <a href="<?php echo site_url('stock/modify'); ?>"><i class="fa fa-list-ul"></i>Modify Stock</a> </li>
              <li class="<?php echo ($uri_string == 'stock/showlogall') ? 'active' : ''; ?>"> <a href="<?php echo site_url('stock/showlogall'); ?>"><i class="fa fa-list-ul"></i>Stock Log</a> </li>
              <li class="<?php echo ($uri_string == 'stock/import') ? 'active' : ''; ?>"> <a href="<?php echo site_url('stock/import'); ?>"><i class="fa fa-list-ul"></i> Import Export</a> </li>
          </ul>
        </li>

        <li class="<?php echo ($uri_string == 'customer/add' || $uri_string == 'customer/index') ? 'active' : ''; ?>"> <a href="#"> <i class="fa fa-user-circle-o"></i> <span>Customer</span> </a>
          <ul class="treeview-menu">
            <li class="<?php echo ($uri_string == 'customer/add') ? 'active' : ''; ?>"> <a href="<?php echo site_url('customer/add'); ?>"><i class="fa fa-plus"></i> Add Customer</a> </li>
            <li class="<?php echo ($uri_string == 'customer/index') ? 'active' : ''; ?>"> <a href="<?php echo site_url('customer/index'); ?>"><i class="fa fa-list-ul"></i> Listing</a> </li>
          </ul>
        </li>

        <li class="<?php echo ($uri_string == 'order_detail/index' || $uri_string == 'order_detail/online_orders') ? 'active' : ''; ?>"> <a href="#"> <i class="fa fa-file-image-o"></i> <span>Order Details</span> </a>
          <ul class="treeview-menu">
            <li class="<?php echo ($uri_string == 'order_detail/index') ? 'active' : ''; ?>"> <a href="<?php echo site_url('order_detail/index'); ?>"><i class="fa fa-list-ul"></i> Listing</a> </li>
             <li class="<?php echo ($uri_string == 'order_detail/online_orders') ? 'active' : ''; ?>"> <a href="#"><i class="fa fa-list-ul"></i>Online Order Listing</a> </li>
          </ul>
        </li>

        <li class="<?php echo ($uri_string == 'user_role/add' || $uri_string == 'user_role/index' || $uri_string == 'tax_clas/add' || $uri_string == 'tax_clas/index' || $uri_string == 'state/add' || $uri_string == 'state/index' || $uri_string == 'state/addcity' || $uri_string == 'state/cities' || $uri_string == 'admin/add' || $uri_string == 'admin/index' || $uri_string == 'state/add' || $uri_string == 'state/index' || $uri_string == 'brand/add' || $uri_string == 'brand/index') ? 'active' : ''; ?>"> <a href="#"> <i class="fa fa-table"></i> <span>Masters</span> <i class="fa fa-angle-left pull-right"></i> </a>
          <ul class="treeview-menu">
              <li class="<?php echo ($uri_string == 'user_role/add' || $uri_string == 'user_role/index') ? 'active' : ''; ?>"><a href="#"><i class="fa fa-circle-o"></i>Users Roles<i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  <li class="<?php echo ($uri_string == 'user_role/add') ? 'active' : ''; ?>"> <a href="<?php echo site_url('user_role/add'); ?>"><i class="fa fa-plus"></i> Add</a> </li>
                  <li class="<?php echo ($uri_string == 'user_role/index') ? 'active' : ''; ?>"> <a href="<?php echo site_url('user_role/index'); ?>"><i class="fa fa-list-ul"></i> Listing</a> </li>
                </ul>
              </li>
              <li class="<?php echo ($uri_string == 'tax_clas/add' || $uri_string == 'tax_clas/index') ? 'active' : ''; ?>"> <a href="#"><i class="fa fa-circle-o"></i>Tax Slabs<i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  <li class="<?php echo ($uri_string == 'tax_clas/add') ? 'active' : ''; ?>"> <a href="<?php echo site_url('tax_clas/add'); ?>"><i class="fa fa-plus"></i> Add</a> </li>
                  <li class="<?php echo ($uri_string == 'tax_clas/index') ? 'active' : ''; ?>"> <a href="<?php echo site_url('tax_clas/index'); ?>"><i class="fa fa-list-ul"></i> Listing</a> </li>
                </ul>
              </li>
              <li class="<?php echo ($uri_string == 'state/add' || $uri_string == 'state/index') ? 'active' : ''; ?>"><a href="#"><i class="fa fa-circle-o"></i>States<i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  <li class="<?php echo ($uri_string == 'state/add') ? 'active' : ''; ?>"> <a href="<?php echo site_url('state/add'); ?>"><i class="fa fa-plus"></i> Add</a> </li>
                  <li class="<?php echo ($uri_string == 'state/index') ? 'active' : ''; ?>"> <a href="<?php echo site_url('state/index'); ?>"><i class="fa fa-list-ul"></i> Listing</a> </li>
                </ul>
              </li>
              <li class="<?php echo ($uri_string == 'state/addcity' || $uri_string == 'state/cities') ? 'active' : ''; ?>"><a href="#"><i class="fa fa-circle-o"></i>Cities<i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  <li class="<?php echo ($uri_string == 'state/addcity') ? 'active' : ''; ?>"> <a href="<?php echo site_url('state/addcity'); ?>"><i class="fa fa-plus"></i> Add</a> </li>
                  <li class="<?php echo ($uri_string == 'state/cities') ? 'active' : ''; ?>"> <a href="<?php echo site_url('state/cities'); ?>"><i class="fa fa-list-ul"></i> Listing</a> </li>
                </ul>
              </li>
             <li class="<?php echo ($uri_string == 'admin/add' || $uri_string == 'admin/index') ? 'active' : ''; ?>"> <a href="#"> <i class="fa fa-desktop"></i> <span>Admin Users</span> </a>
              <ul class="treeview-menu">
                <li class="<?php echo ($uri_string == 'admin/add') ? 'active' : ''; ?>"> <a href="<?php echo site_url('admin/add'); ?>"><i class="fa fa-plus"></i> Add</a> </li>
                <li class="<?php echo ($uri_string == 'admin/index') ? 'active' : ''; ?>"> <a href="<?php echo site_url('admin/index'); ?>"><i class="fa fa-list-ul"></i> Listing</a> </li>
              </ul>
            </li>

          </ul>
        </li>

        <li class="<?php echo ($uri_string == 'album/add' || $uri_string == 'album/index') ? 'active' : ''; ?>">
            <a href="#"> <i class="fa fa-bell-o"></i> <span>Album</span> </a>
            <ul class="treeview-menu">
              <li class="<?php echo ($uri_string == 'album/add') ? 'active' : ''; ?>"> <a href="<?php echo site_url('album/add'); ?>"><i class="fa fa-plus"></i> Add</a> </li>
              <li class="<?php echo ($uri_string == 'album/index') ? 'active' : ''; ?>"> <a href="<?php echo site_url('album/index'); ?>"><i class="fa fa-list-ul"></i> Listing</a> </li>
            </ul>
        </li>
        <li class="<?php echo ($uri_string == 'notes/add' || $uri_string == 'notes/index') ? 'active' : ''; ?>">
            <a href="#"> <i class="fa fa-bell"></i> <span>Notes</span> </a>
            <ul class="treeview-menu">
              <li class="<?php echo ($uri_string == 'notes/add') ? 'active' : ''; ?>"> <a href="<?php echo site_url('notes/add'); ?>"><i class="fa fa-plus"></i> Add</a> </li>
              <li class="<?php echo ($uri_string == 'notes/index') ? 'active' : ''; ?>"> <a href="<?php echo site_url('notes/index'); ?>"><i class="fa fa-list-ul"></i> Listing</a> </li>
            </ul>
        </li>
        <li class="<?php echo ($uri_string == 'pay/index' || $uri_string == 'pay/settlement' || $uri_string == 'pay/clearance' || $uri_string == 'ledger/all') ? 'active' : ''; ?>">
            <a href="#"> <i class="fa fa-inr"></i> <span>Receipts</span> </a>
            <ul class="treeview-menu">
              <li class="<?php echo ($uri_string == 'pay/index') ? 'active' : ''; ?>"> <a href="<?php echo site_url('pay/index'); ?>"><i class="fa fa-list-ul"></i> Settlement By Customers</a> </li>
              <li class="<?php echo ($uri_string == 'pay/settlement') ? 'active' : ''; ?>"> <a href="<?php echo site_url('pay/settlement'); ?>"><i class="fa fa-list-ul"></i>Settlement By Invoices</a> </li>
              <li class="<?php echo ($uri_string == 'pay/clearance') ? 'active' : ''; ?>"> <a href="<?php echo site_url('pay/clearance'); ?>"><i class="fa fa-list-ul"></i>Cheque Clearance</a> </li>
              <li class="<?php echo ($uri_string == 'ledger/all') ? 'active' : ''; ?>"> <a href="<?php echo site_url('ledger/all'); ?>"><i class="fa fa-list-ul"></i>All Receipts</a> </li>
            </ul>
        </li>
        <li class="<?php echo ($uri_string == 'setting/index') ? 'active' : ''; ?>" >
          <a  href="<?php echo site_url('setting/index'); ?>"><i class="fa fa-cog"></i> <span>Settings</span> </a>

        </li>

        <li class="<?php echo ($uri_string == 'report/get_product_sale_report' || $uri_string == 'report/exportgst' || $uri_string == 'report/get_sales_report' || $uri_string == 'report/invoice') ? 'active' : ''; ?>">
          <a href="#"> <i class="fa fa-desktop"></i> <span>Report</span> </a>
          <ul class="treeview-menu">
            <li class="<?php echo ($uri_string == 'report/get_product_sale_report') ? 'active' : ''; ?>">
            <a href="<?php echo site_url('report/get_product_sale_report'); ?>"><i class="fa fa-list-ul"></i>Customer Behaviour</a> </li>

            <li class="<?php echo ($uri_string == 'report/get_sales_report') ? 'active' : ''; ?>">
            <a href="<?php echo site_url('report/get_sales_report'); ?>"><i class="fa fa-list-ul"></i> Sales Report</a> </li>
            <li class="<?php echo ($uri_string == 'report/exportgst') ? 'active' : ''; ?>">
            <a href="<?php echo site_url('report/exportgst'); ?>"><i class="fa fa-list-ul"></i>GST - Export Files</a> </li>
          </ul>
        </li>

          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
    <?php echo $this->session->flashdata('message'); ?>
      <?php
if (isset($_view) && $_view) {
    $this->load->view($_view);
}

?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer"> <strong>Powered by <a href="https://torinit.com/" target="_blank">Torinit Technologies Pvt Ltd</a></strong>
<span class="pull-right">
        <?php echo 'This page took ' . "<strong>" . $this->benchmark->elapsed_time() . "</strong> " . ' sec. '; ?>
      </span>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab"> </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->

    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js'); ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo site_url('resources/js/bootstrap.min.js'); ?>"></script>
<!-- FastClick -->
<script src="<?php echo site_url('resources/js/fastclick.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo site_url('resources/js/app.min.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo site_url('resources/js/demo.js'); ?>"></script>
<!-- DatePicker -->
<script src="<?php echo site_url('resources/js/moment.js'); ?>"></script>
<script src="<?php echo site_url('resources/js/bootstrap-datetimepicker.min.js'); ?>"></script>
<script src="<?php echo site_url('resources/js/global.js'); ?>"></script>
<script src="<?php echo site_url('resources/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo 'https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js'; ?>"></script>


  <script src="<?php echo base_url(); ?>resources/js/jquery.validate.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>resources/js/additional-methods.js" type="text/javascript"></script>

<!-- My internal js-->
<script src="<?php echo site_url('resources/js/script.js'); ?>"></script>
<script src="<?php echo site_url('resources/js/jquery.key.js'); ?>"></script>
<script src="<?php echo site_url('resources/js/select2.min.js'); ?>"></script>

<script>

  $(document).ready(function(){

  /**
        Azhars code
        */
        var popOverSettings = {
            container: 'body',
            placement: 'top',
            trigger : 'hover',
            html: true,
           selector: '[data-toggle="popover"]', //Sepcify the selector here
            content: function (con) {
              console.log(con);
              var clone = $($(this).attr('data-content')).clone(true).removeClass('hide');
            return clone;
                // return $('#popover-content').html();
            }
        }

        $('body').popover(popOverSettings);

        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;

            return [year, month, day].join('/');
        }

        var dataTable = $('#invoice_wrapper_ajax').DataTable({
             "deferRender": true,
            "processing": true,
            "language": {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
            },
            "serverSide": true,
            "ajax": {
                url: '<?php echo site_url('invoice/getDatatables'); ?>', // json datasource
                type: "post", // method  , by default get
                error: function() { // error handling
                    $(".invoice_wrapper_ajax-error").html("");
                    $("#invoice_wrapper_ajax").append('<tbody class="invoice_wrapper_ajax-error"><tr><th colspan="10">Sorry, No data found in the server</th></tr></tbody>');
                    $("#invoice_wrapper_ajax_processing").css("display", "none");
                }
            },

            "order": [
                    [0, 'asc']
            ],
            "columnDefs": [{
                "orderable": false, //set not orderable
                "targets": [ -1 ,-2 ], //last column
                "searchable": false, //set not searchable
                /*"visible":false*/
            },{
                "targets": 1,
                render: function(data, type, row) {
                  return formatDate(data);
                }
            },{
                "targets": 4,
                render: function(data, type, row) {
                console.log(data);
                if(data == '0000-00-00'){
                  return data;
                }
                  return formatDate(data);
                }
            },{
                "targets": 8,
                render: function(data, type, row) {
                       var html='';
                        html += '<a target="_blank" class="btn btn-default btn-xs" href="<?php echo site_url('upload/invoice_pdf/pdf_combine_'); ?>'+row[8]+'.pdf">';
                        html += '<i class="fa fa-print" aria-hidden="true"></i>';
                        html += '</a>';
                        html += '&nbsp;&nbsp;<a target="_blank" class="btn btn-default btn-xs" href="<?php echo site_url('upload/invoice_pdf/pdf_combine_'); ?>'+row[8]+'" download>'
                        html += '<i class="fa fa-download" aria-hidden="true"></i>'
                        html += '</a>';
                    return html;
                }
            },{
                "targets": 9,
                render: function(data, type, row) {
                       var edit='';
                        edit += '&nbsp;<a href="<?php echo site_url('common/edit/'); ?>'+row[8]+'"  class="btn btn-info btn-xs" >';
                        edit += '<span class="fa fa-pencil"></span> Edit';
                        edit += '</a>';
                    return edit;
                }
            },{
                "targets": 10,
                render: function(data, type, row) {
                    var delt ='';
                        delt  += '&nbsp;<a href="<?php echo site_url('invoice/remove/'); ?>'+row[8]+'""  class="btn btn-danger btn-xs" >';
                        delt  += '<span class="fa fa-trash"></span> Delete ';
                        delt  += '</a>';
                    return delt;
                }
            }],
            "aLengthMenu": [
                [100, 200, 300, 400, -1],
                [100, 200, 300, 400, "All"] // change per page values here
            ],
            // set the initial value
            "iDisplayLength": 100,
        });

          var dataTablePay = $('#category_wrapper_ajax').DataTable({
            "processing": true,
            "serverSide": true,
            "deferRender": true,
            "ajax": {
                url: '<?php echo site_url('pay/getDatatables'); ?>', // json datasource
                type: "post", // method  , by default get
                error: function() { // error handling
                    $(".category_wrapper_ajax-error").html("");
                    $("#category_wrapper_ajax").append('<tbody class="category_wrapper_ajax-error"><tr><th colspan="10">Sorry, No data found in the server</th></tr></tbody>');
                    $("#category_wrapper_ajax_processing").css("display", "none");
                }
            },/*
            "order": [
                    [0, 'asc']
            ],*/
            "columnDefs": [{
                "orderable": false, //set not orderable
                "targets": [ -1 ,-2,-3 ], //last column
                "searchable": false, //set not searchable
                //"visible":false
            },{
                "targets": 2,
                render: function(data, type, row) {
                  console.log(data)
                   if (data == null) {
                      return 0;
                   }else{
                      return '<a class="btn-default btn-xs" data-toggle="popover" data-content="'+row[3]+'" title="Invoice ID # " href="#">'+data+' <span class="fa fa-inr"></span></a>';
                   }
                }
            },{
                "targets": 3,
                render: function(data, type, row) {
                   if (row[4] == null) {
                      return 0;
                   }else{
                      return '<a class="btn-default btn-xs"  data-toggle="popover" data-content="'+row[5]+'" title="Invoice ID # " href="#">'+row[4]+' <span class="fa fa-inr"></span></a>';
                   }
                }
            },{
                "targets": 4,
                render: function(data, type, row) {
                   if (row[6] == null) {
                      return 0;
                   }else{
                      return '<a class="btn-default btn-xs"  data-toggle="popover" data-content="'+row[7]+'" title="Invoice ID # " href="#">'+row[6]+' <span class="fa fa-inr"></span></a>';
                   }
                }
            },{
                "targets": 5,
                render: function(data, type, row) {
                    return '<a class="btn btn-info btn-xs"  title="'+row[7]+'" href="<?php echo site_url('pay/add/'); ?>'+row[8]+'"><span class="fa fa-inr"></span> Pay</a>';
                }
            },{
                "targets": 6,
                render: function(data, type, row) {
                    return '<a class="btn btn-success btn-xs" href="<?php echo site_url('ledger/showuser/'); ?>'+row[8]+'"><span class="fa fa-bookmark-o"></span>  Show Ledger</a>';
                }
            },{
                "targets": 7,
                render: function(data, type, row) {
                    return '<a class="btn btn-success btn-xs" href="<?php echo site_url('ledger/showPendingInvoices/'); ?>'+row[8]+'"><span class="fa fa-bookmark-o"></span> Pending Invoices</a>';
                }
            }],
            "aLengthMenu": [
                [100, 200, 300, 400, -1],
                [100, 200, 300, 400, "All"] // change per page values here
            ],
            // set the initial value
            "iDisplayLength": 100,
        });

        /**
        Azhars code
        */

      $('#customer_wrapper').dataTable({
          "aLengthMenu": [
              [100, 200, 300, 400, -1],
              [100, 200, 300, 400, "All"] // change per page values here
          ],
          // set the initial value
          "iDisplayLength": 100,
      });

      $('#product_wrapper').dataTable({
          "aLengthMenu": [
              [100, 200, 300, 400, -1],
              [100, 200, 300, 400, "All"] // change per page values here
          ],
          aaSorting : [[1, 'desc']],
          // set the initial value
          "iDisplayLength": 100,
      });

      $('#invoice_wrapper').dataTable({
          "aLengthMenu": [
              [100, 200, 300, 400, -1],
              [100, 200, 300, 400, "All"] // change per page values here
          ],
          aaSorting : [[0, 'desc']],
          // set the initial value
          "iDisplayLength": 100,
      });

      $('#album_wrapper').dataTable({
          "aLengthMenu": [
              [100, 200, 300, 400, -1],
              [100, 200, 300, 400, "All"] // change per page values here
          ],
          aaSorting : [[1, 'desc']],
          // set the initial value
          "iDisplayLength": 100,
      });

      $('#notes_wrapper').dataTable({
          "aLengthMenu": [
              [100, 200, 300, 400, -1],
              [100, 200, 300, 400, "All"] // change per page values here
          ],
          //aaSorting : [[1, 'desc']],
          // set the initial value
          "iDisplayLength": 100,
      });

      $('#state_wrapper').dataTable({
          "aLengthMenu": [
              [100, 200, 300, 400, -1],
              [100, 200, 300, 400, "All"] // change per page values here
          ],
          aaSorting : [[1, 'desc']],
          // set the initial value
          "iDisplayLength": 100,
      });

      $('#category_wrapper').dataTable({
          "aLengthMenu": [
              [100, 200, 300, 400, -1],
              [100, 200, 300, 400, "All"] // change per page values here
          ],
          aaSorting : [[1, 'desc']],
          // set the initial value
          "iDisplayLength": 100,
      });

      $('#brand_wrapper').dataTable({
          "aLengthMenu": [
              [100, 200, 300, 400, -1],
              [100, 200, 300, 400, "All"] // change per page values here
          ],
          aaSorting : [[1, 'desc']],
          // set the initial value
          "iDisplayLength": 100,
      });

       $('#car_make_wrapper').dataTable({
          "aLengthMenu": [
              [100, 200, 300, 400, -1],
              [100, 200, 300, 400, "All"] // change per page values here
          ],
          aaSorting : [[1, 'desc']],
          // set the initial value
          "iDisplayLength": 100,
      });

        $('#carmodel_wrapper').dataTable({
          "aLengthMenu": [
              [100, 200, 300, 400, -1],
              [100, 200, 300, 400, "All"] // change per page values here
          ],
          aaSorting : [[1, 'desc']],
          // set the initial value
          "iDisplayLength": 100,
      });

         $('#variations_wrapper').dataTable({
          "aLengthMenu": [
              [100, 200, 300, 400, -1],
              [100, 200, 300, 400, "All"] // change per page values here
          ],
          aaSorting : [[1, 'desc']],
          // set the initial value
          "iDisplayLength": 100,
      });

       $('#tax_wrapper').dataTable({
          "aLengthMenu": [
              [100, 200, 300, 400, -1],
              [100, 200, 300, 400, "All"] // change per page values here
          ],
          aaSorting : [[1, 'desc']],
          // set the initial value
          "iDisplayLength": 100,
      });

       $('#pending_invoices').dataTable({
          "aLengthMenu": [
              [100, 200, 300, 400, -1],
              [100, 200, 300, 400, "All"] // change per page values here
          ],
           aaSorting : [[5, 'asc']],
          // set the initial value
          "iDisplayLength": 100,
      });

      $('#table_wrapper_id').dataTable({
          "aLengthMenu": [
              [100, 200, 300, 400, -1],
              [100, 200, 300, 400, "All"] // change per page values here
          ],
           aaSorting : [[0, 'desc']],
          // set the initial value
          "iDisplayLength": 100,
      });

$('#report_table').dataTable({
          "aLengthMenu": [
              [100, 200, 300, 400, -1],
              [100, 200, 300, 400, "All"] // change per page values here
          ],
           aaSorting : [[0, 'asc']],
          // set the initial value
          "iDisplayLength": 5000,
      });
   //   $('#category_wrapper').DataTable({aaSorting : [[0, 'desc']]});


      //Add short cut Keys
       $.key("ctrl+shift+d", function() {
                alert('Delete here  Album');
            });

       $.key("ctrl+shift+b", function() {
                alert('Backup here  Album');
            });

       $.key("ctrl+p", function() {
                alert('Redirect to Add Payment Page');
            });
       $.key("shift+i", function() {
                alert('Add new Invoice');
            });

$('.btn-danger').click(function(){
  var x = confirm('Are you sure to DELETE!!');
  if(x==true){
    return true;
  }
  else
  {
    return false;
  }
})

  });



</script>
<?php if ($uri_string == 'invoice/add' or $uri_string == 'report/get_product_sale_report') {?>
  <script>

      $('#product').select2({


      });
      $('#invoice_customer_id').select2({

      });

  </script>
<?php }?>
<?php if ($this->uri->segment(1) == "common" && $method == "edit") {?>
    <script>
      $('#product').select2({
        });
    </script>
<?php }?>
</body>
</html>
