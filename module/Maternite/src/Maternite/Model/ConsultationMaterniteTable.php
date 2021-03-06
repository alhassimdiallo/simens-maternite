<?php

namespace Maternite\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Where;

class ConsultationMaterniteTable {

    protected $tableGateway;
    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }
    public function getConsultMaternite($id){
        $id = (String) $id;

        $rowset = $this->tableGateway->select ( array (
            'idcons_mater' => $id
        ) );
        $row =  $rowset->current ();
        if (! $row) {
            throw new \Exception ( "Could not find row $id" );
        }
        return $row;
    }

    public function getConsultationMaternitePatient($idcons_mater){

        $adapter = $this->tableGateway->getAdapter ();
        $sql = new Sql ( $adapter );
        $select = $sql->select ();
        $select->columns( array( '*' ));
        $select->from( array( 'cm' => 'consultation_maternite' ));
        $select->join( array('c' => 'consultation'), 'c.ID_CONS = cm.id_cons' , array());

        //On affiche toutes les consultations sauf celle ouverte
        $where = new Where();
        $where->notEqualTo('cm.idcons_mater',$idcons_mater);
        $select->where($where);
        $select->order('c.DATEONLY DESC');

        $stat = $sql->prepareStatementForSqlObject ( $select );
        $result = $stat->execute ();

        return $result;
    }

  /*  public function getConsultationMaterniteDuJour(){
        $today = (new \DateTime())->format('Y-m-d');
        $adapter = $this->tableGateway->getAdapter ();
        $sql = new Sql ( $adapter );
        $select = $sql->select ();
        $select->from( array( 'c' => 'consultation' ));
        $select->join( array('cm' => 'consultation_maternite'), 'cm.id_cons = cm.ID_CONS' , array());
        $select->where(array('c.DATEONLY' => $today));
        return $sql->prepareStatementForSqlObject ( $select )->execute()->current();
    }*/

    /** --------------=============================------------------------------ */
    public function getConsultationMaternitePatientSaufActu($id_pat, $id_cons){
        $adapter = $this->tableGateway->getAdapter ();
        $sql = new Sql ( $adapter );
        $select = $sql->select ();
        $select->columns( array( '*' ));
        $select->from( array( 'c' => 'consultation' ));
        $select->join( array('cm' => 'consultation_maternite'), 'cm.id_cons = cm.ID_CONS' , array());
        $select->join( array('e1' => 'employe'), 'e1.id_personne = c.ID_MEDECIN' , array('*'));
        $select->join( array('p1' => 'personne'), 'e1.id_personne = p1.ID_PERSONNE' , array('*'));
        $select->join( array('s' => 'service'), 's.ID_SERVICE = c.ID_SERVICE' , array('nomService' => 'NOM', 'domaineService' => 'DOMAINE'));

        //La consultation du jour -- pour �viter d'afficher la consultation du jour
        $id_cons_du_jour = $this->getConsultationDuJour()['ID_CONS'];

        //On affiche toutes les consultations sauf celle ouverte
        $where = new Where();
        $where->equalTo('c.ID_PATIENT', $id_pat);
        $where->notEqualTo('c.ID_CONS', $id_cons);
        $where->notEqualTo('c.ID_CONS', $id_cons_du_jour);
        $select->where($where);
        $select->order('DATEONLY DESC');

        $stat = $sql->prepareStatementForSqlObject ( $select );
        $result = $stat->execute ();

        return $result;
    }

  /*  public function getInfosSurveillant($id_personne){
        $adapter = $this->tableGateway->getAdapter ();
        $sql = new Sql ( $adapter );
        $select = $sql->select ();
        $select->columns( array( '*' ));
        $select->from( array('e1' => 'employe'));
        $select->join( array('p1' => 'personne'), 'e1.id_personne = p1.ID_PERSONNE' , array('*'));

        $where = new Where();
        $where->equalTo('e1.id_personne', $id_personne);
        $select->where($where);

        $stat = $sql->prepareStatementForSqlObject ( $select );
        $result = $stat->execute ();

        return $result->current();
    }*/
    /** --------------=============================-------------------------------*/

    public function updateConsultationMaternite($values)
    {
        $donnees = array(
            'toucherVaginale' => $values->get ( "toucherVaginale" )->getValue (),
            'hauteurUterine' => $values->get ( "hauteurUterine" )->getValue (),
            'positionFoeutus' => $values->get ( "positionFoeutus" )->getValue (),
            'vitaliteFoeutus' => $values->get ( "vitaliteFoeutus" )->getValue (),
            'commentaire' => $values->get ( "commentaire" )->getValue (),
        		
        );
        $this->tableGateway->update( $donnees, array('idcons_mater'=> $values->get ( "idcons_mater" )->getValue ()) );
    }

   /* public function validerConsultationMaternite($values){
        $donnees = array(
            'CONSPRISE' => $values['VALIDER'],
            'ID_MEDECIN' => $values['ID_MEDECIN']
        );
        $this->tableGateway->update($donnees, array('ID_CONS'=> $values['ID_CONS']));
        $this->tableGateway->update($donnees, array('idcons_mater'=> $values['idcons_mater']));
    }*/

    public function addConsultationMaternite($values){
        $this->tableGateway->getAdapter()->getDriver()->getConnection()->beginTransaction();
        try {

            $dataconsultation = array(
//                 'toucherVaginale' => $values->get ( "toucherVaginale" )->getValue (),
//                 'hauteurUterine' => $values->get ( "hauteurUterine" )->getValue (),
//                 'positionFoeutus' => $values->get ( "positionFoeutus" )->getValue (),
//                 'vitaliteFoeutus' => $values->get ( "vitaliteFoeutus" )->getValue (),
               // 'commentaire' => $values->get ( "commentaire" )->getValue (),
            		
               // 'idcons_mater'=> $values->get ( "idcons_mater" )->getValue (),
                'id_cons'=> $values->get ( "id_cons" )->getValue (),
                'id_grossesse'=> $values->get ( "id_grossesse" )->getValue (),
            );
            $this->tableGateway->insert($dataconsultation);

            $this->tableGateway->getAdapter()->getDriver()->getConnection()->commit();
        } catch (\Exception $e) {
            $this->tableGateway->getAdapter()->getDriver()->getConnection()->rollback();
        }
    }

    /*public function addConsultationEffectiveMaternite($id_cons){
        $db = $this->tableGateway->getAdapter();
        $sql = new Sql($db);
        $sQuery = $sql->insert()
            ->into('consultation_effective')
            ->values(array('ID_CONS' => $id_cons));
        $requete = $sql->prepareStatementForSqlObject($sQuery);
        $requete->execute();
    }*/

    /*    public function getInfoPatientMedecin($idcons){
        $adapter = $this->tableGateway->getAdapter ();
        $sql = new Sql ( $adapter );
        $select = $sql->select ();
        $select->columns( array( '*' ));
        $select->from( array( 'c' => 'consultation' ));
        $select->join( array('s' => 'service'), 's.ID_SERVICE = c.ID_SERVICE' , array (
            'NomService' => 'NOM',
            'DomaineService' => 'DOMAINE'
        ) );
        $select->join( array('p' => 'patient' ), 'p.ID_PERSONNE = c.ID_PATIENT' , array('*'));
        $select->join( array('pers' => 'personne'), 'pers.ID_PERSONNE = p.ID_PERSONNE' , array('*'));
        $select->join( array('m' => 'personne'), 'm.ID_PERSONNE = c.ID_MEDECIN' , array(
            'NomMedecin' => 'NOM',
            'PrenomMedecin' => 'PRENOM',
            'AdresseMedecin' => 'ADRESSE',
            'TelephoneMedecin' => 'TELEPHONE'
        ));
        $select->where ( array( 'c.ID_CONS' => $idcons));

        $stat = $sql->prepareStatementForSqlObject ( $select );
        $result = $stat->execute ();

        return $result;
    }*/

   /* public function addBandelette($bandelettes){
        $values = array();
        if($bandelettes['albumine'] == 1){
            $values[] = array('ID_TYPE_BANDELETTE'=>1, 'ID_CONS'=>$bandelettes['id_cons'], 'CROIX_BANDELETTE'=>(int)$bandelettes['croixalbumine']);
        }
        if($bandelettes['sucre'] == 1){
            $values[] = array('ID_TYPE_BANDELETTE'=>2, 'ID_CONS'=>$bandelettes['id_cons'], 'CROIX_BANDELETTE'=>(int)$bandelettes['croixsucre']);
        }
        if($bandelettes['corpscetonique'] == 1){
            $values[] = array('ID_TYPE_BANDELETTE'=>3, 'ID_CONS'=>$bandelettes['id_cons'], 'CROIX_BANDELETTE'=>(int)$bandelettes['croixcorpscetonique']);
        }

        for($i = 0 ; $i < count($values) ; $i++ ){
            $db = $this->tableGateway->getAdapter();
            $sql = new Sql($db);
            $sQuery = $sql->insert()
                ->into('bandelette')
                ->columns(array('ID_TYPE_BANDELETTE', 'ID_CONS', 'CROIX_BANDELETTE'))
                ->values($values[$i]);
            $stat = $sql->prepareStatementForSqlObject($sQuery);
            $stat->execute();
        }
    }

    public function getBandelette($id_cons){
        $db = $this->tableGateway->getAdapter();
        $sql = new Sql($db);
        $sQuery = $sql->select()
            ->from('bandelette')
            ->columns(array('*'))
            ->where(array('id_cons' => $id_cons));
        $stat = $sql->prepareStatementForSqlObject($sQuery);
        $result = $stat->execute();

        $donnees = array();
        $donnees['temoin'] = 0;
        foreach ($result as $resultat){
            if($resultat['ID_TYPE_BANDELETTE'] == 1){
                $donnees['albumine'] = 1; //C'est � coch�
                $donnees['croixalbumine'] = $resultat['CROIX_BANDELETTE'];
            }
            if($resultat['ID_TYPE_BANDELETTE'] == 2){
                $donnees['sucre'] = 1; //C'est � coch�
                $donnees['croixsucre'] = $resultat['CROIX_BANDELETTE'];
            }
            if($resultat['ID_TYPE_BANDELETTE'] == 3){
                $donnees['corpscetonique'] = 1; //C'est � coch�
                $donnees['croixcorpscetonique'] = $resultat['CROIX_BANDELETTE'];
            }

            //temoin
            $donnees['temoin'] = 1;
        }

        return $donnees;
    }

    public function deleteBandelette($id_cons){
        $db = $this->tableGateway->getAdapter();
        $sql = new Sql($db);
        $sQuery = $sql->delete()
            ->from('bandelette')
            ->where(array('id_cons' => $id_cons));
        $stat = $sql->prepareStatementForSqlObject($sQuery);
        $result = $stat->execute();
    }*/

    //Tous les patients consultes sauf ceux du jour
    public function tousPatientsConsMaternite($idService){
        $today = new \DateTime();
        $date = $today->format('Y-m-d');
        $adapter = $this->tableGateway->getAdapter ();
        $sql = new Sql ( $adapter );
        $select = $sql->select ();
        $select->from ( array (
            'p' => 'patient'
        ) );

        $select->columns(array () );
        $select->join(array('pers' => 'personne'), 'pers.ID_PERSONNE = p.ID_PERSONNE', array(
            'Nom' => 'NOM',
            'Prenom' => 'PRENOM',
            'Datenaissance' => 'DATE_NAISSANCE',
            'Sexe' => 'SEXE',
            'Adresse' => 'ADRESSE',
            'Nationalite' => 'NATIONALITE_ACTUELLE',
            'Id' => 'ID_PERSONNE'
        ));

        $select->join(array('c' => 'consultation'), 'p.ID_PERSONNE = c.ID_PATIENT', array('Id_cons' => 'ID_CONS', 'Dateonly' => 'DATEONLY', 'Consprise' => 'CONSPRISE'));
        $select->join(array('s' => 'service'), 'c.ID_SERVICE = s.ID_SERVICE', array('Nomservice' => 'NOM'));
//        $select->join(array('cm' => 'consultation_maternite'), 'c.ID_CONS = cm.idcons_mater', array('idcons_mater' => 'idcons_mater'));
        $select->join(array('cons_eff' => 'consultation_effective'), 'cons_eff.ID_CONS = c.ID_CONS' , array('*'));
        $where = new Where();
        $where->equalTo('s.ID_SERVICE', $idService);
        $where->notEqualTo('DATEONLY', $date);
        $select->order('c.DATE DESC');
        $select->group('c.ID_PATIENT');
        $select->where($where);
        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();
        return $result;
    }

    //liste des patients à consulter par le medecin dans le service de ce dernier
    public function listePatientsConsParMedecin($idService){
        $today = new \DateTime();
        $date = $today->format('Y-m-d');
        $adapter = $this->tableGateway->getAdapter ();
        $sql = new Sql ( $adapter );
        $select = $sql->select ();
        $select->from ( array (
            'p' => 'patient'
        ) );
        $select->columns(array () );
        $select->join(array('pers'=>'personne'), 'pers.ID_PERSONNE = p.ID_PERSONNE', array(
            'Nom' => 'NOM',
            'Prenom' => 'PRENOM',
            'Datenaissance' => 'DATE_NAISSANCE',
            'Sexe' => 'SEXE',
            'Adresse' => 'ADRESSE',
            'Nationalite' => 'NATIONALITE_ACTUELLE',
            'Id' => 'ID_PERSONNE'
        ));
        $select->join(array('c' => 'consultation'), 'p.ID_PERSONNE = c.ID_PATIENT', array('Id_cons' => 'ID_CONS', 'dateonly' => 'DATEONLY', 'Consprise' => 'CONSPRISE', 'date' => 'DATE'));
        $select->join(array('cons_eff' => 'consultation_effective'), 'cons_eff.ID_CONS = c.ID_CONS' , array('*'));
        $select->join(array('a' => 'admission'), 'c.ID_PATIENT = a.id_patient', array('Id_admission' => 'id_admission'));
        $select->where(array('c.ID_SERVICE' => $idService, 'DATEONLY' => $date, 'a.date_cons' => $date, 'c.ARCHIVAGE' => 0));
        $select->order('id_admission ASC');

        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();
        return $result;
    }

    public function getPatientsRV($id_service){
        $today = new \DateTime();
        $date = $today->format('Y-m-d');

        $adapter = $this->tableGateway->getAdapter();
        $sql = new Sql( $adapter );
        $select = $sql->select();
        $select->from( array(
            'rec' =>  'rendezvous_consultation'
        ));
        $select->join(array('cons' => 'consultation'), 'cons.ID_CONS = rec.ID_CONS ', array('*'));
        $select->where( array(
            'rec.DATE' => $date,
            'cons.ID_SERVICE' => $id_service,
        ) );

        $statement = $sql->prepareStatementForSqlObject( $select );
        $resultat = $statement->execute();

        $tab = array();
        foreach ($resultat as $result) {
            $tab[$result['ID_PATIENT']] = $result['HEURE'];
        }

        return $tab;
    }

    /**
     * Recuperation de la liste des medicaments
     */
    public function listeDeTousLesMedicaments(){
        $adapter = $this->tableGateway->getAdapter();
        $sql = new Sql ( $adapter );
        $select = $sql->select('consommable');
        $select->columns(array('ID_MATERIEL','INTITULE'));
        $stat = $sql->prepareStatementForSqlObject($select);
        $result = $stat->execute();

        return $result;
    }

    /**
     * RECUPERER LA FORME DES MEDICAMENTS
     */

    public function formesMedicaments(){
        $adapter = $this->tableGateway->getAdapter ();
        $sql = new Sql ( $adapter );
        $select = $sql->select ();
        $select->columns( array('*'));
        $select->from( array( 'forme' => 'forme_medicament' ));

        $stat = $sql->prepareStatementForSqlObject ( $select );
        $result = $stat->execute ();

        return $result;
    }

    /**
     * RECUPERER LES TYPES DE QUANTITE DES MEDICAMENTS
     */

    public function typeQuantiteMedicaments(){
        $adapter = $this->tableGateway->getAdapter ();
        $sql = new Sql ( $adapter );
        $select = $sql->select ();
        $select->columns( array('*'));
        $select->from( array( 'typeQuantite' => 'quantite_medicament' ));

        $stat = $sql->prepareStatementForSqlObject ( $select );
        $result = $stat->execute ();

        return $result;
    }

    public function getInfoPatient($id_personne) {
        $db = $this->tableGateway->getAdapter();
        $sql = new Sql($db);
        $sQuery = $sql->select()
            ->from(array('pat' => 'patient'))
            ->columns( array( '*' ))
            ->join(array('pers' => 'personne'), 'pers.id_personne = pat.id_personne' , array('*'))
            ->where(array('pat.ID_PERSONNE' => $id_personne));

        $stat = $sql->prepareStatementForSqlObject($sQuery);
        $resultat = $stat->execute()->current();

        return $resultat;
    }

    public function getPhoto($id) {
        $donneesPatient =  $this->getInfoPatient( $id );

        $nom = null;
        if($donneesPatient){$nom = $donneesPatient['PHOTO'];}
        if ($nom) {
            return $nom . '.jpg';
        } else {
            return 'identite.jpg';
        }
    }

    //liste des patients deja consultés par le medecin pour l'espace recherche
    public function listePatientsConsMedecin($idService){
        $today = new \DateTime();
        $date = $today->format('Y-m-d');
        $adapter = $this->tableGateway->getAdapter ();
        $sql = new Sql ( $adapter );
        $select = $sql->select ();
        $select->from ( array (
            'p' => 'patient'
        ) );
        $select->columns(array () );
        $select->join(array('pers' => 'personne'), 'pers.ID_PERSONNE = p.ID_PERSONNE', array(
            'Nom' => 'NOM',
            'Prenom' => 'PRENOM',
            'Datenaissance' => 'DATE_NAISSANCE',
            'Sexe' => 'SEXE',
            'Adresse' => 'ADRESSE',
            'Nationalite' => 'NATIONALITE_ACTUELLE',
            'Id' => 'ID_PERSONNE'
        ));
        $select->join(array('c' => 'consultation'), 'p.ID_PERSONNE = c.ID_PATIENT', array('Id_cons' => 'ID_CONS', 'Dateonly' => 'DATEONLY', 'Consprise' => 'CONSPRISE', 'date' => 'DATE'));
        $select->join(array('cons_eff' => 'consultation_effective'), 'cons_eff.ID_CONS = c.ID_CONS' , array('*'));
        $select->join( array('e1' => 'employe'), 'e1.id_personne = c.ID_MEDECIN' , array('*'));
        $select->join(array('s' => 'service'), 'c.ID_SERVICE = s.ID_SERVICE', array('Nomservice' => 'NOM'));
        $where = new Where();
        $where->equalTo('s.ID_SERVICE', $idService);
        $where->notEqualTo('DATEONLY', $date);
        $select->where($where);
        $select->order('c.DATE DESC');
        //$select->group('c.ID_PATIENT');

        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();

        //Recuperation des donnees
        $tableauDonnees = array();
        $tableauCles = array();
        foreach ($result as $resultat){
            if(!in_array($resultat['Id'], $tableauCles)){
                $tableauCles[] = $resultat['Id'];
                $tableauDonnees[] = $resultat;
            }
        }

        return $tableauDonnees;

    }

    public function addTraitementsInstrumentaux($traitement_instrumental){


        $db = $this->tableGateway->getAdapter();
        $sql = new Sql($db);
        $sQuery = $sql->delete()
            ->from('traitement_instrumental')
            ->where(array('id_cons' => $traitement_instrumental['id_cons']));
        $stat = $sql->prepareStatementForSqlObject($sQuery);
        $result = $stat->execute();

        if($traitement_instrumental['endoscopie_interventionnelle'] || $traitement_instrumental['radiologie_interventionnelle'] ||
            $traitement_instrumental['cardiologie_interventionnelle'] || $traitement_instrumental['autres_interventions']){
            $db = $this->tableGateway->getAdapter();
            $sql = new Sql($db);
            $sQuery = $sql->insert()
                ->into('traitement_instrumental')
                ->columns(array('id_cons', 'endoscopie_interventionnelle', 'radiologie_interventionnelle', 'cardiologie_interventionnelle', 'autres_interventions'))
                ->values($traitement_instrumental);
            $stat = $sql->prepareStatementForSqlObject($sQuery);
            $stat->execute();
        }
    }

    public function getTraitementsInstrumentaux($id_cons){
        $db = $this->tableGateway->getAdapter();
        $sql = new Sql($db);
        $sQuery = $sql->select()
            ->from('traitement_instrumental')
            ->where(array('id_cons' => $id_cons));
        $stat = $sql->prepareStatementForSqlObject($sQuery);
        $result = $stat->execute()->current();
        return $result;
    }


    public function fetchConsommable(){
        $adapter = $this->tableGateway->getAdapter();
        $sql = new Sql ( $adapter );
        $select = $sql->select('consommable');
        $select->columns(array('ID_MATERIEL','INTITULE'));
        $stat = $sql->prepareStatementForSqlObject($select);
        $result = $stat->execute();
        foreach ($result as $data) {
            $options[$data['ID_MATERIEL']] = $data['INTITULE'];
        }
        return $options;
    }


    //GESTION DES FICHIER MP3
    //GESTION DES FICHIER MP3
    //GESTION DES FICHIER MP3
    public function insererMp3($titre , $nom, $id_cons, $type){
        $db = $this->tableGateway->getAdapter();
        $sql = new Sql($db);
        $sQuery = $sql->insert()
            ->into('fichier_mp3')
            ->columns(array('titre', 'nom', 'id_cons', 'type'))
            ->values(array('titre' => $titre , 'nom' => $nom, 'id_cons'=>$id_cons, 'type'=>$type));

        $stat = $sql->prepareStatementForSqlObject($sQuery);
        return $stat->execute();
    }

    public function getMp3($id_cons, $type){
        $db = $this->tableGateway->getAdapter();
        $sql = new Sql($db);
        $sQuery = $sql->select()
            ->from(array('f' => 'fichier_mp3'))->columns(array('*'))
            ->where(array('id_cons' => $id_cons, 'type' => $type))
            ->order('id DESC');

        $stat = $sql->prepareStatementForSqlObject($sQuery);
        $result = $stat->execute();
        return $result;
    }

    public function supprimerMp3($idLigne, $id_cons, $type){
        $liste = $this->getMp3($id_cons, $type);

        $i=1;
        foreach ($liste as $list){
            if($i == $idLigne){
                unlink('C:\wamp\www\simens\public\audios\\'.$list['nom']);

                $db = $this->tableGateway->getAdapter();
                $sql = new Sql($db);
                $sQuery = $sql->delete()
                    ->from('fichier_mp3')
                    ->where(array('id' => $list['id']));

                $stat = $sql->prepareStatementForSqlObject($sQuery);
                $stat->execute();

                return true;
            }
            $i++;
        }
        return false;
    }


    //GESTION DES FICHIERS VIDEOS
    //GESTION DES FICHIERS VIDEOS
    //GESTION DES FICHIERS VIDEOS
    public function insererVideo($titre , $nom, $format, $id_cons){
        $db = $this->tableGateway->getAdapter();
        $sql = new Sql($db);
        $sQuery = $sql->insert()
            ->into('fichier_video')
            ->columns(array('titre', 'nom', 'format', 'id_cons'))
            ->values(array('titre' => $titre , 'nom' => $nom, 'format' => $format, 'id_cons'=>$id_cons));

        $stat = $sql->prepareStatementForSqlObject($sQuery);
        return $stat->execute();
    }

    public function getVideos($id_cons){
        $db = $this->tableGateway->getAdapter();
        $sql = new Sql($db);
        $sQuery = $sql->select()
            ->from(array('f' => 'fichier_video'))->columns(array('*'))
            ->where(array('id_cons' => $id_cons))
            ->order('id DESC');

        $stat = $sql->prepareStatementForSqlObject($sQuery);
        $result = $stat->execute();
        return $result;
    }

    public function getVideoWithId($id){
        $db = $this->tableGateway->getAdapter();
        $sql = new Sql($db);
        $sQuery = $sql->select()
            ->from(array('f' => 'fichier_video'))->columns(array('*'))
            ->where(array('id' => $id));

        $stat = $sql->prepareStatementForSqlObject($sQuery);
        $result = $stat->execute()->current();
        return $result;
    }

    public function supprimerVideo($id){

        $laVideo = $this->getVideoWithId($id);
        $result = unlink('C:\wamp\www\simens\public\videos\\'.$laVideo['nom']);

        $db = $this->tableGateway->getAdapter();
        $sql = new Sql($db);
        $sQuery = $sql->delete()->from('fichier_video')->where(array('id' => $id));

        $stat = $sql->prepareStatementForSqlObject($sQuery);
        $stat->execute();

        return $result;
    }

    //COMPTE RENDU OPERATOIRE
    //COMPTE RENDU OPERATOIRE
    public function deleteCompteRenduOperatoire($id_cons, $type){
        $db = $this->tableGateway->getAdapter();
        $sql = new Sql($db);
        $sQuery = $sql->delete()
            ->from('compte_rendu_operatoire')
            ->where(array('id_cons' => $id_cons, 'type' => $type));
        $stat = $sql->prepareStatementForSqlObject($sQuery);
        $result = $stat->execute();
    }

    public function addCompteRenduOperatoire($note, $type, $id_cons){
        $this->deleteCompteRenduOperatoire($id_cons, $type);
        if($note) {
            $db = $this->tableGateway->getAdapter();
            $sql = new Sql($db);
            $sQuery = $sql->insert()
                ->into('compte_rendu_operatoire')
                ->values(array('note' => $note , 'type' => $type, 'id_cons'=>$id_cons));

            $stat = $sql->prepareStatementForSqlObject($sQuery);
            return $stat->execute();
        }
    }

    public function getCompteRenduOperatoire($type, $id_cons){
        $db = $this->tableGateway->getAdapter();
        $sql = new Sql($db);
        $sQuery = $sql->select()
            ->from(array('c' => 'compte_rendu_operatoire'))->columns(array('*'))
            ->where(array('id_cons' => $id_cons, 'type' => $type));

        $stat = $sql->prepareStatementForSqlObject($sQuery);
        $result = $stat->execute()->current();
        return $result;
    }



    //GESTION DES EXAMENS DU JOUR LORS D'UNE HOSPITALISATION
    //GESTION DES EXAMENS DU JOUR LORS D'UNE HOSPITALISATION
    public function addConsultationExamenDuJour($codeExamen, $values , $IdDuService , $idMedecin){
        $this->tableGateway->getAdapter()->getDriver()->getConnection()->beginTransaction();
        $date = new \DateTime();
        $aujourdhui = $date->format('Y-m-d H:i:s');
        $dateonly = $date->format('Y-m-d');

        try {
            $dataconsultation = array(
                'ID_CONS'=> $codeExamen,
                'ID_MEDECIN'=> $idMedecin,
                'ID_PATIENT'=> $values->id_personne,
                'DATE'=> $aujourdhui,
                'POIDS' => $values->poids,
                'TAILLE' => $values->taille,
            		'PALEUR' => $values->paleur,
                'TEMPERATURE' => $values->temperature,
                'PRESSION_ARTERIELLE' => $values->pressionarterielle,
                'POULS' => $values->pouls,
                'FREQUENCE_RESPIRATOIRE' => $values->frequence_respiratoire,
                'GLYCEMIE_CAPILLAIRE' => $values->glycemie_capillaire,
                'DATEONLY' => $dateonly,
                'ID_SERVICE' => $IdDuService
            );

            $this->tableGateway->insert($dataconsultation);

            $this->tableGateway->getAdapter()->getDriver()->getConnection()->commit();
        } catch (\Exception $e) {
            $this->tableGateway->getAdapter()->getDriver()->getConnection()->rollback();
        }
    }

    public function addExamenDuJour($id_cons, $id_hosp){
        $db = $this->tableGateway->getAdapter();
        $sql = new Sql($db);
        $sQuery = $sql->insert()
            ->into('examen_du_jour')
            ->values(array('ID_CONS' => $id_cons, 'ID_HOSP' => $id_hosp));
        $requete = $sql->prepareStatementForSqlObject($sQuery);
        $requete->execute();
    }

    public function getExamenDuJour($id_hosp){
        $db = $this->tableGateway->getAdapter();
        $sql = new Sql($db);
        $sQuery = $sql->select()
            ->from(array('e' => 'examen_du_jour'))
            ->join(array('c' => 'consultation'), 'c.ID_CONS = e.ID_CONS' , array('*'))
            ->join(array('p' => 'personne'), 'p.ID_PERSONNE = c.ID_MEDECIN' , array('NomMedecin' => 'NOM', 'PrenomMedecin' => 'PRENOM'))
            ->where(array('ID_HOSP' => $id_hosp))
            ->order('DATE DESC');
        $requete = $sql->prepareStatementForSqlObject($sQuery);
        return $requete->execute();
    }

    public function supprimerExamenDuJour($id_examen_jour){
        $db = $this->tableGateway->getAdapter();
        $sql = new Sql($db);
        $sQuery = $sql->select()
            ->from(array('e' => 'examen_du_jour'))
            ->where(array('ID_EXAMEN_JOUR' => $id_examen_jour));

        $requete = $sql->prepareStatementForSqlObject($sQuery);
        $result = $requete->execute()->current();

        $db2 = $this->tableGateway->getAdapter();
        $sql2 = new Sql($db2);
        $sQuery2 = $sql2->delete()
            ->from('consultation')
            ->where(array('ID_CONS' => $result['ID_CONS']));

        $requete2 = $sql2->prepareStatementForSqlObject($sQuery2);
        $requete2->execute();

        return $result['ID_HOSP'];
    }

    public function getExamenDuJourParIdExamenJour($id_examen_jour){
        $db = $this->tableGateway->getAdapter();
        $sql = new Sql($db);
        $sQuery = $sql->select()
            ->from(array('e' => 'examen_du_jour'))
            ->join(array('c' => 'consultation'), 'c.ID_CONS = e.ID_CONS' , array('*'))
            ->join(array('p' => 'personne'), 'p.ID_PERSONNE = c.ID_MEDECIN' , array('NomMedecin' => 'NOM', 'PrenomMedecin' => 'PRENOM'))
            ->where(array('ID_EXAMEN_JOUR' => $id_examen_jour));
        $requete = $sql->prepareStatementForSqlObject($sQuery);
        return $requete->execute()->current();
    }

    public function getConsultationExamenJour($id_cons){
        $db = $this->tableGateway->getAdapter();
        $sql = new Sql($db);
        $sQuery = $sql->select()
            ->from(array('c' => 'consultation'))
            ->where(array('ID_CONS' => $id_cons));
        $requete = $sql->prepareStatementForSqlObject($sQuery);
        return $requete->execute()->current();
    }

    public function getTarifDeLacte($idActe){
        $adapter = $this->tableGateway->getAdapter();
        $sql = new Sql($adapter);
        $select = $sql->select();
        $select->from(array('s'=>'actes'));
        $select->columns(array('*'));
        $select->where(array('id' => $idActe));
        $stat = $sql->prepareStatementForSqlObject($select);
        $result = $stat->execute()->current();
        return $result;
    }

    //Recupere les antecedents m�dicaux
    //Recupere les antecedents m�dicaux
    public function getAntecedentMedicauxParLibelle($libelle){
        $adapter = $this->tableGateway->getAdapter();
        $sql = new Sql($adapter);
        $select = $sql->select();
        $select->from(array('am'=>'ant_medicaux'));
        $select->columns(array('*'));
        $select->where(array('libelle' => $libelle));
        return $sql->prepareStatementForSqlObject($select)->execute()->current();
    }

    //Ajout des ant�c�dents m�dicaux
    //Ajout des ant�c�dents m�dicaux
    public function addAntecedentMedicaux($data){
        $date = (new \DateTime())->format('Y-m-d H:i:s');
        $db = $this->tableGateway->getAdapter();
        $sql = new Sql($db);

        for($i = 0; $i<$data->nbCheckboxAM; $i++){
            $champ = "champTitreLabel_".$i;
            $libelle =  $data->$champ;

            if(!$this->getAntecedentMedicauxParLibelle($libelle)){
                $sQuery = $sql->insert()
                    ->into('ant_medicaux')
                    ->values(array('libelle' => $libelle, 'date_enregistrement' => $date, 'id_medecin' => $data->med_id_personne));
                $sql->prepareStatementForSqlObject($sQuery)->execute();
            }

        }

    }


    //Recupere l'antecedent m�dical de la personne
    //Recupere l'antecedent m�dical de la personne
    public function getAntecedentMedicauxPersonneParId($id, $id_patient){
        $adapter = $this->tableGateway->getAdapter();
        $sql = new Sql($adapter);
        $select = $sql->select();
        $select->from(array('amp'=>'ant_medicaux_personne'));
        $select->columns(array('*'));
        $select->where(array('id_ant_medicaux' => $id, 'id_patient' => $id_patient));
        return $sql->prepareStatementForSqlObject($select)->execute()->current();
    }


    //Recuperer les antecedents m�dicaux du patient
    //Recuperer les antecedents m�dicaux du patient
    public function getAntecedentsMedicauxPatient($id_patient){
        $adapter = $this->tableGateway->getAdapter();
        $sql = new Sql($adapter);
        $select = $sql->select();
        $select->columns(array('*'));
        $select->from(array('amp'=>'ant_medicaux_personne'));
        $select->join( array('am' => 'ant_medicaux'), 'am.id = amp.id_ant_medicaux' , array('*'));
        $select->where(array('amp.id_patient' => $id_patient));
        $result = $sql->prepareStatementForSqlObject($select)->execute();

        $tableau = array();

        foreach ($result as $resul){
            $tableau[] = $resul['libelle'];
        }

        return $tableau;
    }


    //Ajout des ant�c�dents m�dicaux de la personne
    //Ajout des ant�c�dents m�dicaux de la personne
    public function addAntecedentMedicauxPersonne($data){
        $date = (new \DateTime())->format('Y-m-d H:i:s');
        $db = $this->tableGateway->getAdapter();
        $sql = new Sql($db);

        //Tableau des nouveaux antecedents ajouter
        $tableau = array();

        for($i = 0; $i<$data->nbCheckboxAM; $i++){
            $champ = "champTitreLabel_".$i;
            $libelle =  $data->$champ;

            //Ajout des nouveaux libelles dans le tableau
            $tableau[] = $libelle;

            $antecedent = $this->getAntecedentMedicauxParLibelle($libelle);
            if($antecedent){
                if(!$this->getAntecedentMedicauxPersonneParId($antecedent['id'], $data->id_patient)){
                    $sQuery = $sql->insert()
                        ->into('ant_medicaux_personne')
                        ->values(array('id_ant_medicaux' => $antecedent['id'], 'id_patient' => $data->id_patient, 'date_enregistrement' => $date, 'id_medecin' => $data->med_id_personne));
                    $sql->prepareStatementForSqlObject($sQuery)->execute();
                }
            }
        }

        //Tableau de tous les antecedents medicaux du patient avant la mise � jour
        $tableau2 = $this->getAntecedentsMedicauxPatient($data->id_patient);

        //var_dump($data->nbCheckboxAM); exit();
        //Suppression des antecedents non s�lectionn�s
        for($i=0; $i<count($tableau2); $i++){
            if(!in_array($tableau2[$i], $tableau)){
                $id_ant_medicaux = $this->getAntecedentMedicauxParLibelle($tableau2[$i])['id'];
                $sQuery = $sql->delete()
                    ->from('ant_medicaux_personne')
                    ->where(array('id_ant_medicaux' => $id_ant_medicaux, 'id_patient' => $data->id_patient));
                $sql->prepareStatementForSqlObject($sQuery)->execute();
            }
        }

    }


    //Recupere les antecedents m�dicaux de la personne
    //Recupere les antecedents m�dicaux de la personne
    public function getAntecedentMedicauxPersonneParIdPatient($id_patient){
        $adapter = $this->tableGateway->getAdapter();
        $sql = new Sql($adapter);
        $select = $sql->select();
        $select->columns(array('*'));
        $select->from(array('amp'=>'ant_medicaux_personne'));
        $select->join( array('am' => 'ant_medicaux'), 'am.id = amp.id_ant_medicaux' , array('*'));
        $select->where(array('amp.id_patient' => $id_patient));
        return $sql->prepareStatementForSqlObject($select)->execute();
    }


    //Recupere les antecedents m�dicaux
    //Recupere les antecedents m�dicaux
    public function getAntecedentsMedicaux(){
        $adapter = $this->tableGateway->getAdapter();
        $sql = new Sql($adapter);
        $select = $sql->select();
        $select->columns(array('*'));
        $select->from(array('am'=>'ant_medicaux'));
        return $sql->prepareStatementForSqlObject($select)->execute();
    }


    //Recupere la liste des actes
    //Recupere la liste des actes
    public function getListeDesActes(){
        $adapter = $this->tableGateway->getAdapter();
        $sql = new Sql($adapter);
        $select = $sql->select();
        $select->columns(array('*'));
        $select->from(array('a'=>'actes'));
        return $sql->prepareStatementForSqlObject($select)->execute();
    }

}

?>