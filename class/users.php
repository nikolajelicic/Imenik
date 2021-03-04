<?php

include '../database/db.php';

class users extends DB{

    public $id;
    public $name;
    public $surname;
    public $broj;

    //selektovanje svih korisnika iz baze
    public function selectUsers(){
        $sql = "SELECT*FROM users";
        $query = DB::connect()->prepare($sql);
        $query->execute();

        $json_izlazni = [];
        while($red = $query->fetch(PDO::FETCH_ASSOC)){
            $json_array = array(
                "id" => $red['idusers'],
                "ime" => $red['name'],
                "prezime" => $red['surname'],
                "time"=> $red['time']
            );
            array_push($json_izlazni, $json_array);
        }
        return print_r(json_encode($json_izlazni));
    }

    //upisivanje novog korisnika u bazu
    public function insertUsers($name,$surname){
        $this->name = $name;
        $this->surname = $surname;
        $sql = "INSERT INTO users SET name=:name, surname=:surname";
        $query = DB::connect()->prepare($sql);

        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->surname=htmlspecialchars(strip_tags($this->surname));

        $query->bindParam(":name",$this->name);
        $query->bindParam(":surname",$this->surname);

        $json_izlazni = [];
            if(strlen($this->name)<2||strlen($this->surname)<2){
                $json_array = array(
                    "status"=>false,
                    "message"=>"Podaci nisu validni"
                );
            }else if($query->execute()){
                 $json_array = array(
                     "status"=>true,
                     "message"=>"Success"
                 );
            }else{
                $json_array = array(
                    "status"=>false,
                    "message"=>"An error occurred"
                );
            }
        array_push($json_izlazni, $json_array);
        return print_r(json_encode($json_izlazni));
    }

    //brisanje korisnika iz baze
    public function delateUsers($id){
        $this->id = $id;
        $sql = "DELETE FROM users WHERE idusers=:id";
        $query = DB::connect()->prepare($sql);

        $this->id=htmlspecialchars(strip_tags($this->id));  
        $query->bindParam(":id",$this->id);
        $json_izlazni = [];
            if($query->execute()){
                $json_array = array(
                    "status"=>true,
                    "message"=>"Uspesno ste obrisali korisnika"
                );
            }else{
                $json_array = array(
                    "status"=>false,
                    "message"=>"Doslo je do greske prilikom brisanja korisnika"
                );
            }
        array_push($json_izlazni, $json_array);
        return print_r(json_encode($json_izlazni));
    }

    //editovanje korisnika
    public function editUsers($name,$surname,$id){
        $this->name = $name;
        $this->surname = $surname;
        $this->id = $id;
        $sql = "UPDATE users SET name=:name,surname=:surname WHERE idusers=:id";
        $query = DB::connect()->prepare($sql);

        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->surname=htmlspecialchars(strip_tags($this->surname));
        $this->id=htmlspecialchars(strip_tags($this->id));
        
        $query->bindParam(":name",$this->name);
        $query->bindParam(":surname",$this->surname);
        $query->bindParam(":id",$this->id);
        $json_izlazni = [];
            if(strlen($this->name)<2||strlen($this->surname)<2){
                $json_array = array(
                    "status"=>false,
                    "message"=>"Podaci nisu validni"
                );
            }else if($query->execute()){
                    $json_array = array(
                        "status" => true,
                        "message" => "Uspesno ste promenili podatke"
                    );
                }else{
                    $json_array = array(
                        "status" => false,
                        "message" => "Doslo je do greske prilikom promene podataka"
                    );
                }
                array_push($json_izlazni,$json_array);
                return print_r(json_encode($json_izlazni));
    }

    //upisivanje broja
    public function insertPhone($broj,$id){

        $this->broj = $broj;
        $this->id = $id;
        $sql = "INSERT INTO brojevi SET broj=:broj,users_idusers=:id";
        $query=DB::connect()->prepare($sql);

        $this->broj=htmlspecialchars(strip_tags($this->broj));
        $this->id=htmlspecialchars(strip_tags($this->id));

        $query->bindParam(":broj",$this->broj);
        $query->bindParam(":id",$this->id);
        $json_izlazni = [];
            if($query->execute()){
                $json_array = array(
                    "status" => true,
                    "message" => "Uspesno ste uneli broj"
                );
            }else{
                $json_izlazni = array(
                    "status" => false,
                    "message" => "Doslo je do greske prilikom unosenja broja, pokusajte ponovo"
                );
            }   
            array_push($json_izlazni, $json_array);
            return print_r(json_encode($json_izlazni));
    }

    //selektovanje svih brojeva za odredjenog usera
    public function getNumber($id){
        $this->id = $id;

        $sql = "SELECT brojevi.broj,brojevi.idnumber
        FROM brojevi
        JOIN users ON users.idusers=brojevi.users_idusers
        WHERE users_idusers=:id";
        $query = DB::connect()->prepare($sql);

        $query->id=htmlspecialchars(strip_tags($this->id));
        $query->bindParam(":id",$this->id);
        $query->execute();
        
        $json_izlazni = [];
        while($red = $query->fetch(PDO::FETCH_ASSOC)){
            $json_array = array(
                "idbroj" => $red['idnumber'],
                "broj" => $red['broj']
            );
            array_push($json_izlazni, $json_array);
        }
        return print_r(json_encode($json_izlazni));
    }
}

?>