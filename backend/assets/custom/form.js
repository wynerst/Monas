// Form
$(document).ready(function() {
  //Date Range / Picker
  $('.date-range').daterangepicker({ singleDatePicker: true }, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });

  //Select
  $('select').selectpicker();

});


