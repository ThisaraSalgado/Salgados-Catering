
<?php
include "connect.php";

$name = $email = $password =$repassword ="";

$name = test_input($_POST['name']);
$email = test_input($_POST['email']);
$password =  test_input($_POST['registerPassword']);
$repassword = test_input($_POST['registerRePassword']);

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($password==$repassword) {
    $hash = crypt('sha1', $repassword);

// attempt insert query execution
    $sql = "INSERT INTO customers (C_name,C_email,C_password) VALUES ('$name', '$email','$hash')";

    if (mysql_query($sql)) {
        header('location:reg.php');
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error();
    }
}else{
    echo "Password Not match";
}

// close connection
mysql_close();
?>

