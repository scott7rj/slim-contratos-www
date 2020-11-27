console.log('contrato.js');

$('.wrap3').css({'grid-template-columns':'0fr 1fr 1fr','height':'35rem'});
$('.wrap4').css({'grid-template-columns':'0fr 1fr 1fr 3fr 0fr','height':'35rem'});


function salvarContratoSystem() {
	console.log('salvarEmpresaSystem');
}

function inserirAlterarContratoSystem(idContrato) {
	console.log('inserir alterar contrato ' + idContrato);
	$.get('./carregarContrato', { idContrato: idContrato }, function(data) {
        $('#wrapc3').html(data);
	    /*
        if (idEmpresa > 0) {
	        $.get('./carregarTelefoneEmpresa', { idEmpresa: idEmpresa }, function(data) {
	        	$('#wrapd2').html(data);
	        });

	        $.get('./carregarEmailEmpresa', { idEmpresa: idEmpresa }, function(data) {
	        	$('#wrapd3').html(data);
	        });

	        $.get('./carregarDocumentoEmpresa', { idEmpresa: idEmpresa }, function(data) {
	        	$('#wrapd4').html(data);
	        });
	    } else {
	    	console.log('limpar wrap4');
	    	$('.wrap4 > div').html('');
	    }
	    */
    });
}
function removerContratoSystem(idContrato) {
	console.log('remover contrato ' + idContrato);
	alert('em implementação');
	return false;
}
formatStringCnpjSystem();
formatStringCepSystem();
formatStringTelefoneSystem();