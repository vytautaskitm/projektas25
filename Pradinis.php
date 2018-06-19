<!DOCTYPE html>
<html>
<style>

    table, th, td {
    border: 0px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 20px;
    text-align: center;
	background-color: #85adad;
}

 
</style>
    <body>
 
        <form method="post">
            <fieldset>
            <legend>Riedlentes:</legend>
          
<?php

   
    $servername = "localhost";
    $username = "root" ;
    $password = "" ;
    $dbname = "homestead" ;
	
	
    $pavadinimas = $_POST ['pavadinimas'];
    $aprasymas = $_POST ['aprasymas'];
	$kat_id = $_POST ['kat_id'];
    

 
   
 
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
   {if(($pavadinimas || strlen($pavadinimas = trim($pavadinimas))!=0)){
            $find = "SELECT * FROM produktai WHERE pavadinimas LIKE '%$pavadinimas%'";
        } else {
            $find = "SELECT * FROM produktai";
        }
       
        $result = $conn->query($find);
        $no = 0;
        if($result->num_rows > 0){
            echo "<p><p><table align=\"left\" border=\"1\" cellspacing=\"3\">\n";
            echo "<tr><th>No.</th>
           <th>ID</th>
           <th>Pavadinimas</th>
           <th>Aprasymas</th>
           <th>Kategorija</th>";
       
        while($row = $result->fetch_assoc()){
            $no = $no+1;
            echo "<tr><td> $no </td>
           <td>". $row["id"] ."</td>
           <td>". $row["pavadinimas"] ."</td>
           <td>". $row["aprasymas"] ."</td>
           <td>". $row["kat_id"] ."</td>
           </tr>";
    }
            echo "</table>";
			
    }
        else {
            echo "Success";
    }
        $conn->close();
   	
 
}
   
 ?>
