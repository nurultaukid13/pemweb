<?php
    require_once('Product.php');
    require_once('CdMusic.php');
    require_once('CdCabinet.php');

    $produk1 = new CdMusic('Tetap Dalam Jiwa', 2000, 0, 'Rizky Fabian', 'Pop');
    $produk2 = new CdCabinet('$produk1->getName()', $produk1->getPrice(), $produk1->getDiscount(), 20 , 'Kaset');


    print "Produk : <br>";
    print "Nama : ".$produk1->getName()."<br>";
    print "Harga : ".$produk1->getPrice()."<br>";
    print "Diskon : ".$produk1->getDiscount()."% <br><br>";
    
    print "CD Music : <br>";
    $produk1->setPricecdm();
    print "Harga sebelum diskon : ".$produk1->getPrice()."<br>";
    $produk1->setDiscountcdm();
    print "Diskon : ".$produk1->getDiscount()."% <br>";
    $produk1->setPricecdm();
    print "Harga setelah diskon : ".$produk1->getPrice()."<br>";
    print "Artis : ".$produk1->getArtist()."<br>";
    print "Genre : ".$produk1->getGenre()."<br><br>";
    
    print "CD Rack : <br>";
    $produk2->setPricecdr();
    print "Harga : ".$produk2->getPrice()."<br>";
    print "Diskon : ".$produk2->getDiscount()."% <br>";
    print "Kapasitas : ".$produk2->getCapacity()."<br>";
    print "Model : ".$produk2->getModel()."<br>";
?>