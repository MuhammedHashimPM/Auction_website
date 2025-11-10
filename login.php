<?php
session_start();
include 'includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
        $password = $_POST['password'];

            $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
                $stmt->bind_param("s", $email);
                    $stmt->execute();
                        $result = $stmt->get_result();

                            if ($result->num_rows == 1) {
                                    $row = $result->fetch_assoc();
                                            if (password_verify($password, $row['password'])) {
                                                        $_SESSION['user_id'] = $row['user_id'];
                                                                    $_SESSION['user_name'] = $row['name'];
                                                                                $_SESSION['user_type'] = $row['user_type'];
                                                                                            header("Location: index.php");
                                                                                                        exit();
                                                                                                                } else {
                                                                                                                            echo "<script>alert('Invalid password!');</script>";
                                                                                                                                    }
                                                                                                                                        } else {
                                                                                                                                                echo "<script>alert('User not found!');</script>";
                                                                                                                                                    }
                                                                                                                                                    }
                                                                                                                                                    ?>

                                                                                                                                                    <!DOCTYPE html>
                                                                                                                                                    <html>
                                                                                                                                                    <head>
                                                                                                                                                      <title>Login</title>
                                                                                                                                                        <link rel="stylesheet" href="css/style.css">
                                                                                                                                                        </head>
                                                                                                                                                        <body>
                                                                                                                                                          <h2>User Login</h2>
                                                                                                                                                            <form action="" method="POST">
                                                                                                                                                                <label>Email:</label><br>
                                                                                                                                                                    <input type="email" name="email" required><br>

                                                                                                                                                                        <label>Password:</label><br>
                                                                                                                                                                            <input type="password" name="password" required><br>

                                                                                                                                                                                <input type="submit" value="Login">
                                                                                                                                                                                  </form>

                                                                                                                                                                                    <p>New user? <a href="signup.php">Create account</a></p>
                                                                                                                                                                                    </body>
                                                                                                                                                                                    </html>