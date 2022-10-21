    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <!-- Common scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" crossorigin="anonymous"></script>
    <script src="{{asset('adminTemplate/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('adminTemplate/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('adminTemplate/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('adminTemplate/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('adminTemplate/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('adminTemplate/js/demo/chart-pie-demo.js')}}"></script>

      <!-- Page level plugins -->
      <script src="{{asset('adminTemplate/vendor/datatables/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('adminTemplate/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.23/dist/sweetalert2.all.min.js" type="text/javascript"></script>

</body>

</html>
<div id="loadgif" class="loading">
  <div class="lds-circle">
<div>
</div>

<script type="text/javascript">
  function toggleGifLoad(){
    $('#loadgif').toggle();
  }

  $(document).ready(function() {
        $('#dataTable').DataTable();
    });
      
</script>