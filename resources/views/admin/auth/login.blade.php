<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.layouts.header')
</head>

<body class="bg-accpunt-pages">
  
  <!-- HOME -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          
          <div class="wrapper-page">
            
            <div class="account-pages">
              <div class="account-box">
                <div class="account-logo-box">
                  {{-- <h2 class="text-uppercase text-center">
                    <a href="index.html" class="text-success">
                      <span><img src="assets/images/logo_dark.png" alt="" height="30"></span>
                    </a>
                  </h2> --}}
                  <h5 class="text-uppercase font-bold m-b-5 m-t-50">Sign In</h5>
                  <p class="m-b-0">Login to your Admin account</p>
                </div>
                <div class="account-content">
                @include('admin.partials.messages')

                  <form class="form-horizontal" method="POST" action="{{ route("admin.login") }}">
                   @csrf
              
                    <div class="form-group m-b-20 row">
                      <div class="col-12">
                        <label for="emailaddress">Email address</label>
                        <input class="form-control" type="email" name="email" id="emailaddress" required="" >
                        @if ($errors->has('email'))
                        <span class="invalid-feedback">
                          <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                    
                    <div class="form-group row m-b-20">
                      <div class="col-12">
                        <a href="page-recoverpw.html" class="text-muted pull-right"><small>Forgot your password?</small></a>
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" required="" id="password" >
                        @if ($errors->has('password'))
                        <span class="invalid-feedback">
                          <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                    
                    <div class="form-group row m-b-20">
                      <div class="col-12">
                        
                        <div class="checkbox checkbox-success">
                          <input id="remember" type="checkbox" checked="">
                          <label for="remember">
                            Remember me
                          </label>
                        </div>
                        
                      </div>
                    </div>
                    
                    <div class="form-group row text-center m-t-10">
                      <div class="col-12">
                        <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Sign In</button>
                      </div>
                    </div>
                    
                  </form>
                  
                </div>
              </div>
            </div>
            <!-- end card-box-->
            
            
          </div>
          <!-- end wrapper -->
          
        </div>
      </div>
    </div>
  </section>
  <!-- END HOME -->
  
  
  
  <script>
    var resizefunc = [];
  </script>
  
  @include('admin.layouts.footer')  
  
</body>
</html>