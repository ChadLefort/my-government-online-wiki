<?php

class States_Jurisdictions {

    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function states(){

        $query = $this->db->prepare
              ("SELECT DISTINCT
                LongName,
                ShortName
                FROM
                Jurisdiction_States_XLU JSXLU
                LEFT OUTER JOIN Parish P on P.ParentState = JSXLU.ShortName
                WHERE
                P.ParentState = JSXLU.ShortName
                ORDER BY
                JSXLU.LongName");

        try{
            $query->execute();
        }catch(PDOException $e){
            die($e->getMessage());
        }

        return $query->fetchAll();
    }

    public function jurisdictions($short_name) {

        $query = $this->db->prepare
              ("SELECT
                ParishName,
                ParishId
                FROM
                Parish
                WHERE
                ParentState = ?
                ORDER BY
                ParishName");
        $query->bindValue(1, $short_name);

        try{
            $query->execute();
        }catch(PDOException $e){
            die($e->getMessage());
        }

        return $query->fetchAll();
    }

    public function info($jurisdiction_id){

        $query = $this->db->prepare("SELECT * FROM Parish WHERE ParishID = ?");
        $query->bindValue(1, $jurisdiction_id);

        try{
            $query->execute();
            return $query->fetch();
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }
}