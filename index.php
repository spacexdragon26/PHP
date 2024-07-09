<?php

$insert = false;
if(isset($_POST['name'])) {
    

 $server = "localhost";
 $username = "root";
 $password = "root";
 $database = "tripinfo";
 $conn = mysqli_connect($server, $username, $password);

 if(!$conn){
     die("connection to the database failed".mysqli_connect_error());
    }
 
    
 $name = $_POST['name'];
 $age = $_POST['age'];
 $gender = $_POST['gender'];
 $bloodgroup = $_POST['bloodgroup'];
 $phone = $_POST['phone'];
 $email = $_POST['email'];
 $dest = $_POST['location'];
 $days = $_POST['days'];
 $notes = $_POST['area'];

 $sql = "INSERT INTO `tripinfo`.`people` (`name`, `age`, `gender`, `bloodgroup`, `phno`, `emailid`, `dest`, `days`, `notes`, `dt`) VALUES ('$name', '$age', '$gender', '$bloodgroup', '$phone', '$email', '$dest', '$days', '$notes', current_timestamp());";

 if($conn->query($sql) == true){
    $insert = true;
 }
 else{
    echo "ERROR: $sql <br> $conn->error";
 }

 $conn->close();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Info</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
</head>
<body>
    <img class="bg" src="C:\xampp\htdocs\php_project\bg.jpg">
    <div class="container">
        <div class="content">
            <div class="title">
                <h3>My Trip planner</h3>
                <p>Trip for all, by all.<br>
                <br>Enter all the information as per you like!</p>
            </div>
        
            <?php
            if($insert){
                echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the trip!</p>";
            }
            ?>
            <div class="form">
            <form method="POST" action="index.php">
                <input type="text" name="name" placeholder=" Please enter your name: "><br>
                <input type="number" name="age" placeholder=" Please enter your age: "><br>
                <input type="text" name="gender" placeholder=" Please enter your gender: "><br>
                <input type="text" name="bloodgroup" placeholder=" Please enter your blood group: "><br>
                <input type="phone" name="phone" placeholder=" Please enter your phone number: "><br>
                <input type="email" name="email" placeholder=" Please enter your email id: "><br>
                <input type="text" name="location" placeholder=" Please enter your preferred destination (beach,city,mountain,temples or any place name): "><br>
                <input type="number" name="days" placeholder=" Please enter the number of days you want: "><br>
                <textarea name="area" placeholder=" Please enter any other information:" cols="30" rows="10"></textarea>
            </div>
        <button type="submit">Submit</button>
        <button >Reset</button>
        </div>
        
        <footer>
            <p>Copyright &copy; 2024. All rights reserved.</p>
            <p>Developed by: Swara Kubade</p>
            <p>For any queries email us at: </p><a href="mailto:swara.workspace@gmail.com">swara.workspace@gmail.com</a>
        </footer>
    </div>
    

</body>
</html>