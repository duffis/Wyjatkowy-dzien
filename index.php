<!DOCTYPE html>
<?php
require_once('functions.php');
?>
<html>
<head>
    <title>Wyjątkowy dzień</title>
    <meta charset="utf-8">
    <meta property="og:image" content="img/pexels-photo-256737.jpeg">
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/responsiveslides.min.js"></script>
    <script src="src/js/jquery.swipebox.js"></script>
    <link rel="stylesheet" href="src/css/swipebox.css">
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Overpass+Mono" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <div class="nav">
            <div class="links">
                <ul>
                    <li>
                        <a href="#" onclick="click();">Strona główna</a>
                    </li>
                    <li>
                        <a href="#about" >O nas</a>
                    </li>
                    <li>
                        <a href="#price">Cennik</a>
                    </li>
                    <li>
                        <a href="#galery">Galeria</a>
                    </li>
                    <li>
                        <a href="#contact">Kontakt</a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="content">
            <div id="home">
                
                <ul class="rslides">
                    <li><img src="img/pexels-photo-128922.jpeg" alt="ołtarz"></li>
                    <li><img src="img/pexels-photo-193040.jpeg" alt="plecki"></li>
                    <li><img src="img/pexels-photo-256737.jpeg" alt="serce"></li>
                </ul>
                <div id="himg">
                <img src="img/napis%20tlo.png" alt="napis">
            </div>
<!--
                <h3>Sprawimy, że ten dzień będzie wyjątkowy.</h3>
                <h6>~Wyjątkowy dzień</h6>
-->
            </div>
            <div id="about">
                <h2>O nas</h2>
                <div class="about1">
                    <img src="img/ania%20Cropped.jpg" alt="ania">
                    
                    <p>Ania - mózg firmy, zajmuje się organizacją ślubów, wesel i wszystkim innym.</p>
                </div>
                <div class="about1">
                    <img src="img/dj%20klamka%20Cropped.jpg" alt="dj klamka">
                    <p>DJ Klamka - najlepszy dj na świecie, lepszego dj'a nikt nie miał na weselu.</p>
                </div>
                <div class="about1">
                    <img src="img/mr%20save%20you%20Cropped.jpg" alt="mr save you">
                    <p>"Mr SaveYou" - lubisz się ostro zabawić, ale nie chcesz, żeby komuś stała się krzywda? Mr SaveYou was ochroni.</p>
                </div>
                <div class="about1">
                    <img src="img/mr%20save%20you%20after%20Cropped.jpg" alt="kac killer">
                    <p>"Kac Killer" - zabalowałeś na weselu a rano trzeba iść do pracy? Męczy Cię kac?</p>
                </div>  
            </div>
            <div id="price">
                <h2>Cennik</h2>
                <img src="img/pexels-photo-265920.jpeg" alt="wesele">
                <div class="clear"></div>
                <p>Nie masz czasu, mieszkasz obecnie za granicą, brakuje Ci pomysłu? Zwróć się do nas - My zajmiemy się organizacją Waszego ślubu i zabawy weselnej od a do z.<br>
                kompleksowa organizacja ślubu i wesela<br>
                <h9>3000 zł</h9><br>
                koordynacja imprezy <br>
                od rana do 1:00<br>
                <h9>500 zł</h9><br>
                Jeżeli brakuje Ci tylko kilka elementów do tego wielkiego wydarzenia - nie ma co się stresować - my również weźmiemy to na swoje barki. Ściągniemy tym samym cały ciężar obowiązków jakie towarzyszą Młodym i rodzinie przy organizacji jednego z najważniejszych dni w ich życiu!<br><br>

                Jest jeszcze jedna możliwość - Macie już wszystko dopięte na ostatni guzik, ale w dniu ślubu chcielibyście po prostu się bawić i przeżywać wszystko w pełni, mieć pewność, że jest ktoś kto czuwa nad porządkiem przebiegu całej uroczystości, koordynuje wszystkie momenty, pomaga, rozlicza się z organistą itd... To również jest w naszej gestii. Taka osoba to koordynator ślubny, który zatrudniony przez Państwa Młodych zna telefony do wszystkich usługodawców, czuwa, aby na stołach weselnych niczego nie brakowało, zwraca uwagę obsłudzę jeżeli niedaj boże coś zmajstrują. Robi to, co zazwyczaj ma w gestii Para Młoda, świadkowie, rodzice.
                Dla wszystkich jest to ważny dzień, więc po co dokładać sobie niepotrzebnych obowiązków, którymi może zająć się wykwalifikowana do tego osoba?</p>
            </div>
            <div id="galery">
            <h2>Galeria zdjęć</h2>
                <div id="gal-photo">
                <?php
                /** settings **/
                $images_dir = 'img/galery/';
                $thumbs_dir = 'img/galery/thumbs/';
                $thumbs_width = 310;
                $images_per_row = 4;

                /** generate photo gallery **/
                $image_files = get_files($images_dir);
                if(count($image_files)) {
                    $index = 0;
                    foreach($image_files as $index=>$file) {
                        $index++;
                        $thumbnail_image = $thumbs_dir.$file;
                        if(!file_exists($thumbnail_image)) {
                            $extension = get_file_extension($thumbnail_image);
                            if($extension) {
                                make_thumb($images_dir.$file,$thumbnail_image,$thumbs_width);
                            }
                        }
                        echo '<a href="',$images_dir.$file,'" class="photo-link swipebox" rel="gallery"><img src="',$thumbnail_image,'" /></a>';
                        if($index % $images_per_row == 0) { echo '<div class="clear"></div>'; }
                    }
                    echo '<div class="clear"></div>';
                }
                else {
                    echo '<p>There are no images in this gallery.</p>';
                }
                ?>
                </div>
            </div>
            <div id="contact">
            <h2>Kontakt</h2>
                <div class="cont">
                    <div id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2468.77098451382!2d19.449862741959215!3d51.773793761277695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471bcad102faa3cf%3A0xeabbc949989db0ba!2zV8OzbGN6YcWEc2thIDQsIMWBw7Nkxbo!5e0!3m2!1spl!2spl!4v1484661846870" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div id="info">
                        <h1>Jak nas znaleźć</h1>
                        <h4>Biuro Wyjątkowy dzień</h2>
                        <p>ul.Wólczańska 4<br>
                            99-999 Łódź</p><br><br><br>
                        <h1>Kontakt</h1>
                        <p>Telefon: 0(42) 888 77 66<br>
                            Komórka: 999 888 777<br>
                            E-mail: biuro@wyjatkowy-dzien.esy.es</p>
                    </div>
                </div>
                <div id="form">
                    <h1>Napisz do nas!</h1><br>
                    <form method="post" action="index.php">
                        <div id="frm1">
                            <div class="frm">
                                <label>Imię i nazwisko:</label><br>
                                <input name="name" id="name" type="text" placeholder="Imie i Nazwisko"><br>
                                <label>E-mail:</label><br>
                                <input name="email" id="email" type="email" placeholder="E-mail"><br>
                            </div>
                            <div class="frm">
                                <label>Twoja wiadomość:</label>
                                <textarea name="message" id="message" placeholder="Twoja wiadomość"></textarea>
                            </div>
                        </div>
                        <input name="submit" type="submit" value="Wyślij">
                    </form>
                </div>
                <div id="msg">
                <?php 
                    if(isset($msg))
                         echo $msg;
                    ?>
                </div>
            </div>
        </div>
        
<!--
        <div id="footer">
            <p>Polisz moją stopę &copy; <?php //echo date('Y'); ?> Duffis</p>
        </div>
-->
    </div>
    <script type="text/javascript">
        $(function click(){
            $(this).click();
        })
        $(function toggle(){
            $('.links ul li a').click(function(){
                $('.links ul li a').removeClass('highlight');
                $(this).addClass('highlight');
            });
        });
        
        ;( function( $ ) {

            $( '.swipebox' ).swipebox();

        } )( jQuery );

        
        $(function(){
            $(".rslides").responsiveSlides();
        });
        
        var navPosition =$('.nav').position();
        $(window).on("scroll", function(){
            if($(window).scrollTop()>navPosition.top)
                $('.nav').addClass('fxd');
            else
                $('.nav').removeClass('fxd');
        });
        
    </script>
</body>
</html>