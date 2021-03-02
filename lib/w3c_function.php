<?php

/**
 * Print Nav Item
 * JavaScript Grid Page
 */
function print_nav_item($navItem = 'jsgrid', $title, $active = 'jsgrid')
{
    $w3cNavItem = " ";
    $w3cActive = "";
    if ($navItem == $active) {
        $w3cActive = "active";
    } else {
        $w3cActive = " ";
    };
    $w3cNavItem = $w3cNavItem . '<li class="nav-item">';
    $w3cNavItem = $w3cNavItem . '<a href="/index.php?navitem=' . $navItem . '" class="nav-link ' . $w3cActive . '">';
    $w3cNavItem = $w3cNavItem . ' <i class="far fa-circle nav-icon"></i>';
    $w3cNavItem = $w3cNavItem . '  <p>' . $title . '</p>';
    $w3cNavItem = $w3cNavItem . '</a>';
    $w3cNavItem = $w3cNavItem . '</li>';
    echo $w3cNavItem . "\n";
}

/**
 * Print Employee Table for jQuery DataTable
 */
function print_employees_table()
{
    $config = include("../db/config.php");
    $db = new mysqli($config["host"], $config["username"], $config["password"], $config["db"]);

    $lastName = "%" . "" . "%";
    $sql = "SELECT employeeNumber,lastName,firstName,extension,email,officeCode,reportsTo,jobTitle FROM employees  WHERE lastName LIKE '" . $lastName . "'";
    $result_sql = $db->query($sql);




    $tableString = '<table id="example2" class="table table-bordered table-hover">';
    $tableString = $tableString . ' <thead>';

    $tableString = $tableString . '<tr>';
    $tableString = $tableString . '  <th>Employee Number</th>';
    $tableString = $tableString . '  <th>Last Name/th>';
    $tableString = $tableString . '  <th>First Name</th>';
    $tableString = $tableString . '  <th>Extension/th>';
    $tableString = $tableString . '  <th>Email</th>';
    $tableString = $tableString . '  <th>Office Code</th>';
    $tableString = $tableString . '  <th>Reports To</th>';
    $tableString = $tableString . '  <th>Job Title</th>';
    $tableString = $tableString . '</tr>';
    $tableString = $tableString . '</thead>';
    $tableString = $tableString . '<tbody>';
    // Get Data

    while ($row = $result_sql->fetch_array(MYSQLI_ASSOC)) {

        $tableString = $tableString . '<tr>';
        $tableString = $tableString . '<td>' . $row["employeeNumber"] . '</td>';
        $tableString = $tableString . '<td>' . $row["lastName"] . '</td>';
        $tableString = $tableString . '<td>' . $row["firstName"] . '</td>';
        $tableString = $tableString . '<td>' . $row["extension"] . '</td>';
        $tableString = $tableString . '<td>' . $row["email"] . '</td>';
        $tableString = $tableString . '<td>' . $row["officeCode"] . '</td>';
        $tableString = $tableString . '<td>' . $row["reportsTo"] . '</td>';
        $tableString = $tableString . '<td>' . $row["jobTitle"] . '</td>';


        $tableString = $tableString . '</tr>';
    }


    $result_sql->close();


    $tableString = $tableString . '</tbody>';
    $tableString = $tableString . '<tfoot>';
    $tableString = $tableString . '<tr>';
    $tableString = $tableString . '  <th>Employee Number</th>';
    $tableString = $tableString . '  <th>Last Name/th>';
    $tableString = $tableString . '  <th>First Name</th>';
    $tableString = $tableString . '  <th>Extension/th>';
    $tableString = $tableString . '  <th>Email</th>';
    $tableString = $tableString . '  <th>Office Code</th>';
    $tableString = $tableString . '  <th>Reports To</th>';
    $tableString = $tableString . '  <th>Job Title</th>';
    $tableString = $tableString . '</tr>';
    $tableString = $tableString . '</tfoot>';
    $tableString = $tableString . '</table>';
}
