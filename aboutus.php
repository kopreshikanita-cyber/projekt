<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReStyle</title>
    <link rel="stylesheet" href="aboutus.css">
</head>
<body>
   <?php 
   include "header.php";
    ?>

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
    <div class = "slideshowContainer">
            <img name = "mySlide" id = "slideshow" />
            <button onclick = "changeImg()">Next Image</button>
    </div>
    </section>
    
    <?php 
    include "footer.php";
        ?>
 <script>
        var i = 0;
        var images = [ 
            "fotot/sllider.jpg",
            "fotot/package.jpg",
            "fotot/slider.jpg",
            "fotot/thankyou.jpg"
    ];
    var slideshow = document.getElementById("slideshow");
    var size = "400px";
    slideshow.style.width = size;
    slideshow.style.height = size;
    var nextBtn = document.querySelector("button");
       function changeImg() {
        var slide = document.getElementById("slideshow");
        slide.src = images[i];
        i = (i + 1) % images.length;
        setTimeout(changeImg, 5000);
    }
    nextBtn.addEventListener("click", () => {
    i = (i + 1) % images.length;
    slideshow.src = images[i];
});

    window.onload = changeImg;
</script>
</body>
</html>