<!-- jsGrid -->
<!-- <script src="/adminlte/plugins/jsgrid/demos/db.js"></script>  -->
<!-- <script src="/adminlte/plugins/jsgrid/jsgrid.min.js"></script>-->
<script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

<script>
  $(function() {
  
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