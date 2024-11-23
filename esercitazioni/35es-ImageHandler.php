<?php

class ImageHandler {
    private $image;
    private $imageType;

    // Metodo per caricare un'immagine
    public function upload($file) {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("Errore durante l'upload dell'immagine.");
        }

        $imageInfo = getimagesize($file['tmp_name']);
        $this->imageType = $imageInfo[2];

        if ($this->imageType == IMAGETYPE_JPEG) {
            $this->image = imagecreatefromjpeg($file['tmp_name']);
        } elseif ($this->imageType == IMAGETYPE_PNG) {
            $this->image = imagecreatefrompng($file['tmp_name']);
        } else {
            throw new Exception("Formato immagine non supportato. Solo JPEG e PNG sono accettati.");
        }
    }

    // Metodo per salvare un'immagine
    public function save($filename, $compression = 75) {
        if ($this->imageType == IMAGETYPE_JPEG) {
            imagejpeg($this->image, $filename, $compression);
        } elseif ($this->imageType == IMAGETYPE_PNG) {
            imagepng($this->image, $filename);
        }
    }

    // Metodo per ridimensionare un'immagine
    public function resize($width, $height) {
        $newImage = imagecreatetruecolor($width, $height);
        imagecopyresampled($newImage, $this->image, 0, 0, 0, 0, $width, $height, imagesx($this->image), imagesy($this->image));
        $this->image = $newImage;
    }

    // Metodo per applicare l'effetto scala di grigi
    public function applyGrayscaleEffect() {
        imagefilter($this->image, IMG_FILTER_GRAYSCALE);
    }

    // Metodo per mostrare l'immagine nel browser
    public function output() {
        if ($this->imageType == IMAGETYPE_JPEG) {
            header("Content-Type: image/jpeg");
            imagejpeg($this->image);
        } elseif ($this->imageType == IMAGETYPE_PNG) {
            header("Content-Type: image/png");
            imagepng($this->image);
        }
    }

    // Distruttore per liberare la memoria
    public function __destruct() {
        if ($this->image) {
            imagedestroy($this->image);
        }
    }
}
?>
