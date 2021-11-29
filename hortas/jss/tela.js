function ApenasLetras(e, t) {
    try {
        if (window.event) {
            var charCode = window.event.keyCode;
        } else if (e) {
            var charCode = e.which;
        } else {
            return true;
        }
        if (
            (charCode > 64 && charCode < 91) || 
            (charCode > 96 && charCode < 123) ||
            (charCode > 191 && charCode <= 255) || // letras com acentos
            (charCode == 32)
        ){
            return true;
        } else {
            return false;
        }
    } catch (err) {
        alert(err.Description);
    }
}

function ApenasNumeros(e, t) {
    try {
        if (window.event) {
            var charCode = window.event.keyCode;
        } else if (e) {
            var charCode = e.which;
        } else {
            return true;
        }
        if (
            (charCode >= 48 && charCode <= 57)
        ){
            return true;
        } else {
            return false;
        }
    } catch (err) {
        alert(err.Description);
    }
}
$(document).ready(function(){
    $("#cpf").mask("999.999.999-99");
});

$(document).ready(function(){
    $("#telefone").mask("9999-9999");
});
$(document).ready(function(){
    $("#celular").mask("99999-9999");
});
$(document).ready(function(){
    $("#cnpj").mask("99.999.999/9999-99");
});
$(document).ready(function(){
    $("#cep").mask("99999-999");
});


