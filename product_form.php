<?php
session_start();
include 'includes/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login first!'); window.location='login.php';</script>";
        exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user_id = $_SESSION['user_id'];
                $name = $_POST['name'];
                    $desc = $_POST['description'];
                        $price = $_POST['price'];
                            $image = $_FILES['image']['name'];
                                $tmp_name = $_FILES['image']['tmp_name'];

                                    $target_dir = "uploads/";
                                        $target_file = $target_dir . basename($image);

                                            if (move_uploaded_file($tmp_name, $target_file)) {
                                                    $stmt = $conn->prepare("INSERT INTO products (user_id, name, description, image, base_price) VALUES (?, ?, ?, ?, ?)");
                                                            $stmt->bind_param("isssd", $user_id, $name, $desc, $image, $price);
                                                                    if ($stmt->execute()) {
                                                                                echo "<script>alert('Product submitted for admin approval!'); window.location='index.php';</script>";
                                                                                        } else {
                                                                                                    echo "<script>alert('Error saving product!');</script>";
                                                                                                            }
                                                                                                                } else {
                                                                                                                        echo "<script>alert('Failed to upload image!');</script>";
                                                                                                                            }
                                                                                                                            }
                                                                                                                            ?>

                                                                                                                            <!DOCTYPE html>
                                                                                                                            <html>
                                                                                                                            <head>
                                                                                                                              <title>Submit Product</title>
                                                                                                                                <link rel="stylesheet" href="css/style.css">
                                                                                                                                </head>
                                                                                                                                <body>
                                                                                                                                  <h2>Submit Your Product for Auction</h2>
                                                                                                                                    <form action="" method="POST" enctype="multipart/form-data">
                                                                                                                                        <label>Product Name:</label><br>
                                                                                                                                            <input type="text" name="name" required><br>

                                                                                                                                                <label>Description:</label><br>
                                                                                                                                                    <textarea name="description" required></textarea><br>

                                                                                                                                                        <label>Base Price (₹):</label><br>
                                                                                                                                                            <input type="number" name="price" required><br>

                                                                                                                                                                <label>Upload Image:</label><br>
                                                                                                                                                                    <input type="file" name="image" accept="image/*" required><br>

                                                                                                                                                                        <input type="submit" value="Submit for Approval">
                                                                                                                                                                          </form>
                                                                                                                                                                          </body>
                                                                                                                                                                          </html>

                          
                                        
                                      
                                              

                                              