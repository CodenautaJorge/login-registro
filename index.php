<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <style>
        #acceso, #registro{
            color: blue;
        }

        #acceso, #registro:hover{
            cursor: pointer;
        } 
    </style>

</head>
<body>

    <div class="container justify-content-center">

        <!--Formulario de regístro -->

        <div class="card shadow-lg mt-5" id="form-registro">
            <div class="card-body">
                <h5 class="mt-3 mb-5 text-center">Regístrate<span id="acceso"> o accede</span></h5>
                <form action="./controllers/signup.php" method="POST">

                    <input class="form-control mb-3" type="text" name="name" placeholder="Nombre" require>
                    <input class="form-control mb-3" type="text" name="surname" placeholder="Apellido" require>
                    <input class="form-control mb-3" type="email" name="email" placeholder="Email" require>
                    <input class="form-control mb-3" type="password" name="password" placeholder="Contraseña" require>
                    <button class="btn btn-primary mb-3" type="submit">Registrar</button>
                </form>

            </div>

        </div>

        <!-- Formulario de acceso -->

        <div class="card shadow-lg mt-5" id="form-acceso">
            <div class="card-body">
                <h5 class="mt-3 mb-5 text-center">Accede<span id="registro"> o regístrate</span></h5>


                <?php if(isset($_SESSION['registro'])){ ?>

                    <div class="alert alert-success" role="alert">
                       <?= $_SESSION['registro'] ?>
                    </div>
                <?php 
                    unset($_SESSION['registro']);
                } ?>

                <?php if(isset($_SESSION['login'])){ ?>

                <div class="alert alert-danger" role="alert">
                <?= $_SESSION['login'] ?>
                </div>
                <?php 
                unset($_SESSION['login']);
                } ?>


                <form action="./controllers/signin.php" method="POST">
                    <input class="form-control mb-3" type="email" name="email" placeholder="Email" require>
                    <input class="form-control mb-3" type="password" name="password" placeholder="Contraseña" require>
                    <button class="btn btn-primary mb-3" type="submit">Acceder</button>
                </form>

            </div>
        </div>

    </div>


    <script>

        $(document).ready(() =>{
            $('#form-registro').hide();
            $('#form-acceso').show();

            $('#registro').click(() =>{
                $('#form-registro').fadeIn(500);
                $('#form-acceso').hide();
            })

            $('#acceso').click(() =>{
                $('#form-registro').hide();
                $('#form-acceso').fadeIn(500
                
                );
            })

        })

    </script>

    
</body>
</html>