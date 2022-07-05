<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/pizza-shop/public/css/style.css">
  <link rel="shortcut icon" href="./assets/img/favicon16.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title><?= isset($title) ? $title : "PizzaShop" ?></title>
</head>

<body>

  <nav class="<?= isset($nav_home) ? $nav_home : ""; ?>">
    <div class="nav-container">
      <div class="home-button-container">
        <a href="./index.php"><i class="fa-solid fa-house"></i></a>
      </div>
      <div class="menu-container">
        <a href="#"><i class="fa-solid fa-basket-shopping"></i></a>
        <a href="./login.php"><i class="fa-solid fa-user"></i></a>
        <?php if (isset($_SESSION["id"])) {
          echo '<button type="submit" name="logout"><i class="fa-solid fa-power-off"></i></button>';
        } ?>
      </div>
    </div>
  </nav>

  <?= isset($header_content) ? $header_content : ""; ?>

  <main>