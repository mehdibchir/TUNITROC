<?php
class Reponse{

    
private $date=null;
private $description=null;
private $mail=null;
private $sujet=null;
private $id_reclamation=null;

public function __construct($date,$description,$mail,$sujet,$id_reclamation){

    $this->date=$date;
    $this->description=$description;
    $this->mail=$mail;
    $this->sujet=$sujet;
    $this->id_reclamation=$id_reclamation;

}
public function getdate(){
    return $this->date;
}
public function getid_reclamation(){
    return $this->id_reclamation;
}
public function getdescription(){
    return $this->description;
}
public function getmail(){
    return $this->mail;
}
public function getsujet(){
    return $this->sujet;
}

public function setdate(string $date )
{
    $this->date=$date;
}
public function setdescription(string $description)
{
    $this->description=$description;
}
public function setmail(string $mail)
{
    $this->mail=$mail;
}
public function settsujet(string $sujet)
{
    $this->sujet=$sujet;
}






}











?>