<?php

//fetch.php

include('database_connection.php');

if(isset($_POST["year"]))
{
 $query = "
 SELECT * FROM chart_data 
 WHERE year = '".$_POST["year"]."' 
 ORDER BY id ASC
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output[] = array(
   'species'   => $row["species"],
   'population'  => floatval($row["population"])
  );
 }
 echo json_encode($output);
}

?>
