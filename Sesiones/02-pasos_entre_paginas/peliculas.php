
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elige la película</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header id="encabezado">
        <div id="mitad_encabezado">
            <img src="imgs/labutacasocial.png" id="logo">
        </div>
        <nav id="navegacion">
            <h1 id="titulo">Bienvenid@ al cine</h1>
        </nav>
    </header>
    <main>
    <form action="butacas.php" method="post">
    <!-- Para que los botones de radio sean únicos, deben compartir el mismo name
        mientras que value=""  es lo que se envía a través del servidor -->
        <label for="peliculas">
        1. Kimetsu No Yaiba 
        <input type="radio" name="pelicula" value="kimetsu">
        <br>
        2. Chainsawman 
        <input type="radio" name="pelicula" value="chainsawman">
        <br>
        3. Django 
        <input type="radio" name="pelicula" value="django">
        </label>
        <br>
        <input type="submit" value="Hora de elegir la Butaca">
    </form>
    </main>
    <section>
        <div id="peliculas">
            <h2> Película 1: Kimetsu </h2>
            <img src="imgs/kimetsu_peli.webp" class="peli_img">
        </div>
        <div id="peliculas">
            <h2> Película 2:  Chainsawnman </h2>
            <img src="imgs/chainsawman_peli.webp" class="peli_img">
        </div>
        <div id="peliculas">
            <h2> Película 3: Django </h2>
            <img src="imgs/django_peli.jpg" class="peli_img">
        </div>
    </section>
</body>
</html>