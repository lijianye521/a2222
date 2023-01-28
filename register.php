<?php require_once('includes/functions.php'); ?>
<?php
    $errors = [];
    if(isset($_POST['register'])) {
        $errors = registerUser($_POST);

        if(count($errors) === 0)
            redirect('myServices.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('includes/head.php'); ?>
    <script>
    $(document).ready(function() {
        const age = $("#age");
        const ageChange = function() {
            $("#age-display").text(age.val());
        }

        ageChange();
        age.mousemove(ageChange).change(ageChange);
    });
    </script>
</head>

<body>
    <?php require_once('includes/navbar.php'); ?>
    <!--that is coming form the bootstrap form-->
    <div class="container">
        <h1 class="mb-3">Register</h1>
        <div class="row">
            <div class="col-md-6">
                <form method="post">
                    <div class="form-group">
                        <label for="firstname">*First name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname"
                            <?php displayValue($_POST, 'firstname'); ?> />
                        <?php displayError($errors, 'firstname'); ?>
                    </div>

                    <div class="form-group">
                        <label for="lastname">*Last name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname"
                            <?php displayValue($_POST, 'lastname'); ?> />
                        <?php displayError($errors, 'lastname'); ?>
                    </div>

                    <div class="form-group">
                        <label for="email">*Email</label>
                        <input type="text" class="form-control" id="email" name="email"
                            <?php displayValue($_POST, 'email'); ?> />
                        <?php displayError($errors, 'email'); ?>
                    </div>

                    <div class="form-group">
                        <label for="phone">*Phone number <small class="text-muted">format: +61 4xx xxx
                                xxx</small></label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            <?php displayValue($_POST, 'phone'); ?> />
                        <?php displayError($errors, 'phone'); ?>
                    </div>

                    <div class="form-group">
                        <label for="phone">*Age <small class="text-muted">must be at least 16</small></label>
                        <div class="row">
                            <label class="col-sm-1 col-form-label">
                                <span id="age-display"></span>
                            </label>
                            <div class="col-sm-11">
                                <input type="range" class="form-control" id="age" name="age" min="1" max="120"
                                    <?php displayValue($_POST, 'age'); ?>
                                    <?php if(!isset($_POST['age'])) echo 'value="1"'; ?> />
                            </div>
                        </div>
                        <?php displayError($errors, 'age'); ?>
                    </div>

                    <div class="form-group">
                        <div>*Student</div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="student-status-yes" name="student-status"
                                value="true" <?php displayChecked($_POST, 'student-status', 'true'); ?> />
                            <label class="form-check-label" for="student-status-yes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="student-status-no" name="student-status"
                                value="false" <?php displayChecked($_POST, 'student-status', 'false'); ?> />
                            <label class="form-check-label" for="student-status-no">No</label>
                        </div>
                        <?php displayError($errors, 'student-status'); ?>
                    </div>

                    <div class="form-group">
                        <div>*Employed</div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="employment-status-yes"
                                name="employment-status" value="true"
                                <?php displayChecked($_POST, 'employment-status', 'true'); ?> />
                            <label class="form-check-label" for="employment-status-yes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="employment-status-no"
                                name="employment-status" value="false"
                                <?php displayChecked($_POST, 'employment-status', 'false'); ?> />
                            <label class="form-check-label" for="employment-status-no">No</label>
                        </div>
                        <?php displayError($errors, 'employment-status'); ?>
                    </div>

                    <div class="form-group">
                        <label for="password">*Password <small class="text-muted">1.start with a capital alphabet,
                                2. must have at least 8 characters
                                3. must have a hyphen or underscore (i.e. – or _) and
                                4. must end with a number.
                                characters</small></label>
                        <input type="password" class="form-control" id="password" name="password"
                            pattern="^[A-Z][a-z0-9A-Z]*[-_]+[a-z0-9A-Z-_]*[0-9]$" />
                        <?php displayError($errors, 'password'); ?>
                    </div>

                    <div class="form-group">
                        <label for="confirmPassword">*Confirm password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" />
                        <?php displayError($errors, 'confirmPassword'); ?>
                    </div>

                    <button type="submit" class="btn btn-primary mr-5" name="register"
                        value="register">Register</button>
                    <a href="index.php" class="btn btn-outline-dark">Cancel</a>
                </form>
            </div>
        </div>
    </div>

    <?php require_once('includes/footer.php'); ?>
</body>

</html>