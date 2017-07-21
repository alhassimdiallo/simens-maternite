<?php

namespace Maternite\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Where;

class NaissanceTable {
	protected $tableGateway;
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
	}
	public function getNaissance($id_cons) {
	
		//$adapter = $this->tableGateway->getAdapter ();
		$db = $this->tableGateway->getAdapter ();
		$sql = new Sql ( $db );
		$sQuery = $sql->select ();
	
				$sQuery->columns ( array (
				'*'
		) );
				
		$sQuery->from( array (
				'enf' => 'enfant'
		) )->join ( array (
				'gro' => 'grossesse' 
		), 'enf.id_maman = gro.id_patient', array (

		))->join (array(
					'acc'=>'accouchement'	
				
		),'acc.id_grossesse = gro.id_grossesse',array(		
		) );
		$sQuery->where ( array (
				'acc.id_cons' => $id_cons
		
		) );
		
		$sQuery->order ( 'enf.id_bebe ASC' );
		
		$stat = $sql->prepareStatementForSqlObject ( $sQuery );
	
		$resultat = $stat->execute ()->current();
		//var_dump($resultat);exit();
		return $resultat;
	}
	
	
	

public function updateNaissance($values) {
		$this->tableGateway->delete ( array (
				'id_maman' => $values ['id_maman'] 
		) );
			$datanaissance = array (
					'id_maman' => $values ['id_patient'],
					'sexe' => $values['sexe'],
					'poids' => $values['poids'],
					'apgar_1' => $values ['apgar_1'],
					'apgar_5' => $values['apgar_5'],
					'malf' => $values['malf'],
					'cri' => $values['cri'],
					'maintien_temp' => $values['maintien_temp'],
					'mise_soin_precoce' => $values['mise_soin_precoce'],
					'soin_cordon' => $values['soin_cordon'],
					'reanimation' => $values['reanimation'],
					'vit_k' => $values['vit_k'],
					'sat' => $values['sat'],
					'collyre' => $values['collyre'],
					'consult_j1_j2' => $values['consult_j1_j2'],
					
			);	//var_dump($datanaissance);exit();
		$this->tableGateway->insert ( $datanaissance );
		//var_dump("test");exit();
	

}
}