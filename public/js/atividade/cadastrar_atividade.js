
function criarAlertaSucesso(mensagem)
{
    $("#alerta").html("<div class='alert alert-success' role='alert'>" + mensagem + "</div>")
}

function criarAlertaErro( arrErros )
{
    var opts = "";
    
    $.each( arrErros , function( campo , arrMsgErro ) {
        $.each( arrMsgErro , function( index , msgErro ) {
            opts += "<li>" + msgErro + "</li>";
        });
    });
    
    $("#alerta").html("<div class='alert alert-danger' role='alert'>" + 
            "Não foi possível salvar o registro" +
            "<ul>" + opts + "</ul>" +
            "</div>");
}


$(document).ready(function(){

    $("#formularioCadastro").submit(function(e) {

        var form = $("#formularioCadastro");

        var url = $(form).attr("action"); 

        $.ajax({
            type: "POST",
            url: url,
            data: $("#formularioCadastro").serialize(), // serializes the form's elements.
            success: function(objRetorno)
            {

                criarAlertaSucesso(objRetorno.msg);

                if( $(form).data("eh-formulario-criar") == true )
                {
                    window.location.href = CAMINHO_ROOT + "atividade/" + objRetorno.id + "/redirecionar" ;
                }

            },
            error: function(retorno)
            {
                var objRetornoJson = retorno.responseJSON;

                criarAlertaErro( objRetornoJson.errors );
            }

        });

        e.preventDefault(); // avoid to execute the actual submit of the form.
    });
    
});

