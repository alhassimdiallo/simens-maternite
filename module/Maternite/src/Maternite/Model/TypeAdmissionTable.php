<?php
namespace Maternite\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;

class TypeAdmissionTable{
	protected $tableGateway;

	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
	}
	public function getTypeAd($id){
		$id = ( int ) $id;
		$select = $this->tableGateway->select(array('id_type_ad' => $id));
		
		$serviceRow = $select->current();
		if (! $serviceRow) {
			return null;
		}
		return $serviceRow;
	}
	
	
	
	
	public function getTypeAdmi($id_patient) {
		$db = $this->tableGateway->getAdapter();
		$sql = new Sql($db);
		$sQuery = $sql->select()
		->from(array('t' => 'type_admission'))
		->columns( array( 'type_admi' ))
		//->join(array('a' => 'admission'), 'a.id_evacuation = eva.id_evacuation' , array('*'))
		->join(array('a' => 'admission'), 'a.id_type_ad = t.id_type_ad' , array('id_type_ad'))
		//->join(array('ant' => 'antecedent_type_1'), 'ant.id_patient = pat.id_personne' , array('*'))
		->where(array('a.id_patient' => $id_patient));
		$stat = $sql->prepareStatementForSqlObject($sQuery);
		$resultat = $stat->execute()->current();
		//var_dump($resultat);exit();
		return $resultat;
	}
	
	
	
	public function listeTypeAdmission(){
		//var_dump('test');exit();
		$adapter = $this->tableGateway->getAdapter();
		$sql = new Sql($adapter);
		$select = $sql->select();
		$select->from(array('t'=>'type_admission'));
		$select->columns(array('id_type_ad', 'type_admi'));
		$select->order('id_type_ad ASC');
		$stat = $sql->prepareStatementForSqlObject($select);
		$result = $stat->execute();
		
		$options = array(0 => "Selectionnez un type dans la liste");
		foreach ($result as $data) {
			$options[$data['id_type_ad']] = $data['type_admi'];
		}
		
		return $options;
	}
	public function fetchType()
	{
		$adapter = $this->tableGateway->getAdapter ();
		$sql = new Sql($adapter);
		$select = $sql->select('type_admission');
		$select->columns(array('id_type_ad', 'type_admi'));
		$stat = $sql->prepareStatementForSqlObject($select);
		$result = $stat->execute();
		foreach ($result as $data) {
			$options[$data['id_type_ad']] = $data['type_admi'];
		}
		return $options;
	}
	public function getTypeParNom($nom_type){
		$adapter = $this->tableGateway->getAdapter();
		$sql = new Sql($adapter);
		$select = $sql->select();
		$select->from(array('les_types'=>'type_admission'));
		$select->where(array('type_admission'=>$nom_type));
		$stat = $sql->prepareStatementForSqlObject($select);
		$result = $stat->execute()->current();
		return $result;
	}
	
	
	
	

}