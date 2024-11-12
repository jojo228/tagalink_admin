<?php
require "Connection.php";
class Demand
{
    private $car;

    public function __construct($car)
    {
        $this->car = $car;
    }
   
    public function carlogin($username, $password, $tblname)
    {
         
        $q = "SELECT * FROM " . $tblname . " WHERE username='" . $username . "' AND password='" . $password . "'";
        return $this->car->query($q)->num_rows;
         
        
    }

    public function carinsertdata($field, $data, $table)
    {
         
        $field_values = implode(",", $field);
        $data_values = implode("','", $data);

        $sql = "INSERT INTO $table($field_values)VALUES('$data_values')";
        return $this->car->query($sql);
         
    }

    

    
}
?>
