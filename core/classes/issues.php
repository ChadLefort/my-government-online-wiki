<?php

class Issues {

    private $my_db;

    public function __construct($database) {
        $this->my_db = $database;
    }

    public function main_issues() {

        $query = $this->my_db->prepare
            ("SELECT * FROM main_issues WHERE is_active = 1 ORDER BY issue");

        try{
            $query->execute();
        }catch(PDOException $e){
            die($e->getMessage());
        }

        return $query->fetchAll();
    }

    public function specific_issues($issue_id) {

        $query = $this->my_db->prepare
            ("SELECT * FROM specific_issues WHERE is_active = 1 AND issue_id = ?");
        $query->bindValue(1, $issue_id);

        try{
            $query->execute();
        }catch(PDOException $e){
            die($e->getMessage());
        }

        return $query->fetchAll();
    }

    public function info($main_issue_id, $specific_issue_id){

        $query = $this->my_db->prepare("SELECT * FROM main_issues, specific_issues WHERE main_issues.issue_id = ? AND specific_issues.specific_issue_id = ?");
        $query->bindValue(1, $main_issue_id);
        $query->bindValue(2, $specific_issue_id);

        try{
            $query->execute();
            return $query->fetch();
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function keywords($specific_issue_id){

        $query = $this->my_db->prepare("SELECT * FROM keywords WHERE is_active = 1 AND specific_issue_id = ?");
        $query->bindValue(1, $specific_issue_id);

        try{
            $query->execute();
        }catch(PDOException $e){
            die($e->getMessage());
        }

        return $query->fetchAll();
    }

    public function typeahead($post_title) {

        $query = $this->my_db->prepare("SELECT post_title FROM wp_posts WHERE post_status = 'publish' AND post_title !='' AND post_type = 'page' AND post_title LIKE ?");
        $query->bindValue(1, $post_title);

        try{
            $query->execute(array("%$post_title%"));
        }catch(PDOException $e){
            die($e->getMessage());
        }

        return $query->fetchAll();
    }
}
