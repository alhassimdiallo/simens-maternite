<?php

namespace Maternite\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Maternite\View\Helpers\DateHelper;

class AntecedentType1Table {
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
				'pat' => 'patient'
		) );
	}
   
    public function addAntecedentType1($donnees){
    	$result = $this->tableGateway->select(array('id_patient'=> $donnees['id_patient']));
    	if(!$result->current()){
    		$this->tableGateway->insert($donnees);
    	}else{
    		$this->tableGateway->update($donnees, array('id_patient'=> $donnees['id_patient']));
    	}
    }
	
	

    public function updateAntecedentType1($donnees) {
    	$result = $this->tableGateway->select(array('id_patient'=> $donnees['id_patient']));
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
    
    	if(!$result->current()){
    		$this->tableGateway->insert($datadonnee);
    	}else{
    		$this->tableGateway->update($datadonnee, array('id_patient'=> $donnees['id_patient']));
    	}
    	//var_dump($datadonnee); exit();
    	//$this->tableGateway->insert ( $datadonnee );
    }
    
	
	
	
	
	
	
	
}