<?php require_once('includes/functions.php'); ?>
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

    <div id="carrusel1" class="owl-carousel owl-theme mb-3">
        <div class=" slide" data-slide-index="0"> <img src="assets/images/img1.jpg" class="img-fluid" alt="img1"></div>
        <div class="slide" data-slide-index="1"><img src="assets/images/img2.jpg" class="img-fluid" alt="img2"></div>
        <div class="slide" data-slide-index="2"> <img src="assets/images/img3.jpg" class="img-fluid" alt="img3"></div>
        <div class="slide" data-slide-index="3"> <img src="assets/images/img4.jpg" class="img-fluid" alt="img4"></div>


    </div>



    <script src="./plugin/OwlCarousel2-2.2.1/dist/assets/js/jquery-3.5.1.min.js"></script>
    <script src="./plugin/OwlCarousel2-2.2.1/dist/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="./plugin/OwlCarousel2-2.2.1/dist/assets/js/owlcarousel/owl.carousel.min.js"></script>
    <script src="./plugin/OwlCarousel2-2.2.1/dist/assets/js/owlCarousel2Rows.js"></script>

    <script>
    $(document).ready(function() {

        var item = $('#carrusel1');
        var _options1 = {
            margin: 20,
            nav: true,
            dots: true,
            slideBy: 'page',
            responsive: {
                0: {
                    items: 1,
                    rows: 1 //Opción no usada por Owl Carousel, esta se usa en el algoritmo personalizado
                },
                768: {
                    items: 1,
                    rows: 1 //Opción no usada por Owl Carousel, esta se usa en el algoritmo personalizado
                },
                1500: {
                    items: 1,
                    rows: 1 //Opción no usada por Owl Carousel, esta se usa en el algoritmo personalizado
                }
            }
        };

        var owl2Rows = new Owl2RowsConfig(item, _options1);

        var item2 = $('#carrusel2');

        var owl2Rows2 = new Owl2RowsConfig(item2);




    });
    </script>



    <div class="jumbotron">
        <h1 style="font-family: 'Fjalla One', sans-serif;">Here are some tips for you to keep mental healthy</h1>
        <br>
        <h3 style="font-family: 'Fjalla One', sans-serif;">1. Get Sufficient Sleep — a Minimum of 7 Hours Daily</h3>
        <p class="lead"> Lack of sleep can negatively affect your physical and mental well-being and overall quality
            of life.
            Having proper sleep not only provides stress relief, but it also makes you more alert and aware. It
            improves your memory too — sufficient sleep helps your brain to process and retain information long
            term, and solidify memories.
        </p>
        <!--add the images-->
        <img src="assets/images/sleep.jpg" class="img-fluid" alt="sleep">

        <h3 style="font-family: 'Fjalla One', sans-serif;"> <br />2. Have a Healthy Diet </h3>
        <p class="lead">
            A healthy gut leads to a healthy mind and boosts mental wellness. Having a balanced and nutritious diet
            is a natural defence against stress. Start your day right with a nutritious breakfast and try to
            maintain balanced meals throughout the day. Include foods like wholegrain cereal, vegetables and fruit.

        </p>

        <h3 style="font-family: 'Fjalla One', sans-serif;"> 3. Maintain an Active, Healthy Lifestyle — 150 Minutes
            of Physical Activity a Week</h3>
        <p class="lead">
            Physical exercise will not only keep you physically strong, but also keeps you mentally alert and
            reduces stress. When you exercise, you can think better, allowing you to be more efficient and
            productive. Try doing yoga, signing up for Zumba, or go for a slow walk in the park as such activities
            can keep your mind and body healthy. It is better to do moderate exercise more regularly than engage in
            heavy workouts on an ad hoc basis.
        </p>
        <h3 style="font-family: 'Fjalla One', sans-serif;"> 4. Interact and Socialise</h3>
        <p class="lead">
            Talking and interacting with others stimulates your brain. It allows your brain to work faster and think
            faster.

        </p>
        <h3 style="font-family: 'Fjalla One', sans-serif;">
            5. Pick up a New Skill or Hobby for Better Mental Well-being
        </h3>
        <p class="lead">
            It’s never too late to pick up a new skill and engaging in activities you enjoy can improve your mental
            well-being. Learning new skills such as playing the piano, acquiring a new set of computer skills and
            playing games can stimulate brain and nerve cells, keeping your brain refreshed.
        </p>
        <h3 style="font-family: 'Fjalla One', sans-serif;">
            6. Engage in a Mental Workout to Maintain Good Mental Health

        </h3>
        <p class="lead">
            Playing strategic and mind-stretching games not only involves memory work, but also involves
            decision-making and strategising. This helps keep the brain working and preventing mental health issues
            and illnesses such as dementia. Also, playing in groups will boost greater interaction.

        </p>
    </div>


    </div>

    <?php require_once('includes/footer.php'); ?>



</body>

</html>