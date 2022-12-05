<?php
class Personne
{
    // Constructeur
    public function __construct(
        protected string $nom,
        protected string $prenom,
        protected string $adr,
        protected string $tele,
        protected string $email
    ){}

    // Getter
    public function __get(string $propety) {
        switch ($propety) {
            case 'nom':
                return $this->nom;
                break;
            case 'prenom':
                return $this->prenom;
                break;
            case 'adr':
                return $this->adr;
                break;
            case 'adr':
                return $this->tele;
                break;
            case 'adr':
                return $this->email;
                break;
            default:
                throw new Exception("<b>ERROR :<b> {$propety} property is invalid!!!!");
        }
    }

    // inser une nouvelle personne
    public function inserer() {
        
    }
}

  