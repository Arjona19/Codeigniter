getServices();
function set_cotizacion(){
    var ele = getElements();
    $.ajax({
                    type:$("#frmCotizacion").attr("method"),
                    url:$("#frmCotizacion").attr("action"),										
                    data:ele,
                    success:function(respuesta){
                        if(!respuesta){
                            iziToast.success({timeout: 5000, icon: 'fa fa-chrome', title: 'OK', message: 'Cotizacion enviada'});	 
                        }else if(respuesta) {
                            iziToast.error({timeout: 5000, icon: 'fa fa-chrome', title: 'Advertencia', message: 'favor de llenar todos los campos correctamente'});
                        }
                    }
    });
}
function getServices(){
    $( "input[type='checkbox']" ).on( "click", getElements );
  $( "select" ).on( "change", getElements );
  getElements();
}
function getElements(){
    var elements = $("#frmCotizacion").serialize();
    var cod = decode_utf8(elements);
    return cod;
}
function encode_utf8(s) {
    return unescape(encodeURIComponent(s));
  }
  
  function decode_utf8(s) {
    return decodeURIComponent(escape(s));
  }