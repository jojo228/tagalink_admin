<?php

require __DIR__ . '/Connection.php';


class Demand {
    private $car;

    public function __construct($car) {
        $this->car = $car;
    }

    public function carlogin($username, $password, $tblname) {
        $stmt = $this->car->prepare("SELECT * FROM $tblname WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows;
    }

    public function carinsertdata($field, $data, $table) {
        $field_values = implode(",", $field);
        $data_values = implode("','", $data);

        $sql = "INSERT INTO $table($field_values) VALUES('$data_values')";
        return $this->car->query($sql);
    }

    public function carupdateData($field, $table, $where) {
        // Validate inputs
        if (empty($field) || empty($table) || empty($where)) {
            return false; // or throw an exception
        }
    
        $set_clause = [];
        foreach ($field as $key => $value) {
            if ($value !== null) { // Only include non-null values
                $escaped_key = $this->car->real_escape_string($key);
                $escaped_value = $this->car->real_escape_string($value);
                $set_clause[] = "$escaped_key = '$escaped_value'";
            }
        }
    
        if (empty($set_clause)) {
            return false; // No fields to update
        }
    
        $set_clause_string = implode(", ", $set_clause);
    
        // Ensure WHERE clause starts with "WHERE"
        $where_clause = (stripos(trim($where), 'where') === 0) ? $where : "WHERE $where";
    
        $sql = "UPDATE $table SET $set_clause_string $where_clause";
    
        return $this->car->query($sql);
    }
    

    public function carupdateData_single($field, $table, $where) {
        if (count($field) !== 2) {
            return false; // Invalid input
        }
    
        $column = $this->car->real_escape_string($field[0]);
        $value = $this->car->real_escape_string($field[1]);
    
        $where_clause = (stripos(trim($where), 'where') === 0) ? $where : "WHERE $where";
    
        $sql = "UPDATE $table SET $column = '$value' $where_clause";
        return $this->car->query($sql);
    }
    

    public function carinsertdata_Api_Id($field_values, $data_values, $table) {
        $fields = implode(", ", array_map([$this->car, 'real_escape_string'], $field_values));
        $values = implode(", ", array_map(function($value) {
            return "'" . $this->car->real_escape_string($value) . "'";
        }, $data_values));
    
        $sql = "INSERT INTO $table($fields) VALUES($values)";
        if ($this->car->query($sql)) {
            return $this->car->insert_id;
        } else {
            return false;
        }
    }
    

    public function carupdateData_Api($field, $table, $where) {
        $set_clause = [];
        foreach ($field as $key => $value) {
            $escaped_key = $this->car->real_escape_string($key);
            $escaped_value = $this->car->real_escape_string($value);
            $set_clause[] = "$escaped_key = '$escaped_value'";
        }
        $set_clause_string = implode(", ", $set_clause);
    
        $where_clause = (stripos(trim($where), 'where') === 0) ? $where : "WHERE $where";
    
        $sql = "UPDATE $table SET $set_clause_string $where_clause";
        return $this->car->query($sql);
    }
    

    public function carinsertdata_Api($field_values, $data_values, $table) {
        $fields = implode(", ", array_map([$this->car, 'real_escape_string'], $field_values));
        $values = implode(", ", array_map(function($value) {
            return "'" . $this->car->real_escape_string($value) . "'";
        }, $data_values));
    
        $sql = "INSERT INTO $table($fields) VALUES($values)";
        return $this->car->query($sql);
    }
    
}

?>
