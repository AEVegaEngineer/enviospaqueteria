
function refreshTables(tablaid)
{       
  if ($.fn.DataTable.isDataTable( '#'+tablaid ) ) {
    $('#'+tablaid).dataTable().fnAdjustColumnSizing();
  }  
}
function rebuildTables(tablaid)
{        
  if ($.fn.DataTable.isDataTable( '#'+tablaid ) ) {
    var table = $('#'+tablaid).DataTable();
    table.clear().draw();
    $("#"+tablaid).dataTable().fnDestroy();
  }
}