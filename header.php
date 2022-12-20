<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Welcome to Fork&Spoon website for Ordering System" />
    <meta name="author" content="" />
    <title>Fork&Spoon</title>
    <!-- Favicon-->
    <!-- <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" /> -->
    <!-- Bootstrap core JS + JQuery -->
    <!-- <link rel="stylesheet" href="/fork&spoon/assets/cssAngular/login.css"> -->
    <script src="/food-system/assets/js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/food-system/assets/css/bootstrap.min.css">
    <script src="/food-system/assets/js/bootstrap.bundle.min.js"></script>
    <style>
    .holderimg {
      max-height: 50px;
      max-width: 50px;
      object-fit: cover;
    }
  </style>
</head>

<body>
    <?php
    session_start();
    $cart_count = '';
    $user = null;
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    }
    if (isset($user) and isset($_SESSION["cart"][$user['id']])) {
        $cart_count = '(' . count($_SESSION["cart"][$user['id']]) . ')';
    }

    //if user already logged in show navigation bar else do not show it in login screen
if (isset($user)) {
        $customerFeatures = '';
        $qualityControl = '';
        if ($user['role'] === 'customer') {
            $customerFeatures = '<a class="float-right pr-4" href="/food-system/orders.php">My Orders</a>
                                 <a class="float-right pr-4" href="/food-system/cart.php">View Cart ' . $cart_count . '</a>';
        } else if ($user['role'] === 'admin') {
            $qualityControl = '<a class="float-right pr-4" href="/food-system/reports.php">Reports</a>
                               <a class="float-right pr-4" href="/food-system/comments.php">Traveler Comments</a>';

            echo '
        <div class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/fork&spoon">
            <img class="holderimg" src="assets/tw.jpg">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            </div>
            ' . $customerFeatures . '
            ' . $qualityControl . '
            <a class="float-right" href="/food-system/logout-service.php">Logout</a>
        </div>
        ';
        }
    }
    ?>
