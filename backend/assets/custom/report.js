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
  var l = $('#perbank');
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