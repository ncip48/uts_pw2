<?php
@ob_start();
session_start();

if (!isset($_GET['page'])) {
    header("location: index.php?page=home");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple dashboard</title>

    <link rel="stylesheet" href="./assets/bootstrap.css">
    <link rel="stylesheet" href="./assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="./assets/style.css">
    <script src="./assets/bootstrap.min.js"></script>
</head>

<body>
    <div class="content">
        <?php include "./config/url.php";
        ?>
        <?php include('./view/template/footer.php'); ?>
    </div>
</body>

</html>