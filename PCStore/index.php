<?php

$connection = new PDO('mysql:host=localhost:3307;dbname=pcstoreproject',"root","");
$rows = $connection -> query('SELECT name, price, img_src, productID FROM pcstoreproject.products');

?>

<!DOCTYPE html >
<html lang="en" >
    <a href="style.css"></a>

    <head>
        <?php
        include ('header.php');
        ?>
    </head>

    <body class="theme">
        <!-- --  CAROUSEL --- -->
        <div class="container mx-auto text-center theme">
            <div class="carousel slide gallery " id="carouselExampleIndicators" data-bs-ride="true" >
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner" >
                    <div class="carousel-item active">
                        <img src="Pictures\Carousel\AMD.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="Pictures\Carousel\Thermaltake.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="Pictures\Carousel\NVIDIA2.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <!-- --  PRODUCTS --- -->
        <div     style="margin-top: 20px">
            <div class="col">
                <?php
                foreach( $rows as $row ) {
                    ?>
                    <div class = "contain">
                        <a href="indProdPage.php?id=<?= $row['productID'] ?>" style="text-decoration: none; color: black">
                            <div class = row>
                                <div class = col>
                                    <img alt src="<?= $row['img_src'] ?>" class ="containPicture"><br>
                                </div>
                                <div class="col">
                                    <div style=" margin-left:15px;">
                                        <p class="text_contain"><?= $row["name"] ?></p><br>
                                         PRICE: <?= $row["price"] ?><br> BGN
                                        </p>
                                     </div>
                                </div>
                            </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </body>
</html>