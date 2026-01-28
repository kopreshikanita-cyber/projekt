<?php 
 session_start();
   ?>
   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReStyle</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <?php 
    include_once "header.php";
    include_once "sidenav.php";
    ?>
       <div id="main" style="transition: margin-left .5s; padding: 20px;">
       <section class="hero" id="hero">
        <?php if(isset($_SESSION['username'])): ?>
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <?php else: ?>
        <h2> Good clothes, second chances. </h2>
    <?php endif; ?>
    </section>
    <br>
        <section class="about-preview">
        <div class="img-container">
        <img src="fotot/Country Retro Aesthetic.jpg" alt="Thrift fashion">
        <div class="text">
            <h3>Style without waste</h3>
            <p>
                ReStyle is a curated online thrift space for people who care about fashion and sustainability.
                No fast fashion. No junk. Just good clothes that deserve another life.
            </p>
            <a href="aboutus.php" id="learnmore">Learn more →</a>
        </div>
    </div>
</section>

    <section class="featured">
        <h2>Featured Items</h2>
        <div class="items">
            <div class="item">
                <img src="fotot/vintage t shirt.jpg" alt="T-shirt">
                <p>Vintage T-shirt - $12</p>
            </div>
            <div class="item">
                <img src="fotot/jacket.jpg" alt="Jacket">
                <p>Denim Jacket - $25</p>
            </div>
            <div class="item">
                <img src="fotot/tmira.jpg" alt="Shoes">
                <p>Retro Sneakers - $30</p>
            </div>
        </div>
    </section>
</div>
    <?php 
    include_once "footer.php";
        ?>
</body>
</html>
