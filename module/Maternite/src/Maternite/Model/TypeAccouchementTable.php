<?php
namespace Maternite\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;

class TypeAccouchementTable{
	protected $tableGateway;

	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
	}
	public function getTypeAcc($id){
		$id = ( int ) $id;
		$select = $this->tableGateway->select(array('id_type' => $id));
		$serviceRow = $select->current();
		if (! $serviceRow) {
			return null;
		}
		return $serviceRow;
	}
	public function listeTypeAccouchement(){
		$adapter = $this->tableGateway->getAdapter();
		$sql = new Sql($adapter);
		$select = $sql->select();
		$select->from(array('t'=>'type_accouchement'));
		$select->columns(array('id_type','type_accouch'));
		$select->order('id_type ASC');
		$stat = $sql->prepareStatementForSqlObject($select);
		$result = $stat->execute();
		$options = array(0 => "Selectionnez");
		foreach ($result as $data) {
			$options[$data['id_type']] = $data['type_accouch'];
		}
		//var_dump($data);exit();
		return $options;
	}
	public function fetchType()
	{
		$adapter = $this->tableGateway->getAdapter ();
		$sql = new Sql($adapter);
		$select = $sql->select('type_accouchement');
		$select->columns(array('id_type', 'type_accouch'));
		$stat = $sql->prepareStatementForSqlObject($select);
		$result = $stat->execute();
		foreach ($result as $data) {
			$options[$data['id_type']] = $data['type_accouch'];
		}
		return $options;
	}
	public function getTypeParNom($nom_type){
		$adapter = $this->tableGateway->getAdapter();
		$sql = new Sql($adapter);
		$select = $sql->select();
		$select->from(array('les_types'=>'type_accouchement'));
		$select->where(array('type_accouch'=>$nom_type));
		$stat = $sql->prepareStatementForSqlObject($select);
		$result = $stat->execute()->current();
		return $result;
	}
	public function getServiceHopital($idHopital){
		$adapter = $this->tableGateway->getAdapter ();
		$sql = new Sql($adapter);
		$select = $sql->select();
		$select->from(array('s'=>'service'));
		$select->columns(array( 'Id_service' =>'ID_SERVICE','Nom_service' =>'NOM'));
		$select->join(array('hs'=>'hopital_service'), 's.ID_SERVICE = hs.ID_SERVICE');
		$select->join(array('h'=>'hopital'), 'hs.ID_HOPITAL = h.ID_HOPITAL');
		$select->where(array('h.ID_HOPITAL'=>$idHopital));
		$stat = $sql->prepareStatementForSqlObject($select);
		$result = $stat->execute();
		return $result;
	}
	
	public function getServiceHopitalID($idHopital){
		$adapter = $this->tableGateway->getAdapter ();
		$sql = new Sql($adapter);
		$select = $sql->select();
		$select->from(array('s'=>'service'));
		$select->columns(array( 'Id_service' =>'ID_SERVICE','Nom_service' =>'NOM'));
		$select->join(array('hs'=>'hopital_service'), 's.ID_SERVICE = hs.ID_SERVICE');
		$select->join(array('h'=>'hopital'), 'hs.ID_HOPITAL = h.ID_HOPITAL');
		$select->where(array('h.ID_HOPITAL'=>$idHopital));
		$stat = $sql->prepareStatementForSqlObject($select);
		$result = $stat->execute();
		
		foreach ($result as $data) {
			$options[$data['Id_service']] = $data['Nom_service'];
		}
		return $options;
	}
	
	public function getServiceparId($id){
		$adapter = $this->tableGateway->getAdapter();
		$sql = new Sql($adapter);
		$select = $sql->select();
		$select->from(array('s'=>'service'));
		$select->where(array('ID_SERVICE'=>$id));
		
		$stat = $sql->prepareStatementForSqlObject($select);
		$result = $stat->execute()->current();
		
		return $result;
	}
}