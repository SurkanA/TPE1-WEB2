{include 'head.tpl'}
{include 'header.tpl'}

<div class="cont-main">
<ol class="list-group list-group-numbered">
{foreach from=$jugadores item=jugador}
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Jugador</div>
                    Numero: {$jugador->id_jugador}
                    <br>
                    Nombre: {$jugador->nombre_jugador}
                    <br>
                    Posicion: {$jugador->posicion}
                    <br>
                    Edad: {$jugador->edad}
                    <br>
                    Equipo: {$jugador->id_equipo}
                </div>
                <span class="badge text-bg-primary rounded-pill">{$jugador->id_equipo}</span>
            </li>
        {/foreach}
</ol>
</div>
</main>

{include 'footer.tpl'}