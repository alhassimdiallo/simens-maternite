<?php

namespace Maternite\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Where;
use Maternite\View\Helpers\DateHelper;

class ReferenceTable {
	
	protected $tableGateway ; 
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
	//	var_dump('test');exit();
		
		//var_dump('test');exit();
	}
public function getReference($id_patient) {
		$adapter = $this->tableGateway->getAdapter ();
		$sql = new Sql ( $adapter );
		$select = $sql->select ();
		$select->columns ( array (
				'*'
		) );
		$select->from ( array (
				'ref' => 'reference'
		) );
		$select->where ( array (
				'ref.id_patient' => $id_patient
		) );
		$select->order ( 'ref.id_reference ASC' );
		$stat = $sql->prepareStatementForSqlObject ( $select );
		$result = $stat->execute ()->current();
	
		return $result;
	
	}
	
	public function getRef($id_patient) {
		$db = $this->tableGateway->getAdapter();
		$sql = new Sql($db);
		$sQuery = $sql->select()
		->from(array('ref' => 'reference'))
		->columns( array( '*' ))
		->join(array('a' => 'admission'), 'a.id_reference = ref.id_reference' , array('*'))
		//->join(array('a' => 'admission'), 'a.id_patient = pat.id_personne' , array('id_admission'))
		//->join(array('ant' => 'antecedent_type_1'), 'ant.id_patient = pat.id_personne' , array('*'))
		->where(array('ref.id_patient' => $id_patient));
		$stat = $sql->prepareStatementForSqlObject($sQuery);
		$resultat = $stat->execute()->current();
		//var_dump($resultat);exit();
		return $resultat;
	}
	public function addReference($donnees) {
		
		$Control = new DateHelper();
// 		$this->tableGateway->delete ( array (
// 				'id_patient' => $donnees ['id_patient']
// 		) );
		
		$datadonnee = array (
				'id_patient' => $donnees ['id_patient'],
				'id_admission' => $donnees ['id_admission'],
				'motif_reference' => $donnees ['motif_reference'],
				'service_origine_ref' => $donnees ['service_origine_ref'],
		
				
		);
	
		
		//var_dump($datadonnee); exit();
		return $this->tableGateway->getLastInsertValue($this->tableGateway->insert($datadonnee ));
		//$this->tableGateway->insert ( $datadonnee );
	}
	public function saveEvacuation($infoEvacuation)
	{
	
		//}
	}

    public function updateEvacuation($donnees) {
    
    	$Control = new DateHelper();
    	
		$this->tableGateway->delete ( array (
				'id_cons' => $donnees ['id_cons'], 
				
		) );
		
			$dataev = array (
					'id_cons' => $donnees ['id_cons'],
					//'id_grossesse'=>$donnees['id_grossesse'],
					'evacue_de' => $donnees['evacue_de'],
					'motif_evac' => $donnees['motif_evac'],
					'service_origine' => $donnees['service_origine'],
					'evacue_vers' => $donnees['evacue_vers'],
					'motif_ev_vers' => $donnees['motif_ev_vers'],
					'service_acceuil' => $donnees['service_acceuil'],
					'reference' => $donnees['reference'],
					'motif_ref' => $donnees['motif_ref'],
					'refere_de' => $donnees['refere_de'],
					
					
			);
			
			//var_dump($dataev);exit();
			$this->tableGateway->insert ( $dataev );
			//var_dump("test"); exit();
			//var_dump($dataac);exit();
			//var_dump($dataaccouchement);exit();
	}
	public function getRefer($id_admission) {
		$db = $this->tableGateway->getAdapter();
		$sql = new Sql($db);
		$sQuery = $sql->select()
		->from(array('ref' => 'reference'))
		->columns( array( '*' ))
		//->join(array('a' => 'admission'), 'a.id_evacuation = eva.id_evacuation' , array('*'))
		->join(array('a' => 'admission'), 'a.id_admission = ref.id_admission' , array('id_admission'))
		//->join(array('ant' => 'antecedent_type_1'), 'ant.id_patient = pat.id_personne' , array('*'))
		->where(array('a.id_admission' => $id_admission));
		$stat = $sql->prepareStatementForSqlObject($sQuery);
		$resultat = $stat->execute()->current();
		//var_dump($resultat);exit();
		return $resultat;
	}
	

}

