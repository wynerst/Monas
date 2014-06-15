//ChartJS
$(function(){
  //Line
  var chartData = {
      labels : ["01/06","02/06","03/06","04/06"],
      datasets : [
          {
              fillColor : "#CCC",
              strokeColor : "#fff",
              pointColor : "#fff",
              pointStrokeColor : "#fff",
              data : [0,381,126,0]
          },
          {
              fillColor : "#666",
              strokeColor : "#fff",
              pointColor : "#fff",
              pointStrokeColor : "#fff",
              data : [0,219,96,0]
          },                
          {
              fillColor : "#333",
              strokeColor : "#fff",
              pointColor : "#fff",
              pointStrokeColor : "#fff",
              data : [0,142,29,0]
          }
      ]
  }

  //Line
  var l = $('#line-chartjs');
  var container = $(l).parent();
  var cl = l.get(0).getContext("2d");
  $(window).resize( lineChart );
  function lineChart(){ 
      l.attr('width', $(container).width() ); //max width
      l.attr('height', $(container).height() ); //max height
      //Call a function to redraw other content (texts, images etc)
      var lineChart = new Chart(cl).Bar(chartData);

  }
  lineChart();

});

// Pie charts
$('.sparkpie').sparkline(
    'html', { 
        type            : 'pie', 
        height          : '75px', 
        sliceColors     : ['#ffcc00', '#FFFF00','#666666','#999999','#cccccc'],
        resize          : true

    }
);

$('.sparkpie-1').sparkline(
    'html', { 
        type            : 'pie', 
        height          : '65px', 
        sliceColors     : ['#ffcc00', '#FFFF00','#666666','#999999','#cccccc'],
        resize          : true

    }
);

$('.sparktristate').sparkline(
    'html', { 
        type            : 'tristate', 
        posBarColor     : '#41A053', 
        negBarColor     : '#eeeeee', 
        zeroBarColor    : "#333333",
        barWidth        : 5,
        barSpacing      : 1, 
        height          : '65px',  
        width           : '100%',
        resize          : true
    }
);


// Bar
$('.sparkbar').sparkline(
    'html', {
        type            : 'bar', 
        height          : '5px', 
        barWidth        : '4px',
        width           : '25px',
        barColor        : '#dddddd',
        resize          : true

    }
);

$('.sparkbar-1').sparkline(
    'html', {
        type            : 'bar', 
        height          : '65px', 
        barWidth        : '8px',
        width           : '100%',
        barColor        : '#CA5122',
        stackedBarColor : ['#800088','#eeeeee'],
        resize          : true

    }
);

// Line charts
$('.sparkline').sparkline(
    'html', { 
        type            : 'line', 
        height          : '15px',
        width           : '25',
        fillColor       : "transparent",
        lineColor       : "#E3D109",        
        lineWidth       : '1',
        spotRadius      : '4',
        spotColor       : '#049CB7',
        minSpotColor    : '#E3D109',
        maxSpotColor    : '#41A053',
        resize          : true

    }
);

// Line charts
$('.sparkline-1').sparkline(
    'html', { 
        type            : 'line', 
        height          : '65px',
        width           : '100%',
        fillColor       : "transparent",
        lineColor       : "#dddddd",        
        lineWidth       : '1',
        spotRadius      : '3',
        spotColor       : '#333333',
        minSpotColor    : '#333333',
        maxSpotColor    : '#333333',
        resize          : true

    }
);


