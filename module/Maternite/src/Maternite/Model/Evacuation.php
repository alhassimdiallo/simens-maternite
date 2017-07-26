<?php

namespace Maternite\Model;
use Zend\InputFilter\InputFilterInterface;
class Evacuation {
	public $id_patient;
	public $id_admission;
	public $id_evacuation;
	public $motif_evacuation;
	public $service_origine_ev;
	
	public function exchangeArray($data) {
		$this->id_patient = (! empty ( $data ['id_patient'] )) ? $data ['id_patient'] : null;
		$this->id_admission = (! empty ( $data ['id_admission'] )) ? $data ['id_admission'] : null;
		$this->id_evacuation = (! empty ( $data ['id_evacuation'] )) ? $data ['id_evacuation'] : null;
		$this->motif_evacuation= (! empty ( $data ['motif_evacuation'] )) ? $data ['motif_evacuation'] : null;
		$this->service_origine_ev= (! empty ( $data ['service_origine_ev'] )) ? $data ['service_origine_ev'] : null;
	
	}
	
	public function getArrayCopy() {
		return get_object_vars ( $this );
	}
	
	public function setInputFilter(InputFilterInterface $inputFilter) {
		throw new \Exception ( "Not used" );
	}
}