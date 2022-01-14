<?php
require_once "../model/Produtp.php";
echo $_GET["id"];

Frutas::deletar($_GET["id"]);

header("Location: ../");
/**
 *  Exclusão de um Produto
 */
function delete($id = null) {

  global $customer;
  $customer = remove('customers', $id);

  header('location: index.php');
}
