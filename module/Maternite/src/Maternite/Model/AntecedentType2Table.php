<?php

namespace Maternite\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Maternite\View\Helpers\DateHelper;

class AntecedentType2Table {
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

        public function addAntecedentType2($donnees){
        	return $this->tableGateway->getLastInsertValue($this->tableGateway->insert($donnees));
        }
	
        public function updateAntecedentType2($donnees) {
        	
        	$this->tableGateway->delete ( array (
        			'id_cons' => $donnees ['id_cons']
        	) );
        
        	$datadonnee = array (
        			'id_cons' => $donnees ['id_cons'],
        			'id_patient' => $donnees ['id_patient'],
        			'dystocie' => $donnees ['dystocie'],
        			'eclampsie' => $donnees ['eclampsie'],
        			'cycle' => $donnees ['cycle'],
        			'duree_cycle' => $donnees ['duree_cycle'],
        			'regularite' => $donnees ['regularite'],
        			'note_dystocie' => $donnees ['note_dystocie'],
        			'note_eclampsie' => $donnees ['note_eclampsie'],
        			
        			'note_cycle' => $donnees ['note_cycle'],
        			'autre' => $donnees ['autre'],
        			'note_autre' => $donnees ['note_autre'],
        
        	);
        
        	
        		return $this->tableGateway->getLastInsertValue($this->tableGateway->insert($datadonnee));
        	
        	//var_dump($datadonnee); exit();
        	//$this->tableGateway->insert ( $datadonnee );
        }
        

	
	
	
	
	
	
	
	
}