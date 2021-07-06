
$(document).ready(function() {
$('#borrowedToggle').on('click', function (e) {
    var value = $('#borrowedToggle').is(':checked');                

    if (value) {                    
        $('#toggleLabel').html(" To Borrow");
    } else {
        $('#toggleLabel').html(" To Lend");
    }
});
$(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
});
