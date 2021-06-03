<?php
use Database;

class UserModel{

    public function save(string $email, string $password)
    {
        $sql = "INSERT INTO $this->table (email, password) VALUES (:email, :password)";
        $query = $this->_connexion->prepare($sql);
        $query->execute(
            [
                "email" => $email,
                "password" => $password
            ]);
    }

    public function getAll(){
        $sql= "SELECT * FROM ".$this->table;
        return $this->execute_query($sql);
    }

    public function getOne(){
        $sql= "SELECT * FROM ".$this->table." WHERE id=".$this->id;
        return $this->execute_query($sql);
    }

    public function getAdd(){
        $sql= "INSERT INTO ".$this->table."(`email`,`password`) values(".$this->email.",". $this->password.")";
        return $this->execute_query($sql);
    }

    public function getEdit(){
        $sql= "UPDATE ".$this->table." SET `email` =". $this->email.",`password` =". $this->password."WHERE id =".$this->id;
        return $this->execute_query($sql);
    }

    public function getDelete(){
        $sql= "DELETE FROM ".$this->table." WHERE id =".$this->id;
        return $this->execute_query($sql);
    }

    private function execute_query($sql)
    {
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();
    }

}