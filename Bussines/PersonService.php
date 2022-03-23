<?php
    require_once('Models/Person.php');
    require_once('Data/Conexion.php');
    class PersonService{

        public function create(Person $person)
        {
            $query = "INSERT INTO Persons () VALUES ('$person->Firstname')";
        }

        public static function getPersons(){
            $sql = "SELECT * from persona";
            $registros = [];
            $res = mysqli_query(Conexion::con(), $sql);
            while($reg=mysqli_fetch_assoc($res)){
                $registros[]=$reg;
                
            }
                
            return $registros;

        }

        public static function getPerson($id){
            $sql = "SELECT * from persona WHERE idpersona = $id";
            $registro = [];
            $res = mysqli_query(Conexion::con(), $sql);
            while($reg=mysqli_fetch_assoc($res)){
                $registro[]=$reg;
                
            }
                
            return $registro[0];

        }

        public static function insert($firstname,  $lastname,  $date,  $city){
            $sql = "INSERT INTO persona (firstName, lastName, dob, city) values ('$firstname','$lastname','$date','$city')";
            mysqli_query(Conexion::con(), $sql);
        }

        public static function update($id, $firstname,  $lastname,  $date,  $city){
            $sql = "UPDATE persona SET firstName = '$firstname', lastName = '$lastname', dob = '$date', city = '$city' WHERE idpersona = '$id'";
            mysqli_query(Conexion::con(), $sql);
        }

        public static function delete($id){
            $sql = "DELETE FROM persona WHERE idpersona = '$id'";
            mysqli_query(Conexion::con(), $sql);
        }

    }
  

?>