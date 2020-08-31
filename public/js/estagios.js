jQuery(function ($) {
    $(".cnpj").mask('00.000.000/0000-00');
});

function checagem(that) {
    if (that.value == "Não") {
        document.getElementById("medidas").style.display = "block";
    }
    else {
        document.getElementById("medidas").style.display = "none";
        var x = document.forms["form-group"]["pandemiamedidas"].value;
        if (x == "") {
          alert("Caso o estágio não esteja sendo realizado em home office, é obrigatório preencher as medidas sanitárias adotadas pela empresa.");
          return false;
        }


    }
}
