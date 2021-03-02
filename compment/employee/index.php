<?php

include "../../models/EmployeeRespository.php";

$config = include("../../db/config.php");
$db = new mysqli( $config["host"],$config["username"], $config["password"],$config["db"]);
$employees = new EmployeeRepository($db);


switch($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        /**
         * array(
         *   "lastName" => $_GET["lastname"],
          *  "address" => $_GET["address"],
           * "country_id" => intval($_GET["country_id"])
        *)
         */
        $result = $employees->getAll(array("lastName"=>''));
        break;

    case "POST":
        $result = $clients->insert(array(
            "name" => $_POST["name"],
            "age" => intval($_POST["age"]),
            "address" => $_POST["address"],
            "married" => $_POST["married"] === "true" ? 1 : 0,
            "country_id" => intval($_POST["country_id"])
        ));
        break;

    case "PUT":
        parse_str(file_get_contents("php://input"), $_PUT);

        $result = $clients->update(array(
            "id" => intval($_PUT["id"]),
            "name" => $_PUT["name"],
            "age" => intval($_PUT["age"]),
            "address" => $_PUT["address"],
            "married" => $_PUT["married"] === "true" ? 1 : 0,
            "country_id" => intval($_PUT["country_id"])
        ));
        break;

    case "DELETE":
        parse_str(file_get_contents("php://input"), $_DELETE);

        $result = $clients->remove(intval($_DELETE["id"]));
        break;
}


header("Content-Type: application/json");
echo json_encode($result);

?>


