<?php

namespace Maternite\Model;
use Zend\InputFilter\InputFilterInterface;
class Evacuation {
	public $id_evacuation;
	public $motif_evacuation;
	public $service_origine_ev;
	
	public function exchangeArray($data) {
		//$this->id_grossesse = (! empty ( $data ['id_grossesse'] )) ? $data ['id_grossesse'] : null;
		
		
		//$this->id_evacuation = (! empty ( $data ['id_evacuation'] )) ? $data ['id_evacuation'] : null;
		$this->motif_evacuation= (! empty ( $data ['motif_evacuation'] )) ? $data ['motif_evacuation'] : null;
		$this->service_origine_ev= (! empty ( $data ['service_origine_ev'] )) ? $data ['service_origine_ev'] : null;
		
		
		
		
// 		$this->id_cons = (! empty ( $data ['id_cons'] )) ? $data ['id_cons'] : null;
// 		$this->evacue_de= (! empty ( $data ['evacue_de'] )) ? $data ['evacue_de'] : null;
// 		$this->motif_evac= (! empty ( $data ['motif_evac'] )) ? $data ['motif_evac'] : null;
// 	    $this->service_origine= (! empty ( $data ['service_origine'] )) ? $data ['service_origine'] : null;
// 	    $this->evacue_vers= (! empty ( $data ['evacue_vers'] )) ? $data ['evacue_vers'] : null;
// 		$this->motif_ev_vers = (! empty ( $data ['motif_ev_vers'] )) ? $data ['motif_ev_vers'] : null;
// 		$this->service_acceuil_ev = (! empty ( $data ['service_acceuil_ev'] )) ? $data ['service_acceuil_ev'] : null;
// 		$this->reference= (! empty ( $data ['reference'] )) ? $data ['reference'] : null;
// 		$this->motif_ref = (! empty ( $data ['motif_ref'] )) ? $data ['motif_ref'] : null;
// 		$this->reference = (! empty ( $data ['reference'] )) ? $data ['reference'] : null;
		
		
		
	}
	
	public function getArrayCopy() {
		return get_object_vars ( $this );
	}
	
	public function setInputFilter(InputFilterInterface $inputFilter) {
		throw new \Exception ( "Not used" );
	}
}