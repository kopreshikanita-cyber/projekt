<div id="sideNav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="contactus.php">Contact</a>
    <a href="aboutus.php">About</a>
    <a href="#">News</a>
    <a href="#">Products</a>
</div>

<script>
    function openNav() {
        document.getElementById("sideNav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("sideNav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
    }
</script>

<style>
    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1000; 
        top: 0;
        left: 0;
        background-color:#8B5CF6;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }
    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #1F1F1F;
        display: block;
        transition: 0.3s;
    }
    .sidenav a:hover { color: #f5f5f5; }
    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
    }
</style>