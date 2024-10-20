{include 'head.tpl'}
{include 'header.tpl'}
<div class="players">
    <div class="card" style="width: 16rem;">
        <img src="{$jugador->imagen_url}" class="card-img-top">

        <div class="card-body">
            <h5 class="card-title">{$jugador->nombre_jugador}</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Equipo: {$jugador->nombre_equipo}</li>
            <li class="list-group-item">Equipo ID: {$jugador->id_equipo}</li>
            <li class="list-group-item">Numero: {$jugador->id_jugador}</li>
            <li class="list-group-item">Edad: {$jugador->edad}</li>
            <li class="list-group-item">Posicion: {$jugador->posicion}</li>
            <li class="list-group-item">Biografia: {$jugador->biografia}</li>
            <li class="list-group-item">Imagen URL: {$jugador->imagen_url}</li>
        </ul>
    </div>
</div>
{if isset($admin) && $admin == "S"}
    <div class="container-form">
        <div class="col-md-5 col-lg-8">
            <h4 class="mb-3">Modificar jugador</h4>
            <form class="needs-validation" method="post"
                action="updatePlayer/{$jugador->nombre_equipo}/{$jugador->id_jugador}" novalidate>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="nombre_jugador" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre_jugador" name="nombre_jugador"
                            placeholder="{$jugador->nombre_jugador}" value="" required>
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="nombre_equipo" class="form-label">Equipo</label>
                        <input type="text" class="form-control" id="nombre_equipo" name="nombre_equipo"
                            placeholder="{$jugador->nombre_equipo}" value="" required>
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="id_jugador" class="form-label">Numero</label>
                        <input type="number" class="form-control" id="id_jugador" name="id_jugador"
                            placeholder="{$jugador->id_jugador}" value="" required>
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="edad" class="form-label">Edad</label>
                        <input type="number" class="form-control" id="edad" name="edad" placeholder="{$jugador->edad}"
                            value="" required>
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="posicion" class="form-label">Posicion</label>
                        <input type="text" class="form-control" id="posicion" name="posicion"
                            placeholder="{$jugador->posicion}" value="" required>
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="biografia" class="form-label">Biografia <span class="text-muted"></span></label>
                        <input type="text" class="form-control" id="biografia" name="biografia"
                            placeholder="{$jugador->biografia}" value="">
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="imagen_url" class="form-label">Imagen URL <span class="text-muted"></span></label>
                        <input type="text" class="form-control" id="imagen_url" name="imagen_url"
                            placeholder="{$jugador->imagen_url}" value="">
                    </div>
                </div>
                <br>
                <button class="w-50 btn btn-primary btn-lg" type="submit">Modificar jugador</button>
            </form>
        </div>
    </div>
{/if}
{include 'footer.tpl'}