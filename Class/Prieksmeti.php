<?php

/**
 * Created by PhpStorm.
 * User: Aigars
 * Date: 23.02.2016
 * Time: 13:20
 */
class Prieksmeti extends Database
{
    var $prieksmets;
    var $id;
    var $skolotajs;

    public function getSkolotajs(){
        return $this->skolotajs;
    }

    public function getPrieksmets()
    {
        return $this->prieksmets;
    }

    public function getId()
    {
        return $this->id;
    }

    function checkPrieksmets($prieksmets){
        $this->prieksmets=$this->con->real_escape_string($prieksmets);
    }

    function checkSkolotajs($skolotajs){
        $this->skolotajs=$this->con->real_escape_string($skolotajs);
    }

    function selectPrieksmetsAndID(){

        $sql=("SELECT DISTINCT prieksmeti.ID, prieksmeti.prieksmets FROM prieksmeti") or die($this->con->error);
        $result = $this->con->query($sql);

        while($row = mysqli_fetch_array( $result ))
        {
            $ID = $row['ID'];
            $prieksmets = $row['prieksmets'];
            echo" <option value = '$ID'>{$prieksmets}</option>";
        }
    }

    function selectPrieksmets(){

        $sql=("SELECT DISTINCT prieksmeti.prieksmets FROM prieksmeti") or die($this->con->error);
        $result = $this->con->query($sql);

        while($row = mysqli_fetch_array( $result ))
        {
            $prieksmets = $row['prieksmets'];
            echo" <option value = '$prieksmets'>{$prieksmets}</option> ";
        }
    }

    function insertData(){

        $sql =("INSERT INTO prieksmeti (prieksmets,skolotajs) VALUES
		('{$this->prieksmets}','{$this->skolotajs}')")or die($this->con->error);
        $this->con->query($sql);

    }

    function selectAll (){
        $sql = ("SELECT * FROM prieksmeti")or die($this->con->error);
        $result = $this->con->query($sql);
        //nodrošina nummerāciju
        $i = 0;
        echo '<table class="table table-bordered">';
        echo "<td width='100px' align = 'center'><div class = 'tabulas_teksts' align = 'right' ><b>Npk.</b></td>";
        echo "<td width='100px' align = 'center'><div class = 'tabulas_teksts' align = 'left' ><b>Priekšmets</b></td>";
        echo "<td width='100px' align = 'center'><div class = 'tabulas_teksts' align = 'left' ><b>Skolotājs</b></td>";
        while($row = mysqli_fetch_array($result)) {
            $i++;
            echo "<tr>";
            echo "<td width='100px' align = 'center'><div class = 'tabulas_teksts' align = 'right' >{$i}.</td>";
            echo "<td width='100px' align = 'center'><div class = 'tabulas_teksts' align = 'left'>{$row['prieksmets']}</td>";
            echo "<td width='100px' align = 'center'><div class = 'tabulas_teksts' align = 'left'>{$row['skolotajs']}</td>";
            echo "</tr>";
        }
        echo "</table>";

    }

    function selectAllToEdit (){
        $sql = ("SELECT * FROM prieksmeti")or die($this->con->error);
        $result = $this->con->query($sql);
        //nodrošina nummerāciju
        $i = 0;
        echo '<table class= "table table-bordered">';
        echo "<td width='100px' align = 'center'><div class = 'tabulas_teksts' align = 'right' ><b>Npk.</b></td>";
        echo "<td width='100px' align = 'center'><div class = 'tabulas_teksts' align = 'left' ><b>Priekšmets</b></td>";
        echo "<td width='100px' align = 'center'><div class = 'tabulas_teksts' align = 'left' ><b>Skolotājs</b></td>";
        echo "<td width='100px' align = 'center'><div class = 'tabulas_teksts' align = 'left' ><b>Rediģēšana</b></td>";
        while($row = mysqli_fetch_array($result)) {
            $i++;
            echo "<tr>";
            echo "<td width='100px' align = 'center'><div class = 'tabulas_teksts' align = 'right' >{$i}.</td>";
            echo "<td width='100px' align = 'center'><div class = 'tabulas_teksts' align = 'left'>{$row['prieksmets']}</td>";
            echo "<td width='100px' align = 'center'><div class = 'tabulas_teksts' align = 'left'>{$row['skolotajs']}</td>";
            echo "<td width='100px'><a class='btn btn-primary' href='3var.php?ID={$row['ID']}'>Labot</a></td>";
            echo "</tr>";
        }
        echo "</table>";

    }
    function checkID($id){
        $this->id = $this->con->real_escape_string($id);
    }
    function selectByID (){
        $sql = ("SELECT * FROM prieksmeti WHERE ID = $this->id")or die($this->con->error);
        $result=$this->con->query($sql);

        while($row = mysqli_fetch_array($result)) {
            $this->prieksmets =  $row['prieksmets'];
            $this->skolotajs =  $row['skolotajs'];
        }

        echo "<div><b>Ieraksts kurš tiks labots: </b>$this->prieksmets</div>";

    }

    function updatePrieksmets(){
        $sql = ("UPDATE prieksmeti SET prieksmets = '$this->prieksmets',skolotajs = '$this->skolotajs' WHERE ID = '$this->id'")or die($this->con->error);
        $this->con->query($sql);


    }

    function deletePrieksmets(){
        $sql = ("DELETE FROM prieksmeti WHERE prieksmeti.ID = '$this->id'") or die($this->con->error);
        $this->con->query($sql);
    }



}