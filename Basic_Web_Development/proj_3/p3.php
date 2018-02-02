<?php

function validate_data($params) {
    $msg = "";
    if(empty($_FILES['user_pic']['name']))  
        $msg .= "Error no file selected<br />"; 
    if(strlen($params[0]) == 0)
        $msg .= "Please enter the First Name<br />";  
    if(strlen($params[2]) == 0)
        $msg .= "Please enter the Last Name<br />"; 
    if(strlen($params[3]) == 0)
        $msg .= "Please enter the gender<br />"; 
    // if(!isDateValid())
    //     $msg .= "Please enter the valid date<br />"; 

    if(!checkdate($params[4], $params[5], $params[6])){
        $msg .= "Please enter a valid date<br />"; 
    }
    if(strlen($params[7]) == 0)
        $msg .= "Please enter the address<br />";
    if(strlen($params[8]) == 0)
        $msg .= "Please enter the city<br />";
    if(strlen($params[9]) == 0)
        $msg .= "Please enter the State<br />";
    if(strlen($params[10]) == 0)
        $msg .= "Please enter the zip code<br />";
    elseif(!is_numeric($params[10])) 
        $msg .= "Zip code may contain only numeric digits<br />";
    elseif(strlen($params[10]) != 5)
        $msg .= "Zip code may contain only 5 digits<br />";
    if(strlen($params[11]) == 0)
        $msg .= "Please enter the area code in the phone number<br />";
    elseif (!is_numeric($params[11])) {
        $msg .= "The area code in the phone number should be a number<br />";
    }
    elseif (strlen($params[11]) != 3) {
        $msg .= "The area code in phone number should have only 3 digits<br />";   
    }
    if(strlen($params[12]) == 0)
        $msg .= "Please enter the prefix in the phone number<br />";
    elseif (!is_numeric($params[12])) {
        $msg .= "The prefix in the phone number should be a number<br />";
    }
    elseif (strlen($params[12]) != 3) {
        $msg .= "The prefix in phone number should have only 3 digits<br />";   
    }
    if(strlen($params[13]) == 0)
        $msg .= "Please enter the phone number<br />";
    elseif (strlen($params[13]) != 4) {
        $msg .= "The phone number should have only 4 digits<br />";   
    }
    if(strlen($params[14]) == 0)
        $msg .= "Please enter email<br />";
    elseif(!filter_var($params[14], FILTER_VALIDATE_EMAIL))
        $msg .= "Your email appears to be invalid<br/>";
    if(strlen($params[15]) == 0)
        $msg .= "Please enter the Experience<br />";
    if(strlen($params[16]) == 0)
        $msg .= "Please enter the Category<br />";
    if($msg) {
        write_form_error_page($msg);
        exit;
        }
    }

function write_form_error_page($msg) {
    write_header();
    echo "<h2>Sorry, an error occurred<br />",
    $msg,"</h2>";
    write_form();
    write_footer();
    }  
    
function write_form() {
    $male_checked=($_POST['gender'] === "male")?'checked="checked"':'';
    $female_checked=($_POST['gender'] === "female")?'checked="checked"':'';
    $other_checked=($_POST['gender'] === "other")?'checked="checked"':'';
    $expert_checked=($_POST['Experience'] === "Expert")?'checked="checked"':'';
    $experienced_checked=($_POST['Experience'] === "experienced")?'checked="checked"':'';
    $novice_checked=($_POST['Experience'] === "Novice")?'checked="checked"':'';
    $teen_checked=($_POST['Category'] === "Teen")?'checked="checked"':'';
    $adult_checked=($_POST['Category'] === "Adult")?'checked="checked"':'';
    $senior_checked=($_POST['Category'] === "Senior")?'checked="checked"':'';
    print <<<ENDBLOCK
    <html>
<head>
    <!-- Name:Rajaram Vijayamohan 
   RED Id:822078615 -->
    <title>Registration|SDSU Marathon</title>
  <!-- <meta charset="utf-8"> -->
    <meta http-equiv="content-type" 
        content="text/html;charset=utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel=stylesheet href="mycss.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="myform.js"></script>
</head>

<body class="bg-grey">
    <div>
        <!-- <h1>Form Example</h1> -->
        <div class="formHead">
            <a class="btn btn-default btn-sm" href="index.html"><span class="glyphicon glyphicon-menu-left"></span>back</a>
        </div>
        <div class="formHead text-center">
            <h1>Registration</h1> 
        </div>
        <hr>
        <fieldset id="form_fieldset">
        <!-- <legend>Personal Information</legend> -->
        <form name="personal_info"
              action="process_request.php"
              enctype="multipart/form-data"
              method="post">
        <table>
            <tr><td><label>Picture*</label></td>
            <td><input type="file" name="user_pic" id="user_pic" accept="image/*" /></td></tr>
            <tr><td><label>First Name*</label></td>
                <td><input type="text" name="fname" value="$_POST[fname]" size="25"  /></td></tr> 
            <tr><td><label>Middle Name</label></td>
                <td><input type="text" name="mname" value="$_POST[mname]" size="25" /></td></tr>                     
            <tr><td><label>Last Name*</label></td>
                <td><input type="text" name="lname" value="$_POST[lname]" size="25" /></td></tr> 
            <tr><td><label>Gender*</label></td>
                <td><input type="radio" name="gender" value="male" $male_checked > Male
                <input type="radio" name="gender" value="female" $female_checked> Female
                <input type="radio" name="gender" value="other" $other_checked> Other</td></tr>
            <tr><td><label>DOB*</label></td>
                <td>mm <input type="text" id="m" size="2" name="month" value="$_POST[month]" />
                dd <input type="text" id="d" size="2" name="day" value="$_POST[day]" />
                yyyy <input type="text" id="y" size="4"  name="year" value="$_POST[year]"/> </td>
            </tr>
            <tr><td><label>Address*</label></td>
                <td><input type="text" name="address" value="$_POST[address]" size="55" /><br>
                <input type="text" name="address2" value="$_POST[address2]" size="55" /></td></tr>        
            <tr><td><label>City*</label></td>
                <td><input type="text" name="city" value="$_POST[city]" size="25" /> </td></tr>
            <tr><td><label>State*</label></td>
                <td><input type="text" name="state" value="$_POST[state]" size="3" /></td></tr>
            <tr><td><label>Zip*</label></td>
                <td><input type="text" name="zip" value="$_POST[zip]" size="10" maxlength="10" /></td></tr>      
            <tr><td><label>Phone*</label></td>
                <td><input type="text" name="area_phone" value="$_POST[area_phone]" size="4" maxlength="3" />
                <input type="text" name="prefix_phone" value="$_POST[prefix_phone]" size="4" maxlength="3" />
                <input type="text" name="phone" value="$_POST[phone]" size="5" maxlength="4" /></td></tr> 
            <tr><td><label>EMail*</label></td>
                <td><input type="text" name="email" value="$_POST[email]" size="25" /></td></tr>
            <tr><td><label>Medical Conditions</label></td>
                <td><textarea name="medCon" value="$_POST[medCon]" rows="4" cols="50"></textarea></td></tr>
            <tr><td><label>Experience Level*</label></td>
                <td><input type="radio" name="Experience" value="Expert" $expert_checked> Expert
                <input type="radio" name="Experience" value="experienced $experinced_checked"> Experienced
                <input type="radio" name="Experience" value="Novice" $novice_checked> Novice</td></tr>
            <tr><td><label>Category*</label></td>
                <td><input type="radio" name="Category" value="Teen" $teen_checked> Teen 
                <input type="radio" name="Category" value="Adult" $adult_checked> Adult
                <input type="radio" name="Category" value="Senior" $senior_checked> Senior</td></tr>
        </table>
        <!-- <div id="message_line">&nbsp;</div> -->
        <div id="message_line" class="alert alert-danger">
        </div>
        <div id="button_panel">  
            <input class="btn btn-default btn-sm" type="reset" value="Clear Data" /> 
            <input class="btn btn-primary btn-lg" id="submit_button" type="submit" value="Submit" /> 
        </div>                      
        </form>
        </fieldset>
        
    </div>
    
</body>
</html> 
ENDBLOCK;
}                        

function process_parameters($params) {
    global $bad_chars;
    $params = array();
    $params[] = trim(str_replace($bad_chars, "",$_POST['fname']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['mname']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['lname']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['gender']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['month']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['day']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['year']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['address']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['city']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['state']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['zip']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['area_phone']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['prefix_phone']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['phone']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['email']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['Experience']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['Category']));
    return $params;
    }
    
function store_data_in_db($params) {
    # get a database connection
    $db = get_db_handle();  ## method in helpers.php
    ##############################################################
    $sql = "SELECT * FROM person WHERE ".
    "fname ='$params[0]' AND ".
    "lname = '$params[2]' AND ".
    "email = '$params[14]';";
##echo "The SQL statement is ",$sql;    
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) > 0) {
        write_form_error_page('This record appears to be a duplicate');
        exit;
        }

    $UPLOAD_DIR = 'imaagge/';
    $COMPUTER_DIR = '/home/jadrn068/public_html/proj3/imaagge/';
    $fname = $_FILES['user_pic']['name'];
    $ext = pathinfo($fname, PATHINFO_EXTENSION);
    //echo $ext;
    $target_file = $COMPUTER_DIR.$params[0].$params[11].$params[12].$params[13].".".$ext;
    $message = "";
    $uploadOk = 1;

     if(isset($_POST["submit"])) {
     $check = getimagesize($_FILES["user_pic"]["tmp_name"]);
     if($check !== false) {
         $message .= "File is an image - " . $check["mime"] . ".";
         $uploadOk = 1;
     } else {
         $message .= "File is not an image.";
         $uploadOk = 0;
     }
    }

     if (file_exists($target_file)) {
         $message .= "Sorry, file already exists.";
         $uploadOk = 0;
     }

      if ($_FILES["user_pic"]["size"] > 2000000) {
          $message .= "Sorry, your file is too large. Try uploading file less than 2MB";
          $uploadOk = 0;
      }
     if ($uploadOk == 0) 
          $message .= "Sorry, your file was not uploaded.";        
     elseif($_FILES['user_pic']['error'] > 0) {
        $err = $_FILES['user_pic']['error'];  
        $message .= "Error Code: $err ";
        }
    else {
        if(move_uploaded_file($_FILES['user_pic']['tmp_name'], $target_file))
        $message = "Success! Your file has been uploaded to the server</br >\n";
        else
        $message = "failed\n";
    }         
    echo $message;


    $dateOfBirth = "$params[4]-$params[5]-$params[6]";
    $today = date("Y-m-d");
    $age = date_diff(date_create($dateOfBirth), date_create($today));
    $age = $age->format('%y');
##OK, duplicate check passed, now insert
    $sql = "INSERT INTO person VALUES('0','$params[0]','$params[2]','$params[3]','$age','$params[7],$params[8],$params[9],$params[10]','$params[11]$params[12]$params[13]','$params[14]','$params[15]','$params[16]','$params[0]$params[11]$params[12]$params[13].$ext');";
    echo "The SQL statement is ",$sql;    
    mysqli_query($db,$sql);
    $how_many = mysqli_affected_rows($db);
    echo("There were $how_many rows affected");
    close_connector($db);
    }
        
?>   
