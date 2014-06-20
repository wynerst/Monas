// Form
$(document).ready(function() {
  //Select
  $('select').selectpicker();

  //Date Range / Picker
  $('.date-range').daterangepicker(
  	{ 
  		singleDatePicker: true,
	    format		: 'YYYY-MM-DD',
	    startDate	: '2014-05-01',
	});
});


