<!DOCTYPE html>
<html lang="it">
<head>
    <?php
        require_once('head.php');
    ?>
    <title>Centro Sportivo Home</title> 
    <link rel="stylesheet" href="resources/css/iscriviti.min.css">
</head>
<body>
    <?php
        require_once('common.php');
        require_once('header.php');
        $condizioni_valide = true;
        $error_message = null;
        if(isset($_POST['team_name'])){
            $file_team = './databases/teams.json';
            $file_user = './databases/Users.json';
            $team_name = $_POST['team_name'];
            if(!$user->set_myTeam_name($team_name)){
                $condizioni_valide = false;
                $error_message = 'Errore: nome squadra non valido';
            } elseif($user->set_MyTeam($team_name, $file_team)){
                $condizioni_valide = false;
                $error_message = 'Errore: squadra già esistente';
            }

            if($condizioni_valide){
                $user->user_save($file_user);
            }
        }
    ?>
    <main>
        <?php if(!$UserLogged): ?>
            <div class='container'>
                <h1>Devi effettuare il Login prima di poter creare una squadra</h1>
                <p>Clicca il link in basso per effettuarlo</p>
                <a href="login.php?stato=login">Vai a Login</a>
            </div>
        <?php elseif($user->get_myTeam_name() == null): ?>
            <form action="" method="post">
                <h1>Registrazione Squadra</h1>
                <input type="text" name="team_name" id="team_name" placeholder="Inserisci il nome del tuo team" required>
                <?php
                    if($error_message){
                        echo "<p class='errors'>$error_message</p>";
                    }
                ?>
                <input type="submit" name="crea_squadra" value="Crea Squadra">
            </form>
        <?php elseif(isset($_POST['crea_squadra'])): ?>
            <div class='container'>
                <h1>Squadra creata con successo</h1>
                <p>Clicca il link in basso per aggiungere partecipanti e procedere all'iscrizione</p>
                <a href="my_team.php">Vai a My Team</a>
            </div>
        <?php else: ?>
            <div class='container'>
                <h1>Hai già creato la tua squadra</h1>
                <p>Clicca il link in basso per aggiungere partecipanti e procedere all'iscrizione</p>
                <a href="my_team.php">Vai a My Team</a>
            </div>
        <?php endif; ?>
    </main>
    <?php
        require_once('footer.php');
    ?>
</body>
</html>