<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="css/lib/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
<style>
html {
	font-size: 12px;
}
table {
	font-size: 1rem;	
	background-color: #F1C40F;
}
table td {
	margin: 0;
	padding: 0.2rem;
	border: 1px solid black;

}
span {
	padding: 0.1rem 0.7rem 0.2rem 0.7rem;
	font-size: 1rem;
	border: 1px solid black;
}
span:hover {
	cursor: pointer;
	background-color: #FCF3CF;
}
.spanTexto {
	padding: 0;
	font-size: 1rem;
	border: 1px solid transparent;
}
.content {
	border: 1px solid crimson;
	margin: 2rem;
	padding: 2rem;
}
.tblItem {
	border-collapse: collapse;
}
.tblItem tr {
	
}
.tblItem td {
	margin:0.2rem;
	padding:0.2rem;
	border:1px solid black; 
	vertical-align: top;
}
.tblSubitem {
	border-collapse: collapse;
}
.tblSubitem tr {

}
.tblSubitem td {
	margin:0.2rem;
	padding:0.2rem;
	border:1px solid black; 
	vertical-align: top;
}


ul {
	margin: 0;
 	list-style-type: none;
}
li {
	margin: 0;
	padding: 0;
}
input[type="text"], select {
    margin: 0;
    padding: 0rem 0rem 0rem 0.1rem;
    border: 1px solid black;
    background-color: white;
    color: black;
    height: 1.5rem;
    text-transform: uppercase;
    font-size: 1rem;
}
.content2 {
	background-color: ;
}
.customInput {
    margin: 0;
    padding: 0rem 0rem 0rem 0.1rem;
    border: 1px solid black;
    background-color: white;
    color: black;
    height: 1.5rem;
    text-transform: uppercase;
    font-size: 1rem;
}
.ulItem {
	margin: 0;
	padding: 0;
}
.liItem {
	margin: 0rem 0rem 2rem 0rem;
	padding: 0.5rem 0.1rem 0.5rem 0.1rem;
	background-color: #F1C40F;
}
.liSubitem {
	margin: 0.1rem;
	padding: 0.1rem 2rem 0.2rem 2rem;
	background-color: #FCF3CF;
}
</style>
</head>
<?php
require_once "env.php";
require_once "./app/dao/Conexao.php";
require_once "./app/dao/ItemSubitemDAO.php";

use app\dao\ItemSubitemDAO;

$dao = new ItemSubitemDAO();
$result = $dao->selectTree(4);

$cont = 0;
$itemArray = array();

foreach ($result as $value) {
	if ($cont == 0) {
		$itemAtual = $value['item'];
		array_push($itemArray, $value);
	} else {
		if ($itemAtual !== $value['item']) {
			$itemAtual = $value['item'];
			array_push($itemArray, $value);
		} else
			$itemAtual = "";
	}
	$cont++;
}
?>
<body>
<!--
<div class="content">
	<?php foreach ($itemArray as $value) { ?>
		<table id="<?=$value['item']?>" class="tblItem">
		<tr>
			<td><span class="glyphicon glyphicon-list"></span><?=$value['item']?></td>
			<td><span class="glyphicon glyphicon-plus" onclick="createSubitem('<?=$value['item']?>');"></span></td>
			<td><span class="glyphicon glyphicon-pencil"></span></td>
			<td><span class="glyphicon glyphicon-trash"></span></td>
		</tr>
		<tr>
			<td>
			<?php foreach ($result as $value2) { ?>
				<?php if ($value['item'] == $value2['item']) { ?>
					<table class="tblSubitem">
						<tr>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><span class="glyphicon glyphicon-minus"></span></td>
							<td><?=$value2['subitem']?></td>
							<td><span class="glyphicon glyphicon-pencil"></span></td>
							<td><span class="glyphicon glyphicon-trash"></span></td>
						</tr>
					</table>
				<?php } ?>
			<?php } ?>
			</td>
		</tr>
		</table>
	<?php } ?>
	<br />
</div>
-->
<div class="content2">
	<table>
	<tr>
		<td>
			<span class="glyphicon glyphicon-plus" onclick="createItem(<?=$value['id_contrato']?>);"></span><span class="spanTexto">Novo Item</span>
		</td>
	</tr>
	<tr>
		<td>
			<?php foreach ($itemArray as $value) { ?>
				<ul id="item_<?=$value['id_item']?>" class="ulItem">
					<li class="liItem">
						<span class="glyphicon glyphicon-list"></span>
						<input type="text" class="customInput" value="<?=$value['item']?>" size="30" maxlength="50" title="ITEM" />
						<span class="glyphicon glyphicon-ok"></span><span class="spanTexto">Salvar Item</span>
						<span class="glyphicon glyphicon-plus" onclick="createSubitem(<?=$value['id_item']?>, '<?=$value['id_subitem']?>');"></span><span class="spanTexto">Novo Subitem</span>
						<span class="glyphicon glyphicon-trash"></span><span class="spanTexto">Remover</span>
						<ul id="subitem_<?=$value['id_subitem']?>" class="nested">
						<?php foreach ($result as $value2) { ?>
							<?php if ($value['item'] == $value2['item']) { ?>
								<li class="liSubitem">
									<input type="text" class="customInput" value="<?=$value2['subitem']?>" size="30" maxlength="50" title="SUBITEM" />
									<input type="text" class="customInput" value="<?=$value2['qtd']?>" size="15" maxlength="17" title="QUANTIDADE" />
									<input type="text" class="customInput" value="<?=$value2['valor_unitario']?>" size="15" maxlength="17" title="VALOR UNITÁRIO" />
									<span class="glyphicon glyphicon-ok" onclick="salvarSubitem(<?=$value2['id_item']?>, <?=$value2['id_subitem']?>, '<?=$value2['subitem']?>', <?=$value2['qtd']?>, <?=$value2['valor_unitario']?>);"></span><span class="spanTexto">Salvar Subitem</span>
									<span class="glyphicon glyphicon-trash"></span><span class="spanTexto">Remover</span>
								</li>
							<?php } ?>
						<?php } ?>
						</ul>
					</li>
				</ul>
			<?php } ?>
		</td>
	</tr>
</div>

<div id="jstree_demo_div"></div>

<script type="text/javascript" src="js/jquery3.5.1.js"></script>
<script type="text/javascript" src="js/jquery.mask.min.js"></script>
<script type="text/javascript" src="js/jstree.min.js"></script>
<script>
function createItem(idContrato) {
	let uls = document.getElementsByClassName('ulItem');
	let ul = null;
	for(let i=0; i<uls.length; i++) {
		ul = uls[0];
		break;
	}
	let li = document.createElement('li');
	let in1 = document.createElement('input');
	in1.setAttribute('type', 'text');
	in1.className = 'customInput';
	in1.setAttribute('value', '');
	in1.setAttribute('size', '30');
	in1.setAttribute('maxlength', '50');
	in1.setAttribute('placeholder', 'ITEM');
	in1.style.margin = '0rem 0.3rem 0rem 0rem';
	
	let sp1 = document.createElement('span');
	sp1.className = 'glyphicon glyphicon-ok';
	sp1.setAttribute('onclick', 'salvarItem('+idContrato+', this);');
	sp1.style.margin = '0rem 0.2rem 0rem 0rem';

	let sp2 = document.createElement('span');
	sp2.className = 'glyphicon glyphicon-trash';
	sp2.setAttribute('onclick', 'removeNewElement(this);');
	sp2.style.margin = '0rem 0.2rem 0rem 0rem';

	li.appendChild(in1);
	li.appendChild(sp1);
	li.appendChild(sp2);
	ul.prepend(li);
}
function salvarItem(idContrato, obj) {
	console.log(idContrato + ' ' +  obj.parentElement.firstChild.value);
}
function createSubitem(id, idSubitem) {
	console.log(id + ' ' + idSubitem);
	let ul = document.getElementById('subitem_'+idSubitem);
	let li = document.createElement('li');
	li.setAttribute('class', 'liSubitem new');
	let in1 = document.createElement('input');
	in1.setAttribute('type', 'text');
	in1.className = 'customInput';
	in1.setAttribute('value', '');
	in1.setAttribute('size', '30');
	in1.setAttribute('maxlength', '50');
	in1.setAttribute('placeholder', 'SUBITEM');
	in1.style.margin = '0rem 0.3rem 0rem 0rem';
	
	let in2 = document.createElement('input');
	in2.setAttribute('type', 'text');
	in2.className = 'customInput';
	in2.setAttribute('value', '');
	in2.setAttribute('size', '15');
	in2.setAttribute('maxlength', '17');
	in2.setAttribute('placeholder', 'QUANTIDADE');
	in2.style.margin = '0rem 0.3rem 0rem 0rem';
	
	let in3 = document.createElement('input');
	in3.setAttribute('type', 'text');
	in3.className = 'customInput';
	in3.setAttribute('value', '');
	in3.setAttribute('size', '15');
	in3.setAttribute('maxlength', '17');
	in3.setAttribute('placeholder', 'VALOR UNITÁRIO');
	in3.style.margin = '0rem 0.2rem 0rem 0rem';

	let sp1 = document.createElement('span');
	sp1.className = 'glyphicon glyphicon-ok';
	sp1.setAttribute('onclick', 'salvarSubitem('+id+', 0, "", 0, 0);');
	//sp1.innerText = 'Salvar';
	sp1.style.margin = '0rem 0.2rem 0rem 0rem';

	let sp2 = document.createElement('span');
	sp2.className = 'glyphicon glyphicon-trash';
	sp2.setAttribute('onclick', 'removeNewElement(this);');
	//sp2.innerText = 'Remover';	
	sp2.style.margin = '0rem 0.2rem 0rem 0rem';
	
	li.appendChild(in1);
	li.appendChild(in2);
	li.appendChild(in3);
	li.appendChild(sp1);
	li.appendChild(sp2);

	ul.appendChild(li);

}

function removeNewElement(obj) {
	obj.parentElement.remove();
	return;
}

$(function () { $('#jstree_demo_div').jstree(); });

</script>
</body>
</html>

