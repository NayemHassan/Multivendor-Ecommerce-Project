
<script src="{{asset('adminbackend')}}/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
 
  <script src="{{asset('adminbackend')}}/assets/js/jquery.min.js"></script>
	<script src="{{asset('adminbackend')}}/assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="{{asset('adminbackend')}}/assets/plugins/input-tags/js/tagsinput.js"></script>
  <script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin">
	</script>
	<script src="{{asset('adminbackend')}}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{{asset('adminbackend')}}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="{{asset('adminbackend')}}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="{{asset('adminbackend')}}/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script src="{{asset('adminbackend')}}/assets/plugins/chartjs/js/Chart.min.js"></script>
	<script src="{{asset('adminbackend')}}/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{asset('adminbackend')}}/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="{{asset('adminbackend')}}/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="{{asset('adminbackend')}}/assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
	<script src="{{asset('adminbackend')}}/assets/plugins/jquery-knob/excanvas.js"></script>
	<script src="{{asset('adminbackend')}}/assets/plugins/jquery-knob/jquery.knob.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	  <script>
		  $(function() {
			  $(".knob").knob();
		  });
	  </script>
	  <script src="{{asset('adminbackend')}}/assets/js/index.js"></script>
	<!--app JS-->
	<script src="{{asset('adminbackend')}}/assets/js/app.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="{{ asset('backend/assets/js/validate.min.js') }}"></script>

<script src="{{asset('backend/assets/js/code.js') }}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

 	<script>
		tinymce.init({
		  selector: '#mytextarea'
		});
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );

			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
	<!-- Image Onload Code -->

<script type = "text/javascript">
$(document).ready(function(){
$('#image').change(function(e){
var reader = new FileReader();
reader.onload = function(e){
    $('#showImage').attr('src',e.target.result);
}
reader.readAsDataURL(e.target.files['0']);
});
});
</script>
          <!-- Toaster  -->
        <script>
            @if(Session::has('message'))
            toastr.options =
            {
              "closeButton" : true,
              "progressBar" : true
            }
                  toastr.success("{{ session('message') }}");
            @endif

            @if(Session::has('error'))
            toastr.options =
            {
              "closeButton" : true,
              "progressBar" : true
            }
                  toastr.error("{{ session('error') }}");
            @endif

            @if(Session::has('info'))
            toastr.options =
            {
              "closeButton" : true,
              "progressBar" : true
            }
                  toastr.info("{{ session('info') }}");
            @endif

            @if(Session::has('warning'))
            toastr.options =
            {
              "closeButton" : true,
              "progressBar" : true
            }
                  toastr.warning("{{ session('warning') }}");
            @endif
          </script>

