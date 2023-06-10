<!DOCTYPE html>
<html>
<head>
    <title>Form Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 8px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Form Login</h1>
        <form method="POST" action="#">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <input type="submit" name="kirim" value="Login">
        </form>
    </div>
</body>
</html>


<?php 

if(isset($_POST['kirim'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        if (empty($username) || empty($password)) {
            echo "<script>alert('Masukan NAMA dan PASSWORD !!! ');</script>";
        } else {
            $conn = mysqli_connect("localhost", "root", "", "sekolah");
            $query = "SELECT * FROM login WHERE nama='$username' AND password='$password'";
            $result = mysqli_query($conn, $query);
    
            if (mysqli_num_rows($result) == 1) {
                $_SESSION['username'] = $username; 
                echo "<script>
                    alert('Berhasil login');
                    document.location.href = 'calcuDB.php'; 
                </script>";
            } else {
                echo "<script>alert('Masukan NAMA dan PASSWORD yang benar !!! ');</script>";
            }
    
            mysqli_close($conn);
        }
}