<!DOCTYPE html>
<html lang="it">
<head>
    <?php
        require_once('head.php');
    ?>
    <title>Centro Sportivo Home</title> 
    <link rel="stylesheet" href="resources/css/my_team.min.css">
</head>
<body>
    <?php
        require_once('common.php');
        require_once('header.php');

        $file_teams = './databases/teams.json';
        $file_teams_subscribed = './databases/team_subscribed.json';

        if(isset($_POST['aggiungi_componente'])){
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $age = $_POST['age'];
            $ruolo = $_POST['ruolo'];
            if (isset($_POST['posizione'])){
                $posizione = $_POST['posizione'];
            } else {
                $posizione = null;
            }
            
            $user->get_MyTeam()->add_componente($name, $surname, $ruolo, $age, $posizione);
            $user->get_MyTeam()->team_update($file_teams);
        }

        if(isset($_GET['condizione'])){
            if($_GET['condizione'] == 'elimina_componente'){
                $user->get_MyTeam()->remove_componente($_GET['nome'], $_GET['cognome'], $_GET['age']);
                $user->get_MyTeam()->team_update($file_teams);
            }
        }

        if(isset($_POST['elimina_team'])){
            $user->get_MyTeam()->team_unsubscribe($file_teams_subscribed);
            $user->get_MyTeam()->team_delete($file_teams);
        }

        if(isset($_POST['iscrivi_team'])){
            $user->get_MyTeam()->team_subscribe($file_teams_subscribed);
            $user->get_MyTeam()->team_update($file_teams);
        }

        if(isset($_POST['disiscrivi_team'])){
            $user->get_MyTeam()->team_unsubscribe($file_teams_subscribed);
        }
        
    ?>
    <main>
        <section>
            <form action="my_team.php?selezione=7" method="POST">
                <h1>Aggiungi Componente</h1>
                <label for="name">Nome * :</label>
                <input type="text" name="name" id="name" required>
                <label for="surname">Cognome * :</label>
                <input type="text" name="surname" id="surname" required>
                <label for="age">Età * :</label>
                <input type="number" name="age" id="age" required>
                <div>
                    <select name="ruolo" id="ruolo">
                        <option value="Allenatore">Allenatore</option>
                        <option value="Giocatore">Giocatore</option>
                    </select>
                    <select name="posizione" id="posizione">
                        <option value="" disabled selected>Posizione</option>
                        <option value="Portiere">Portiere</option>
                        <option value="Difensore">Difensore</option>
                        <option value="Centrocampista">Centrocampista</option>
                        <option value="Attaccante">Attaccante</option>
                    </select>
                </div>
                <input type="submit" name="aggiungi_componente" value="Aggiungi Componente">
            </form>
        </section>
        <section>
            <h1>La tua squadra</h1>
            <?php if(count($user->get_MyTeam()->get_componenti()) == 0): ?>
                <p>Non ci sono ancora componenti nel tuo team, compila il form per aggiungerli</p>
            <?php else: ?>
                <?php for ($i = 0; $i < count($user->get_MyTeam()->get_componenti()); $i++): ?>
                    <div>
                        <?php $arrComponenti = $user->get_MyTeam()->get_componenti(); ?>
                        <?php if($arrComponenti[$i]['ruolo'] == 'Allenatore'): ?>
                            <img src="./resources/img/allenatore.png" alt="allenatore">
                        <?php else: ?>
                            <img src="./resources/img/giocatore.png" alt="giocatore">
                        <?php endif; ?>
                        <p><?php echo $arrComponenti[$i]['name']; ?></p>
                        <p><?php echo $arrComponenti[$i]['surname']; ?></p>
                        <p><?php echo $arrComponenti[$i]['age']; ?></p>
                        <p><?php echo $arrComponenti[$i]['ruolo']; ?></p>
                        <?php if($arrComponenti[$i]['ruolo'] == 'Giocatore'): ?>
                            <p><?php echo $arrComponenti[$i]['posizione']; ?></p>
                        <?php else: ?>
                            <p>--</p>
                        <?php endif; ?>
                        <a href="my_team.php?selezione=7&condizione=elimina_componente&nome=<?= $arrComponenti[$i]['name']; ?>&cognome=<?= $arrComponenti[$i]['surname']; ?>&age=<?= $arrComponenti[$i]['age']; ?>" title="elimina componente"><img src="./resources/img/icons8-cancel.svg" alt="icona elimina" id="elimina_componente"></a>
                    </div>
                <?php endfor; ?>    
            <?php endif; ?>
        </section>
        <?php if(count($user->get_MyTeam()->get_componenti()) != 0): ?>
        <section>
            <h1>Iscrivi al torneo la tua squadra</h1>
            <?php if(!$user->get_MyTeam()->is_team_subscribable()): ?>
                <p>Il tuo team non è pronto ad essere iscritto, deve contenere almeno 1 allenatore e 16 giocatori</p>
                <form action="my_team.php?selezione=7" method="POST">
                    <input type="submit" name="elimina_team" value="Elimina Team" class="elimina_team">
                </form>
            <?php else: ?>
                <form action="my_team.php?selezione=7" method="POST">
                    <?php if($user->get_MyTeam()->is_team_subscribed($file_teams_subscribed)): ?>
                        <p>Il tuo team è già iscritto al torneo</p>
                    <?php else: ?>
                        <input type="submit" name="iscrivi_team" value="Iscrivi Team">
                    <?php endif; ?>
                    <input type="submit" name="disiscrivi_team" value="Disiscrivi Team" class="disiscrivi_team">
                    <input type="submit" name="elimina_team" value="Elimina Team" class="elimina_team">
                </form>
            <?php endif; ?>
        </section>
        <?php endif; ?>
    </main>
    <?php
        require_once('footer.php');
    ?>
</body>
</html>