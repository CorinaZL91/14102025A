<?php
// Procesamiento del formulario
$mensaje_enviado = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = htmlspecialchars($_POST["nombre"]);
    $correo = htmlspecialchars($_POST["correo"]);
    $mensaje = htmlspecialchars($_POST["mensaje"]);
    $mensaje_enviado = true;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Harry Styles FanPage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff5f8;
            color: #333;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        header {
            background-color: #ffb6c1;
            padding: 20px;
        }
        header h1 {
            margin: 0;
        }
        nav a {
            margin: 0 15px;
            color: #222;
            text-decoration: none;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
        section {
            display: none;
            padding: 20px;
            animation: fadeIn 0.5s;
        }
        section.active {
            display: block;
        }
        @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity: 1;}
        }
        form {
            background: #ffe3ec;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            margin: auto;
        }
        input, textarea {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #ff6699;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #ff3366;
        }
        footer {
            background-color: #ffb6c1;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        img {
            border-radius: 10px;
        }
    </style>
</head>
<body>

<header>
    <h1>🎤 Harry Styles FanPage</h1>
    <nav>
        <a href="#" onclick="mostrarSeccion('inicio')">Inicio</a>
        <a href="#" onclick="mostrarSeccion('bio')">Biografía</a>
        <a href="#" onclick="mostrarSeccion('juego')">Juego</a>
        <a href="#" onclick="mostrarSeccion('contacto')">Contacto</a>
    </nav>
</header>

<!-- Sección Inicio -->
<section id="inicio" class="active">
    <h2>Bienvenido al mundo de Harry Styles 💫</h2>
    <p>Explora su música, su historia y pon a prueba cuánto sabes sobre él.</p>
    <img src="https://upload.wikimedia.org/wikipedia/commons/8/8c/Harry_Styles_2018.jpg" alt="Harry Styles" width="400">
</section>

<!-- Sección Biografía -->
<section id="bio">
    <h2>Biografía</h2>
    <img src="https://upload.wikimedia.org/wikipedia/commons/a/ae/Harry_Styles_2019.jpg" width="300" alt="Harry Styles">
    <p>
        Harry Edward Styles nació el 1 de febrero de 1994 en Redditch, Inglaterra.  
        Fue miembro de la banda One Direction y después inició una exitosa carrera como solista.  
        Su música mezcla pop, rock y soul con influencias retro y letras profundas.
    </p>
</section>

<!-- Sección Juego -->
<section id="juego">
    <h2>🎮 Adivina la canción</h2>
    <p><em>“You know it's not the same as it was...”</em></p>
    <input type="text" id="respuesta" placeholder="Escribe el nombre de la canción">
    <button onclick="verificar()">Comprobar</button>
    <p id="resultado"></p>
</section>

<!-- Sección Contacto -->
<section id="contacto">
    <h2>📬 Contáctanos</h2>

    <?php if ($mensaje_enviado): ?>
        <h3>¡Gracias por contactarnos, <?php echo $nombre; ?> 💌!</h3>
        <p>Tu mensaje fue recibido correctamente.</p>
        <blockquote><?php echo $mensaje; ?></blockquote>
        <p>Te responderemos pronto a <strong><?php echo $correo; ?></strong>.</p>
        <button onclick="mostrarSeccion('inicio')">Volver al inicio</button>
    <?php else: ?>
        <form method="POST">
            <label>Nombre:</label>
            <input type="text" name="nombre" required>

            <label>Correo electrónico:</label>
            <input type="email" name="correo" required>

            <label>Mensaje:</label>
            <textarea name="mensaje" required></textarea>

            <button type="submit">Enviar</button>
        </form>
    <?php endif; ?>
</section>

<footer>
    <p>&copy; <?php echo date("Y"); ?> FanPage creada en PHP</p>
</footer>

<script>
function mostrarSeccion(id) {
    const secciones = document.querySelectorAll("section");
    secciones.forEach(sec => sec.classList.remove("active"));
    document.getElementById(id).classList.add("active");
    window.scrollTo(0, 0);
}

function verificar() {
    const r = document.getElementById('respuesta').value.toLowerCase();
    const resultado = document.getElementById('resultado');
    if (r.includes("as it was")) {
        resultado.textContent = "✅ ¡Correcto! Es 'As It Was'.";
        resultado.style.color = "green";
    } else {
        resultado.textContent = "❌ Intenta de nuevo.";
        resultado.style.color = "red";
    }
}
</script>

</body>
</html>
