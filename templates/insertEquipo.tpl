{include 'head.tpl'}
{include 'header.tpl'}
<
{if {$isLogged} }
    <div class="container-form">
        <div class="col-md-5 col-lg-8">
            <h4 class="mb-3">insertar Equipo</h4>
            <form class="needs-validation" method="post"
                action="createEquipo" novalidate>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="nombre_equipo" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre_equipo" name="nombre_equipo"
                            placeholder="boca juniors" value="" required>
                    </div>
                </div>
                <br>
                <br>
                <div class="row g-3">
                  
                        <input type="number" class="form-control" id="id_equipo" name="id_equipo"
                            hidden>
                   
                </div>
                <br>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="año_fundado" class="form-label">Año fundación</label>
                        <input type="number" class="form-control" id="year_fundado" name="year_fundado" 
                        placeholder="1907" value="" required>
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="ciudad" class="form-label">Ciudad</label>
                        <input type="text" class="form-control" id="ciudad" name="ciudad"
                            placeholder="buenos aires" value="" required>
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="biografia" class="form-label">Biografia <span class="text-muted"></span></label>
                        <input type="text" class="form-control" id="biografia" name="biografia"
                            placeholder="datos del equipo" value="">
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="imagen_url" class="form-label">Imagen URL <span class="text-muted"></span></label>
                        <input type="text" class="form-control" id="imagen_url" name="imagen_url"
                            placeholder="" value="">
                    </div>
                </div>
                <br>
                <button class="w-50 btn btn-primary btn-lg" type="submit">Agregar jugador</button>
            </form>
        </div>
    </div>
{/if}
{include 'footer.tpl'}