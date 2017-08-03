<?php

namespace Maternite\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Where;
use Maternite\View\Helpers\DateHelper;

class AccouchementTable {
	
	protected $tableGateway;
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
		
	}
	
	
	public function getAccouchement($id_cons) {
		$adapter = $this->tableGateway->getAdapter ();
		$sql = new Sql ( $adapter );
		$select = $sql->select ();
		$select->columns ( array (
				'*'
		) );
		$select->from ( array (
				'acc' => 'accouchement'
		) );
		$select->where ( array (
				'acc.id_cons' => $id_cons
		) );
		$select->order ( 'acc.id_accouchement ASC' );
		$stat = $sql->prepareStatementForSqlObject ( $select );
		$result = $stat->execute ()->current();
	
		return $result;
	}

    public function updateAccouchement($donnees,$id_grossesse) {
	
    	$Control = new DateHelper();
    	
		$this->tableGateway->delete ( array (
				'id_cons' => $donnees ['id_cons'], 
				
		) );
		$date_accouchement = $donnees['date_accouchement'];
		if($date_accouchement){ $date_accouchement = $Control->convertDateInAnglais($date_accouchement); }else{ $date_accouchement = null;}
		
			$dataac = array (
					'id_cons' => $donnees ['id_cons'],
					'id_admission'=>$donnees['id_admission'],
					'id_grossesse'=>$id_grossesse,
					'type_accouchement' => $donnees['type_accouchement'],
					'motif_type' => $donnees['motif_type'],
					'date_accouchement' => $date_accouchement,
					'heure_accouchement' => $donnees['heure_accouchement'],
					'delivrance' => $donnees['delivrance'],
					'ru' => $donnees['ru'],
					'hemoragie' => $donnees['hemoragie'],
					'ocytocique_per' => $donnees['ocytocique_per'],
					'ocytocique_post' => $donnees['ocytocique_post'],
					'antibiotique' => $donnees['antibiotique'],
					'anticonvulsant' => $donnees ['anticonvulsant'],
					'transfusion' => $donnees['transfusion'],
					'observations' => $donnees['observations'],
					'note_accouchement' => $donnees['note_accouchement'],
					'note_delivrance' => $donnees['note_delivrance'],
					'note_hemorragie' => $donnees['note_hemorragie'],
					'note_ocytocique' => $donnees['note_ocytocique'],
					'note_antibiotique' => $donnees['note_antibiotique'],
					'note_anticonv' => $donnees['note_anticonv'],
					'note_transfusion' => $donnees['note_transfusion'],				
			);
			
			//var_dump($dataac);exit();
			$this->tableGateway->insert ( $dataac );
			//var_dump("test"); exit();
			//var_dump($dataac);exit();
			//var_dump($dataaccouchement);exit();
	}
	

}
