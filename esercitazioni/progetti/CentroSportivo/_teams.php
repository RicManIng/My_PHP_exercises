<?php

    namespace MyTeams;

    class Componente{
        protected $name = null;
        protected $surname = null;
        protected $ruolo = null;
        protected $posizione = null;
        protected $age = null;

        public function set_name($value){
            $temp = htmlspecialchars(trim($value));
            if (is_string($temp) && strlen($temp) <= 20){
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
            if (is_string($temp) && strlen($temp) <= 20){
                $this->surname = $temp;
                return 1;
            } else {
                return 0;
            }
        }

        public function get_surname(){
            return $this->surname;
        }

        public function set_age($value){
            if(is_numeric($value) && $value >= 18){
                $this->age = $value;
                return 1;
            } else {
                return 0;
            }
        }

        public function get_age(){
            return $this->age;
        }

        public function set_ruolo($value){
            $this->ruolo = $value;
        }

        public function get_ruolo(){
            return $this->ruolo;
        }

        public function set_posizione($value){
            $this->posizione = $value;
        }

        public function get_posizione(){
            return $this->posizione;
        }
    }

    /* ---------------------------------------------------------------------------------------- */

    class Team{
        protected $name = null;
        protected $societa = null;
        protected $componenti = [];
        protected $team_number = null;

        public function set_name($value){
            $temp = htmlspecialchars($value);
            if (is_string($temp) && strlen($temp) <= 20){
                $this->name = $temp;
                return 1;
            } else {
                return 0;
            }
        }

        public function get_name(){
            return $this->name;
        }

        public function set_societa($value){
            $temp = htmlspecialchars(trim($value));
            if (is_string($temp) && strlen($temp) <= 20){
                $this->societa = $temp;
                return 1;
            } else {
                return 0;
            }
        }

        public function get_societa(){
            return $this->societa;
        }

        public function add_componente($nome, $cognome, $ruolo, $eta, $posizione=null){
            $temp = new Componente();
            if(!$temp->set_name($nome)){
                return 0;
            }
            elseif(!$temp->set_surname($cognome)){
                return 0;
            }
            elseif(!$temp->set_age($eta)){
                return 0;
            } else {
                $temp->set_ruolo($ruolo);
                $temp->set_posizione($posizione);
                $componente_esistente = false;
                foreach($this->componenti as $componente){
                    if($componente['name'] == $temp->get_name()  &&  $componente['surname'] == $temp->get_surname()){
                        $componente_esistente = true;
                    }
                }
                if($componente_esistente){
                    return 0;
                } else {
                    array_push($this->componenti, ['name' => $temp->get_name(), 'surname' => $temp->get_surname(), 'ruolo' => $temp->get_ruolo(), 'age' => $temp->get_age(), 'posizione' => $temp->get_posizione()]);
                    return 1;
                }
            }
        }

        public function remove_componente($nome, $cognome, $eta){
            foreach($this->componenti as $key => $componente){
                if($componente['name'] == $nome && $componente['surname'] == $cognome && $componente['age'] == $eta){
                    unset($this->componenti[$key]);
                }
            }
            return 1;
        }

        public function set_componenti($array){
            $this->componenti = $array;
        }

        public function get_componenti(){
            return $this->componenti;
        }

        public function is_team_subscribable(){
            $manager_present = false;
            foreach($this->componenti as $componente){
                if($componente['ruolo'] == 'Allenatore'){
                    $manager_present = true;
                }
            }
            if($manager_present && count($this->componenti) >= 17){
                return 1;
            } else {
                return 0;
            }
        }

        public function is_team_subscribed($file){
            $teamArr = json_decode(file_get_contents($file), true);
            $squadra_presente = false;
            if(count($teamArr) > 0 && $this->name != null){
                foreach($teamArr as $key => $team){
                    if($team['name'] == $this->name){
                        $squadra_presente = true;
                    }
                }
            }
            if($squadra_presente){
                return 1;
            } else {
                return 0;
            }
        }

        public function team_save($file){
            $teamArr = json_decode(file_get_contents($file), true);
            $squadra_presente = false;
            if(count($teamArr) > 0 && $this->name != null){
                foreach($teamArr as $key => $team){
                    if($team['name'] == $this->name){
                        $squadra_presente = true;
                    }
                }
            }
            if(!$squadra_presente){
                array_push($teamArr, ['name' => $this->name, 'societa' => $this->societa, 'componenti' => $this->componenti, 'team_number' => $this->team_number]);
                file_put_contents($file, json_encode($teamArr));
                return 1;
            } else {
                return 0;
            }
        }

        public function team_subscribe($file){
            $subArr = json_decode(file_get_contents($file), true);
            $squadra_presente = false;
            foreach($subArr as $key => $team){
                if($team['name'] == $this->name){
                    $squadra_presente = true;
                }
            }
            if(!$squadra_presente){
                $free_pos_Arr = range(1, 16);
                $used_pos = [];
                foreach($subArr as $team){
                    array_push($used_pos, $team->team_number);
                }
                $free_pos = array_diff($free_pos_Arr, $used_pos);
                $this->team_number = array_rand($free_pos);
                array_push($subArr, ['name' => $this->name, 'team_number' => $this->team_number]);
                file_put_contents($file, json_encode($subArr));
                return 1;
            } else {
                return 0;
            }
        }

        public function set_team_number($value){
            $this->team_number = $value;
        }

        public function get_team_number(){
            return $this->team_number;
        }

        public function team_update($file){
            $teamArr = json_decode(file_get_contents($file), true);
            $squadra_presente = false;
            if(count($teamArr) > 0 && $this->name != null){
                foreach($teamArr as $key => $team){
                    if($team['name'] == $this->name){
                        $squadra_presente = true;
                        $teamArr[$key] = ['name' => $this->name, 'societa' => $this->societa, 'componenti' => $this->componenti, 'team_number' => $this->team_number];
                    }
                }
            }
            if($squadra_presente){
                file_put_contents($file, json_encode($teamArr));
                return 1;
            } else {
                return 0;
            }
        }

        public function team_delete($file){
            $teamArr = json_decode(file_get_contents($file), true);
            $squadra_presente = false;
            if(count($teamArr) > 0 && $this->name != null){
                foreach($teamArr as $key => $team){
                    if($team['name'] == $this->name){
                        $squadra_presente = true;
                        unset($teamArr[$key]);
                    }
                }
            }
            if($squadra_presente){
                file_put_contents($file, json_encode($teamArr));
                return 1;
            } else {
                return 0;
            }
        }

        public function team_unsubscribe($file){
            $subArr = json_decode(file_get_contents($file), true);
            $squadra_presente = false;
            if(count($subArr) > 0 && $this->name != null){
                foreach($subArr as $key => $team){
                    if($team['name'] == $this->name){
                        $squadra_presente = true;
                        unset($subArr[$key]);
                    }
                }
            }
            if($squadra_presente){
                file_put_contents($file, json_encode($subArr));
                return 1;
            } else {
                return 0;
            }
        }
    }

?>