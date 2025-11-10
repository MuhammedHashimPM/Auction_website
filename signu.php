<?php
include 'includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
        $email = $_POST['email'];
            $phone = $_POST['phone'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                    $check = $conn->prepare("SELECT * FROM users WHERE email=?");
                        $check->bind_param("s", $email);
                            $check->execute();
                                $result = $check->get_result();

                                    if ($result->num_rows > 0) {
                                            echo "<script>alert('Email already registered!');</script>";
                                                } else {
                                                        $stmt = $conn->prepare("INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)");
                                                                $stmt->bind_param("ssss", $name, $email, $phone, $password);
                                                                        if ($stmt->execute()) {
                                                                                    echo "<script>alert('Signup successful! You can now login.'); window.location='login.php';</script>";
                                                                                            } else {
                                                                                                        echo "<script>alert('Signup failed! Try again.');</script>";
                                                                                                                }
                                                                                                                    }
                                                                                                                    }
                                                                                                                    ?>

                                                                                                                    <!DOCTYPE html>
                                                                                                                    <html>
                                                                                                                    <head>
                                                                                                                      <title>Signup</title>
                                                                                                                        <link rel="stylesheet" href="css/style.css">
                                                                                                                        </head>
                                                                                                                        <body>
                                                                                                                          <h2>User Signup</h2>
                                                                                                                            <form action="" method="POST">
                                                                                                                                <label>Full Name:</label><br>
                                                                                                                                    <input type="text" name="name" required><br>

                                                                                                                                        <label>Email:</label><br>
                                                                                                                                            <input type="email" name="email" required><br>

                                                                                                                                                <label>Phone:</label><br>
                                                                                                                                                    <input type="text" name="phone" required><br>

                                                                                                                                                        <label>Password:</label><br>
                                                                                                                                                            <input type="password" name="password" required><br>

                                                                                                                                                                <input type="submit" value="Signup">
                                                                                                                                                                  </form>

                                                                                                                                                                    <p>Already have an account? <a href="login.php">Login here</a></p>
                                                                                                                                                                    </body>
                                                                                                                                                                    </html>