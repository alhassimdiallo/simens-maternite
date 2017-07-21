<?php

namespace Maternite\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Maternite\View\Helpers\DateHelper;

class Antecedent_type1Table {
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
	}

	
	
	public function getAdmission() {
	
		$today = new \DateTime ( 'now' );
		$date = $today->format ( 'Y-m-d' );
	
		$adapter = $this->tableGateway->getAdapter ();
		$sql = new Sql ( $adapter );
		$select = $sql->select ();
		$select->from ( array (
				'ad' => 'admission'
		) );}
public function addAntecedentGrossesse($donnees){
		$this->tableGateway->insert($donnees);
	
}
	


public function updateAntecedentType1($donnees) {
	$Control = new DateHelper();
	$this->tableGateway->delete ( array (
			'id_cons' => $donnees ['id_cons']
	) );

	$datadonnee = array (
			'id_cons' => $donnees ['id_cons'],
			'id_patient' => $donnees ['id_patient'],
			'enf_viv' => $donnees ['enf_viv'],
			'parite' => $donnees ['parite'],
			'geste' => $donnees ['geste'],
			'note_enf' => $donnees ['note_enf'],
			'note_parite' => $donnees ['note_parite'],
			'note_geste' => $donnees ['note_geste'],
			'mort_ne' => $donnees ['mort_ne'],
			'note_mort_ne' => $donnees ['note_mort_ne'],
			'cesar' => $donnees ['cesar'],
			'note_cesar' => $donnees ['note_cesar'],
				
	);


	//var_dump($datadonnee); exit();
	$this->tableGateway->insert ( $datadonnee );
}

	
	
	
	
	
	
	
	
}