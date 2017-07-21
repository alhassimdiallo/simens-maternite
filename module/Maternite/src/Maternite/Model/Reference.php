<?php

namespace Maternite\Model;
use Zend\InputFilter\InputFilterInterface;
class Reference {

	public $id_reference;
	public $motif_reference;
	public $service_origine_ref;
	
	
	public function exchangeArray($data) {
		//$this->id_grossesse = (! empty ( $data ['id_grossesse'] )) ? $data ['id_grossesse'] : null;
		//$this->id_reference = (! empty ( $data ['id_reference'] )) ? $data ['id_reference'] : null;
		$this->motif_reference= (! empty ( $data ['motif_reference'] )) ? $data ['motif_reference'] : null;
	    $this->service_origine_ref= (! empty ( $data ['service_origine_ref'] )) ? $data ['service_origine_ref'] : null;
	   
		
		
		
	}
	
	public function getArrayCopy() {
		return get_object_vars ( $this );
	}
	
	public function setInputFilter(InputFilterInterface $inputFilter) {
		throw new \Exception ( "Not used" );
	}
}