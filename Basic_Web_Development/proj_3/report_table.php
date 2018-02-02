<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Person Report</title>
    <link rel="stylesheet" href="report.css">

</head>
<body>
    <h1>Person Report</h1>
<?php
$server = 'opatija.sdsu.edu:3306';
$user = 'jadrn068';
$password = 'bread';
$database = 'jadrn068';
if(!($db = mysqli_connect($server,$user,$password,$database)))
    echo "ERROR in connection ".mysqli_error($db);
else {
    $sql = "select * from person order by zip, city;";    
    $result = mysqli_query($db, $sql);
    if(!result)
        echo "ERROR in query".mysqli_error($db);
    echo "<table>\n";
    echo
   
"<tr><td>FirstName</td><td>LastName</td><td>Gender</td><td>Age</td><td>Addr</td><td>city</td><td>State</td><td>zip</td><td>email</td><td>experience</td><td>category</td></tr>";
    while($row=mysqli_fetch_row($result)) {
        echo "<tr>";
        foreach(array_slice($row,1) as $item) 
            echo "<td>$item</td>";
        echo "</tr>\n";
        }
    mysqli_close($db);
    }
?>
</table>
</body>
</html>
