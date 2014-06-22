// Table
$(function() {
  $(".tablesorter").tablesorter({
    widgets : ["filter"]
  })
  .tablesorterPager({
    container               : $(".ts-pager"),
    cssGoto                 : ".pagenum",
    output                  : 'Hal. {startRow}-{endRow} Dari {totalRows}'
  });

});
