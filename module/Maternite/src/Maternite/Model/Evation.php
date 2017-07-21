<?php

namespace Maternite\Model;

class Evacuation {
	public $evacue_de;
	public $id_cons;
	public $motif_evac;
	public $service_origine;
	public $evacue_vers;
	public $motif_ev_vers;
	public $service_acceuil;
	public $reference;
	public $motif_ref;
	public $refere_de;
	
	public function exchangeArray($data) {
		//$this->id_grossesse = (! empty ( $data ['id_grossesse'] )) ? $data ['id_grossesse'] : null;
		$this->id_cons = (! empty ( $data ['id_cons'] )) ? $data ['id_cons'] : null;
		$this->evacue_de= (! empty ( $data ['evacue_de'] )) ? $data ['evacue_de'] : null;
		$this->motif_evac= (! empty ( $data ['motif_evac'] )) ? $data ['motif_evac'] : null;
	    $this->service_origine= (! empty ( $data ['service_origine'] )) ? $data ['service_origine'] : null;
	    $this->evacue_vers= (! empty ( $data ['evacue_vers'] )) ? $data ['evacue_vers'] : null;
		$this->motif_ev_vers = (! empty ( $data ['motif_ev_vers'] )) ? $data ['motif_ev_vers'] : null;
		$this->service_acceuil = (! empty ( $data ['service_acceuil'] )) ? $data ['service_acceuil'] : null;
		$this->reference= (! empty ( $data ['reference'] )) ? $data ['reference'] : null;
		$this->motif_ref = (! empty ( $data ['motif_ref'] )) ? $data ['motif_ref'] : null;
		$this->reference = (! empty ( $data ['reference'] )) ? $data ['reference'] : null;
		$this->antibiotique = (! empty ( $data ['antibiotique'] )) ? $data ['antibiotique'] : null;
		$this->anticonvulsant = (! empty ( $data ['anticonvulsant'] )) ? $data ['anticonvulsant'] : null;
		$this->transfusion = (! empty ( $data ['transfusion'] )) ? $data ['transfusion'] : null;
		$this->observations = (! empty ( $data ['observations'] )) ? $data ['observations'] : null;
		
	}
}