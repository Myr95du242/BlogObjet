<?php
    class Blog{
        private $id_contenu;
        private $titre;
        private $date_contenu;
        private $commentaire;
        private $photo;

        public function __construct($titreContenu,$dateContenu,$commentaireContenu,$commentairePhoto)
        {
            echo 'Appel du constructeur <br/>';
            //$this->setIdContenu($idContenu);
            $this->setTitre($titreContenu);
            $this->setDateContenu($dateContenu);
            $this->setCommentaire($commentaireContenu);
            $this->setPhoto($commentairePhoto);
        }

    //Setter and getter
        public function getIdContenu(){return $this->id_contenu ;}
        public function getTitre(){return $this->titre ;}
        public function getDateContenu(){return $this->date_contenu ;}
        public function getCommentaire(){return $this->commentaire ;}
        public function getPhoto(){return $this->photo ;}

        public function setIdContenu($idContenu){
            $idContenu=(int)$idContenu; 
            $this->id_contenu=$idContenu;
        }
        public function setTitre($titre){
            if(is_string($titre) AND $titre<=100){              
            $this->titre=$titre;
            }           
        }
        public function setDateContenu($date_contenu){
            $this->date_contenu=$date_contenu;          
        }
        public function setCommentaire($commentaire){
            if (is_string($commentaire)) {
                            $this->commentaire= $commentaire;
            }           
        }
        public function setPhoto($photo){        
            $this->photo=$photo;        
        }
    }
?>