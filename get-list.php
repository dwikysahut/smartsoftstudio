<?php

include ('./config_db.php');
$query = 'SELECT * FROM customer';
$res = mysqli_query($mysqli,$query);

$customers = array();
while ($row = mysqli_fetch_array($res)) {
  $cust = array(
    "customerid" => $row['customerid'],
    "customer_name"         => $row['customer_name'],
    "customer_description"          => $row['customer_description'],

  );
  $customers[] = $cust;
}

echo json_encode($customers);
?>