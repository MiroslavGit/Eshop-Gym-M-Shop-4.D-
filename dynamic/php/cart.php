<?php

session_start();

if (isset($_POST['remove'])) {
    unset($_SESSION['cart']);
}

include("header.php");
include("data.php");
?>

<head>
    <link rel="stylesheet" href="../css/cart.css" />
</head>

<!-- Page content  -->
<div class="page-content" id="content">
    <!-- Menu button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill px-4 position-fixed m-5">
        <i class="fa fa-bars fa-fw"></i><small class="text-uppercase font-weight-bold">Menu</small>
    </button>

    <!-- Cart -->
    <div class="container cart mt-5">
        <div class="container table pt-5  ">
            <div class="text-dark pb-4 bg-warning rounded-3 pt-4 ps-5">
                <div class="divTableCol pe-4">Product</div>
                <div class="divTableCol ps-5 pe-5">Authorized</div>
                <div class="divTableCol ps-5 pe-5">Quantity</div>
                <div class="divTableCol ps-5 pe-5">Price</div>
                <form class="divTableCol ps-5" method="post">
                    <button name="remove" class="bg-dark rounded-pill"> <i class="fa fa-times"></i> </button>
                </form>
            </div>

            <?php
            if (isset($_SESSION['cart'])) {
                $total = 0;

            ?>
            <?php
                echo "<ol>";
                foreach ($_SESSION['cart'] as $key  => $product) {
                    $product = $product - 1;
                    echo "<li>";
                    echo '<div class="table">';
                    echo '<div class="divTableCol">';
                    echo '<div>';
                    echo "<a class='pull-left' href='shop.php'> <img src='../../photos/$images[$product]' class='img-fluid' style='width: 92px; height: 72px; margin-left: 0' /></a>";
                    echo '<div class="media-body">';
                    echo "<h6 class='media-heading'>$names[$product]</h6>";
                    echo '</div> </div> </div>';
                    echo '<div class="divTableCol"><strong>Pending</strong></div>';
                    echo '<div class="divTableCol ps-5 pe-5">';
                    echo '<div class="ps-5 pe-5">';
                    echo '<div class="ps-3">';
                    echo '1';
                    echo '</div> </div> </div>';
                    echo "<div class='divTableCol'><strong>$prices[$product] €</strong></div>";
                    echo '<div class="divTableCol pt-5">';
                    echo '</div> </div>';
                    echo "</li>";
                    $total += $prices[$product];
                }
                echo "</ol>";
            } else {
                echo "<h3 class='text-center py-5'><strong> Empty cart ! </strong></h3>";
                $total = 0;
            }
            ?>

            <div class="text-center pt-4 pb-5 ">
                <div>
                    <h3>Total</h3>
                </div>
                <div class=" text-center bg-warning w-25 mx-auto rounded-pill">
                    <?php
                    echo "<h3 class='pb-2 ' ><strong> $total € </strong></h3>";
                    ?>
                </div>
            </div>


        </div>
    </div>

    <?php
    include("footer.php");
    ?>