<?php
    require_once('Product.php');
    class CdMusic extends Product{
        private $artist, $genre;

        function __construct($nama, $harga, $diskon, $artis, $genre){
            parent::__construct($nama, $harga, $diskon);
            $this->artist=$artis;
            $this->genre=$genre;
        }

        public function setPrice($harga=0){
                parent::setPrice($harga + (0.1 * $harga));
        }

        public function setDiscount($diskon){
            parent::setDiscount($diskon+5);
        }

        public function getArtist(){
            return $this->artist;
        }

        public function setArtist($artist){
            $this->artist = $artist;
        }

        public function getGenre(){
            return $this->genre;
        }

        public function setGenre($genre){
            $this->genre = $genre;
        }
    }
?>