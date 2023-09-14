 <!-- /.content-wrapper -->
 <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
$(document).on("submit","#product_form", function(event){
  event.preventDefault();
  var form_data = new FormData(document.getElementById('product_form'));
  console.log(form_data);
  var Toast = Swal.mixin({
      toast: true,
      position: 'center',
      showConfirmButton: false,
      timer: 3000
    });
  $.ajax({
    method: 'POST',
    url: './helper/process.php',
    data:form_data,
    contentType:false,
    processData: false,
    success:function(succ_data) {
      if (succ_data == 'Boş alan bırakmayınız...') {
        Toast.fire({
        icon: 'error',
        title: succ_data
       })
      }
      else if(succ_data=='Yeni Ürün Eklendi...') {
        Toast.fire({
        icon: 'success',
        title: succ_data
       })
      }
      else if(succ_data=='Ürün ekleme başarısız...') {
        Toast.fire({
        icon: 'error',
        title: succ_data
       })
      }
      $('#product_form').trigger('reset');
      location.reload();
    },
    error:function(err_data) {
      console.log(err_data);
    }
  });
})

/*

*/

$(document).on("submit","#color_form", function(event){
  event.preventDefault();
  var form_data = new FormData(document.getElementById('color_form'));
  var Toast = Swal.mixin({
      toast: true,
      position: 'center',
      showConfirmButton: false,
      timer: 5000
    });
  $.ajax({
    method: 'POST',
    url: './helper/process.php',
    data:form_data,
    contentType:false,
    processData: false,
    success:function(succ_data) {
      if (succ_data == 'İşlem Başarılı..') {
        Toast.fire({
        icon: 'success',
        title: succ_data
       })
      }
      else if(succ_data=='İşlem Başarısız..') {
        Toast.fire({
        icon: 'warning',
        title: succ_data
       })
      }
      else {
        Toast.fire({
        icon: 'info',
        title: succ_data
       })
      }
      $('#color_form').trigger('reset');
      location.reload();
    },
    error:function(err_data) {
      console.log(err_data);
    }
  });
})

$(document).on("submit","#size_form", function(event){
  event.preventDefault();
  var form_data = new FormData(document.getElementById('size_form'));
  var Toast = Swal.mixin({
      toast: true,
      position: 'center',
      showConfirmButton: false,
      timer: 5000
    });
  $.ajax({
    method: 'POST',
    url: './helper/process.php',
    data:form_data,
    contentType:false,
    processData: false,
    success:function(succ_data) {
      if (succ_data == 'İşlem Başarılı..') {
        Toast.fire({
        icon: 'success',
        title: succ_data
       })
      }
      else if(succ_data=='İşlem Başarısız..') {
        Toast.fire({
        icon: 'warning',
        title: succ_data
       })
      }
      else {
        Toast.fire({
        icon: 'info',
        title: succ_data
       })
      }
      $('#size_form').trigger('reset');
    },
    error:function(err_data) {
      console.log(err_data);
    }
  });
})



</script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, 
      "buttons": ["excel", "pdf", "print", "colvis"],
      
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>