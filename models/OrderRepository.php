<?php

include "Order.php";

class OrderRepository
{

    protected $db;

    public function __construct(mysqli $db)
    {
        $this->db = $db;
    }

    private function read($row)
    {
        $result = new Order();
        $result->orderNumber = $row["orderNumber"];
        $result->orderDate = $row["orderDate"];
        $result->requiredDate = $row["requiredDate"];
        $result->shippedDate = $row["shippedDate"];
        $result->status= $row["status"] == "Cancelled" ? true : false;
        $result->comments= $row["comments"];
        $result->customerNumber= $row["customerNumber"];
        return $result;
    }

    public function getById($id=10100)
    {

        $query = "SELECT orderNumber,orderDate,requiredDate,shippedDate,status,comments,customerNumber FROM orders  where orderNumber=".$id;
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
        $orderNumber= "%" . $filter["orderNumber"] . "%";
       

        $sql = "SELECT orderNumber,orderDate,requiredDate,shippedDate,status,comments,customerNumber FROM orders  where WHERE orderNumber LIKE '".$orderNumber."'";
        $result_sql= $this->db->query($sql);
        
    
        
        $rows = $result_sql->fetch_all();

        $result = array();
        foreach ($rows as $row) {
            array_push($result, $this->read($row));
        }
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
