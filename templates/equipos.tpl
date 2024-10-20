{include 'head.tpl'}
{include 'header.tpl'}

<div class="cont-main">
  <ol class="list-group list-group-numbered">
    {foreach from=$equipos item=equipo}<div class="card" style="width: 18rem;">
        <div class="card" style="width: 18rem;">
          <img src="" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">{$equipo->nombre_equipo}</h5>
            <p class="card-text"> El club {$equipo->nombre_equipo} Fue fundado en {$equipo->ciudad} en el año
              {$equipo->year_fundado} </p>
            <a href="#" class="btn btn-primary">Ver Jugadores</a>
            <a href="editar/<?php echo($equipos->id_equipo) ?>" type="submit" class="btn btn-success">Editar</a>
            <a href="eliminar/<?php echo($equipos->id_equipo) ?>" type="submit" class="btn btn-danger">Borrar</a>
          </div>
        </div>
      {/foreach}
  </ol>
</div>
</main>

{include 'footer.tpl'}