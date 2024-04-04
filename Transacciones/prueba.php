<?php

require("class.pdofactory.php");
print "Running ...< br />";

$strDSN = "pgsql:dbname=usuaris; host=localhost;port=5432;user=postgres;password=postgres";
$objPDO = new PDO($strDSN);
$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {

    // begin the transaction

    $strQuery1 = "INSERT INTO Customer (id, store_id, first_name, last_name, email, address_id) VALUES (
    DEFAULT, 2, 'Aaron', 'Vidana', 'vidana@example.com', 2)";
    $strQuery2 = "INSERT INTO Customer (id, store_id, first_name, last_name, email, address_id) VALUES (
    DEFAULT, 2, 'Aaron2', 'Vidana2', 'vidana2@example.com', 2)";

    $objPDO->beginTransaction();

    $objPDO->exec($strQuery1);
    $objPDO->exec($strQuery2);

    // commit the transaction
    $objPDO->commit();

} catch (Exception $e) {

    // rollback the transaction
    $objPDO->rollBack();
    echo "Failed: ".$e->getMessage();
}
?>
