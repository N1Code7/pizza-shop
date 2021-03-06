<?php require("./templates/nav.php"); ?>
<?php require("./templates/footer.php"); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="shortcut icon" href="./assets/img/favicon16.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title><?= isset($title) ? $title : "PizzaShop" ?></title>
</head>

<body>

  <nav class="<?= isset($nav_home) ? $nav_home : ""; ?>">
    <?= $nav_content; ?>
  </nav>

  <?= isset($header_content) ? $header_content : ""; ?>

  <main>
    <?= $main; ?>
  </main>

  <footer>
    <?= $footer ?>
  </footer>

  <script src="./js/index.js"></script>
</body>

</html>