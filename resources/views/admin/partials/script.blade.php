  <!-- jQuery -->
  <script src="{{asset('admin')}}/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('admin')}}/dist/js/adminlte.min.js"></script>
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
<script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error('{{$error}}', 'Error', {
                closeButton:true,
                progressBar:true,
            });
        @endforeach
    @endif
</script>

  @yield('script')
  @stack('js')