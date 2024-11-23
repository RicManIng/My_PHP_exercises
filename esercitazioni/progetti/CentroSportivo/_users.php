<?php

    namespace MyUsers;

    require_once('./_teams.php');
    
    use MyTeams\Team;

    class User {
        protected $username = null;
        protected $password = null;
        protected $email = null;
        protected $name = null;
        protected $surname = null;
        protected $birthDate = [];
        protected $societa = null;
        protected $my_team_name = null;
        protected $my_team_object = null;

        public function set_username($value){
            $temp = htmlspecialchars(trim($value));
            if (is_string($temp) && strlen($temp) <= 20){
                $this->username = $temp;
                return 1;
            } else {
                return 0;
            }
        }

        public function get_username(){
            return $this->username;
        }

        public function username_exists($value, $file){
            $UserDatabase = json_decode(file_get_contents($file), true);
            foreach ($UserDatabase as $key => $user) {
                if($user['username'] == $value){
                    return 1;
                }
            }
            return 0;
        }

        public function set_password($value){
            $temp = htmlspecialchars(trim($value));
            if (is_string($temp) && strlen($temp) >= 8 && strlen($temp) <= 20){
                $this->password = $temp;
                return 1;
            } else {
                return 0;
            }
        }

        public function get_password(){
            return $this->password;
        }

        public function set_email($value){
            if (filter_var($value, FILTER_VALIDATE_EMAIL)){
                $this->email = $value;
                return 1;
            } else {
                return 0;
            }
        }

        public function get_email(){
            return $this->email;
        }

        public function email_exists($value, $file){
            $UserDatabase = json_decode(file_get_contents($file), true);
            foreach ($UserDatabase as $key => $user) {
                if($user['email'] == $value){
                    return 1;
                }
            }
            return 0;
        }

        public function set_name($value){
            $temp = htmlspecialchars(trim($value));
            if (is_string($temp) && strlen($temp) <= 50){
                $this->name = $temp;
                return 1;
            } else {
                return 0;
            }
        }

        public function get_name(){
            return $this->name;
        }

        public function set_surname($value){
            $temp = htmlspecialchars(trim($value));
            if (is_string($temp) && strlen($temp) <= 50){
                $this->surname = $temp;
                return 1;
            } else {
                return 0;
            }
        }

        public function get_surname(){
            return $this->surname;
        }

        public function set_birthDate($giorno, $mese, $anno){
            if (is_numeric($giorno) && is_numeric($mese) && is_numeric($anno)){
                if(checkdate($mese, $giorno, $anno)){
                    $this->birthDate = ['giorno' => $giorno, 'mese' => $mese, 'anno' => $anno];
                    return 1;
                } else {
                    return 0;
                }
            }
            else {
                return 0;
            }
        }

        public function get_birthDate(){
            return $this->birthDate;
        }

        public function set_societa($value){
            $temp = htmlspecialchars(trim($value));
            if (is_string($temp) && strlen($temp) <= 50){
                $this->societa = $temp;
                return 1;
            } else {
                return 0;
            }
        }

        public function get_societa(){
            return $this->societa;
        }

        public function set_myTeam_name($value){
            $temp = htmlspecialchars($value);
            if (is_string($temp)){
                $this->my_team_name = $temp;
                return 1;
            } else {
                return 0;
            }
        }

        public function get_myTeam_name(){
            return $this->my_team_name;
        }

        public function set_MyTeam($nome, $file){
            $this->my_team_object = new Team();
            $this->my_team_object->set_name($nome);
            if(!$this->my_team_object->team_save($file)){
                return 0;
            } else {
                return 1;
            }
        }

        public function clear_MyTeam(){
            $this->my_team_object = null;
        }

        public function load_myTeam($nome, $file){
            $this->my_team_object = new Team();
            $teamDatabase = json_decode(file_get_contents($file), true);
            foreach ($teamDatabase as $key => $team) {
                if($team['name'] == $nome){
                    $this->my_team_object->set_name($team['name']);
                    $this->my_team_object->set_societa($team['societa']);
                    if ($team['team_number'] != null){
                        $this->my_team_object->set_team_number($team['team_number']);
                    }
                    if(count($team['componenti'])>0){
                        $this->my_team_object->set_componenti($team['componenti']);
                    }
                    return 1;
                }
            }
            return 0;
        }

        public function get_MyTeam(){
            return $this->my_team_object;
        }

        public function user_save($file){
            $UserDatabase = json_decode(file_get_contents($file), true);
            $user_found = false;
            foreach ($UserDatabase as $key => $user) {
                if($user['username'] == $this->username){
                    $UserDatabase[$key] = ['username' => $this->username, 'password' => $this->password, 'email' => $this->email, 'name' => $this->name, 'surname' => $this->surname, 'birthDate' => $this->birthDate, 'societa' => $this->societa, 'my_team_name' => $this->my_team_name];
                    $user_found = true;
                }
            }
            if(!$user_found){
                array_push($UserDatabase, ['username' => $this->username, 'password' => $this->password, 'email' => $this->email, 'name' => $this->name, 'surname' => $this->surname, 'birthDate' => $this->birthDate, 'societa' => $this->societa, 'my_team_name' => $this->my_team_name]);
            }
            file_put_contents($file, json_encode($UserDatabase));
        }

        public function check_login($username, $password, $file_user, $file_team){
            $UserDatabase = json_decode(file_get_contents($file_user), true);
            foreach ($UserDatabase as $key => $user) {
                if($user['username'] == $username && $user['password'] == $password){
                    $this->set_username($user['username']);
                    $this->set_password($user['password']);
                    $this->set_email($user['email']);
                    $this->set_name($user['name']);
                    $this->set_surname($user['surname']);
                    $this->set_birthDate($user['birthDate']['giorno'], $user['birthDate']['mese'], $user['birthDate']['anno']);
                    $this->set_societa($user['societa']);
                    if ($user['my_team_name'] != null){
                        $this->set_myTeam_name($user['my_team_name']);
                        $this->load_myTeam($user['my_team_name'], $file_team);
                    }
                    return 1;
                }
            }
            return 0;
        }
    }
?>