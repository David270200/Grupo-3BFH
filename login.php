    <?php
    session_start();

    // Conexión a la base de datos
    $conn = mysqli_connect("localhost", "root", "", "semestral");

    // Verificar conexión
    if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Recibir datos del formulario
    $correo = $_POST["correo"];
    $clave  = $_POST["clave"];

    // Buscar usuario
    $sql = "SELECT * FROM usuarios
            WHERE correo='$correo'
            AND password='$clave'";

    $resultado = mysqli_query($conn, $sql);

    // Verificar si existe
    if (mysqli_num_rows($resultado) > 0) {

        $usuario = mysqli_fetch_assoc($resultado);

        $_SESSION["id_usuario"] = $usuario["id_usuario"];
        $_SESSION["nombre"] = $usuario["nombre"];
        $_SESSION["rol"] = $usuario["rol"];

        // Redireccionar según el rol
        if ($usuario["rol"] == "administrador") {
            header("Location: admin/dashboard.php");
        } else {
            header("Location: index.html");
        }
        exit();

    } else {

        echo "<script>
                alert('Correo o contraseña incorrectos');
                window.history.back();
            </script>";

    }

    mysqli_close($conn);
    ?>