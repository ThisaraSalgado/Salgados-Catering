<?php
session_start();
mysql_connect('127.0.0.1','root','') or die(mysql_error());//connecting to the database
mysql_select_db('salgadosdb') or die(mysql_error());//selecting a database from
$uname=$_POST['mail'];//assigning the username entered in html form to the variable "$name"
global$uname;
$pwd=crypt('sha1',$_POST['oldPassword']);//assigning the password entered in html form to the variable "$pwd by hashcodinig the password"
echo $pwd;
echo $uname;
if($uname!="" && $pwd!="")//if username and password are not empty,
{
    $query=mysql_query("select * from customers where C_email='".$uname."' and C_password='".$pwd."'") or die(mysql_error());
    //assigning mysql query to $query to execute
    $res=mysql_fetch_row($query);//Returns an numerical array of strings that corresponds to the fetched row
    if($res)//if $res is true,
    {
        $name = $email = $password =$repassword ="";
        $password =  $_POST['newPassword'];
        $repassword = $_POST['re-newPassword'];
        if ($password==$repassword) {
            $hash = crypt('sha1', $repassword);
            $result = "UPDATE customes SET C_password='".$hash."' WHERE C_email='".$uname."'";
            echo $result;
            if ($result) {
                header('location:index.php');//directing to ralated page which is related to user
            }
        }
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