(function($) {
    'use strict';

    
    if ($("#timepicker-example").length) {
      $('#timepicker-example').datetimepicker({
        format: 'LT'
      });
    }
    if ($(".color-picker").length) {
      $('.color-picker').asColorPicker();
    }
    if ($(".datepicker").length) {
      $('.datepicker').datepicker({
        enableOnReadonly: true,
        todayHighlight: true,
        autoclose: true,
      });
    }
    if ($("#inline-datepicker").length) {
      $('#inline-datepicker').datepicker({
        enableOnReadonly: true,
        todayHighlight: true,
      });
    }
    if ($(".datepicker-autoclose").length) {
      $('.datepicker-autoclose').datepicker({
        autoclose: true
      });
    }
    if ($('input[name="date-range"]').length) {
      $('input[name="date-range"]').daterangepicker();
    }
    if ($('input[name="date-time-range"]').length) {
      $('input[name="date-time-range"]').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'MM/DD/YYYY h:mm A'
        }
      });
    };
    

    
    $(".progress-bar").each(function () {
      var now=$(this).attr('aria-valuenow')
      var max=$(this).attr('aria-valuemax')
      var $percent = (now / max) * 100;
      each_bar_width = $(this).attr('aria-valuenow');
      $(this).width(Math.round($percent) + '%');
      $(this).find('.popOver').html(Math.round($percent) + '%');
      $(this).parent().find('.progress-value').html(" " + now);
  });
  $('.select2').select2();
    
  })(jQuery);


