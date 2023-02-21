<?php
        //set up database connection variables 
        $host = 'localhost'; 
        $dbusername = 'root'; 
        $dbpassword = 'Admin@123'; 
        $dbname = 'account'; 

        // Create connection 
        $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname) OR DIE ('Connection failed: ' . mysqli_connect_error()); 

        // Check connection 
        if ($conn->connect_error) { 
            die("Connection failed: " . $conn->connect_error); 
        } 
?>

<form action="" method="POST"> 
    Username : <input type="text" name="username"><br><br> 
    Password : <input type="password" name="password"><br><br> 
    <button type="submit" name="loginBtn"> Log In </button> 
</form> 

<?php 
if(isset($_POST['loginBtn'])){ 
    $username = $_POST['username']; 
    $password = $_POST['password']; 

    $sql = "SELECT id FROM user WHERE username = '$username' AND password = '$password'"; 
    $result = mysqli_query($conn, $sql); 

    if (mysqli_num_rows($result) > 0) { 
        // output data of each row 
        while ($row = mysqli_fetch_assoc($result)) { 
            $_SESSION['username'] = $row['username']; 
        } 

        header("Location: http://raidenshogun.servegame.com/index.html"); 
    } else { 
        echo "Log in Failed."; 
    } 
} 
?> 
