<?php
class cat
{
    private ?int $id_cat = null;
   
    private ?string $nom = null;
    private ?string $descr = null;
  

    public function __construct(  $p, $a)
    {
       
        $this->nom = $p;
        $this->descr= $a;
        
    }

    /**
     * Get the value of idlivreur
     */
  
    /**
     * Get the value of nom
     */
    public function getnom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setnom($nom)
    {
        $this->Nomplat = $Nomplat;
    }

    /**
     * Get the value of id_livraison
     */
    public function getdescr()
    {
        return $this->descr;
    }

    /**
     * Set the value of id_livraison
     *
     * @return  self
     */
    public function setdescr($descr)
    {
        $this->descr = $descr;
    }

    /**
     * Get the value of numero
     */
   

    /**
     * Set the value of numero
     *
     * @r
     */
    

 
}
?>