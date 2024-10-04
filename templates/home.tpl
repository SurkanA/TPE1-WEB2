{include 'header.tpl'}

<h1>Equipos</h1>

{foreach from=$equipos item=equipo}

<div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{$equipo->nombre_equipo}</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
  </div>
    

{/foreach}


{include 'footer.tpl'}