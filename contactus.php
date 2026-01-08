<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReStyle</title>
    <link rel="stylesheet" href="contactus.css">
</head>
<body>
    <?php
    include "header.php";
        ?>

    <section class="pageHeader">
    <h2>Contact Us</h2>
    <p>Questions, feedbacks — reach out.</p>
</section>
    <section class="contactForm">
    <form>
        <label for="name">Full Name</label>
        <input type="text" id="name" placeholder="Your name" required>

        <label for="email">Email Address</label>
        <input type="email" id="email" placeholder="Your email" required>

        <label for="message">Message</label>
        <textarea id="message" rows="5" placeholder="Write your message here..." required></textarea>

        <button type="submit">Send Message</button>
    </form>
</section>
    <?php 
    include "footer.php";
        ?>
</body>
</html>