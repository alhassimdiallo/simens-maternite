<?php

namespace Maternite\Model;

class Naissance {
	public $id_maman;
	public $id_cons;
	public $sexe;
	public $poids;
	public $apgar_1;
	public $apgar_5;
	public $malf;
	public $cri;
	public $maintien_temp;
	public $mise_soin_precoce;
	public $soin_cordon;
	public $reanimation;
	public $sat;
	public $vit_k;
	public $collyre;
	public $consult_j1_j2;
	public $perim_cranien;
	public $perim_cephalique;
	public $perim_brachial;
	public $taille_enf;
	public $note_perim;
	public $note_taille;
	
	
	
	public function exchangeArray($data) {
		$this->id_maman = (! empty ( $data ['id_maman'] )) ? $data ['id_maman'] : null;
		$this->id_cons = (! empty ( $data ['id_cons'] )) ? $data ['id_cons'] : null;
		$this->sexe= (! empty ( $data ['sexe'] )) ? $data ['sexe'] : null;
		$this->poids= (! empty ( $data ['poids'] )) ? $data ['poids'] : null;
	    $this->apgar_1= (! empty ( $data ['apgar_1'] )) ? $data ['apgar_1'] : null;
	   $this->apgar_5= (! empty ( $data ['apgar_5'] )) ? $data ['apgar_5'] : null;
		$this->malf = (! empty ( $data ['malf'] )) ? $data ['malf'] : null;
		$this->cri = (! empty ( $data ['cri'] )) ? $data ['cri'] : null;
		$this->maintien_temp= (! empty ( $data ['maintien_temp'] )) ? $data ['maintien_temp'] : null;
		$this->mise_soin_precoce = (! empty ( $data ['mise_soin_precoce'] )) ? $data ['mise_soin_precoce'] : null;
		$this->soin_cordon = (! empty ( $data ['soin_cordon'] )) ? $data ['soin_cordon'] : null;
		$this->reanimation = (! empty ( $data ['reanimation'] )) ? $data ['reanimation'] : null;
		$this->sat = (! empty ( $data ['sat'] )) ? $data ['sat'] : null;
		$this->vit_k = (! empty ( $data ['vit_k'] )) ? $data ['vit_k'] : null;
		$this->collyre = (! empty ( $data ['collyre'] )) ? $data ['collyre'] : null;
		$this->consult_j1_j2 = (! empty ( $data ['consult_j1_j2'] )) ? $data ['consult_j1_j2'] : null;
		$this->perim_cranien = (! empty ( $data ['perim_cranien'] )) ? $data ['perim_cranien'] : null;
		$this->perim_brachial = (! empty ( $data ['perim_brachial'] )) ? $data ['perim_brachial'] : null;
		$this->perim_cephalique = (! empty ( $data ['perim_cephalique'] )) ? $data ['perim_cephalique'] : null;
		$this->taille_enf = (! empty ( $data ['taille_enf'] )) ? $data ['taille_enf'] : null;
		$this->note_perim = (! empty ( $data ['note_perim'] )) ? $data ['note_perim'] : null;
		$this->note_taille = (! empty ( $data ['note_taille'] )) ? $data ['note_taille'] : null;
	}
}