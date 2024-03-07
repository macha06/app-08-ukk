<script src="{{ asset('') }}assets/static/js/components/dark.js"></script>
<script src="{{ asset('') }}assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{ asset('') }}assets/static/js/initTheme.js"></script>
<script src="{{ asset('') }}assets/compiled/js/app.js"></script>
<!-- Need: Apexcharts -->
<script src="{{ asset('') }}assets/extensions/apexcharts/apexcharts.min.js"></script>
<script src="{{ asset('') }}assets/static/js/pages/dashboard.js"></script>
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"
></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('') }}assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
<script src="{{ asset('') }}assets/static/js/pages/form-element-select.js"></script>
<script src="{{ asset('') }}assets/extensions/parsleyjs/parsley.min.js"></script>
<script src="{{ asset('') }}assets/static/js/pages/parsley.js"></script>
<script src="{{ asset('') }}assets/extensions/tinymce/tinymce.min.js"></script>
<script src="{{ asset('') }}assets/static/js/pages/tinymce.js"></script>
<script>
  @if(Session::has('success'))
      Swal.fire({
          icon: 'success',
          title: 'Sukses!',
          text: '{{ Session::get('success') }}',
      });
  @endif

  @if(Session::has('error'))
      Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: '{{ Session::get('error') }}',
      });
  @endif

  @if(Session::has('warning'))
      Swal.fire({
          icon: 'warning',
          title: 'Peringatan!',
          text: '{{ Session::get('warning') }}',
      });
  @endif

  @if(Session::has('info'))
      Swal.fire({
          icon: 'info',
          title: 'Info!',
          text: '{{ Session::get('info') }}',
      });
  @endif
</script>
<script>
  @if(Session::has('success'))
      Swal.fire({
          icon: 'success',
          title: 'Sukses!',
          text: '{{ Session::get('success') }}',
      });
  @endif

  @if(Session::has('error'))
      Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: '{{ Session::get('error') }}',
      });
  @endif

  @if(Session::has('warning'))
      Swal.fire({
          icon: 'warning',
          title: 'Peringatan!',
          text: '{{ Session::get('warning') }}',
      });
  @endif

  @if(Session::has('info'))
      Swal.fire({
          icon: 'info',
          title: 'Info!',
          text: '{{ Session::get('info') }}',
      });
  @endif
</script>
