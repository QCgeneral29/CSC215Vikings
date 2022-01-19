<html>
<body>
<DOCTYPE html> 
<html> <head> <title>HTML Backgorund Color</title> </head> <body style="background-color:00FFFF;">
<?php 
$username = "root"; 
$password = ""; 
$database = "augie"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM users";


echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial">First Name</font> </td> 
          <td> <font face="Arial">Last Name</font> </td> 
          <td> <font face="Arial">Phone Number</font> </td> 
          <td> <font face="Arial">Address</font> </td> 
          <td> <font face="Arial">Email</font> </td> 
	  <td> <font face="Arial">Area of Work</font> </td> 
	  <td> <font face="Arial">Password</font> </td> 
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["firstname"];
        $field2name = $row["lastname"];
        $field3name = $row["phonenumber"];
        $field4name = $row["address"];
        $field5name = $row["email"]; 
        $field6name = $row["areaofwork"];
        $field7name = $row["password"];


        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td> 
                  <td>'.$field6name.'</td> 
                  <td>'.$field7name.'</td> 

        <!DOCTYPE html>
        <html>
        <style>
        table, th, td {
          border:3px solid black;
          
        }
        </style>
        <body>
        
        <h2><A basic HTML table></h2>
        
        
         
          </tr>
        </table>
      
	
              </tr>';
    }
    $result->free();
} 
?>
</body>
</html>