{include 'header.tpl'}

<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/TPE1-WEB2/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/TPE1-WEB2/Equipos">Equipos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/TPE1-WEB2/Jugadores">Jugadores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/TPE1-WEB2/login">Login</a>
        </li>
      </ul>
    </div>
</nav>

{*
<h1>Equipos</h1>

{foreach from=$equipos item=equipo}

<div class="card" style="width: 18rem;">
  <img src="{$equipo->imagen_url}" class="card-img-top" alt="Boca Juniors">
  <div class="card-body">
    <h5 class="card-title">{$equipo->nombre_equipo}</h5>
    <p class="card-text">Fundado en {$equipo->ciudad}, en el año {$equipo->year_fundado}.</p>
  </div>
</div>
    
<br>

{/foreach}
*}
{include 'footer.tpl'}