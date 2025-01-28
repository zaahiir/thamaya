<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Thamaya Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('cms/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('cms/assets/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('cms/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('cms/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/img/thamaya.png') }}" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Add these custom styles */
        .container-scroller {
          display: flex;
          flex-direction: column;
          min-height: 100vh;
        }

        .page-body-wrapper {
          display: flex;
          flex: 1;
          width: 100%;
        }

        .sidebar {
          width: 260px;
          flex-shrink: 0;
          position: sticky;
          top: 70px; /* Adjust based on navbar height */
          height: calc(100vh - 70px);
          overflow-y: auto;
        }

        .main-panel {
          flex: 1;
          display: flex;
          flex-direction: column;
          min-width: 0;
        }

        .content-wrapper {
          flex: 1;
          padding: 20px;
        }

        .footer {
          width: 100%;
          padding: 20px;
          margin-top: auto;
        }
      </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      @include('cms.layouts.navbar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('cms.layouts.sidebar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
              @yield('content')
            </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('cms.layouts.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('cms/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('cms/assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('cms/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('cms/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('cms/assets/js/misc.js') }}"></script>
    <script src="{{ asset('cms/assets/js/settings.js') }}"></script>
    <script src="{{ asset('cms/assets/js/todolist.js') }}"></script>
    <script src="{{ asset('cms/assets/js/jquery.cookie.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('cms/assets/js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->
  </body>
</html>



