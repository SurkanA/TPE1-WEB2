<?php

require_once 'libs/Smarty/Smarty.class.php';

class EquiposView
{

    private $smarty;

    public function __construct()
    {
        $authHelper = new AuthHelper();
        $admin = $authHelper->isLogged();

        $this->smarty = new Smarty();
        $this->smarty->assign('base', BASE_URL);
        $this->smarty->assign('admin', $admin);
    }

    public function mostrarEquipos($equipos)
    {
        $this->smarty->assign('equipos', $equipos);
        $this->smarty->display('equipos.tpl');
    }
    /*  public function xmostrarTareas($equipos) {
          require_once 'templates/header.php';
              ?>
              <div class="container mt-2">
                  <section>
                      <h4>Lista de tareas</h4>
                  </section>
                  <section>
                  <form method="post" action="nuevaTarea">
                          <div class="mb-3">
                              <label for="exampleInputdescripcion1" class="form-label">Descripción</label>
                              <input  
                                      type="text" 
                                      class="form-control" 
                                      id="descripcion" name="descripcion" >
                          </div>
                          <div class="row">
                              <div class="col">
                                  <label for="exampleInputdescripcion1" class="form-label">Terminada</label>
                                  <select class="form-select" name="terminada">
                                      <option value="N" selected>No</option>
                                      <option value="S">Si</option>
                                  </select>                    
                              </div>
                              <div class="col">
                                  <label for="exampleInputdescripcion1" class="form-label">Prioridad</label>
                                  <input type="range" class="form-range" min="0" max="5" id="prioridad" name="prioridad">
                              </div>
                          </div>
                          <div class="row m-2">
                              <button type="submit" class="btn btn-primary">Agregar</button>
                          </div>
                      </form>            

                  </section>
                  <section>
                      <table class="table table-striped">
                      <tr>
                          <th>ID</th>
                          <th>Descripcion</th>
                          <th>Terminada</th>
                          <th>Prioridad</th>
                          <th></th>
                      </tr>
                      <?php
                      foreach ($tareas as $tarea) {
                      ?>    
                          <tr>
                              <td><?php echo($tarea->id) ?></td>
                              <td><?php echo($tarea->descripcion) ?></td>
                              <td><?php if ($tarea->terminada == 'N')
                                          echo "No";
                                      else
                                          echo "Si";
                                          ?></td>
                              <td><?php echo($tarea->prioridad) ?></td>
                              <td><a href="editar/<?php echo($tarea->id) ?>"type="submit" class="btn btn-success">Editar</a>
                                  <a href="eliminar/<?php echo($tarea->id) ?>" type="submit" class="btn btn-danger">Borrar</a></td>
                          </tr>
                      <?php } ?>
                  </table>
                  </section>
              </div>
          </body>
          </html>
          <?php
      }
  */
    public function showEditForm($equipos)
    {
        require_once 'templates/header.php';
        ?>

        <div class="container mt-2">
            <section>
                <h4>Lista de tareas</h4>
            </section>
            <section>
                <form method="post" action="modificar">
                    <div class="mb-3">
                        <label for="exampleInputdescripcion1" class="form-label">Descripción</label>
                        <input value="<?php echo ($equipos->nombre_equipo) ?>" type="text" class="form-control" id="descripcion"
                            name="descripcion">
                    </div>
                    <input name="id" value=<?php echo ($tarea->id); ?> type="hidden">
        </div>
        <div class="row m-2">
            <button type="submit" class="btn btn-primary">Modificar</button>
        </div>
        </form>
        </div>
        <?php
    }
}