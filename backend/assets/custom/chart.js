//ChartJS
$(function(){
  //Line
  var chartData = {
      labels : ["Jan","Feb","Mar","Apr","May","Jun","July"],
      datasets : [
          {
              fillColor : "rgba(4,156,183,0.9)",
              strokeColor : "rgba(4,156,183,1)",
              pointColor : "rgba(4,156,183,1)",
              pointStrokeColor : "#fff",
              data : [230,29,40,381,126,85,260]
          },
          {
              fillColor : "rgba(68,76,159,0.9)",
              strokeColor : "rgba(68,76,159,1)",
              pointColor : "rgba(68,76,159,1)",
              pointStrokeColor : "#fff",
              data : [210,48,30,219,96,67,250]
          },                
          {
              fillColor : "rgba(128,0,136,0.9)",
              strokeColor : "rgba(128,0,136,1)",
              pointColor : "rgba(128,0,136,1)",
              pointStrokeColor : "#fff",
              data : [200,28,18,142,29,56,217]
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
      var lineChart = new Chart(cl).Line(chartData);

  }
  lineChart();

//Bar
  var b = $('#bar-chartjs');
  var container = $(b).parent();
  var cb = b.get(0).getContext("2d");
  $(window).resize( barChart );
  function barChart(){ 
      b.attr('width', $(container).width() ); //max width
      b.attr('height', $(container).height() ); //max height
      //Call a function to redraw other content (texts, images etc)
      var barChart = new Chart(cb).Bar(chartData);

  }
  barChart();

  //Radar
  var r = $('#radar-chartjs');
  var container = $(r).parent();
  var cr = r.get(0).getContext("2d");
  $(window).resize( radarChart );
  function radarChart(){ 
      r.attr('width', $(container).width() ); //max width
      r.attr('height', $(container).height() ); //max height
      //Call a function to redraw other content (texts, images etc)
      var radarChart = new Chart(cr).Radar(chartData);

  }
  radarChart();


  var polarData = [
    {
      value : 30,
      color: "#049CB7"
    },
    {
      value : 90,
      color: "#800088"
    },
    {
      value : 24,
      color: "#41A053"
    },
    {
      value : 58,
      color: "#CA5122"
    },
    {
      value : 82,
      color: "#E3D109"
    },
    {
      value : 8,
      color: "#333333"
    }
  ]
  //Polar
  var p = $('#polar-chartjs');
  var container = $(p).parent();
  var cp = p.get(0).getContext("2d");
  $(window).resize( polarChart );
  function polarChart(){ 
      p.attr('width', $(container).width() ); //max width
      p.attr('height', $(container).height() ); //max height
      //Call a function to redraw other content (texts, images etc)
      var polarChart = new Chart(cp).PolarArea(polarData);

  }
  polarChart();

  //Polar
  var p = $('#donut-chartjs');
  var container = $(p).parent();
  var cp = p.get(0).getContext("2d");
  $(window).resize( polarChart );
  function donutChart(){ 
      p.attr('width', $(container).width() ); //max width
      p.attr('height', $(container).height() ); //max height
      //Call a function to redraw other content (texts, images etc)
      var donutChart = new Chart(cp).Doughnut(polarData);

  }
  donutChart();

});

// Easypie
$(function(){
    $('.easy-chart-collections').easyPieChart({
        barColor: '#ffffff',
        animate: 1000,
        trackColor: '#3DB2C7',
        scaleColor: '#3DB2C7',
        lineCap: 'butt',
        lineWidth: 12,
    });

    $('.easy-chart-transactions').easyPieChart({
        barColor: '#ffffff',
        animate: 1000,
        trackColor: '#6CB67A',
        scaleColor: false,
        lineWidth: 10,
    });

    $('.easy-chart-members').easyPieChart({
        barColor: '#ffffff',
        animate: 1000,
        trackColor: '#D67854',
        scaleColor: '#D67854',
        lineWidth: 10,
    });

    $('.easy-chart-visitors').easyPieChart({
        barColor: '#ffffff',
        animate: 1000,
        trackColor: '#E9DB41',
        scaleColor: false,
        lineCap: 'butt',
        lineWidth: 10,
    });

});

// Sparkline
// Bar
$('.sparkbar').sparkline(
    'html', {
        type            : 'bar', 
        height          : '115px', 
        barWidth        : '20px',
        width           : '100%',
        stackedBarColor : ['#E3D109','#eeeeee'],
        resize          : true

    }
);
// Pie charts
$('.sparkpie').sparkline(
    'html', { 
        type            : 'pie', 
        height          : '115px', 
        sliceColors     : ['#800088','#424a53','#7a889a','#d5d5d5'],
        resize          : true

    }
);
// Line charts
$('.sparkline').sparkline(
    'html', { 
        type            : 'line', 
        height          : '115px',
        width           : '100%',
        fillColor       : "transparent",
        lineColor       : "#dddddd",        
        lineWidth       : '1',
        spotRadius      : '4',
        spotColor       : '#049CB7',
        minSpotColor    : '#E3D109',
        maxSpotColor    : '#41A053',
        resize          : true

    }
);
$('.sparktristate').sparkline(
    'html', { 
        type            : 'tristate', 
        posBarColor     : '#41A053', 
        negBarColor     : '#eeeeee', 
        zeroBarColor    : "#333333",
        barWidth        : 10,
        barSpacing      : 2, 
        height          : '115px',  
        width           : '100%',
        resize          : true
    }
);

