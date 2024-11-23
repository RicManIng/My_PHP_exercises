<?php
    require_once '_teams.php';
    require_once '_users.php';

    use MyTeams\Componente as Componente;
    use MyUsers\Utente as Utente;
    use myTeams\Team as Team;

    $file_team_save = './databases/teams.json';
    $file_team_subscribe = './databases/team_subscribed.json';
    $test_team = new Team();
    if($test_team->set_name('Test Team')){
        echo 'nome settato';
        echo '<br>';
    }
    if($test_team->team_save($file_team_save)){
        echo 'salvato';
        echo '<br>';
    } else {
        echo 'non salvato';
        echo '<br>';
    }

    $test_team->add_componente('Mario', 'Rossi', 'giocatore', 25, 'portiere');
    $test_team->add_componente('Luca', 'Bianchi', 'giocatore', 23, 'difensore');
    $test_team->add_componente('Giovanni', 'Verdi', 'giocatore', 22, 'centrocampista');
    $test_team->add_componente('Paolo', 'Neri', 'giocatore', 24, 'attaccante');
    $test_team->add_componente('Giuseppe', 'Gialli', 'allenatore', 45);

    if($test_team->team_update($file_team_save)){
        echo 'aggiornato';
        echo '<br>';
    } else {
        echo 'non aggiornato';
        echo '<br>';
    }

    if($test_team->is_team_subscribable()){
        echo 'è possibile iscrivere il team';
        echo '<br>';
    } else {
        echo 'non è possibile procedere alla iscrizione';
        echo '<br>';
    }

    $test_team->add_componente('Mario', 'Rossi', 'giocatore', 25, 'portiere');
    $test_team->add_componente('Luca', 'Bianchi', 'giocatore', 23, 'difensore');
    $test_team->add_componente('Giovanni', 'Verdi', 'giocatore', 22, 'centrocampista');
    $test_team->add_componente('Paolo', 'Neri', 'giocatore', 24, 'attaccante');
    $test_team->add_componente('Mario', 'Rossi', 'giocatore', 25, 'portiere');
    $test_team->add_componente('Luca', 'Bianchi', 'giocatore', 23, 'difensore');
    $test_team->add_componente('Giovanni', 'Verdi', 'giocatore', 22, 'centrocampista');
    $test_team->add_componente('Paolo', 'Neri', 'giocatore', 24, 'attaccante');
    $test_team->add_componente('Mario', 'Rossi', 'giocatore', 25, 'portiere');
    $test_team->add_componente('Luca', 'Bianchi', 'giocatore', 23, 'difensore');
    $test_team->add_componente('Giovanni', 'Verdi', 'giocatore', 22, 'centrocampista');
    $test_team->add_componente('Paolo', 'Neri', 'giocatore', 24, 'attaccante');

    if($test_team->team_update($file_team_save)){
        echo 'aggiornato';
        echo '<br>';
    } else {
        echo 'non aggiornato';
        echo '<br>';
    }

    if($test_team->is_team_subscribable()){
        echo 'è possibile iscrivere il team';
        echo '<br>';
    } else {
        echo 'non è possibile procedere alla iscrizione';
        echo '<br>';
    }

    $test_team->team_subscribe($file_team_subscribe);
    $test_team->team_unsubscribe($file_team_subscribe);

    $test_team->team_delete($file_team_save);
?>