<?php
    require_once('CdMusic.php');
    require_once('CdCabinet.php');

    $produk1 = new CdMusic('Tetap Dalam Jiwa', 2000, 0, 'Rizky Fabian', 'Pop');
    $produk2 = new CdCabinet('$produk1->getName()', $produk1->getPrice(), $produk1->getDiscount(), 20 , 'Kaset');


    print "Produk : \n";
    print "Nama : ".$produk1->getName()."\n";
    print "Harga : ".$produk1->getPrice()."\n";
    print "Diskon : ".$produk1->getDiscount()."% \n\n";
    
    print "CD Music : \n";
    $produk1->setPrice($produk1->getPrice());
    print "Harga : ".$produk1->getPrice()."\n";
    $produk1->setDiscount($produk1->getDiscount());
    print "Diskon : ".$produk1->getDiscount()."% \n";
    print "Artis : ".$produk1->getArtist()."\n";
    print "Genre : ".$produk1->getGenre()."\n\n";
    
    print "CD Rack : \n";
    $produk2->setPrice($produk2->getPrice());
    print "Harga : ".$produk2->getPrice()."\n";
    print "Diskon : ".$produk2->getDiscount()."% \n";
    print "Kapasitas : ".$produk2->getCapacity()."\n";
    print "Model : ".$produk2->getModel()."\n";
?>