<?php

namespace Maternite\Model;

class DevenirNouveauNe {
	public $id_bebe;
	public $id_cons;
	public $viv_bien_portant;
	public $viv_mal_form;
	public $malade;
	public $decede;
	public $date_dece;
	public $heure_dece;
	public $note_decede;
	public $note_viv_bien_portant;
	public $note_mal_form;
	public $note_malade;
// 	public ;
// 	public $vit_k;
// 	public $collyre;
// 	public $consult_j1_j2;
// 	public $perim_cranien;
// 	public $perim_cephalique;
// 	public $perim_brachial;
// 	public $taille_enf;
// 	public $note_perim;
// 	public $note_taille;
	
	
	
	public function exchangeArray($data) {
		$this->id_bebe = (! empty ( $data ['id_bebe'] )) ? $data ['id_bebe'] : null;
		$this->id_cons = (! empty ( $data ['id_cons'] )) ? $data ['id_cons'] : null;
		$this->viv_bien_portant= (! empty ( $data ['viv_bien_portant'] )) ? $data ['viv_bien_portant'] : null;
		$this->viv_mal_form= (! empty ( $data ['viv_mal_form'] )) ? $data ['viv_mal_form'] : null;
	    $this->malade= (! empty ( $data ['malade'] )) ? $data ['malade'] : null;
	   $this->decede= (! empty ( $data ['decede'] )) ? $data ['decede'] : null;
		$this->date_dece = (! empty ( $data ['date_dece'] )) ? $data ['date_dece'] : null;
		$this->heure_dece = (! empty ( $data ['heure_dece'] )) ? $data ['heure_dece'] : null;
		$this->note_decede= (! empty ( $data ['note_decede'] )) ? $data ['note_decede'] : null;
		$this->note_viv_bien_portant = (! empty ( $data ['note_viv_bien_portant'] )) ? $data ['note_viv_bien_portant'] : null;
		$this->note_mal_form = (! empty ( $data ['note_mal_form'] )) ? $data ['note_mal_form'] : null;
		$this->note_malade = (! empty ( $data ['note_malade'] )) ? $data ['note_malade'] : null;
		
	}
}