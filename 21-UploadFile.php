<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>
<body>
    <h1>Upload di file</h1>

    <h2>Upload di file singolo</h2>
    <form action="21-UploadFile.php?mode=singolo" method="POST" enctype="multipart/form-data">
        <label for="file-01s">Scegli file</label>
        <input type="file" name="file-01s" id="file-01s"><br>
        <button type="submit">Invia</button>
    </form>

    <code>
        $_FILES: <br>
        <?php
            if(isset($_FILES) && count($_FILES) > 0 && isset($_GET["mode"]) && $_GET["mode"] == "singolo"){
                print_r($_FILES);

                $uploadDir = __DIR__ . "/uploads";
                foreach($_FILES as $file){
                    if($file["error"] === UPLOAD_ERR_OK){
                        $fileName = basename($file["name"]);
                        echo "Salvo il file $fileName nella cartella $uploadDir <br>";
                        if(move_uploaded_file($file["tmp_name"], $uploadDir . DIRECTORY_SEPARATOR . $fileName)){
                            echo "File caricato con successo";
                        }else{
                            echo "Errore nel caricamento del file";
                        }
                    }   
                }
            }
        ?>
    </code>
    <hr>

    <h2>Upload Multiplo</h2>
    <form action="21-UploadFile.php?mode=multiplo">
        <label for="file-01m">Scegli file</label>
        <input type="file" name="file-01m" id="file-01m"><br>
        <label for="file-02m">Scegli file</label>
        <input type="file" name="file-02m" id="file-02m"><br>
        <button type="submit">Invia</button>
    </form>
    <code>
        $_FILES: <br>
        <?php
            if(isset($_FILES) && count($_FILES) > 0 && isset($_GET["mode"]) && $_GET["mode"] == "multiplo"){
                print_r($_FILES);

                $uploadDir = __DIR__ . "/uploads";
                foreach($_FILES as $file){
                    if($file["error"] === UPLOAD_ERR_OK){
                        $fileName = basename($file["name"]);
                        echo "Salvo il file $fileName nella cartella $uploadDir <br>";
                        if(move_uploaded_file($file["tmp_name"], $uploadDir . DIRECTORY_SEPARATOR . $fileName)){
                            echo "File caricato con successo";
                        }else{
                            echo "Errore nel caricamento del file";
                        }
                    }   
                }
            }
        ?>
    </code>
    <hr>

    <h2>Upload multiplo 2</h2>
    <form action="21-UploadFile.php?mode=multiplo2" method="POST" enctype="multipart/form-data">
        <label for="file-01m2">Scegli file</label>
        <input type="file" name="file-01m2" id="file-01m2"><br>
        <label for="file-02m2">Scegli file multiplo</label>
        <input type="file" name="file-02m2[]" id="file-02m2" multiple><br>
        <button type="submit">Invia</button>
    </form>
    <code>
        $_FILES: <br>
        <?php
            if(isset($_FILES) && count($_FILES) > 0 && isset($_GET["mode"]) && $_GET["mode"] == "multiplo2"){
                print_r($_FILES);

                $uploadDir = __DIR__ . "/uploads";

                $arrayFiles = riordinaArrayFile($_FILES);
                foreach($arrayFiles as $file){
                    if($file["error"] === UPLOAD_ERR_OK){
                        $fileName = basename($file["name"]);
                        echo "Salvo il file $fileName nella cartella $uploadDir <br>";
                        if(move_uploaded_file($file["tmp_name"], $uploadDir . DIRECTORY_SEPARATOR . $fileName)){
                            echo "File caricato con successo";
                        }else{
                            echo "Errore nel caricamento del file";
                        }
                    }   
                }
            }


            function riordinaArrayFile($arr){
                $multiplo = [];
                $normale = [];

                foreach($arr as $chiave1 => $valore1){
                    if(is_array($valore1["name"])){
                        foreach($valore1 as $chiave2 => $valore2){
                            for ($i=0, $count=count($valore2); $i < $count; $i++) { 
                                $multiplo[$i][$chiave2] = $valore2[$i];
                            }
                        }
                    }else{
                        $normale[$chiave1] = $valore1;
                    }
                }
                $ordinato = array_merge($normale, $multiplo);
                return $ordinato;
            }
        ?>
</body>
</html>