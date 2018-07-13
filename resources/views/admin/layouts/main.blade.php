<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.layouts.header')
</head>
<body>
  <!-- Begin page -->
  <div id="wrapper">
    @include('admin.partials.navbar')
    
    @include('admin.partials.sidebar')
    
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
      <!-- Start content -->
      <div class="content">
        <div class="container-fluid">
          
          <div class="row">
            <div class="col-12">
              <div class="page-title-box">
                <h4 class="page-title float-left">@yield('content-title')</h4>
                
                <ol class="breadcrumb float-right">
                  <li class="breadcrumb-item"><a href="#">Adminox</a></li>
                  <li class="breadcrumb-item"><a href="#">Pages</a></li>
                  <li class="breadcrumb-item active">Starter Page</li>
                </ol>
                
                <div class="clearfix"></div>
              </div>
            </div>
          </div>

          <!-- end row -->
          <div class="row">
            <div class="col-12">
              @section('content-body')
                  
              @show
            </div>
          </div>
          
        </div> <!-- container -->
        
      </div> <!-- content -->
      
      <footer class="footer text-right">
        @yield('content-footer')
      </footer>
      
    </div>
    
    
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
  </div>
  @include('admin.layouts.footer')  
</body>
</html>