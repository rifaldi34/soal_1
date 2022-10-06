<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>CMS | RODA MAJU</title>
  <link rel="icon" href="<?= base_url('assets/files/favicon.ico') ?>" type='image/x-icon'>

  <meta name="description" content="Roda Maju">


  <link href="<?= base_url('assets/bootstrap/bootstrap.min.css'); ?>" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <script src="<?= base_url('assets/bootstrap/bootstrap.bundle.min.js'); ?>" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

  <link rel="stylesheet" href="<?= base_url('assets/custom/custom.css'); ?>">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowgroup/1.1.4/css/rowGroup.bootstrap5.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.bootstrap5.css"/>
   
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/rowgroup/1.1.4/js/dataTables.rowGroup.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!--   <style type="text/css">
    .collapsing {
     -webkit-transition: none !important;
     transition: none !important;
    }
  </style> -->
</head>
<body class="bg-dashboard">

  <div class="offcanvas offcanvas-start shadow-custom-offcanvas border-0" tabindex="-1" id="sidebar-nav" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <div class="ps-3 sidebar-brand">
        RODA MAJU
      </div>

      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
      <ul class="sidebar-ul">
        <!-- ========================================= -->
        <li class="sidebar-li-header">Home</li>

        <li class="sidebar-item" id="dashboard">
          <a class="sidebar-link" href="<?= base_url('cms') ?>">
            <i class="bi bi-graph-up feather align-middle"></i>
            <span class="align-middle">Dashboard</span>
          </a>
        </li>

        <li class="sidebar-li-header">Management Customer</li>

        <li class="sidebar-item" id="customer">
          <a class="sidebar-link" href="<?= base_url('cms/customer') ?>">
            <i class="bi bi-person-square feather align-middle"></i>
            <span class="align-middle">Customer</span>
          </a>
        </li>

        <!-- ========================================= -->
        <!-- ========================================= -->
        <li class="sidebar-li-header">Management Service</li>

        <li class="sidebar-item" id="service_category">
          <a class="sidebar-link" href="<?= base_url('cms/service_category') ?>">
            <i class="bi bi-tags feather align-middle"></i>
            <span class="align-middle">Kategori & Jenis Service</span>
          </a>
        </li>

        <li class="sidebar-item" id="service_booking">
          <a class="sidebar-link" href="<?= base_url('cms/service_booking') ?>">
            <i class="bi bi-wrench-adjustable feather align-middle"></i>
            <span class="align-middle">Booking Service</span>
          </a>
        </li>
        <!-- ========================================= -->

        <!-- ========================================= -->
        <li class="sidebar-li-header">Account</li>

<!--         <li class="sidebar-item" id="settings">
          <a class="sidebar-link" href="<?= base_url('cms/settings') ?>">
            <i class="bi bi-gear feather align-middle"></i>
            <span class="align-middle">Pengaturan</span>
          </a>
        </li> -->

        <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('auth/logout') ?>">
            <i class="bi bi-box-arrow-in-left feather align-middle "></i>
            <span class="align-middle">Keluar</span>
          </a>
        </li>


        <!-- ========================================= -->

      </ul>


    </div>
  </div>
        
          <!-- As a link -->
  <nav class="navbar navbar-light shadow-custom bg-dashboard-navbar">
    <div class="container-fluid flex-nowrap">
      <a class="sidebar-toggle" data-bs-toggle="offcanvas" data-bs-target="#sidebar-nav">
        <i class="hamburger align-self-center"></i>
      </a>
      <div class="dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="<?= base_url('/assets/files/profile_pic.jpg') ?>" class="avatar img-fluid rounded me-1" alt="Charles Hall"> <span class="text-dark"><span class="text-muted">(Admin)</span></span>
        </a>
        
        <ul class="dropdown-menu dropdown-menu-end animate slideOut" aria-labelledby="dropdownMenuButton1">
<!--           <a class="dropdown-item dropdown-item-dashboard" href="<?= base_url('cms/settings') ?>">
            <i class="bi bi-gear h6 align-middle me-2"></i>Pengaturan
          </a>
          <div class="dropdown-divider"></div> -->
          <a class="dropdown-item dropdown-item-dashboard" href="<?= base_url('auth/logout') ?>">
            <i class="bi bi-box-arrow-in-left h6 align-middle me-2 align-"></i>Keluar
          </a>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="mx-0 mx-md-5">

<script>
$(document).ready(function() {
  let sidebar_active = '<?= @$sidebar_active ?>';
  let sidebar_active_id = '#' + sidebar_active ;
  $(sidebar_active_id).addClass('active');
});
</script>