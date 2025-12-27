<?php
class Guide extends Utilisateur{
    private $isActive;
    private $isApprouve;

    public function getIsActive(){
        return this->isActive;
    }

    public function getIsApprouve(){
        return this->isApprouve;
    }

    public function setIsActive($isActive){
        $this->isActive = $isActive;
    }

    public function setIsApprouve($isApprouve){
        $this->isApprouve = $isApprouve;
    }


}
?>