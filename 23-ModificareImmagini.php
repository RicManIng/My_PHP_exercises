<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificare Immagini</title>
</head>
<body>
    <h1>Modificare immagini</h1>

    <h2>Capire se il file è un'immagine</h2>
    <code>
        getimagesize("path")<br>
    </code>
    <p>
        <?php
            $file = "immagine.jpg";
            if(@is_array(getimagesize($file))){     // @ per evitare che venga stampato un warning
                $img = getimagesize($file);
                echo "Il file $file è un'immagine di tipo " . $img["mime"] . "<br>";
                echo "<br>";
                print_r($img);
                echo "<br>";
            }else{
                echo "Il file $file non è un'immagine";
            }
        ?>
    </p>
    <hr>

    <h2>Creare un'immagine</h2>
    <code>
        imagecreatetruecolor($width, $heighet)<br> // crea un'immagine true color
        imagefill($img, $x, $y, $colore)<br> // riempie l'immagine con un colore
        imagepng($img, "path")<br> // salva l'immagine in formato png
    </code>
    <p>
        <?php

            $fileName = __DIR__ . "/img/immagine.png";
            $img = @imagecreatetruecolor(200, 200) or die("Impossibile creare l'immagine");
            $colore = imagecolorallocate($img, 255, 0, 0);
            imagefill($img, 0, 0, $colore); // partendo dalle coordinate 0, 0
            imagepng($img, $fileName);
            imagedestroy($img);
            echo "<img src='img/immagine.png' alt='immagine'>";
        ?>
    </p>
    <hr>

    <h2>Scrivere testo su immagine</h2>
    <code>
        imagestring($img, $font, $x, $y, $testo, $colore)<br> // scrive una stringa sull'immagine
    </code>
    <p>
        <?php
            $fileName = __DIR__ . "/img/immagine.png";
            $img = imagecreatefrompng($fileName);
            $colore = imagecolorallocate($img, 0, 0, 255);
            imagestring($img, 5, 50, 50, "Ciao", $colore);
            imagepng($img, $fileName);
            imagedestroy($img);
            echo "<img src='img/immagine.png' alt='immagine'>";
        ?>
    </p>
    <hr>

    <h2>Ridimensionare un'immagine</h2>
    <code>
        imagecopyresampled(<br>
            $imgDest, // immagine di destinazione <br> 
            $imgSrc, // immagine di sorgente <br>
            $xDest, // coordinata x di destinazione <br>
            $yDest, // coordinata y di destinazione <br>
            $xSrc, // coordinata x di sorgente <br>
            $ySrc, // coordinata y di sorgente <br>
            $wDest, // larghezza di destinazione <br>
            $hDest, // altezza di destinazione <br>
            $wSrc, // larghezza di sorgente <br>
            $hSrc) // altezza di sorgente<br>
            <br> 
            // ridimensiona un'immagine
    </code>
    <p>
        <?php
            $fileName = __DIR__ . "/img/immagine.png";
            $img = imagecreatefrompng($fileName);
            $imgRidimensionata = imagecreatetruecolor(100, 100);
            list($larghezza, $altezza) = getimagesize($fileName);
            //imagecopyresampled($imgRidimensionata, $img, 0, 0, 0, 0, 100, 100, imagesx($img), imagesy($img));
            imagecopyresampled($imgRidimensionata, $img, 0, 0, 0, 0, 100, 100, $larghezza, $altezza);
            imagepng($imgRidimensionata, $fileName);
            imagedestroy($img);
            imagedestroy($imgRidimensionata);
            echo "<img src='immagine.png' alt='immagine'>";
        ?>
    </p>
    <hr>
    // Guardare imagescale() e imagecopyresized()
</body>
</html>