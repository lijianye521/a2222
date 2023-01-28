<?php require_once('includes/authorise.php'); ?>
<?php
    $id = (int) $_GET['id'];
    $service = getService($id);

    $errors = [];
    if(isset($_POST['activity'])) {
        $email = getLoggedInUser()['email'];

        $errors = recordActivity($email, $id, $_POST);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('includes/head.php'); ?>
</head>

<body>
    <?php require_once('includes/navbar.php'); ?>

    <div class="container">
        <div class="mb-5">
            <h1 class="display-1">
                <?php echo $service['name']; ?>
                <img src="<?php echo $service['image_path']; ?>" class="service ml-5" />
            </h1>
        </div>
        <!--if i choose the yoga service-->
        <?php if($id === 1) { ?>
        <p>Select from our yoga classes below and start stiling your mind!</p>

        <?php // The form below is displayed if type has not been submitted. ?>
        <?php if(!isset($_POST['type'])) { ?>
        <?php $serviceInstructions = getServiceInstructions($id); ?>
        <!--This code is a piece of PHP code that loops through an array called $serviceInstructions 
        and creates a radio button for each array element. Each radio button has a unique ID and value, 
        both taken from the service_type attribute in the array. Finally, if it detects that there is a 
        POST variable named 'service', an error message will be displayed, prompting the user to choose 
        a type of yoga.-->
        <form method="post">
            <div class="form-group">
                <?php foreach($serviceInstructions as $serviceInstruction) { ?>
                <?php $t = $serviceInstruction['service_type']; ?>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="<?php echo $t; ?>" name="type"
                        value="<?php echo $t; ?>" />
                    <label class="form-check-label" for="<?php echo $t; ?>"><?php echo $t; ?></label>
                </div>
                <?php } ?>
                <?php if(isset($_POST['service'])) { ?>
                <div class='text-danger'>You must select a yoga type.</div>
                <?php } ?>
            </div>

            <button type="submit" class="btn btn-primary mr-5" name="service">Go</button>
            <a href="myServices.php" class="btn btn-outline-dark">Back to myServices</a>
        </form>
        <?php } else { ?>
        <?php $serviceInstruction = getServiceInstruction($id, $_POST['type']); ?>

        <h3><?php echo $serviceInstruction['service_type']; ?></h3>
        <video class="my-3 service" height="400" controls>
            <source src="<?php echo $serviceInstruction['path']; ?>" type="video/mp4">
        </video>
        <!--This code is a piece of PHP code that displays a form where the user can enter the duration of the activity. 
        First, the code checks to see if there is a POST variable named 'activity' and that there is an element in the $errors array, 
        and if not, displays a form.
The form has a hidden field named 'type' and the value is 'type' taken from the POST variable. Then there is
 a form group with a text field to enter the duration of the activity. The field has an ID and name 'duration' and uses a function called 'displayValue' to display the value that has been entered
 . If there is an error, another function 'displayError' is used to display the error message.
Next there are two buttons, one is a submit button and the other is a cancel button-->
        <?php if(!isset($_POST['activity']) || count($errors) > 0) { ?>
        <form method="post">
            <input type="hidden" name="type" value="<?php echo $_POST['type']; ?>" />

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="duration">Duration (minutes)</label>
                    <input type="text" class="form-control d-inline-block" id="duration" name="duration"
                        <?php displayValue($_POST, 'duration'); ?> />
                    <?php displayError($errors, 'duration'); ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mr-5" name="activity">Record Activity</button>
            <a href="" class="btn btn-outline-dark">Cancel</a>
        </form>
        <?php } else { ?>
        <div class="alert alert-success">
            You have successfully recorded <strong><?php echo $_POST['duration']; ?> minutes</strong> of
            <strong><?php echo $_POST['type']; ?> Yoga</strong>.
        </div>
        <div>
            <a href="" class="btn btn-outline-dark mr-5">More <?php echo $service['name']; ?></a>
            <a href="myServices.php" class="btn btn-outline-dark">Back to myServices</a>
        </div>
        <?php } ?>
        <?php } ?>
        <?php } elseif($id === 2) { ?>
        <!--choose the sevice 2-->
        <p>Select audio or video!</p>


        <?php // The form below is displayed if type has not been submitted. ?>
        <?php if(!isset($_POST['type'])) { ?>
        <?php $serviceInstructions = getServiceInstructions($id); ?>
        <form method="post">
            <div class="form-group">
                <?php foreach($serviceInstructions as $serviceInstruction) { ?>
                <?php $t = $serviceInstruction['service_type']; ?>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="<?php echo $t; ?>" name="type"
                        value="<?php echo $t; ?>" />
                    <label class="form-check-label" for="<?php echo $t; ?>"><?php echo $t; ?></label>
                </div>
                <?php } ?>
                <?php if(isset($_POST['service'])) { ?>
                <div class='text-danger'>You must select a yoga type.</div>
                <?php } ?>
            </div>

            <button type="submit" class="btn btn-primary mr-5" name="service">Go</button>
            <a href="myServices.php" class="btn btn-outline-dark">Back to myServices</a>
        </form>
        <?php } else { ?>
        <?php $serviceInstruction = getServiceInstruction($id, $_POST['type']); ?>

        <h3><?php echo $serviceInstruction['service_type']; ?></h3>
        <video class="my-3 service" height="400" controls>
            <source src="<?php echo $serviceInstruction['path']; ?>" type="video/mp4">
        </video>
        <?php if(!isset($_POST['activity']) || count($errors) > 0) { ?>
        <form method="post">
            <input type="hidden" name="type" value="<?php echo $_POST['type']; ?>" />

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="duration">Duration (minutes)</label>
                    <input type="text" class="form-control d-inline-block" id="duration" name="duration"
                        <?php displayValue($_POST, 'duration'); ?> />
                    <?php displayError($errors, 'duration'); ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mr-5" name="activity">Record Activity</button>
            <a href="" class="btn btn-outline-dark">Cancel</a>
        </form>
        <?php } else { ?>
        <div class="alert alert-success">
            You have successfully recorded <strong><?php echo $_POST['duration']; ?> minutes</strong> of
            <strong><?php echo $_POST['type']; ?>Meditation</strong>.
        </div>
        <div>
            <a href="" class="btn btn-outline-dark mr-5">More <?php echo $service['name']; ?></a>
            <a href="myServices.php" class="btn btn-outline-dark">Back to myServices</a>
        </div>
        <?php } ?>
        <?php } ?>
        <?php } elseif($id === 3) { ?>
        <!--choose the sevice 3-->
        <p>Select audio or video!</p>


        <?php // The form below is displayed if type has not been submitted. ?>
        <?php if(!isset($_POST['type'])) { ?>
        <?php $serviceInstructions = getServiceInstructions($id); ?>
        <form method="post">
            <div class="form-group">
                <?php foreach($serviceInstructions as $serviceInstruction) { ?>
                <?php $t = $serviceInstruction['service_type']; ?>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="<?php echo $t; ?>" name="type"
                        value="<?php echo $t; ?>" />
                    <label class="form-check-label" for="<?php echo $t; ?>"><?php echo $t; ?></label>
                </div>
                <?php } ?>
                <?php if(isset($_POST['service'])) { ?>
                <div class='text-danger'>You must select a type.</div>
                <?php } ?>
            </div>

            <button type="submit" class="btn btn-primary mr-5" name="service">Go</button>
            <a href="myServices.php" class="btn btn-outline-dark">Back to myServices</a>
        </form>
        <?php } else { ?>
        <?php $serviceInstruction = getServiceInstruction($id, $_POST['type']); ?>

        <h3><?php echo $serviceInstruction['service_type']; ?></h3>
        <video class="my-3 service" height="400" controls>
            <source src="<?php echo $serviceInstruction['path']; ?>" type="video/mp4">
        </video>
        <?php if(!isset($_POST['activity']) || count($errors) > 0) { ?>
        <form method="post">
            <input type="hidden" name="type" value="<?php echo $_POST['type']; ?>" />

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="duration">Duration (minutes)</label>
                    <input type="text" class="form-control d-inline-block" id="duration" name="duration"
                        <?php displayValue($_POST, 'duration'); ?> />
                    <?php displayError($errors, 'duration'); ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mr-5" name="activity">Record Activity</button>
            <a href="" class="btn btn-outline-dark">Cancel</a>
        </form>
        <?php } else { ?>
        <div class="alert alert-success">
            You have successfully recorded <strong><?php echo $_POST['duration']; ?> minutes</strong> of
            <strong><?php echo $_POST['type']; ?> Stretching</strong>.
        </div>
        <div>
            <a href="" class="btn btn-outline-dark mr-5">More <?php echo $service['name']; ?></a>
            <a href="myServices.php" class="btn btn-outline-dark">Back to myServices</a>
        </div>
        <?php } ?>
        <?php } ?>

        <?php } elseif($id === 4) { ?>
        <!--choose the sevice 4-->
        <p>Select your diet</p>


        <?php // The form below is displayed if type has not been submitted. ?>
        <?php if(!isset($_POST['type'])) { ?>
        <?php $serviceInstructions = getServiceInstructions2($id); ?>
        <form method="post">
            <div class="form-group">
                <?php foreach($serviceInstructions as $serviceInstruction) { ?>
                <?php $t = $serviceInstruction['name']; ?>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="<?php echo $t; ?>" name="type"
                        value="<?php echo $t; ?>" />
                    <label class="form-check-label" for="<?php echo $t; ?>"><?php echo $t; ?></label>
                </div>
                <?php } ?>
                <?php if(isset($_POST['service'])) { ?>
                <div class='text-danger'>You must select a type.</div>
                <?php } ?>
            </div>

            <button type="submit" class="btn btn-primary mr-5" name="service">Go</button>
            <a href="myServices.php" class="btn btn-outline-dark">Back to myServices</a>
        </form>
        <?php } else { ?>
        <?php $serviceInstruction = getServiceInstruction($id, $_POST['type']); ?>
        <p>how many meals do you want to eat</p>
        <?php if(!isset($_POST['activity']) || count($errors) > 0) { ?>
        <form method="post">
            <input type="hidden" name="type" value="<?php echo $_POST['type']; ?>" />

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="duration">what you want to eat most</label>
                    <input type="text" class="form-control d-inline-block" id="duration" name="duration"
                        <?php displayValue($_POST, 'duration'); ?> />
                    <?php displayError($errors, 'duration'); ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mr-5" name="activity">Record Activity</button>
            <a href="" class="btn btn-outline-dark">Cancel</a>
        </form>
        <?php } else { ?>
        <div class="alert alert-success">
            You have successfully recorded <strong><?php echo $_POST['duration']; ?> your</strong> eating
            <strong><?php echo $_POST['type']; ?> </strong>.
        </div>
        <div>
            <a href="" class="btn btn-outline-dark mr-5">More <?php echo $service['name']; ?></a>
            <a href="myServices.php" class="btn btn-outline-dark">Back to myServices</a>
        </div>
        <?php } ?>
        <?php } ?>
        <?php } ?>

    </div>

    <?php require_once('includes/footer.php'); ?>
</body>

</html>