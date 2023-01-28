<?php require_once('includes/functions.php'); ?>
<?php
$id = (int) $_GET['id'];
    $service = getService($id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('includes/head.php'); ?>
</head>

<body>
    <?php require_once('includes/navbar.php'); ?>

    <div class="container">

        <!--if i choose the yoga service-->
        <?php if($id === 1) { ?>
        <p>display all yoga user information
        </p>

        <?php $dic = getuserservice($id); ?>
        <div class="container">

            <p class="lead">

                <?php $json = json_encode($dic); 
                echo $json;?>
            </p>
        </div>

        <?php } ?>
        <?php if($id === 2) { ?>
        <p>display all yoga user information
        </p>

        <?php $dic = getuserservice($id); ?>
        <div class="container">

            <p class="lead">

                <?php $json = json_encode($dic); 
                echo $json;?>
            </p>
        </div>

        <?php } ?>
        <?php if($id === 3) { ?>
        <p>display all yoga user information
        </p>

        <?php $dic = getuserservice($id); ?>
        <div class="container">

            <p class="lead">

                <?php $json = json_encode($dic); 
                echo $json;?>
            </p>
        </div>

        <?php } ?>
        <?php if($id === 4) { ?>
        <p>display all yoga user information
        </p>

        <?php $dic = getuserservice($id); ?>
        <div class="container">

            <p class="lead">

                <?php $json = json_encode($dic); 
                echo $json;?>
            </p>
        </div>

        <?php } ?>


    </div>

    <?php require_once('includes/footer.php'); ?>
</body>

</html>