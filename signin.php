<?php
/*include'connect.php';

$S_username =  test_input($_POST['name']);
$password =  test_input($_POST['password']);

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
$result = mysql_query("SELECT * FROM customers");
while ($row = mysql_fetch_assoc( $result)) {
    $hash = $row['C_password'];
    $uname = $row['C_name'];
}
echo $uname;
$pw = crypt('sha1',$password);
if(($pw == $hash) && ($uname==$S_username)){
    header('location:index.php');
}
else{
    echo "Password or User Name Error";
    header('location:reg.php');
}
*/?>

<?php
	session_start();
mysql_connect('127.0.0.1','root','') or die(mysql_error());//connecting to the database
mysql_select_db('salgadosdb') or die(mysql_error());//selecting a database from
$uname=$_POST['username'];//assigning the username entered in html form to the variable "$name"
global$uname;
$pwd=crypt('sha1',$_POST['password']);//assigning the password entered in html form to the variable "$pwd by hashcodinig the password"

if($uname!="" && $pwd!="")//if username and password are not empty,
{
    $query=mysql_query("select * from customers where C_name='".$uname."' and C_password='".$pwd."'") or die(mysql_error());
    //assigning mysql query to $query to execute
    $res=mysql_fetch_row($query);//Returns an numerical array of strings that corresponds to the fetched row
    if($res)//if $res is true,
    {
        header('location:index.php');//directing to ralated page which is related to user

    }
    else
    {
        echo "wrong password or username";//else print wrong password or username
    }
}
else {

    header('location:reg.php');//if both fields are empty stay on same page
}


?>
