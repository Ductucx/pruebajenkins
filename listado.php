<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=edit" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=delete" />
        <style>
            body {
                background-color: #f8f9fa;
            }

            .table th, .table td {
                vertical-align: middle;
            }
            .table thead {
                background-color: #007bff;
                color: white;
            }
            .table tbody tr:hover {
                background-color: #f1f1f1;
            }
            h1 {
                color: #007bff;
                font-family: 'Arial', sans-serif;
            }
            .container {
                margin-top: 50px;
            }
        </style>
    </head>
    <body>
        <?php 
        
            include 'conexionMysql.php';

            $sql="SELECT * from t_usuarios";

            $res= $conex->query($sql);
        
            echo "<h1 class='text-center my-4'>Resultado de la consulta de usuarios modificado</h1>";
            echo "<h1 class='text-center my-4'>Resultado de la consulta de usuarios modificado</h1>";
            echo "<div class='container'>";
            echo "<table class='table table-bordered table-hover shadow'>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>Nombre</th>";
                        echo "<th>Apellidos</th>";
                        echo "<th>Edad</th>";
                        echo "<th>Editar</th>";
                        echo "<th>Borrar</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
        while($fila=$res->fetchObject())
                {
                    echo "<tr>";
                        echo "<td>".$fila->id."</td>";
                        echo "<td>".$fila->nombre."</td>";
                        echo "<td>".$fila->apellidos."</td>";
                        echo "<td>".$fila->edad."</td>";
                        echo '<td><a href="./edit.php?id='.$fila->id.'"><span class="material-symbols-outlined"> edit </span></a></td>';
                        echo '<td><a href="./delete.php?id='.$fila->id.'"><span class="material-symbols-outlined">delete</span></a></td>';

                    echo "</tr>";
                }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";

        ?>
        
        <a href="./edit.php"><button type="button" class="btn btn-primary">Nuevo usuario</button></a>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
