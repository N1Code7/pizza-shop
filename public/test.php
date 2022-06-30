<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/public/css/style.css">
  <link rel="shortcut icon" href="/public/assets/img/favicon16.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title><?= $title ?></title>
</head>

<body>

  <nav>
    <div class="nav-container">
      <div class="home-button-container">
        <a href="./home.php"><i class="fa-solid fa-house"></i></a>
      </div>
      <div class="menu-container">
        <a href="#"><i class="fa-solid fa-basket-shopping"></i></a>
        <a href="./login.php"><i class="fa-solid fa-user"></i></a>
      </div>
    </div>
  </nav>

  <header>
    <h1>PizzaShop</h1>
    <h4>Vos meilleures pizzas à portée de click !</h4>
  </header>

  <main>
    <div class="main-container">
      <h2>Nos pizzas</h2>

    </div>

  </main>

  <footer>
    <div class="footer-container">
      <div class="footer-left">
        <h2>PizzaShop</h2>

      </div>
      <div class="footer-right">
        <h4>Plan du site</h4>
        <ul>
          <li>Accueil</li>
          <li>Contact</li>
          <li>Rechercher</li>
          <li>Mentions légales</li>
        </ul>
      </div>
    </div>
  </footer>

  <script src="/public/js/index.js"></script>
</body>

</html>