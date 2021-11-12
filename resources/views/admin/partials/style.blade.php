  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('admin')}}/plugins/fontawesome-free/css/all.min.css">
  @yield('style')
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin')}}/dist/css/adminlte.min.css">
  <!-- ck start-->
  <script src="{{asset('admin')}}/ckeditor/ckeditor.js"></script>
  <script src="{{asset('admin')}}/ckeditor/samples/js/sample.js"></script>
  <!--<link rel="stylesheet" href="{{asset('admin')}}/ckeditor/samples/css/samples.css">
  <link rel="stylesheet" href="{{asset('admin')}}/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css"> -->
  <!-- ck end-->
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
  <style>
      .active-color {
          background-color: #6a8871 !important;
          color: #fff !important;
          background: linear-gradient(0deg, rgba(34, 193, 195, 1) 0%, #3d9970 100%)
      }

      .active-color:hover {
          background-color: #6a8871 !important;
          color: #fff !important;


      }

      aside a:hover {
          color: #fff !important;
      }
  </style>

  @stack('css')