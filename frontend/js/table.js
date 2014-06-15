// Table
$(document).ready(function(){
  $(function(){
    $.extend($.tablesorter.themes.bootstrap, {
      // these classes are added to the table. To see other table classes available,
      // look here: http://twitter.github.com/bootstrap/base-css.html#tables
      table       : 'table-bordered',
      caption     : 'caption',
      header      : 'bootstrap-header', // give the header a gradient background
      footerRow   : '',
      footerCells : '',
      icons       : '', // add "icon-white" to make them white; this icon class is added to the <i> in the header
      sortNone    : 'fa fa-sort',
      sortAsc     : 'fa fa-caret-up',     // includes classes for Bootstrap v2 & v3
      sortDesc    : 'fa fa-caret-down', // includes classes for Bootstrap v2 & v3
      active      : '', // applied when column is sorted
      hover       : '', // use custom css here - bootstrap class may not override it
      filterRow   : '', // filter row class
      even        : '', // odd row zebra striping
      odd         : ''  // even row zebra striping
    });

    // call the tablesorter plugin and apply the uitheme widget
    $(".tablesorter").tablesorter({
      // this will apply the bootstrap theme if "uitheme" widget is included
      // the widgetOptions.uitheme is no longer required to be set
      theme                   : "bootstrap",
      widthFixed              : true,
      headerTemplate          : '{content} {icon}', // new in v2.7. Needed to add the bootstrap icon!

      // widget code contained in the jquery.tablesorter.widgets.js file
      // use the zebra stripe widget if you plan on hiding any rows (filter widget)
      widgets                 : [ "uitheme", "filter", "zebra", "print", "output" ],

      widgetOptions           : {
        // using the default zebra striping class name, so it actually isn't included in the theme variable above
        // this is ONLY needed for bootstrap theming if you are using the filter widget, because rows are hidden
        zebra                 : ["even", "odd"],

        // external search
        filter_external       : ".search",
        filter_reset          : ".reset",
        filter_columnFilters  : true,
        filter_saveFilters    : false,

        output_separator    : ',',         // ',' 'json', 'array' or separator (e.g. ',')
        output_dataAttrib   : 'data-name', // data-attribute containing alternate cell text
        output_headerRows   : true,        // output all header rows (multiple rows)
        output_delivery     : 'd',         // (p)opup, (d)ownload
        output_saveRows     : 'a',         // (a)ll, (f)iltered or (v)isible
        output_replaceQuote : '\u201c;',   // change quote to left double quote
        output_includeHTML  : true,        // output includes all cell HTML (except the header cells)
        output_trimSpaces   : false,       // remove extra white-space characters from beginning & end
        output_wrapQuotes   : false,       // wrap every cell output in quotes
        output_popupStyle   : 'width=580,height=310',
        output_saveFileName : 'mytable.csv',

        // callbackJSON used when outputting JSON & any header cells has a colspan - unique names required
        output_callbackJSON : function($cell, txt, cellIndex) { return txt + '(' + cellIndex + ')'; },

        // callback executed when processing completes
        // return true to continue download/output
        // return false to stop delivery & do something else with the data
        output_callback     : function(data) { return true; },

        // output data type (with BOM or Windows-1252 is needed for excel)
        // NO BOM   : 'data:text/csv;charset=utf8,'
        // With BOM : 'data:text/csv;charset=utf8,%EF%BB%BF'
        // WIN 1252 : 'data:text/csv;charset=windows-1252'
        output_encoding     : 'data:text/csv;charset=utf8,'

      }
    })
    .tablesorterPager({

      // target the pager markup - see the HTML block below
      container               : $(".ts-pager"),

      // target the pager page select dropdown - choose a page
      cssGoto                 : ".pagenum",

      // remove rows from the table to speed up the sort of large tables.
      // setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
      removeRows              : false,

      // output string - default is '{page}/{totalPages}';
      // possible variables: {page}, {totalPages}, {filteredPages}, {startRow}, {endRow}, {filteredRows} and {totalRows}
      output                  : 'Show {startRow}-{endRow} From {totalRows}'

    });

    //trigger to print table
    $('#print').click(function(){
      $('#tablesorter').trigger('printTable');
    });


    //trigger to save table as csv
    $('#csv').click(function(){
      $('#tablesorter').trigger('outputTable');
    });

  });
});