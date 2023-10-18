
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Project Manager">
  <meta name="author" content="Team SignIn">
  <title>  Admin |  Project Manager </title>
  <link rel="icon" href="assets/images/images21.jpg" type="image/png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
  <link rel="stylesheet" href="assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/vendor/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="assets/vendor/jquery/dist/jquery.min.js"></script>
</head>




<style>
body {
  font-family:  'Poppins', sans-serif;
}


</style>


<body>

  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <div class="navbar-inner">
      <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="" >
        <img style="max-height: 100px;" src="https://www.teamsignin.com/projectmanager/assets/images/logo-e8194769a61d05606daee46118a9ead2.png" 
		class="navbar-brand-img h-100" >
       
      </a>
    </div>
   
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link active" href="#">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="#clientssubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="ni ni-bullet-list-67 text-blue"></i>
                <span class="nav-link-text">Clients</span></a>
                <ul class="collapse list-unstyled" id="clientssubmenu" >
		
                        <li class="nav-item">
                            <a  class="nav-link" href="#">
                                <i class="ni ni-planet text-green"></i>Clients </a>
                            </a>
                        </li>
						
			             <li class="nav-item">
                            <a  class="nav-link" href="#">
                                <i class="ni ni-planet text-blue"></i> Prospects </a>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" href="#">
                                <i class="ni ni-planet text-orange"></i> Leads </a>
                            </a>
                        </li>
						
						<li class="nav-item">
                            <a  class="nav-link" href="#">
                                <i class="ni ni-planet text-green"></i> Invoices </a>
                            </a>
                        </li>
						
                    </ul>
              </a>
            </li>
			
            <li class="nav-item">
              <a class="nav-link active" href="<?=base_url().'task' ?>">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Task in</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="<?=base_url().'my-task' ?>">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">My task</span>
              </a>
            </li>

          </ul>
         
         
        </div>
      </div>
    </div>
  </nav>


 
  
    
<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
         
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
         
            
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
       cl             <img alt="Image placeholder" src="assets/img/theme/team-1.jpg">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">Admin</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
            
                 <div class="dropdown-divider"></div>
                <a href="t#" class="dropdown-item">
                  <i class="ni ni-circle-08"></i>
                  <span>View Profile</span>
                </a>
                  <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="ni ni-planet"></i>
                  <span>Change Password</span>
                </a>
                   <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
  
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Client List</li>
                </ol>
              </nav>
            </div>
            
          </div>
          <!-- Card stats -->
          <div class="row">
          <div class="col-xl-4 col-md-8">
              <div class="card card-stats">
                <!-- Card body -->
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row" id="alert">
                     
      </div>
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">LIST OF CLIENTS</h3>
                </div>
                <div class="col text-right">
                  <a href="todo/clients/exportclient" class="btn btn-sm btn-primary">Export</a>
                  <a href="todo/clients/create_client" class="btn btn-sm btn-primary">New Lead</a>
                </div>
              </div>
            </div>
            <div class="table-responsive"   >
              
            </div>
          </div>
        </div>

     <!-- Footer -->
 <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
 <style type="text/css">				 
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0; 
}

</style>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
  <script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
  <script src="assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
  <script src="assets/vendor/select2/dist/js/select2.min.js"></script>

 



</body>

</html>
