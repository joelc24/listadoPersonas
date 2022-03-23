<?php
class Person {
    public string $Firstname = 'Joel';
    public string $Lastname = 'David';
    public string $Dob = '2012/01/01';
    public string $City = 'San Francisco'; 


    protected string $varProtected = "1";
    private string $varPrivate = "2";

    function __construct($_firstname,$_lastname,$_dob = '2022/02/03',$_city=''){
        $this->Firstname = $_firstname;
        $this->Lastname = $_lastname;
        $this->Dob = $_dob;
        $this->City = $_city;
        
    }

    public function getNames(){
        return $this->Firstname .' '. $this->Lastname;
    }

    public static function get(){
        return 'Nombre de la Persona';
    }

    public function eat(){
    
    }

    public function toSleep(){
        return 'prueba Sleep';
    }

    public function save()
    {
        PersonService::create($this);
    }

    public static function create($_firstname,$_lastname,$_dob = '2022/02/03',$_city=''){
        $query = "INSERT INTO Persons () VALUES ('$_firstname','$_lastname','$_dob','$_city')";

    }

}


?>