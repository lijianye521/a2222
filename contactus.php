<?php require_once('includes/functions.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('includes/head.php'); ?>


</head>
<!--add the jquery validation-->

<body>
    <?php require_once('includes/navbar.php'); ?>

    <div class="container">
        <h1>Contact Us</h1>
        <form id="contact-form" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea class="form-control" id="message" name="message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script>
    $(document).ready(function() {
        $("#contact-form").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                //the email must contain the @
                email: {
                    required: true,
                    email: true,
                    pattern: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/
                },
                message: {
                    required: true,
                    minlength: 10
                }
            },
            messages: {
                name: {
                    required: "Please enter your name",
                    minlength: "Your name must be at least 2 characters long"
                },
                email: {
                    required: "Please enter your email address",
                    email: "Please enter a valid email address",
                    pattern: "Please enter a valid email address with @"
                },
                message: {
                    required: "Please enter a message",
                    minlength: "Your message must be at least 10 characters long"
                }
            }
        });
    });
    </script>


    <?php require_once('includes/footer.php'); ?>
</body>

</html>