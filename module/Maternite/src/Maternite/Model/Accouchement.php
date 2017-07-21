<?php

namespace Maternite\Model;

class Accouchement {
	public $id_grossesse;
	public $id_admission;
	public $id_cons;
	public $type_accouchement;
	public $date_accouchement;
	public $heure_accouchement;
	public $delivrance;
	public $motif_type;
	public $ru;
	public $hemoragie;
	public $ocytocique_per;
	public $ocytocique_post;
	public $antibiotique;
	public $anticonvulsant;
	public $transfusion;
	public $observations;
	public function exchangeArray($data) {
		$this->id_grossesse = (! empty ( $data ['id_grossesse'] )) ? $data ['id_grossesse'] : null;
		$this->id_admission = (! empty ( $data ['id_admission'] )) ? $data ['id_admission'] : null;
		$this->id_cons = (! empty ( $data ['id_cons'] )) ? $data ['id_cons'] : null;
		$this->type_accouchement= (! empty ( $data ['type_accouchement'] )) ? $data ['type_accouchement'] : null;
		$this->motif_type= (! empty ( $data ['motif_type'] )) ? $data ['motif_type'] : null;
	    $this->date_accouchement= (! empty ( $data ['date_accouchement'] )) ? $data ['date_accouchement'] : null;
	    $this->heure_accouchement= (! empty ( $data ['heure_accouchement'] )) ? $data ['heure_accouchement'] : null;
		$this->delivrance = (! empty ( $data ['delivrance'] )) ? $data ['delivrance'] : null;
		$this->ru = (! empty ( $data ['ru'] )) ? $data ['ru'] : null;
		$this->hemoragie= (! empty ( $data ['hemoragie'] )) ? $data ['hemoragie'] : null;
		$this->ocytocique_per = (! empty ( $data ['ocytocique_per'] )) ? $data ['ocytocique_per'] : null;
		$this->ocytocique_post = (! empty ( $data ['ocytocique_post'] )) ? $data ['ocytocique_post'] : null;
		$this->antibiotique = (! empty ( $data ['antibiotique'] )) ? $data ['antibiotique'] : null;
		$this->anticonvulsant = (! empty ( $data ['anticonvulsant'] )) ? $data ['anticonvulsant'] : null;
		$this->transfusion = (! empty ( $data ['transfusion'] )) ? $data ['transfusion'] : null;
		$this->observations = (! empty ( $data ['observations'] )) ? $data ['observations'] : null;
		
	}
}