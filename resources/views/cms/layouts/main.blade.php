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

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('cms/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('cms/assets/css/style.css') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/thamaya.png') }}" />

    <!-- Additional styles stack -->
    @stack('styles')

    <style>
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
          top: 70px;
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

        /* DataTables custom styling */
        .dataTables_wrapper {
          padding: 20px 0;
        }

        .dataTables_processing {
          background: rgba(255,255,255,0.9);
          border: 1px solid #ddd;
          border-radius: 3px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      @include('cms.layouts.navbar')
      <div class="container-fluid page-body-wrapper">
        @include('cms.layouts.sidebar')
        <div class="main-panel">
            <div class="content-wrapper">
              @yield('content')
            </div>
          @include('cms.layouts.footer')
        </div>
      </div>
    </div>

    <!-- Core JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- plugins:js -->
    <script src="{{ asset('cms/assets/vendors/js/vendor.bundle.base.js') }}"></script>

    <!-- Plugin js for this page -->
    <script src="{{ asset('cms/assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('cms/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- inject:js -->
    <script src="{{ asset('cms/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('cms/assets/js/misc.js') }}"></script>
    <script src="{{ asset('cms/assets/js/settings.js') }}"></script>
    <script src="{{ asset('cms/assets/js/todolist.js') }}"></script>
    <script src="{{ asset('cms/assets/js/jquery.cookie.js') }}"></script>

    <!-- Custom js for this page -->
    <script src="{{ asset('cms/assets/js/dashboard.js') }}"></script>

    <!-- Additional scripts stack -->
    @stack('scripts')

    <!-- Error handling for AJAX -->
    <script>
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $(document).ajaxError(function(event, jqxhr, settings, thrownError) {
        if (jqxhr.status === 401) {
          swal('Session Expired', 'Please login again to continue.', 'error')
          .then(() => {
            window.location.reload();
          });
        }
      });
    </script>
  </body>
</html>
