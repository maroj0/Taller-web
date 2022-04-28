$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })

$('.datepicker').datepicker({
    format: 'mm/dd/yyyy',
    startDate: '-3d'
});