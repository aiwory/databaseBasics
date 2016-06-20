<?php

/**
 * Created by PhpStorm.
 * User: Aigars
 * Date: 21.03.2016
 * Time: 21:48
 */
class pdfClass extends Database
{
    var $text;
    function selectTextforPDF(){
        $this->text = ""; //tiek piešķirta sākuma vērtība, jo tiks kabināts klāt citi stringi
        $i = 0; //numerācija
        $sql= "SELECT * FROM prieksmeti";
        $result=$this->con->query($sql);

        $this->text.= "<table class=\"table table-bordered\">";
        $this->text .= "<tr><td><b>Npk.</b></td><td><b>Priekšmets</b></td></td><td><b>Skolotājs</b></td></tr>";
        while($row = mysqli_fetch_array($result)){
            $i++;
            $this->text.= "<tr><td>{$i}.</td><td>{$row['prieksmets']}</td><td>{$row['skolotajs']}</td></tr>";
        }
        $this->text .= "</table>";

    }

    function getTextForPDF(){
        return $this->text;
    }
}