<?php
namespace Maternite\Model;

class AntecedentGrossesse {
	public $mort_ne;
	public $cesar;
	public $dystocie;
	public $eclampsie;


	public function exchangeArray($data) {
		$this->mort_ne = (! empty ( $data ['mort_ne'] )) ? $data ['mort_ne'] : null;
		$this->cesar = (! empty ( $data ['cesar'] )) ? $data ['cesar'] : null;
		$this->dystocie = (! empty ( $data ['dystocie'] )) ? $data ['dystocie'] : null;
		$this->eclampsie = (! empty ( $data ['eclampsie'] )) ? $data ['eclampsie'] : null;
	}
	public function getArrayCopy() {
		//return get_object_vars ( $this );
	}
}