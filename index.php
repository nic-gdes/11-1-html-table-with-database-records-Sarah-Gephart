<?php

    $page_title = "Home";
    include('./config/db.php');

// /******** EXECUTE QUERIES ON THE DATABASE TO RETRIEVE DATA *********/
// // write query for all ducks ( SELECT name, favorite_foods, imgsrc FROM ducks )

$sql = "SELECT name, price FROM products";

// make query and get result

$result = mysqli_query($conn, $sql);

// fetch the resulting rows as an array

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

/******** WRAP UP DATABASE CONNECTION *********/
// free the result from memory

mysqli_free_result($result);

// close the connection to the database

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="./assets/css/style.css" type>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
</head>
<body>
    <a href="index.php"><h1>toastlist</h1></a>
    <p>Tobias is here for all your selling needs. *Legit business owner*</p>
    <p>Contact: tobias@tobiassellsthings.com</p>
    <div class="center">
        
        <table class="product-table">
            <thead>
                <tr>
                    <td>Name of Product</td>
                    <td>Price</td>
                </tr>
            </thead>
            <?php foreach($products as $product) : ?>
                <tr>
                    <td><?php echo $product["name"]; ?></td>
                    <td>$<?php echo $product["price"]; ?></td>
                </tr>           
            <?php endforeach ?>
        </table>
    </div>
</body>
</html>