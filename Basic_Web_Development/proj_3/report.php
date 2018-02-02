<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Person Report</title>
</head> 
<body> 
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="pwd"> 
    Password: 
     <table> 
       <tr> 
         <td><input name="passwd" type="password"/></td> 
       </tr> 
       <tr> 
         <td align="center"><br/> 
          <input type="submit" name="submit_pwd" value="Login"/> 
         </td> 
       </tr> 
     </table>   
   </form> 
</body>
</html>
<?php

$Password = 'demo'; // Set your password here 


if (isset($_POST['submit_pwd'])){ 
   $pass = isset($_POST['passwd']) ? $_POST['passwd'] : ''; 


$myfile = fopen("passwords.txt", "r") or die("Unable to open file!");
$passString = fread($myfile,filesize("passwords.txt"));
$passArray = explode("|",$passString);
$temp = false;
fclose($myfile);
    foreach ($passArray as $value) {
         // echo $value;
         // echo "...........................";
         // echo crypt($pass,$value);
         // echo "||||||||||||||||||||||||||||||";
        if ($value == crypt($pass,$value)) {
            $temp = true;
            echo "if";
            break;
        } else {
            //echo "else";
        }
    }
    echo $temp;
   if ($temp == false) { 
    echo "Sorry, Wrong password!!!!";
    exit();      
   } else {
    ob_end_clean();
    ?>
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
        $sql = "select * from person order by lname;";    
        $result = mysqli_query($db, $sql);
        if(!result)
            echo "ERROR in query".mysqli_error($db);
        echo "<table>\n";
        echo
   
"<tr><td>FirstName</td><td>LastName</td><td>Gender</td><td>Age</td><td>Addr</td><td>Phone</td><td>email</td><td>experience</td><td>category</td><td>Picture</td></tr>";
    while($row=mysqli_fetch_row($result)) {
        echo "<tr>";
        foreach(array_slice($row,1,-1) as $item) {
            echo "<td>$item</td>";
            //echo '<img src="images/icon-phone.png" alt="icon" />';
        }
            $img_src=$row[10];
            //echo '<td><img src="'$img_src'"></td>';
            //echo "<td><img src=\"/imaagge/$img_src\" alt=\"Cover\"></td>";
            //echo '<img src="', $img_src', " alt="Cover">';
             //echo '<td><img src="'.$img_src.'" alt="Cover"></td>';
            echo "<td><img src='./imaagge/".$img_src."'/></td>";
            //echo $img_src;

        echo "</tr>\n";
        }
    mysqli_close($db);
    }
    
    ?>
</table>
</body>
<?php
exit(); 
} 
}
?>
</html>