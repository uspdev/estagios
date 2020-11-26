jQuery(function ($) {
    $(".cnpj").mask('00.000.000/0000-00');  
});

function checagemmmedidas(that) {
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

/*
function calculodata(that) {
    var dia=1000*60*60*24;
    var date1_ms = new Date("data_inicial");
    var date2_ms = new Date("data_final");
    var diferenca = Math.abs(date2_ms - date1_ms);
    var tempo = Math.ceil(diferenca/dia);
    document.getElementById("duracao").value = tempo;
}
*/
