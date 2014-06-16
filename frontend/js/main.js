// Form
$(document).ready(function() {
  //Select
  $('select').selectpicker();

});

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('.page-scroll a').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

// Floating label headings for the contact form
$(function() {
    $("body").on("input propertychange", ".floating-label-form-group", function(e) {
        $(this).toggleClass("floating-label-form-group-with-value", !! $(e.target).val());
    }).on("focus", ".floating-label-form-group", function() {
        $(this).addClass("floating-label-form-group-with-focus");
    }).on("blur", ".floating-label-form-group", function() {
        $(this).removeClass("floating-label-form-group-with-focus");
    });
});

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    offset: 12,
    target: '.navbar-fixed-top'
})

//ChartJS
$(function(){
  //Line
  var chartData = {
      labels : ["01/06","02/06","03/06","04/06","05/06","06/06","07/06"],
      datasets : [
          {
              fillColor : "#999999",
              strokeColor : "#fff",
              pointColor : "#000000",
              pointStrokeColor : "#fff",
              data : [100,320,450,625,435,100,320,]
          },
          {
              fillColor : "#cc0000",
              strokeColor : "#fff",
              pointColor : "#000000",
              pointStrokeColor : "#fff",
              data : [210,430,550,325,210,430]
          },
          {
              fillColor : "#000000",
              strokeColor : "#fff",
              pointColor : "#000000",
              pointStrokeColor : "#fff",
              data : [110,330,450,125,110,330]
          }
      ]
  }

  var chartOption = {
      animation : false
  }

  //Line
  var l = $('#bri-chartjs');
  var container = $(l).parent();
  var cl = l.get(0).getContext("2d");
  $(window).resize( lineChart );
  function lineChart(){ 
      l.attr('width', $(container).width() ); //max width
      l.attr('height', $(container).height() ); //max height
      //Call a function to redraw other content (texts, images etc)
      var briChart = new Chart(cl).Bar(chartData,chartOption);

  }
  lineChart();

  //Line
  var l = $('#mandiri-chartjs');
  var container = $(l).parent();
  var cl = l.get(0).getContext("2d");
  $(window).resize( lineChart );
  function lineChart(){ 
      l.attr('width', $(container).width() ); //max width
      l.attr('height', $(container).height() ); //max height
      //Call a function to redraw other content (texts, images etc)
      var briChart = new Chart(cl).Bar(chartData,chartOption);

  }
  lineChart();

  //Line
  var l = $('#bca-chartjs');
  var container = $(l).parent();
  var cl = l.get(0).getContext("2d");
  $(window).resize( lineChart );
  function lineChart(){ 
      l.attr('width', $(container).width() ); //max width
      l.attr('height', $(container).height() ); //max height
      //Call a function to redraw other content (texts, images etc)
      var briChart = new Chart(cl).Bar(chartData,chartOption);

  }
  lineChart();

  //Line
  var l = $('#line-chartjs');
  var container = $(l).parent();
  var cl = l.get(0).getContext("2d");
  $(window).resize( lineChart );
  function lineChart(){ 
      l.attr('width', $(container).width() ); //max width
      l.attr('height', $(container).height() ); //max height
      //Call a function to redraw other content (texts, images etc)
      var lineChart = new Chart(cl).Bar(chartData,chartOption);

  }
  lineChart();  

  var polarData = [
    {
      value : 3330,
      color: "#333"
    },
    {
      value : 9440,
      color: "#666"
    },
    {
      value : 34224,
      color: "#999"
    }
  ]
 
  var polarOption = 
  {
              segmentShowStroke : false,
              animation : false
  }


  //Polar
  var p = $('#donut-chartjs');
  var container = $(p).parent();
  var cp = p.get(0).getContext("2d");
  $(window).resize(donutChart);
  function donutChart(){ 
      p.attr('width', $(container).width() ); //max width
      p.attr('height', $(container).height() ); //max height
      //Call a function to redraw other content (texts, images etc)
      var donutChart = new Chart(cp).Doughnut(polarData,polarOption);
  }

  donutChart();

});