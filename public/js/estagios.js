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

$(document).ready(function() {
    $('#datatable').DataTable({
        language    	: {
            url     : '//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json'
        },  
        paging      	: true,
        lengthChange	: true,
        searching   	: true,
        paging          : false,
        ordering    	: true,
        info        	: true,
        autoWidth   	: true,
        lengthMenu		: [
		    [ 10, 25, 50, 100, -1 ],
		    [ '10 linhas', '25 linhas', '50 linhas', '100 linhas', 'Mostar todos' ]
	    ],
	    pageLength  	: -1
    });
});
