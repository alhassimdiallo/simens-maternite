<?php

namespace Maternite\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Maternite\View\Helpers\DateHelper;

class GrossesseTable {
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
		
		
		
		
          public function addgrossesse($donnees){
		return $this->tableGateway->getLastInsertValue($this->tableGateway->insert($donnees));
	
	}
	
	

	
	
	
	
	
	
	
	
}