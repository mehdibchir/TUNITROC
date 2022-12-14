<?php
class Reclamation{
    public $id_reclamation;
    private $type=null;
    private $date=null;
    private $description=null;
    private $status=null;
    private $sujet=null;
public  function __construct($id_reclamation,$type,$date,$description,$sujet,$status){
    $this->id_reclamation=$id_reclamation;
    $this->type=$type;
    $this->date=$date;
    $this->description=$description;
   // $this->mail=$mail;
    $this->sujet=$sujet;
    $this->status=$status;
}

public  function gettype(){
    return $this->type;
}
public  function getdate(){
    return $this->date;
}
public function getdescription(){
    return $this->description;
}
public function getid_reclamation(){
    return $this->id_reclamation;
}
/*public  function getmail(){
    return $this->mail;
}*/
public  function getsujet(){
    return $this->sujet;
}
public  function getstatus(){
    return $this->status;
}
public  function settype(string $type){
    $this->type=$type;
}
public  function setdate(string $date){
    $this->date=$date;
}
public  function setdescription(string $description){
    $this->description=$description;
}
public  function setmail(string $mail){
    $this->mail=$mail;
}
public  function setsujet(string $sujet){
    $this->sujet=$sujet;
}
public  function setstatus(string $status){
    $this->status=$status;
}

}
?>







