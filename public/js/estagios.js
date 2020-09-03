jQuery(function ($) {
    $(".cnpj").mask('00.000.000/0000-00');
});

function checagemmedidas(that) {
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

function checagemdeferimento(that) {
    if (that.value == "Deferido") {
        document.getElementById("deferimentoparcial").style.display = "none";
        var x = document.forms["form-group"]["condicaodeferimento"].value;
        if (x == "") {
          alert("Caso o estágio estágio seja parecialmente deferido, é necessário preencher se haverá ou não a redução de tempo.");
          return false;
        }
    }
    else if (that.value == "Indeferido"){
        document.getElementById("deferimentoparcial").style.display = "none";
        var x = document.forms["form-group"]["condicaodeferimento"].value;
        if (x == "") {
          alert("Caso o estágio estágio seja parecialmente deferido, é necessário preencher se haverá ou não a redução de tempo.");
          return false;
        }
    }
    else
    {
        document.getElementById("deferimentoparcial").style.display = "block";

    }
}
