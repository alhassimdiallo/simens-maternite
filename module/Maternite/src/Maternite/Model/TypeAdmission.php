<?php
namespace Maternite\Model;

class TypeAdmission {
	public  $id_type_ad;
	Public  $type_admi;
	

	public function exchangeArray($data) {
		$this->id_type_ad = (! empty ( $data ['id_type_ad'] )) ? $data ['id_type_ad'] : null;
		$this->type_admi = (! empty ( $data ['type_admi'] )) ? $data ['type_admi'] : null;
	
	}

	public function getArrayCopy()
	{
		return get_object_vars($this);
	}
}