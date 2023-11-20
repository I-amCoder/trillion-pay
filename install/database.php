<?php
require_once 'lib/config.php';
require_once 'lib/functions.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Springsoftit Installer</title>
    <link rel="stylesheet" href="src/style.css">
</head>


<?php


if ($_POST) {

    $errorMessage = '';
    if (importDatabase($_POST)) {
        if (updateAdminCredentials($_POST)) {
            envUpdateAfterInstalltion($_POST);
            file_put_contents('../installed', 'installed');
            message($_SERVER);

            header('Location:' . 'finish.php');
        };
    };

    // try {

    //     $sale = getPurchaseCode($_POST['purchase_code']);


    //     if($sale->item->id == '37285478'){

    //     }else{
    //         $errorMessage =  'Invalid Purchase code For This Item';

    //         header('location: database.php?error='.$errorMessage);
    //     }

    // }
    // catch (Exception $ex) {

    //     $errorMessage =  $ex->getMessage();

    //     header('location: database.php?error='.$errorMessage);
    // }

}


?>

<body>
    <div class="installer-wrapper">
        <div class="installer-box">
            <div class="installer-header">
                <img src="src/logo.png" alt="logo" class="logo">
                <h2 class="text-white">SpringSoftIT Auto Installer</h2>
            </div>
            <div class="installer-body">


                <form action="" method="POST">
                    <div class="mb-3">
                        <label>Purchase Code</label>
                        <input type="text" name="purchase_code" class="form-control" required>

                        <code style="color:red ;"><?= isset($_GET['error']) ? $_GET['error'] : '' ?></code>
                    </div>

                    <div class="mb-3">
                        <label>Site Url</label>
                        <input type="text" name="url" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Database name </label>
                        <input type="text" class="form-control" name="db_name" required>
                    </div>

                    <div class="mb-3">
                        <label>Database host </label>
                        <input type="text" class="form-control" name="db_host" required placeholder="Database Host without http or https">
                    </div>

                    <div class="mb-3">
                        <label>Database User Name </label>
                        <input type="text" class="form-control" name="db_username" required>
                    </div>

                    <div class="mb-3">
                        <label>Database Password </label>
                        <input type="text" class="form-control" name="db_pass">
                    </div>

                    <h3 class="mb-3">Set Admin Credentials</h3>

                    <div class="mb-3">
                        <label>Username </label>
                        <input type="text" class="form-control" name="username" required>
                    </div>

                    <div class="mb-3">
                        <label>Password </label>
                        <input type="text" class="form-control" name="password" required>
                    </div>

                    <div class="mb-3">
                        <label>Email </label>
                        <input type="email" class="form-control" name="email" required>
                    </div>

                    <button type="submit" class="btn">Install Now</button>
                </form>

            </div>
            <div class="installer-footer">
                <a href="permission.php" class="btn">Back</a>
            </div>
        </div>
    </div>
</body>

</html>