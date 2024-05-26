<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    enter name <input type="text" name="t1"><br>
    enter address <input type="text" name="t2"> <br>
    enter city <input type="text" name="t3"><br><br>
    enter company <input type="text" name="t4"><br>
    enter email <input type="email" name="t5"><br>
    <br>
    <input type="radio" name="r1">male <br>
    <input type="radio" name="r1">female <br>
    <input type="radio" name="r1">other <br>
    <br>
    <input type="submit" name="b1" value='click here'><br>
</form>
    
</body>
</html>
<?php

if(isset($_POST['b1']))
{
    $name=$_POST['t1'];
    $add=$_POST['t2'];
    $city=$_POST['t3'];
    $comp=$_POST['t4'];
    $email=$_POST['t5'];
    $radio=$_POST['r1'];

    $con=mysqli_connect('localhost','root','','ams');

    if(!$con)
    {
        echo "connection is lost ";
        exit();
    }
    $sql="INSERT INTO `contact`(`name`, `address`, `city`, `company`, `email`, `gender`) VALUES
     ('$name','$add','$city','$comp','$email','$radio')";

     $res=mysqli_query($con,$sql);

     if($res)
     {
        echo 'row inserted <br>';
     }

     $sql2="SELECT * FROM `contact`";
     $res2=mysqli_query($con,$sql2);

        echo "<table>";
        echo "<th>
              <tr>name</tr>
              <tr>address</tr>
              <tr>city</tr>
              <tr>company</tr>
              <tr>email</tr>
              <tr>gender</tr>";
     if(mysqli_num_rows($res))
     {
        while($row=mysqli_fetch_assoc($res))
        {
                echo "<tr> <td>".$row['name']. "</td>";
                echo "<td>".$row['address']."</td>";
                echo "<td>".$row['city']."</td>";
                echo "<td>".$row['company']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['gender']."</td></tr>";


        }
     }
     echo "</table>";
}


?>
