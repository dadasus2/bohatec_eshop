<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/login.css" rel="stylesheet"/>
    <title>Přihlášení</title>
</head>

<body>

<div class="text-center">
    <form style="max-width: 400px; margin: auto;" class="mt-5" method="post">
        <div>
            <img width="100" src="assets/marijuana.png" alt="">
        </div>
        <h1 class="mb-4 mt-3">Přihlášení</h1>
        <input name="username" type="text" id="emailAdress" class="form-control" placeholder="Uživatelské jméno"
               required autofocus>
        <input name="password" name type="password" id="password" placeholder="Heslo" class="form-control">
        <div class="mt-3">
            <a href="registration.php">Zaregistrovat..</a>
        </div>
        <div class="mt-3">
            <input class="col-lg-4 btn btn-lg btn-primary btn-block" name="login" type="submit" value="přihlásit">
        </div>
    </form>
</div>
<?php
require_once('Db.php');
Db::connect('127.0.0.1', 'bohatec_obchod', 'root', '');

if (isset($_POST['login'])) {
    $existuje = Db::queryOne('
      SELECT *
      FROM uzivatele
      WHERE username=?
    ', $_POST['username']);
    if ($existuje && password_verify($_POST['password'], $existuje['password'])) {
        $_SESSION['uzivatel_id'] = $existuje['id'];
        $_SESSION['uzivatel_username'] = $existuje['username'];
        $_SESSION['uzivatel_role'] = $existuje['role'];
        if ($_SESSION['uzivatel_role'] == "admin") {
            header('Location: admin.php');
            exit();
        } else {
            header('Location: index.php');
            exit();
        }
    } else {
        echo "Neplatné prihlaseni";
    }
}
?>


<button><a class="back-button" href="index.php">
        < Zpět</a></button>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>

</body>

</html>