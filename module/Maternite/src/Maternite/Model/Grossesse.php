<?php

namespace Maternite\Model;

class Grossesse {
	public $id_patient;

	public $ddr;
	public $duree_grossesse;
	public $nb_cpn;
	public $bb_attendu;
	public $vat_1;
	public $vat_2;
	public $vat_3;

	public function exchangeArray($data) {
				
		$this->ddr= (! empty ( $data ['ddr'] )) ? $data ['ddr'] : null;
		$this->duree_grossesse= (! empty ( $data ['duree_grossesse'] )) ? $data ['duree_grossesse'] : null;
		$this->bb_attendu= (! empty ( $data ['bb_attendu'] )) ? $data ['bb_attendu'] : null;		    
		$this->vat_1 = (! empty ( $data ['vat_1'] )) ? $data ['vat_1'] : null;
		$this->vat_2 = (! empty ( $data ['vat_2'] )) ? $data ['vat_2'] : null;
		$this->vat_3= (! empty ( $data ['vat_3'] )) ? $data ['vat_3'] : null;
		$this->nb_cpn= (! empty ( $data ['nb_cpn'] )) ? $data ['nb_cpn'] : null;
		$this->id_patient = (! empty ( $data ['id_patient'] )) ? $data ['id_patient'] : null;
	
		
	}
	public function getArrayCopy() {
		//return get_object_vars ( $this );
	}
}