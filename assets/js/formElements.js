(function( $ ){
    $.fn.selectCustome = function( options ) {

        var settings = $.extend({
            placeholder: 3,
            allowClear: false
        }, options );

        this.select2({
            placeholder: settings.placeholder,
            allowClear: settings.allowClear
        });
    };

    $.fn.dataTblStyle = function( options ) {
        var settings = $.extend({
            tblData:"#datatbl_wrapper"
        }, options );

        $(settings.tblData).css('overflow-x','hidden');
        $(settings.tblData).find(this).parent().css('overflow-x','auto');
    };

    $.fn.opsiPilihanSubmit = function( options ) {

        var settings = $.extend({
            message: "Yakin anda ingin menghapus data yang dipilih ?",
            messageOpsi: "Tidak ada Opsi yang di pilih",
        }, options );

        this.submit(function(){
            $opsi=$(this).find(".menu-action select[name='pilihanOpsi']").val();
            if($opsi=="null"){
                alert(settings.messageOpsi);
                return false;
            }

            if($opsi==2){
                if (confirm(settings.message)) {
                    return true;
                }else{
                    return false;
                }
            }
        });
    };

    $.fn.alertMessageSubmit = function( options ) {

        var settings = $.extend({
            message: "Apa anda yakin ?"
        }, options );

        this.submit(function(){
             var tanyak = confirm(settings.message);
             if(!tanyak){
                 return false;
             }
         });
    };

    $.fn.clearSelected2 = function( options ) {
        var settings = $.extend({
            placeholder: "placeholder anda"
        }, options );

        this.empty();
        this.select2("val", "");
        this.append("<option></option>");
        this.select2({ placeholder: settings.placeholder });
    };

    $.fn.inputNumerik = function( options ) {
        var settings = $.extend({
            max: 4
        }, options );

        this.attr('maxlength',settings.max);
        this.keyup(function () {
            if (this.value != this.value.replace(/[^0-9\.]/g, '')) {
                this.value = this.value.replace(/[^0-9\.]/g, '');
            }
        });
    };

})( jQuery );
