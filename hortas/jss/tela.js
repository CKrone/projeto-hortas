
function sair() {
    var res = confirm("Deseja realmente Sair?");
    if (res == true) {
        location = "logout.php";
    } else {

    }
}

function informar() {
    alert('Caso deseje doar hortaliças já cadastradas, vá ao menu Informar e escolha a opção Atualizar Hortaliças!!');
    Location: '../php/atualizarhortalicas.php'; 
}

