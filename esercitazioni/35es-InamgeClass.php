<?php
require '35es-ImageHandler.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    try {
        $imageHandler = new ImageHandler();
        
        // Carica l'immagine
        $imageHandler->upload($_FILES['image']);
        
        // Ridimensiona l'immagine a 200x200 px
        $imageHandler->resize(200, 200);
        
        // Applica l'effetto scala di grigi
        $imageHandler->applyGrayscaleEffect();
        
        // Salva l'immagine modificata
        $imageHandler->save('immagine_modificata.jpg');
        
        // Mostra l'immagine nel browser
        echo "<h2>Immagine Modificata:</h2>";
        echo "<img src='immagine_modificata.jpg' alt='Immagine Modificata'>";
        
    } catch (Exception $e) {
        echo "Errore: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Gestione Immagini</title>
</head>
<body>
    <h2>Carica un'immagine</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="image">Seleziona un'immagine:</label>
        <input type="file" name="image" id="image" required><br><br>
        <input type="submit" value="Carica e Modifica">
    </form>
</body>
</html>
