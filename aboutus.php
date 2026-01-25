
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReStyle</title>
    <link rel="stylesheet" href="aboutus.css">

</head>
<body>
  <?php 
    session_start();
   include "header.php";
   include "sidenav.php";
?>
    <div id="main" style="transition: margin-left .5s; padding: 20px;">
    <section class="pageHeader">
    <h2>About ReStyle</h2>
    <p>Fashion that lasts longer than trends.</p>
</section>

<section class="aboutContent">
    <div class="aboutText">
        <h3>Who we are</h3>
        <p>
            ReStyle is an online thrift platform built for people who want to dress well
            without supporting fast fashion. We carefully select second-hand clothing
            that is clean, wearable, and timeless.
        </p>

        <h3>Why we exist</h3>
        <p>
            The fashion industry produces massive waste every year.
            We believe great clothes shouldn’t be worn once and forgotten.
            Giving clothes a second life saves money, reduces waste, and makes sense.
        </p>

        <h3>Our values</h3>
        <ul>
            <li>Sustainability over trends</li>
            <li>Quality over quantity</li>
            <li>Affordability without compromise</li>
        </ul>
    </div>
    </section>
    </div>
    <?php 
    include "footer.php";
        ?>
</body>
</html>
