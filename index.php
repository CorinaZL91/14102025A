<?php
// Procesamiento del formulario contacto simple
$enviado = false;
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["nombre"]) && isset($_POST["mensaje"])) {
    $nombre = htmlspecialchars($_POST["nombre"]);
    $correo = htmlspecialchars($_POST["correo"]);
    $mensaje = htmlspecialchars($_POST["mensaje"]);
    $enviado = true;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Harry Styles Experience 💫</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
/* ---------------- GENERAL ---------------- */
body {
    font-family: "Poppins", sans-serif;
    background: linear-gradient(135deg, #ffe5ec, #ffd6e0, #ffe6f0);
    margin: 0;
    color: #333;
    text-align: center;
    scroll-behavior: smooth;
}
header {
    background: linear-gradient(90deg, #ff5f9e, #ff8fab);
    color: white;
    padding: 40px 10px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    animation: fadeIn 1s ease;
}
header h1 { margin:0; font-size:2.5em; letter-spacing:2px; }
nav { margin-top: 15px; }
nav a {
    color: white;
    margin: 0 15px;
    text-decoration: none;
    font-weight: bold;
    transition: 0.3s;
}
nav a:hover { text-decoration: underline; }
section { display:none; padding:50px 20px; max-width:900px; margin:auto; animation:fadeIn 0.6s ease; }
section.active { display:block; }
img {
    width: 350px; 
    height: 350px; 
    object-fit: cover; 
    border-radius: 15px;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
    margin-top:10px;
}
footer { background-color:#ff8fab; color:white; padding:15px; width:100%; position:relative; }

/* -------- JUEGO -------- */
#juego .pregunta { font-size:1.2em; margin:20px 0; }
.opcion {
    background-color:#ffe1ea;
    border:2px solid #ff8fab;
    padding:10px;
    border-radius:8px;
    margin:10px auto;
    width:60%;
    cursor:pointer;
    transition:0.3s;
}
.opcion:hover { background-color:#ffb6c1; }

/* -------- FORMULARIOS -------- */
form {
    background-color:#fff;
    padding:25px;
    border-radius:10px;
    box-shadow:0 4px 12px rgba(0,0,0,0.1);
    max-width:400px;
    margin:auto;
}
input, textarea, select {
    width:100%;
    padding:10px;
    margin-top:8px;
    margin-bottom:15px;
    border:1px solid #ccc;
    border-radius:8px;
}
button {
    background-color:#ff5f9e;
    border:none;
    color:white;
    padding:10px 20px;
    border-radius:8px;
    cursor:pointer;
    transition:0.3s;
}
button:hover { background-color:#ff3366; }

/* -------- ANIMACIONES -------- */
@keyframes fadeIn { from{opacity:0; transform:translateY(15px);} to{opacity:1; transform:translateY(0);} }
#audio-player { margin-top:25px; background:#fff; border-radius:12px; display:inline-block; padding:15px; box-shadow:0 4px 10px rgba(0,0,0,0.1); }
</style>
</head>
<body>

<header>
<h1>Harry Styles Experience 💫</h1>
<nav>
    <a href="#" onclick="mostrar('inicio')">Inicio</a>
    <a href="#" onclick="mostrar('bio')">Biografía</a>
    <a href="#" onclick="mostrar('juego')">Trivia</a>
    <a href="#" onclick="mostrar('contacto')">Contacto</a>
    <a href="#" onclick="mostrar('formulario-avanzado')">Formulario Avanzado</a>
</nav>
</header>

<!-- INICIO -->
<section id="inicio" class="active">
<h2>🎶 Bienvenido al Universo de Harry Styles</h2>
<p>Explora su historia, disfruta su música y demuestra cuánto sabes sobre él.</p>
<img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Harry_Styles_2022.jpg" alt="Harry Styles">
<div id="audio-player">
    <h3>Escucha un fragmento 🎧</h3>
    <audio controls>
        <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-8.mp3" type="audio/mpeg">
        Tu navegador no soporta audio.
    </audio>
</div>
</section>

<!-- BIOGRAFÍA -->
<section id="bio">
<h2>🌟 Biografía</h2>
<img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Harry_Styles_2019_2.jpg" alt="Harry Styles">
<p>
Harry Edward Styles nació el 1 de febrero de 1994 en Redditch, Inglaterra.  
Inició su carrera en la banda *One Direction*, y más tarde se consolidó como solista con álbumes aclamados como  
<strong>“Fine Line”</strong> (2019) y <strong>“Harry’s House”</strong> (2022).  
Su estilo combina influencias del rock clásico, pop alternativo y un toque de nostalgia vintage.
</p>
</section>

<!-- JUEGO -->
<section id="juego">
<h2>🎮 Trivia Musical</h2>
<p>¿Cuánto sabes sobre Harry Styles? Responde correctamente y suma puntos.</p>
<div id="pregunta-container"></div>
<p><strong>Puntuación:</strong> <span id="puntuacion">0</span></p>
</section>

<!-- CONTACTO SIMPLE -->
<section id="contacto">
<h2>💌 Contáctanos</h2>
<?php if($enviado): ?>
    <h3>¡Gracias, <?php echo $nombre;?>! 💕</h3>
    <p>Tu mensaje fue recibido:</p>
    <blockquote><?php echo $mensaje;?></blockquote>
    <p>Te responderemos a: <strong><?php echo $correo;?></strong></p>
    <button onclick="mostrar('inicio')">Volver</button>
<?php else: ?>
    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <label>Correo:</label>
        <input type="email" name="correo" required>
        <label>Mensaje:</label>
        <textarea name="mensaje" required></textarea>
        <button type="submit">Enviar</button>
    </form>
<?php endif; ?>
</section>

<!-- FORMULARIO AVANZADO -->
<section id="formulario-avanzado">
<h2>📝 Formulario Completo</h2>
<p>¡Completa los campos y valida tus respuestas!</p>
<form id="advancedForm">
    <input type="text" id="nombreAdv" placeholder="Nombre completo" required>
    <input type="email" id="correoAdv" placeholder="Correo electrónico" required>
    <input type="password" id="passAdv" placeholder="Contraseña (mín 6)" required>
    <input type="number" id="edadAdv" placeholder="Edad" min="12" max="100" required>
    <input type="date" id="fechaAdv" required>
    <p>Género favorito de Harry Styles:</p>
    <input type="radio" name="generoAdv" value="Pop" required>Pop
    <input type="radio" name="generoAdv" value="Rock">Rock
    <input type="radio" name="generoAdv" value="Soul">Soul
    <p>Merch favorito:</p>
    <input type="checkbox" name="merchAdv" value="Camisas">Camisas
    <input type="checkbox" name="merchAdv" value="Posters">Posters
    <input type="checkbox" name="merchAdv" value="Discos">Discos
    <select id="albumAdv" required>
        <option value="">--Selecciona álbum--</option>
        <option value="Harry Styles">Harry Styles</option>
        <option value="Fine Line">Fine Line</option>
        <option value="Harry's House">Harry's House</option>
    </select>
    <textarea id="razonAdv" placeholder="¿Por qué te gusta Harry Styles? (min 20 caracteres)" minlength="20" required></textarea>
    <button type="submit">Enviar Formulario</button>
</form>
<p id="msgSuccess" style="color:green; display:none; font-weight:bold; margin-top:15px;">
¡Formulario enviado correctamente! 💌
</p>
</section>

<footer>
<p>&copy; <?php echo date("Y");?> Harry Styles Experience | Creado en PHP 💕</p>
</footer>

<script>
// ------------ Navegación ------------
function mostrar(id){
    document.querySelectorAll("section").forEach(s=>s.classList.remove("active"));
    document.getElementById(id).classList.add("active");
    window.scrollTo(0,0);
}

// ------------ Trivia Juego ------------
const preguntas=[
    {pregunta:"¿Cuál fue el primer álbum solista de Harry Styles?", opciones:["Fine Line","Harry Styles","Harry’s House"], correcta:"Harry Styles"},
    {pregunta:"¿De qué banda formó parte?", opciones:["Coldplay","One Direction","Maroon 5"], correcta:"One Direction"},
    {pregunta:"¿Qué canción incluye la frase 'You know it's not the same as it was'?", opciones:["Watermelon Sugar","As It Was","Sign of the Times"], correcta:"As It Was"}
];
let indice=0; let puntuacion=0;
function mostrarPregunta(){
    const cont=document.getElementById('pregunta-container');
    if(indice<preguntas.length){
        const p=preguntas[indice];
        cont.innerHTML=`<div class='pregunta'><strong>${p.pregunta}</strong></div>`+
        p.opciones.map(op=>`<div class='opcion' onclick='verificar("${op}")'>${op}</div>`).join("");
    }else{
        cont.innerHTML=`<h3>Juego terminado 🎉</h3><p>Tu puntuación final es: ${puntuacion}/${preguntas.length}</p>`;
    }
}
function verificar(respuesta){
    if(respuesta===preguntas[indice].correcta){puntuacion++; document.getElementById('puntuacion').textContent=puntuacion;}
    indice++; mostrarPregunta();
}
mostrarPregunta();

// ------------ Formulario Avanzado ------------
document.getElementById('advancedForm').addEventListener('submit', function(e){
    e.preventDefault();
    const nombre=document.getElementById('nombreAdv').value.trim();
    const correo=document.getElementById('correoAdv').value.trim();
    const pass=document.getElementById('passAdv').value.trim();
    const edad=document.getElementById('edadAdv').value;
    const fecha=document.getElementById('fechaAdv').value;
    const genero=document.querySelector('input[name="generoAdv"]:checked');
    const merch=document.querySelectorAll('input[name="merchAdv"]:checked');
    const album=document.getElementById('albumAdv').value;
    const razon=document.getElementById('razonAdv').value.trim();

    if(nombre.length<3){alert("El nombre debe tener al menos 3 caracteres."); return;}
    if(pass.length<6){alert("La contraseña debe tener al menos 6 caracteres."); return;}
    if(!genero){alert("Selecciona un género."); return;}
    if(merch.length===0){alert("Selecciona al menos un tipo de merch."); return;}
    if(album===""){alert("Selecciona un álbum."); return;}
    if(razon.length<20){alert("La razón debe tener al menos 20 caracteres."); return;}

    document.getElementById('msgSuccess').style.display='block';
    this.reset();
});
</script>
</body>
</html>
