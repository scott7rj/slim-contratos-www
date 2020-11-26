console.log('empresa.js');

$('.wrap3').css({'grid-template-columns':'0fr 6fr 4fr'});
$('.wrap4').css({'grid-template-columns':'0fr 4fr 4fr 12fr 0fr'});

function salvarEmpresaSystem() {
	console.log('salvarEmpresaSystem');
}

function inserirAlterarEmpresaSystem(idEmpresa) {
	console.log('inserir alterar empresa ' + idEmpresa);
	$.get('./carregarEmpresa', { idEmpresa: idEmpresa }, function(data) {
        $('#wrapc3').html(data);

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
    });
}
function removerEmpresaSystem(idEmpresa) {
	console.log('remover empresa ' + idEmpresa);
	alert('em implementação');
	return false;
}
formatStringCnpjSystem();
formatStringCepSystem();
formatStringTelefoneSystem();