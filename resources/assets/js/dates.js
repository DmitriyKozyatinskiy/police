$('.input-daterange input').each(function() {
    $(this).datepicker({
        clearDates: true,
        format: 'yyyy-mm-dd'
    });
});