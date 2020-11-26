function resetLayoutSystem() {
    $('.wrap3').css({'grid-template-columns':'1fr 1fr 1fr'});
    $('.wrap4').css({'grid-template-columns':'0fr 1fr 1fr 1fr 0fr'});
    $('.wrap5').css({'grid-template-columns':'0fr 1fr 1fr 1fr 0fr'});
}

function clearAllBusinessContentSystem() {
    $('.wrap3 > div').html('');
    $('.wrap4 > div').html('');
    $('.wrap5 > div').html('');
}

(function() {
	$(document).ready(function() {
		console.log('jquery3.5.1 loaded');
	});
})();

$('#dvLoginTxtId').focus();

document.addEventListener("keydown", function(ev){
    if(ev.ctrlKey && ev.key === 'ç') {
        if (document.getElementById("dvMenuTxtPesquisa")) {
            document.getElementById("dvMenuTxtPesquisa").focus();
        }
    }
});

function clearOnLogoutSystem() {
	$('#dvLoginTxtId').val('');
	$('#dvLoginTxtPwd').val('');
	$('#wrapb2').html('');
	$('#wrapb3').html('');
}

function loginSystem() {
	let dados = serializeArray(document.forms["dvLoginFrm"]);
	
	$.post('./login', {data:dados}, function(data) {
		let obj = JSON.parse(data);
		if (typeof obj === undefined || obj.erro !== "") {
			alert('Login ou senha incorretos, verifique');
			$('#dvLoginTxtId').focus();
			return;
		}
		$('#wrapb3').html(obj.matricula + ' ' + obj.nome + '-' + obj.funcao + ' ' + obj.idFuncao + '-' + obj.sgUnidade + ' ' + obj.idUnidade);
        buildMainMenuSystem();	
	});	
}

function logoutSystem() {
	clearOnLogoutSystem();
	resetLayoutSystem();
    clearAllBusinessContentSystem();
	$('#dvLoginTxtId').focus();
}

function buildMainMenuSystem() {
	$.get('./menu', {}, function(data) {
        $('#wrapb2').html(data);
        $('#dvMenuTxtPesquisa').focus();
    });
}

function callApi(destination, clearMenuSection) {
	resetLayoutSystem();
	clearAllBusinessContentSystem();
	let arr = destination.split("|");
	let url = arr[0];
	let method = arr[1];
	let divtarget = arr[2];
	console.log('url ' + url + ' divtarget '+ divtarget);
	if (method === 'GET') {
		$.get('./'+arr[0], {}, function(data) {
			$(divtarget).html(data);
		});
	} else if (method === 'POST') {
		$.post('./'+arr[0], {}, function(data) {
			$(divtarget).html(data);
		});
	} else if (method === 'PUT') {
		$.put('./'+arr[0], {}, function(data) {
			$(divtarget).html(data);
		});
	} else if (method === 'DELETE') {
		$.delete('./'+arr[0], {}, function(data) {
			$(divtarget).html(data);
		});
	} else {
		alert('Método não configurado, verifique menu.json');
		return;
	}
	if (clearMenuSection) {
	    document.getElementById("dvMenuTxtPesquisa").value = '';
	    document.getElementById("contentDropdown").style.display = "none";  
   }
}
function formatStringCnpjSystem() {
	$('.formatcnpj').mask('00.000.000/0000-00');
}
function formatStringCepSystem() {
	$('.formatcep').mask('00000-000');
}
function formatStringTelefoneSystem() {
	$('.formattelefone').mask('(00)0000-0000');
}