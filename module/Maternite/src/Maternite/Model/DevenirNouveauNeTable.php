<?php

namespace Maternite\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Where;

class DevenirNouveauNeTable {
	protected $tableGateway;
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
	}
	public function getNouveauNe($id_cons) {
	
		//$adapter = $this->tableGateway->getAdapter ();
		$db = $this->tableGateway->getAdapter ();
		$sql = new Sql ( $db );
		$sQuery = $sql->select ();
	
				$sQuery->columns ( array (
				'*'
		) );
				
		$sQuery->from( array (
				'nv' => 'devenir_nouveau_ne'
		) )->join ( array (
				'enf' => 'enfant' 
		), 'enf.id_bebe = nv.id_bebe', array (

		));
		$sQuery->where ( array (
				'acc.id_cons' => $id_cons
		
		) );
		
		$sQuery->order ( 'nv.id_devenir_nouveau_ne ASC' );
		
		$stat = $sql->prepareStatementForSqlObject ( $sQuery );
	
		$resultat = $stat->execute ()->current();
		//var_dump($resultat);exit();
		return $resultat;
	}
	
	
	

public function updateNouveauNe($values) {
		$this->tableGateway->delete ( array (
				'id_cons' => $values ['id_cons'] 
		) );
			$datanaissance = array (
					'id_cons' => $values ['id_cons'],
					//'id_maman' => $values ['id_patient'],
					'viv_bien_portant' => $values['viv_bien_portant'],
					'viv_mal_form' => $values['viv_mal_form'],
					'malade' => $values ['malade'],
					'decede' => $values['decede'],
					'date_dece' => $values['date_dece'],
					'heure_dece' => $values['heure_dece'],
					'note_decede' => $values['note_decede'],
					'note_viv_bien_portant' => $values['note_viv_bien_portant'],
					'note_mal_form' => $values['note_mal_form'],
					'note_malade' => $values['note_malade'],
					
					
			);	//var_dump($datanaissance);exit();
		$this->tableGateway->insert ( $datanaissance );
		//var_dump("test");exit();
	

}
}