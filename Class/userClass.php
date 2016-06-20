<?php


/**
 * Created by PhpStorm.
 * User: Aigars
 * Date: 02.02.2016
 * Time: 12:28
 */
class userClass extends Database
{
    var $vards;
    var $uzvards;
    var $lietotajvards;
    var $parole;
    var $epasts;
    var $foto;
    var $hash;


    function convertPassword($password){
        return password_hash($password,PASSWORD_BCRYPT);
    }

    function checkUser($vards,$uzvards,$lietotajvards,$parole,$epasts){
        $this->vards = $this->con->real_escape_string($vards);
        $this->uzvards = $this->con->real_escape_string($uzvards);
        $this->lietotajvards = $this->con->real_escape_string($lietotajvards);
        $this->parole = $this->convertPassword($this->con->real_escape_string($parole));
        $this->epasts = $this->con->real_escape_string($epasts);
    }

    function insertUser(){


        $sql = "INSERT INTO lietotaji (vards, uzvards, lietotajvards, parole, epasts)
				VALUES ('{$this->vards}', '{$this->uzvards}', '{$this->lietotajvards}', '{$this->parole}', '{$this->epasts}')";
        $this->con->query($sql);

    }

    function checkUserLogin($lietotajvards, $parole){
        $this->lietotajvards = $this->con->real_escape_string($lietotajvards);
        $this->parole =$this->con->real_escape_string($parole);

    }

    function userLogin(){
        $sql = "SELECT parole,lietotajvards,vards,uzvards,photo FROM lietotaji WHERE lietotajvards = '{$this->lietotajvards}'";
        $result=$this->con->query($sql);
        while($row = mysqli_fetch_array($result)) {
            $this->hash = $row['parole'];
            $this->lietotajvards =$row['lietotajvards'];
            $this->vards =$row['vards'];
            $this->uzvards =$row['uzvards'];
            $this->foto =$row['photo'];
        }
        if(!password_verify($this->parole, $this->hash)) {
            echo '<div class="alert alert-danger">Nepareizs lietotājvārds vai parole!</div>';
            }
        else {
            header("location:sakums.php");
            session_start();
            $_SESSION['lietotajvards'] = $this->lietotajvards;
            $_SESSION['vards'] = $this->vards;
            $_SESSION['uzvards'] = $this->uzvards;
            $_SESSION['foto'] = $this->foto;
        }
    }
    function sessionCheck(){
        session_start();
        if(!isset($_SESSION['lietotajvards']))
        {
            header("location:index.php");
        }
    }
}