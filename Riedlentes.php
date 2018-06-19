<!DOCTYPE html>
<html>
<style>
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
	background-color: #85adad;
}
th, td {
    padding: 5px;
    text-align: left;
	background-color: #85adad;
}
 
</style>
    <body>
 
        <form method="post">
            <fieldset>
            <legend>Riedlentes:</legend>
           
           <div class="form-group">
       
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select id="category" name="category" required="required" class="form-control col-md-7 col-xs-12">
                <option>Pasirinkite</option>
                <?php foreach($data as $val):?>
                <option value="<?php echo $val['id'];?>"><?php echo $val['kat_id'];?></option>
                <?php endforeach;?>
            </select>
        </div>
    </div>
           Pavadinimas:<br>
            <input type="text" name="pavadinimas" placeholder="pavadinimas"><br>
           Aprašymas:<br>
            <input type="text" name="aprasymas" placeholder="aprasymas"><br>
		    Kategorija:<br>
            <input type="text" name="kat_id" placeholder="kategorija"><br>
            <br><br>
            <input type="submit" value="Submit" name="submit">
            <input type="submit" value="Update" name="update">
            <input type="submit" value="Delete" name="delete">
            <input type="submit" value="Find" name="find">
            </fieldset>
        </form>
     
    </body>
</html>       
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
	
	

 
    if(isset($_POST["submit"])){
        if(empty($pavadinimas)||empty($aprasymas)||empty($kat_id)){
                echo "<br>"."Prašome užpildyti visus laukelius."."<br>";
        } else{
            $submit = "INSERT INTO `produktai` (pavadinimas,aprasymas,kat_id)
            VALUES ('$pavadinimas','$aprasymas','$kat_id')";
            if ($conn->query($submit) === TRUE) {
                echo "New record created succsessfully";
            }   else {
                echo "Error: " . $submit . "<br>" . $conn->error;
            }
                $conn->close();
            }
    }
    if(isset($_POST["delete"])){
    // sql to delete a record
    $delete = "DELETE FROM `produktai` WHERE pavadinimas='$pavadinimas'";
    if ($conn->query($delete) === TRUE) {
        echo "Record deleted successfully";
        } else {
        echo "Error deleting record: " . $conn->error;
}
 

$conn->close();
 
}
    if(isset($_POST["update"])){
    $update = "UPDATE `produktai` SET `aprasymas`='$aprasymas',`kat_id`='$kat_id' WHERE pavadinimas='$pavadinimas'";
 
    if ($conn->query($update) === TRUE) {
        echo "Record updated successfully";
        } else {
        echo "Error updating record: " . $conn->error;
}
 
        $conn->close();
}
   
    if(isset($_POST["find"])){
        $find = "";
        if(($pavadinimas || strlen($pavadinimas = trim($pavadinimas))!=0)){
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
