<!DOCTYPE html>
<html lang="it">
<head>
    <?php
        require_once('head.php');
    ?>
    <title>Centro Sportivo Home</title> 
    <link rel="stylesheet" href="resources/css/torneo.min.css">
</head>
<body>
    <?php
        require_once('common.php');
        require_once('header.php');
    ?>
    <main>
        <section>
            <h1>Sorteggi turno 1</h1>
            <?php
                $file_teams_subscribed = './databases/team_subscribed.json';
                $arrTeams = json_decode(file_get_contents($file_teams_subscribed), true);
            ?>
            <?php for($i = 1; $i <= 8; $i++): ?>
                <h4>Match numero <?= $i; ?></h4>
                <div>
                    <p class='first'>
                        <?php
                            $numero_trovato = false;
                            foreach($arrTeams as $team){
                                if($team['team_number'] == ($i*2 - 1)){
                                    echo $team['name'];
                                    $numero_trovato = true;
                                }
                            }
                            if(!$numero_trovato){
                                echo "Ancora nessuna squadra è stata sorteggiata alla posizione ".($i*2 - 1);
                            } 
                        ?>
                    </p>
                    <p class='second'>
                        <?php
                            $numero_trovato = false;
                            foreach($arrTeams as $team){
                                if($team['team_number'] == ($i*2)){
                                    echo $team['name'];
                                    $numero_trovato = true;
                                }
                            }
                            if(!$numero_trovato){
                                echo "Ancora nessuna squadra è stata sorteggiata alla posizione ".($i*2);
                            } 
                        ?>
                    </p>
                </div>
            <?php endfor; ?>
        </section>
    </main>
    <?php
        require_once('footer.php');
    ?>
</body>
</html>