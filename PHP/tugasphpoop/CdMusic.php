<?php
    class CdMusic extends Product{
        private $artist, $genre;

        function __construct($nama, $harga, $diskon, $artis, $genre){
            parent::__construct($nama, $harga, $diskon);
            $this->artist=$artis;
            $this->genre=$genre;
        }

        public function setPricecdm(){
            $this->price = $this->price + (0.1 * $this->price) - (($this->discount/100) * $this->price);
        }

        public function setDiscountcdm(){
            $this->discount = $this->discount + 5;
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