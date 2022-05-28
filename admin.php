<?php
include 'header.php';

if ($_SESSION['uzivatel_role'] != 'admin') {
    header("location: ./index.php");
    exit();
}
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
    <link href="css/admin.css" rel="stylesheet"/>

    <title>Přihlášení</title>
</head>

<body>
<?php
require_once('Db.php');
Db::connect('127.0.0.1', 'bohatec_obchod', 'root', '');

$users = Db::queryAll("SELECT * FROM uzivatele");
$products = Db::queryAll("SELECT * FROM zbozi");
?>
<table class="table">
    <thead>
    <h1 class="text-center">Seznam uživatelů</h1>
    <hr>
    <tr>
        <th scope="col">id</th>
        <th scope="col">username</th>
        <th scope="col">email</th>
        <th scope="col">role</th>
        <th scope="col">akce</th>
    </tr>
    </thead>
    <?php
    echo "<tbody>";
    foreach ($users as $user) {
        echo "<tr>";
        echo "<td>" . $user['id'] . "</td>";
        echo "<td>" . $user['username'] . "</td>";
        echo "<td>" . $user['email'] . "</td>";
        echo "<td>" . $user['role'] . "</td>";
        echo "<td><a href=admin.php?id=". $user['id'] . ">Smazat uživatele</a></td>";
        echo "</tr>";
    }
    echo "</tbody>";

    if (isset($_GET['id'])){
        $delete = Db::queryOne("DELETE FROM uzivatele WHERE id = " . $_GET['id']);
        header("location: ./admin.php");
        exit();

    }
    ?>

</table>

<table class="table">
    <thead>
    <h1 class="text-center">Seznam zboží</h1>
    <hr>
    <tr>
        <th scope="col">id</th>
        <th scope="col">název</th>
        <th scope="col">cena</th>
    </tr>
    </thead>
    <?php
    echo "<tbody>";
    foreach ($products as $product) {
        echo "<tr>";
        echo "<td>" . $product['id'] . "</td>";
        echo "<td>" . $product['nazev'] . "</td>";
        echo "<td>" . $product['cena'] . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    ?>
</table>


<button><a class="back-button" href="login.php">
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