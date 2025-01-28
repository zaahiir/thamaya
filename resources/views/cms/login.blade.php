<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Thamaya Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset("cms/assets/vendors/mdi/css/materialdesignicons.min.css") }}">
    <link rel="stylesheet" href="{{ asset("cms/assets/vendors/ti-icons/css/themify-icons.css") }}">
    <link rel="stylesheet" href="{{ asset("cms/assets/vendors/css/vendor.bundle.base.css") }}">
    <link rel="stylesheet" href="{{ asset("cms/assets/vendors/font-awesome/css/font-awesome.min.css") }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset("cms/assets/css/style.css") }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset("assets/img/logo1.png") }}" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="{{ asset("assets/img/thamaya.png") }}" alt="logo">
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form class="pt-3" id="loginForm">
                    {{ csrf_field() }}
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                  </div>
                  <div class="mt-3 d-grid gap-2">
                    <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset("cms/assets/vendors/js/vendor.bundle.base.js") }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset("cms/assets/js/off-canvas.js") }}"></script>
    <script src="{{ asset("cms/assets/js/misc.js") }}"></script>
    <script src="{{ asset("cms/assets/js/settings.js") }}"></script>
    <script src="{{ asset("cms/assets/js/todolist.js") }}"></script>
    <script src="{{ asset("cms/assets/js/jquery.cookie.js") }}"></script>
    <!-- endinject -->

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- adminAuth --}}
    <script>
        $("#loginForm").submit(function (e) {
            e.preventDefault();
            let url_to = "/adminAuth";
            let formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: url_to,
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: (response) => {
                    var code = response['data'].code;
                    var message = response['data'].message;
                    if (code == 1) {
                        window.location.href = '/dashboard';
                    } else {
                        swal("Failed!", message, "error");
                    }
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
    </script>
  </body>
</html>
