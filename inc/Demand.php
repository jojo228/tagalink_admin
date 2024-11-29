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
        $set_clause = [];
        foreach ($field as $key => $value) {
            $set_clause[] = "$key = '$value'";
        }
        $set_clause_string = implode(", ", $set_clause);

        $sql = "UPDATE $table SET $set_clause_string WHERE $where";
        return $this->car->query($sql);
    }

    public function carupdateData_single($field, $table, $where) {
        $set_clause = "$field[0] = '$field[1]'";
        $sql = "UPDATE $table SET $set_clause WHERE $where";
        return $this->car->query($sql);
    }

    public function carinsertdata_Api_Id($field_values, $data_values, $table) {
        $sql = "INSERT INTO $table($field_values) VALUES($data_values)";
        if ($this->car->query($sql)) {
            return $this->car->insert_id;
        } else {
            return false;
        }
    }

    public function carupdateData_Api($field, $table, $where) {
        $set_clause = [];
        foreach ($field as $key => $value) {
            $set_clause[] = "$key = '$value'";
        }
        $set_clause_string = implode(", ", $set_clause);

        $sql = "UPDATE $table SET $set_clause_string WHERE $where";
        return $this->car->query($sql);
    }

    public function carinsertdata_Api($field_values, $data_values, $table) {
        $sql = "INSERT INTO $table($field_values) VALUES($data_values)";
        return $this->car->query($sql);
    }
}

?>
