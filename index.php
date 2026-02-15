<?php
    include 'conexionMysql.php';

    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $titulo = $id ? "Editar Usuario" : "Registrar Usuario";
    $usuario = null;

    if ($id) {
        $sql = "SELECT * FROM t_usuarios WHERE id = :id";
        $stmt = $conex->prepare($sql);
        $stmt->execute([':id' => $id]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $id     = $_POST['id'] ?? null;
        $nombre = $_POST['nombre'];
        $apellidos  = $_POST['apellidos'];
        $edad    = $_POST['edad'];

        if ($id) {
            $sql = "UPDATE t_usuarios
                    SET nombre = :nom, apellidos = :ape, edad = :edad 
                    WHERE id = :id";

            $params = [
                ':id'  => $id,
                ':nom'  => $nombre,
                ':ape'  => $apellidos,
                ':edad' => $edad
            ];
        } else {
            $sql = "INSERT INTO t_usuarios (nombre, apellidos, edad) 
                    VALUES (:nom, :ape, :edad)";

            $params = [
                ':nom' => $nombre,
                ':ape' => $apellidos,
                ':edad' => $edad
            ];
        }

        $stmt = $conex->prepare($sql);
        $stmt->execute($params);

        header("Location: listado.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $titulo; ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

    <div class="container mt-5">
        <h3 class="mb-4"><?php echo $titulo; ?></h3>

        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">


            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control"
                    value="<?php echo $id ? $usuario['nombre'] : ''; ?>" required>
            </div>


            <div class="mb-3">
                <label class="form-label">Apellidos</label>
                <input type="apellidos" name="apellidos" class="form-control" value="<?php echo $id ? $usuario['apellidos'] : ''; ?>" required>
            </div>


            <div class="mb-3">
                <label class="form-label">Edad</label>
                <input type="edad" name="edad" class="form-control" value="<?php echo $id ? $usuario['edad'] : ''; ?>" required>
            </div>


            <button type="submit" class="btn btn-primary">
                <?php echo $id ? 'Actualizar' : 'Guardar'; ?>
            </button>
        </form>
    </div>

    </body>
</html>