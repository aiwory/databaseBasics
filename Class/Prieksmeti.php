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

        $sql =("INSERT INTO prieksmeti (prieksmets) VALUES
		('{$this->prieksmets}')")or die($this->con->error);
        $this->con->query($sql);

    }

    function selectAll (){
        $sql = ("SELECT * FROM prieksmeti")or die($this->con->error);
        $result = $this->con->query($sql);
        //nodrošina nummerāciju
        $i = 0;
        echo '<table class="table table-bordered">';
        while($row = mysqli_fetch_array($result)) {
            $i++;
            echo "<tr>";
            echo "<td width='100px' align = 'center'><div class = 'tabulas_teksts' align = 'right' ><b>{$i}.</b></td>";
            echo "<td width='100px' align = 'center'><div class = 'tabulas_teksts' align = 'left'><b>{$row['prieksmets']}</b></td>";

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
        while($row = mysqli_fetch_array($result)) {
            $i++;
            echo "<tr>";
            echo "<td width='100px' align = 'center'><div class = 'tabulas_teksts' align = 'right' ><b>{$i}.</b></td>";
            echo "<td width='100px' align = 'center'><div class = 'tabulas_teksts' align = 'left'><b>{$row['prieksmets']}</b></td>";
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
        }

        echo "<div><b>Ieraksts kurš tiks labots: </b>$this->prieksmets</div>";

    }

    function updatePrieksmets(){
        $sql = ("UPDATE prieksmeti SET prieksmets = '$this->prieksmets' WHERE ID = '$this->id'")or die($this->con->error);
        $this->con->query($sql);


    }

    function deletePrieksmets(){
        $sql = ("DELETE FROM prieksmeti WHERE prieksmeti.ID = '$this->id'") or die($this->con->error);
        $this->con->query($sql);
    }



}