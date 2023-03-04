<?php 
    require "variabel.php";
?><!-- untuk menghubungkan 2 file php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing page cv</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <a href="#home"><img src="img/logo2.png" alt="Logo"></a>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#aboutMe">About Me</a></li>
            <li><a href="#bahasa">Bahasa</a></li>
            <li><a href="#portofolio">Portofolio</a></li>
            <li><a href="#kontak">Kontak</a></li>
        </ul>
        <a href=<?php echo $link["portofolio"]; ?> target="blank"><button>Portofolio</button></a>
    </nav>

    <!-- Isi Biodata -->
    <article>
        <section id="home">
            <div class="intro">
                <p><span class="small">Halo, saya</span><br><span class="medium"><?php echo $nama["depan"]; ?></span><br><span
                        class="large"><?php echo $nama["tengah"]; ?></span><br><span class="largetau"><?php echo $nama["belakang"]; ?></span><span
                        class="large red">.</span>
                </p>
                <i class="description"><?php echo $deskripsi_diri["penjelasan"]; ?></i>
                <div class="social-media">
                    <a href=<?php echo $link["facebook"]; ?> target="_blank"><img
                            src="img/fb.png" alt="Facebook logo"></a>
                    <a href=<?php echo $link["instagram"]; ?>  target="_blank"><img src="img/ig.png"
                            alt="Instagram logo"></a>
                    <a href=<?php echo $link["github"]; ?>  target="_blank"><img src="img/github.png"
                            alt="Github logo"></a>
                </div>
                <a href=<?php echo $link["cv"]; ?> 
                    target="_blank"><button class="cv"> CV disini</button></a>
            </div>
            <div class="profile-picture">
                <img src="img/profil.png" alt="">
            </div>
        </section>

        <section id="aboutMe">
            <div class="konten">
                <span class="large"><b>Tentang Saya</b></span><span class="large red">.</span><br>
                <i><?php echo $tentang_saya; ?> </i><br>
                <img src="img/tentangsaya.png" alt="Foto Saya">
            </div>
        </section>

        <section id="bahasa"">
            <div class=" konten">
            <span class="large"><b>Bahasa</b></span><span class="large red">.</span><br>
            <i><?php echo $bahasa["deskripsi"]; ?></i>
            <div class="language-box">
                <div class="language">
                    <img src="img/html.png" alt="HTML 5">
                    <h3>HTML 5</h3>
                    <p><?php echo $bahasa["html5"]; ?></p>
                </div>
                <div class="language">
                    <img src="img/css.png" alt="CSS 3">
                    <h3>CSS 3</h3>
                    <p><?php echo $bahasa["css3"]; ?></p>
                </div>
                <div class="language">
                    <img src="img/js.png" alt="JS">
                    <h3>Javascript</h3>
                    <p><?php echo $bahasa["javascript"]; ?></p>
                </div>
            </div>
            </div>
        </section>

        <section id="portofolio">
            <div class="kontenpor">
                <span class="large"><b>Portofolio</b></span><span class="large red">.</span><br>
                <i><?php echo $portofolio; ?></i>

                <div class="collage">
                    <div class="gambar1"><img src="img/slide1.png"></div>
                    <div class="gambar2"></a><img src="img/slide2.png"></div>
                    <div class="gambar3"><img src="img/slide3.png"></div>
                </div>
            </div>
        </section>

        <section id="kontak">
            <div class="kontenkon">
                <div class="gambar">
                    <span class="large"><b>Kontak</b></span><span class="large red">.</span><br>
                    <i><?php echo $kontak; ?></i><br>

                    <img src="img/logo.png" alt="Foto Saya">
                </div>
                <div class="social-mediakon">
                    <a href=<?php echo $link["facebook"]; ?> target="_blank"><img
                            src="img/fb.png" alt="Facebook logo"></a>
                    <a href=<?php echo $link["instagram"]; ?> target="_blank"><img src="img/ig.png"
                            alt="Instagram logo"></a>
                    <a href=<?php echo $link["github"]; ?> target="_blank"><img src="img/github.png"
                            alt="Github logo"></a>
                </div>
            </div>
        </section>
    </article>

</body>

</html>