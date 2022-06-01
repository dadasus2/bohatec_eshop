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
                integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
                crossorigin="anonymous">
        <link href="css/cart.css" rel="stylesheet" />
        <title>Košík</title>
</head>

<body>

<?php
        require_once('Db.php');
        Db::connect('127.0.0.1', 'bohatec_obchod', 'root', '');

        
?>

        <div class="text-center">
                <h1 class="mt-3">Vybrané produkty</h1>
                <div class="card" style="width: 18rem;">
                        <div class="card-body">
                                <h5 class="card-title">Název produktu</h5>
                                <input type="number" id="ammount" name="ammount" value="1">
                                <h6 class="card-text">cena</h6>
                                <button type="button" class="btn btn-primary">Koupit</button>
                        </div>
                </div>
        </div>


        <button><a class="back-button" href="index.php">
                        < Zpět</a></button>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                crossorigin="anonymous"></script>




        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
                integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
                crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
                integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
                crossorigin="anonymous"></script>

</body>

</html>