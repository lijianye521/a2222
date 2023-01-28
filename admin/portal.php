<?php require_once('includes/functions.php'); ?>
<?php $services = getServices(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('includes/head.php'); ?>
    <!-- 
    <link rel="stylesheet" href="css/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owlcarousel/owl.theme.default.min.css">    
    Latest compiled and minified CSS -->

    <link rel="stylesheet" href="./plugin/OwlCarousel2-2.2.1/dist/assets/css/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="./plugin/OwlCarousel2-2.2.1/dist/assets/css/owlcarousel/owl.theme.default.min.css">
    <style>
    .slide {
        font-size: 50px;
        text-align: center;
        border: 1px solid black;
        margin-bottom: 20px;
    }
    </style>

</head>

<body>
    <?php require_once('includes/navbar.php'); ?>
    <div class="container">
        <div class="mb-5">
            <h1 class="display-1">myServices</h1>
            <p class="lead font-weight-bold">Welcome to LIFE </p>
            <p>We offer many great services.</p>
        </div>

        <div class="row">
            <?php foreach($services as $service) { ?>
            <div class="col-3 text-center">
                <a href="service.php?id=<?php echo $service['service_id']; ?>">
                    <img src="<?php echo $service['image_path']; ?>" class="service" />
                    <h3><?php echo $service['name']; ?></h3>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>


    <?php require_once('includes/footer.php'); ?>



</body>

</html>