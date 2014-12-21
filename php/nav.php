<?php
    $base = "<a href='http://localhost:8888/hotdogdelight/site/";
    //$base = "<a href='http://client.skylarkerdesign.com/brett/";
    $home_link = $base."index.php'>Home</a>";
    $castle_link = $base."fun-castles.php'>Fun Castles</a>";
    $food_link = $base."food.php'>Food</a>";
    $photos_link = $base."photos.php>Photos</a>";
    $contact_link = $base."contact.php>Contact</a>";
?>

<nav class="navbar navbar-inverse navbar-custom navbar-fixed-top" id="n" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <a class="navbar-brand" href="http://hotdogdelight.com"><img src="images/logo.png" id="logo" width="300px" alt="Hot Dog Delight Party Rentals"></a>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right main-menu">
                    <li id="index"><?php echo $home_link; ?></li>
                    <li id="castle"><?php echo $castle_link; ?></li>
                    <li id="food"><?php echo $food_link; ?></li>
                    <li id="photos"><?php echo $photos_link; ?></li>
                    <li id="contact"><?php echo $contact_link; ?></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<div class="container">