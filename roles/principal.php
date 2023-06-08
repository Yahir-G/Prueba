<?php
session_start();
include '../db_connection.php';
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bienvenido</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link href="principal.css" rel="stylesheet">
        <!-- Estilos personalizados -->

</head>

<body>
<?php
// Verificar si el usuario ha iniciado sesión y tiene el rol almacenado en la sesión
if (isset($_SESSION['username']) && isset($_SESSION['rol_id'])) {
    $rol_id = $_SESSION['rol_id'];
    $username = $_SESSION['username'];

    switch ($rol_id) {
        case 1:
            echo "<h1 class='text-center mb-5'><br><br>Bienvenido Cajero, $username</h1>";
            break;
        case 2:
            echo "<h1 class='text-center mb-5'><br><br>Bienvenido Administrador, $username</h1>";
            break;
        case 3:
            echo "<h1 class='text-center mb-5'><br><br>Bienvenido Supervisor, $username</h1>";
            break;
        default:
            echo "Rol no válido";
            break;
    }

    $query = "SELECT accion FROM menu WHERE rol_id = $rol_id";
    $result = mysqli_query($conn, $query);

    // Obtener un array con las acciones permitidas
    $acciones = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $acciones[] = $row['accion'];
    }

    echo "<h2>Acciones permitidas:</h2>";
    echo "<ul>";
    foreach ($acciones as $accion) {
        echo "<li>$accion</li>";
    }
    echo "</ul>";

    // Barra de navegación
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="">
                <img src="../img/logo.jpeg" alt="Logotipo" width="50">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">';
    foreach ($acciones as $accion) {
        echo "<li class='nav-item'>
                <a class='nav-link' href='#$accion'>$accion</a>
                </li>";
    }
    echo "<li class='nav-item'>
                <a class='nav-link' href='../login.html'>Cerrar sesión</a>
                </li>";

    echo '</ul>
            </div>
            </nav>';

    // Resto del contenido del archivo principal2.php
    echo "<section id='hero' class='hero'>
        <div class='info d-flex align-items-center'>
            <div class='container'>
                <div class='row justify-content-center'>
                    <div class='col-lg-6 text-center'>
                        <h2 data-aos='fade-down'>Mi <br><span>sitio web</span></h2>
                        <p data-aos='fade-up'>Yahir Guzman Gutierrez 9-B <br>
                        Zurizadai Moctezuma García 9-B <br>
                        Miguel Ángel Chávez Camero 9-B <br>
                        Somos un equipo de 
                        profesionales apasionados por la tecnología y con amplia experiencia en 
                        el campo de la reparación de computadoras. Nuestro objetivo es brindarte 
                        soluciones rápidas y efectivas para todos los problemas que puedas enfrentar con tu equipo.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- CARUSEL DE FOTOS -->
        <div id='hero-carousel' class='carousel slide' data-bs-ride='carousel' data-bs-interval='5000'>
        <div class='carousel-item active' style='background-image: url(../img/template1.jpg)'></div>
        </div>
        </section>";

    echo "<section id='servicios' class='py-5 bg-light'>
      <div class='container'>
        <h2 class='text-center mb-5'>Nuestros Servicios</h2>
        <div class='row'>
          <div class='col-lg-4 col-md-6'>
            <div class='card h-100'>
              <div class='card-body'>
                <h4 class='card-title'>Servicio de Reparación de Hardware</h4>
                <p class='card-text text-justify'>Nuestro servicio de reparación de hardware 
                  se enfoca en solucionar problemas físicos y componentes defectuosos 
                  en tu computadora. Nuestros técnicos altamente capacitados pueden diagnosticar 
                  y reparar fallas en la placa madre, memoria RAM, disco duro, tarjeta gráfica y 
                  otros componentes esenciales. Te brindamos soluciones rápidas y efectivas para 
                  asegurarte de que tu computadora funcione correctamente nuevamente.</p>
              </div>
            </div>
          </div>
          <div class='col-lg-4 col-md-6'>
            <div class='card h-100'>
              <div class='card-body'>
                <h4 class='card-title'>Servicio de Eliminación de Virus y Malware</h4>
                <p class='card-text text-justify'>Los virus y malware pueden afectar seriamente el rendimiento 
                de tu computadora y comprometer tu seguridad en línea. Nuestro servicio de 
                eliminación de virus y malware utiliza herramientas avanzadas para detectar y 
                eliminar cualquier amenaza presente en tu sistema.</p>
              </div>
            </div>
          </div>
          <div class='col-lg-4 col-md-6'>
            <div class='card h-100'>
              <div class='card-body'>
                <h4 class='card-title'>Servicio de Optimización y Mantenimiento Preventivo</h4>
                <p class='card-text text-justify'>Nuestra tarea no solo consiste en reparar computadoras cuando se rompen, 
                  también nos preocupamos por mantener tu equipo funcionando de manera óptima. 
                  Con nuestro servicio de optimización y mantenimiento preventivo, 
                  realizamos limpieza de archivos innecesarios, desfragmentación de disco, actualizaciones 
                  de software y control de procesos en segundo plano para mejorar el rendimiento general de tu computadora.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      </section>";

    echo "<section id='acerca-de' class='py-5'>
      <div class='container'>
      <h2 class='text-center'>Acerca de Nosotros</h2>
      <p class='text-justify'>Explora nuestro sitio web para conocer más sobre los servicios que ofrecemos y cómo podemos ayudarte. 
      Si tienes alguna pregunta o necesitas asesoramiento, no dudes en ponerte en contacto con nuestro equipo amable y capacitado.
      ¡Gracias por visitarnos! Estamos emocionados de ser tu aliado confiable en la reparación y mantenimiento de tu computadora. 
      Confía en nosotros y deja que nuestros expertos resuelvan cualquier problema que puedas tener. Tu satisfacción es nuestra prioridad.
      ¡Bienvenido a nuestro mundo de soluciones tecnológicas!</p>
      </div>
      </section>";

    // Scripts de Bootstrap
    echo "<script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js'></script>";

    require 'footer.php';
} else {
    // Si el usuario no ha iniciado sesión, redireccionarlo al formulario de inicio de sesión
    header("Location: login.php");
    exit();
}
?>
</body>
</html>