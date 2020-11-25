function filterFunction() {
	var input, filter, ul, li, a, i;
	input = document.getElementById("dvMenuTxtPesquisa");
	filter = input.value.toUpperCase();
	div = document.getElementById("contentDropdown");
	a = div.getElementsByTagName("option");
	if (filter === 'ALL') {
		for(i = 0; i < a.length; i++) 
			a[i].style.display = "";
	} else {
		for(i = 0; i < a.length; i++) {
			txtValue = a[i].textContent || a[i].innerText || a[i].innerHTML;
			if (txtValue.toUpperCase().indexOf(filter) > -1) {
				a[i].style.display = "";
			} else {
				a[i].style.display = "none";
			}
		}
	}
	for(i = 0; i < a.length; i++) {
		if(a[i].style.display === "") {
			a[i].selected = 'selected';
			break;
		}
	}
	if(input.value !== "")
		document.getElementById("contentDropdown").style.display = "block";
	else 
		document.getElementById("contentDropdown").style.display = "none";  
}

$(document.getElementById("dvMenuSel")).on('keypress', function(e) {
	if (e.keyCode == 13) {
    	callApi(document.getElementById("dvMenuSel").value, true);
    }
}); 

$(document.getElementById("dvMenuSel")).on('click', function(e) {
	callApi(document.getElementById("dvMenuSel").value, true);
});

document.addEventListener("keydown", function(event) {
	if(event.keyCode === 27){
		if (document.getElementById("dvMenuSel")) {
			document.getElementById("contentDropdown").style.display = "none";
			document.getElementById("dvMenuTxtPesquisa").value = '';
			document.getElementById("dvMenuTxtPesquisa").focus();
		}
	}
});