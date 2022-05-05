<?php
$conn = mysqli_connect("db5004754274.hosting-data.io", "dbu1436247", "GalletaMKT77%2021", "dbs3985634");

$monthGet = $_GET['month'];
$yearGet  = $_GET['year'];

$sql="SELECT * FROM usuarios WHERE anio = '".$yearGet."' order by referidos DESC";

$result = mysqli_query($conn, $sql);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1d7dc8a672.js" crossorigin="anonymous"></script>
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="tables.css">

    <title>Top 10 "Referidos Todos Somos Comerciales VANGUARDIA"</title>
</head>

<body>

<div class="hero-image pt-2 mb-0">
<section class="container p-3">
        <!--for demo wrap-->
        <h1>Top 10 "Referidos Todos Somos Comerciales de <?php echo $monthGet?> <?php echo $yearGet?>"</h1>

        <table class="table table-light">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Agencia</th>
                    <th>Departamento</th>
                    <th>Puesto</th>
                    <th>Comentarios</th>
                    <th>No. referidos</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_array($result)){
                    ?>
                <tr>
                    <td data-label="Nombre" id="columnaNombre" style="font-size: 13px; text-align:left; width: 30%; padding:5px;"><?php echo $row["nombre"];?></td>
                    <td data-label="Agencia" style="text-align:left;"><?php echo $row["agencia"];?></td>
                    <td data-label="Departamento" style="text-align:left;"><?php echo $row["departamento"];?></td>
                    <td data-label="Puesto" style="text-align:left;"><?php echo $row["puesto"];?></td>
                    <td data-label="Seguimiento" style="text-align:left;"><?php echo $row["seguimiento"];?></td>
                    <td data-label="# referidos" style="color:#1F61AE;"><i class="fas fa-heart"></i> <?php echo $row["referidos"];?></td>
                </tr>
                <?php
                    }
                }
                ?>
                </tr>
            </tbody>
        </table>
    </section>
</div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- <script  src="./script.js"></script> -->
</body>

</html>