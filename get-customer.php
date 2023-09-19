

<?php

include ('./config_db.php');
$id=$_GET['id'];
$query = "SELECT customer.*, customer_alamat.customer_alamat, SUM(sales.total_sales) as total FROM customer INNER JOIN customer_alamat ON customer.customerid=customer_alamat.customer_id INNER JOIN sales ON customer.customerid=sales.customer_id where customer.customerid='".$id."' AND (Date(sales.created_at)> CURDATE() - INTERVAL 1 YEAR  AND Date(sales.created_at) <= CURDATE())";
$res = mysqli_query($mysqli,$query);


$customers = array();
while ($row = mysqli_fetch_array($res)) {
  $cust = array(
    "customerid" => $row['customerid'],
    "customer_name"         => $row['customer_name'],
    "customer_description"          => $row['customer_description'],
    "alamat"          => $row['customer_alamat']!='NULL'? $row['customer_alamat'] : "-" ,
    "total"          => $row['total']!='NULL'? $row['total'] : "0" ,

  );
  $customers[] = $cust;
}

echo json_encode($customers);
?>