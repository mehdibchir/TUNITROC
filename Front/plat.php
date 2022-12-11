<?php
class plat
{
    private ?int $id_plat = null;
    private ?string $Nomplat = null;
    private ?string $descP = null;
    private ?string $categorie = null;
    private ?string $img = null;
    private ?string $echange = null;
    private ?string $num = null;

    public function __construct( $n, $p, $a, $d )
    {
        $this->Nomplat= $n;
        $this->descP = $p;
        $this->categorie= $a;
        $this->img = $d;
      
    }

    /**
     * Get the value of idlivreur
     */
    public function getIdplat()
    {
        return $this->id_plat;
    }
    public function setIdplat($id_plat)
    {
        $this->id_plat= $id_plat;
    }
    /**
     * Get the value of nom
     */
    public function getNomplat()
    {
        return $this->Nomplat;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNomplat($Nomplat)
    {
        $this->Nomplat = $Nomplat;
    }

    /**
     * Get the value of id_livraison
     */
    public function getdescP()
    {
        return $this->descP;
    }

    /**
     * Set the value of id_livraison
     *
     * @return  self
     */
    public function setdescP($descP)
    {
        $this->descP = $descP;
    }

    /**
     * Get the value of numero
     */
    public function getcategorie()
    {
        return $this->categorie;
    }

    /**
     * Set the value of numero
     *
     * @return  self
     */
    public function setcategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * Get the value of id_commande
     */
    public function getimg()
    {
        return $this->img;
    }
    public function getechange()
    {
        return $this->echange;
    }
    public function getnum()
    {
        return $this->num;
    }


    /**
     * Set the value of id_commande
     *
     * @return  self
     */
    public function setimg($img)
    {
        $this->id_commande = $img;
    }
}
?>