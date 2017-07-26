<?php

namespace Maternite\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Where;
use Maternite\View\Helpers\DateHelper;

class EvacuationTable {
	
	protected $tableGateway ; 
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
		
		//var_dump('test');exit();
	}
	
	
	
	
	public function getEvacuation($id_patient) {
		$adapter = $this->tableGateway->getAdapter ();
		$sql = new Sql ( $adapter );
		$select = $sql->select ();
		$select->columns ( array (
				'*'
		) );
		$select->from ( array (
				'ev' => 'evacuation'
		) );
		$select->where ( array (
				'ev.id_patient' => $id_patient
		) );
		$select->order ( 'ev.id_evacuation ASC' );
		$stat = $sql->prepareStatementForSqlObject ( $select );
		$result = $stat->execute ()->current();
	
		return $result;
	
	}
	
	
	
	
// public function getEvacuation($id_cons) {
// 		$adapter = $this->tableGateway->getAdapter ();
// 		$sql = new Sql ( $adapter );
// 		$select = $sql->select ();
// 		$select->columns ( array (
// 				'*' 
// 		) );
// 		$select->from ( array (
// 				'eva' => 'evacuation' 
// 		) );
// 		$select->where ( array (
// 				'eva.id_' => $id_cons 
// 		) );
// 		$select->order ( 'eva.id_evac_ref ASC' );
// 		$stat = $sql->prepareStatementForSqlObject ( $select );
// 		$result = $stat->execute ()->current();
		
// 		return $result;
// 	}
	

	public function addEvacuation($donnees) {
		$Control = new DateHelper();
// 		$this->tableGateway->delete ( array (
// 				'id_cons' => $donnees ['id_cons']
// 		) );
		
			$datadonnee = array (
					'id_admission' => $donnees ['id_admission'],
				'id_patient' => $donnees ['id_patient'],
				'motif_evacuation' => $donnees ['motif'],
				'service_origine_ev' => $donnees ['service_origine'],			
		);
		
		//var_dump($datadonnee); exit();
		return $this->tableGateway->getLastInsertValue($this->tableGateway->insert($datadonnee));
	}

	public function getEva($id_patient) {
		$db = $this->tableGateway->getAdapter();
		$sql = new Sql($db);
		$sQuery = $sql->select()
		->from(array('eva' => 'evacuation'))
		->columns( array( '*' ))
		//->join(array('a' => 'admission'), 'a.id_evacuation = eva.id_evacuation' , array('*'))
		->join(array('a' => 'admission'), 'a.id_admission = eva.id_admission' , array('id_admission'))
		//->join(array('ant' => 'antecedent_type_1'), 'ant.id_patient = pat.id_personne' , array('*'))
		->where(array('a.id_patient' => $id_patient));
		$stat = $sql->prepareStatementForSqlObject($sQuery);
		$resultat = $stat->execute()->current();
		//var_dump($resultat);exit();
		return $resultat;
	}
	

    
	

}
