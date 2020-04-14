<?php 
require 'boot.php';

class PersonnagesManager
{
    private $_db;

    public function _construct($dbh)
    {
        $this->setDb($dbh);
    }

    public function add(Personnage $perso)
    {
        $insert_perso = $this->_db->prepare('
        INSERT INTO personnages(nom) 
        VALUES (:nom)');
        $insert_perso->bindValue(':nom',$perso->nom());
        $insert_perso->execute;

        $perso->hydrate([
            'id'=>$this->_db->lastInsertId(),
            'degats' => 0,
        ]);
    }

    public function count()
    {
        return $this->_db->query('SELECT COUNT(*) FROM personnages')->fetchColumn();
    }

    public function delete(Personnage $perso)
    {
        $this->_db->exec('DELETE FROM personnages WHERE id ='.$perso->id());
    }

    public function exists($info)
    {
        if(is_int($info))
        {
            return (bool) $this->_db->query('SELECT COUNT(*) FROM personnages WHERE id ='.$info)->fetchColumn();
        }
        $insert_perso = $this->_db->prepare('SELECT COUNT(*) FROM personnages WHERE nom = :nom');
        $insert_perso->execute([':nom' =>$info]);
        
        return (bool) $insert_perso->fetchColumn();
    }

    public function get($nom)
    {

    }

    public function getList($nom)
    {

    }

    public function update(Personnage $perso)
    {

    }

    public function setDb(PDO $dbh)
    {
        $this->_db = $dbh;
    }














}
