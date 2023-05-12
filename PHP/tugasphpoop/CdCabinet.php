<?php
    class CdCabinet extends Product{
        private $capacity, $model;

        function __construct($nama, $harga, $diskon, $kapasitas, $model){
            parent::__construct($nama, $harga, $diskon);
            $this->capacity=$kapasitas;
            $this->model=$model;
        }

        public function setPricecdr(){
            $this->price = $this->price + (0.15 * $this->price) - (($this->discount/100) * $this->price);
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