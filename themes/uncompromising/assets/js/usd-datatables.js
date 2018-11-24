// TABLES
jQuery(document).ready(function (){
  var table = jQuery('#usdTable2').DataTable({
    "lengthMenu": [[-1, 5, 10, 25, 50], ["All", 5, 10, 25, 50]],
    "pagingType": "simple_numbers",
    "language": {
      "lengthMenu": "Page Size: _MENU_",
      "info": "_START_ - _END_ of _TOTAL_",
      "paginate": {
        "previous": '<i class="fal fa-angle-left"></i>',
        "next": '<i class="fal fa-angle-right"></i>',
      }
    },
    fixedHeader: true
  });
});