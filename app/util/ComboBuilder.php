<?php
namespace app\util;
use app\dao\UfDAO;
use app\dao\TipoDocumentoDAO;
use app\dao\TipoContatoDAO;

final class ComboBuilder extends Util {

	public function __construct() {
		parent::__construct;
	}

	static function comboUf($id, $class, $valueToCheck, $hasEmptyOption, $width) {
		if ($class !== "")
			$result = "<select id='{$id}' name='{$id}' class='{$class}' style='width:{$width};'>";
		else
			$result = "<select id='{$id}' name='{$id}' style='width:{$width};'>";
		if($hasEmptyOption) 
			$result .= "<option value=''></option>";
		try {
			$dao = new UfDAO();
			$array = $dao->selectUf();
			foreach($array as $item) {
				if($valueToCheck === $item['uf'])
					$result .= "<option value='{$item['uf']}' selected>{$item['uf']}</option>";
				else
					$result .= "<option value='{$item['uf']}'>{$item['uf']}</option>";
			}
			$result .= "</select>";
			return $result;
		} catch(Exception $e) {
			throw new Exception($e->getMessage());
		}
	}

	static function comboTipoDocumentoPorIdDominio($idDominio, $id, $class, $valueToCheck, $hasEmptyOption, $width) {
		if ($class !== "")
			$result = "<select id='{$id}' name='{$id}' class='{$class}' style='width:{$width};'>";
		else
			$result = "<select id='{$id}' name='{$id}' style='width:{$width};'>";
		if($hasEmptyOption) 
			$result .= "<option value=''></option>";
		try {
			$dao = new TipoDocumentoDAO();
			$array = $dao->selectTipoDocumentoPorIdDominio($idDominio);
			foreach($array as $item) {
				if($valueToCheck === $item['id_tipo_documento'])
					$result .= "<option value='{$item['id_tipo_documento']}' selected>{$item['tipo_documento']}</option>";
				else
					$result .= "<option value='{$item['id_tipo_documento']}'>{$item['tipo_documento']}</option>";
			}
			$result .= "</select>";
			return $result;
		} catch(Exception $e) {
			throw new Exception($e->getMessage());
		}
	}

	static function comboTipoContato($id, $class, $valueToCheck, $hasEmptyOption, $width) {
		if ($class !== "")
			$result = "<select id='{$id}' name='{$id}' class='{$class}' style='width:{$width};'>";
		else
			$result = "<select id='{$id}' name='{$id}' style='width:{$width};'>";
		if($hasEmptyOption) 
			$result .= "<option value=''></option>";
		try {
			$dao = new TipoContatoDAO();
			$array = $dao->selectTipoContato();
			foreach($array as $item) {
				if($valueToCheck === $item['id_tipo_contato'])
					$result .= "<option value='{$item['id_tipo_contato']}' selected>{$item['tipo_contato']}</option>";
				else
					$result .= "<option value='{$item['id_tipo_contato']}'>{$item['tipo_contato']}</option>";
			}
			$result .= "</select>";
			return $result;
		} catch(Exception $e) {
			throw new Exception($e->getMessage());
		}
	}

}