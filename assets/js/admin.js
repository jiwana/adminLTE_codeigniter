$('.allcb').change(function(){
    var dis = $(this);
    $('.datacb').attr('checked',dis.is(':checked'));
});

$('#dataform').opsiPilihanSubmit();
$("input[type='tel']").inputNumerik({
    max:16
});

$(".select2").each(function(){
    $(this).prepend("<option></option>");
    $(this).select2({
        placeholder: $(this).attr("data-placeholder"),
        allowClear: true
    });
});