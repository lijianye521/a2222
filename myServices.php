<?php require_once('includes/authorise.php'); ?>
<?php $services = getServices(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('includes/head.php'); ?>
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
