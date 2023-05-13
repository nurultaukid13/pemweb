<?php
    require_once('Product.php');
    class CdCabinet extends Product{
        private $capacity, $model;

        function __construct($nama, $harga, $diskon, $kapasitas, $model){
            parent::__construct($nama, $harga, $diskon);
            $this->capacity=$kapasitas;
            $this->model=$model;
        }

        public function setPrice($harga=0){
                parent::setPrice($harga + (0.15 * $harga));
        } 

        public function getCapacity(){
            return $this->capacity;
        }

        public function setCapacity($capacity){
            $this->capacity = $capacity;
        }

        public function getModel(){
            return $this->model;
        }

        public function setModel($model){
            $this->model = $model;
        }
    }
?>