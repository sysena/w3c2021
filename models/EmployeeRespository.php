<?php

include "Employee.php";

class EmployeeRepository
{

    protected $db;

    public function __construct(mysqli $db)
    {
        $this->db = $db;
    }

    private function read($row)
    {
        $result = new Employee();
        $result->email = $row["email"];
        $result->employeeNumber = $row["employeeNumber"];
        $result->extension = $row["extension"];
        $result->firstName = $row["firstName"];
        $result->jobTitle = $row["jobTitle"] ;
        $result->lastName = $row["lastName"];
        $result->officeCode = $row["officeCode"];
        $result->reportsTo = $row["reportsTo"];
        return $result;
    }

    public function getById($id = 1002)
    {


        $query = "SELECT employeeNumber,lastName,firstName,extension,email,officeCode,reportsTo,jobTitle FROM employees  where employeeNumber=" . $id;
        if ($result = $this->db->query($query)) {
            /* fetch object array */
            while ($row = $result->fetch_row()) {
                printf("%s (%s)\n", $row[0], $row[1]);
            }

            /* free result set */
            $result->close();
        }


        return $this->read($row);
    }

    public function getAll($filter)
    {
        $lastName = "%" . $filter["lastName"] . "%";
        $sql = "SELECT employeeNumber,lastName,firstName,extension,email,officeCode,reportsTo,jobTitle FROM employees  WHERE lastName LIKE '" . $lastName . "'";
        $result_sql = $this->db->query($sql);
        $result = array();

        while ($row = $result_sql->fetch_array(MYSQLI_ASSOC)) {
            array_push($result, $this->read($row));
        }


        $result_sql->close();
        return $result;
    }

    public function insert($data)
    {
        /* $sql = "INSERT INTO clients (name, age, address, married, country_id) VALUES (:name, :age, :address, :married, :country_id)";
        $q = $this->db->prepare($sql);
        $q->bindParam(":name", $data["name"]);
        $q->bindParam(":age", $data["age"], PDO::PARAM_INT);
        $q->bindParam(":address", $data["address"]);
        $q->bindParam(":married", $data["married"], PDO::PARAM_INT);
        $q->bindParam(":country_id", $data["country_id"], PDO::PARAM_INT);
        $q->execute(); */
        return $this->getById($this->db->insert_id);
    }

    public function update($data)
    {
        /*  $sql = "UPDATE clients SET name = :name, age = :age, address = :address, married = :married, country_id = :country_id WHERE id = :id";
        $q = $this->db->prepare($sql);
        $q->bindParam(":name", $data["name"]);
        $q->bindParam(":age", $data["age"], PDO::PARAM_INT);
        $q->bindParam(":address", $data["address"]);
        $q->bindParam(":married", $data["married"], PDO::PARAM_INT);
        $q->bindParam(":country_id", $data["country_id"], PDO::PARAM_INT);
        $q->bindParam(":id", $data["id"], PDO::PARAM_INT);
        $q->execute(); */
    }

    public function remove($id)
    {
        /*   $sql = "DELETE FROM clients WHERE id = :id";
        $q = $this->db->prepare($sql);
        $q->bindParam(":id", $id, PDO::PARAM_INT);
        $q->execute(); */
    }
}
