<?php
$respuesta = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $respuesta = "<div class='respuesta'><h3>Respuestas enviadas:</h3><ul>";
    foreach ($_POST as $key => $value) {
        $key_formatted = ucfirst(str_replace("_", " ", $key));
        $respuesta .= "<li><strong>$key_formatted:</strong> $value</li>";
    }
    $respuesta .= "</ul></div>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Galería y Formulario</title>
    <link rel="stylesheet" href="style.css">
    <style>
        nav ul {
            padding: 0;
            list-style: none;
            text-align: center;
            margin: 0;
            background: #333;
        }

        nav ul li {
            display: inline-block;
            margin: 0 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 15px;
            display: inline-block;
        }

        nav ul li a:hover {
            background: #444;
        }

        .galeria {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .galeria img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, opacity 0.5s;
            opacity: 0;
            animation: fadeIn 1s ease forwards;
        }

        .galeria img:hover {
            transform: scale(1.05);
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        form {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        form label {
            display: block;
            margin: 15px 0 5px;
        }

        form select, form input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        form input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            margin-top: 20px;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .respuesta {
            max-width: 600px;
            margin: 20px auto;
            background: #e6ffec;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #9fd6aa;
        }
    </style>
</head>
<body>

    <header>
        <h1 style="text-align: center; padding: 20px;">Galería Profesional de Proyectos</h1>
    </header>

    <!-- Menú de navegación -->
    <nav>
        <ul>
            <li><a href="index.html">Inicio</a></li>
            <li><a href="biografia1.html">Biografía Parte 1</a></li>
            <li><a href="biografia2.html">Biografía Parte 2</a></li>
            <li><a href="http://localhost/proyecto/GaleriayFormulario.php">Galería y Formulario</a></li>
        </ul>
    </nav>

    <!-- Galería de imágenes -->
    <section class="galeria">
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <img src="imagenes/trabajo<?= $i ?>.jpg" alt="Trabajo <?= $i ?>">
        <?php endfor; ?>
    </section>

    <!-- Formulario -->
    <section>
        <form method="post">
            <h2 style="text-align:center;">Formulario</h2>

            <label>¿Héroe o Villano?</label>
            <select name="heroe_villano" required>
                <option value="">--Selecciona--</option>
                <option value="Héroe">Héroe</option>
                <option value="Villano">Villano</option>
            </select>

            <label>¿Verano o Invierno?</label>
            <select name="verano_invierno" required>
                <option value="">--Selecciona--</option>
                <option value="Verano">Verano</option>
                <option value="Invierno">Invierno</option>
            </select>

            <label>¿Me pone 10 por favor?</label>
            <select name="me_pone_10" required>
                <option value="">--Selecciona--</option>
                <option value="Sí">Sí 😇</option>
                <option value="No">No 😢</option>
            </select>

            <input type="submit" value="Enviar">
        </form>
    </section>

    <!-- Respuesta -->
    <?= $respuesta ?>
    <footer>
        Desarrollado por Alejandro Barquiel Zubia - Matrícula: 22190510
    </footer>
</body>
</html>
