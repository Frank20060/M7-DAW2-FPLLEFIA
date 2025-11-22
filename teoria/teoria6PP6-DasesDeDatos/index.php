<?php
    include ("dbconfig/config.php");
    include ("data/data.php");

    $usuariosInfo = returnUsersData();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Listado de usuarios</title>
    <style>
        table { border-collapse: collapse; width: 100%; max-width: 900px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #f4f4f4; }
        caption { font-weight: bold; margin-bottom: 8px; }
    </style>
</head>
<body>
    <h2>Usuarios</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Fecha registro</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($usuariosInfo instanceof mysqli_result) {
                while ($fila = $usuariosInfo->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($fila['id']) . '</td>';
                    echo '<td>' . htmlspecialchars($fila['nombre']) . '</td>';
                    echo '<td>' . htmlspecialchars($fila['email']) . '</td>';
                    echo '<td>' . htmlspecialchars($fila['rol']) . '</td>';
                    echo '<td>' . htmlspecialchars($fila['fecha_registro']) . '</td>';
                    echo '</tr>';
                }
            } elseif (is_array($usuariosInfo)) {
                foreach ($usuariosInfo as $fila) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($fila['id']) . '</td>';
                    echo '<td>' . htmlspecialchars($fila['nombre']) . '</td>';
                    echo '<td>' . htmlspecialchars($fila['email']) . '</td>';
                    echo '<td>' . htmlspecialchars($fila['rol']) . '</td>';
                    echo '<td>' . htmlspecialchars($fila['fecha_registro']) . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="5">No hay datos</td></tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>