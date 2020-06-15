<div class="row">

      <div class="col-12 col-md-6">      
            <div class="card border border-dark bg-light">
                      <h5 class="card-header">Casos sospechosos Vs. Casos Positivos.</h5>
                      <div class="card-body">
                        
                      <div class="mt-9" id="g1" style="height: 450px;"></div>

                    <div class="form-row mb-4">
                      <div class="form-group col-12 col-sm-5 ml-1">
                        <label for="nombre">Fecha Inicial:</label>
                        <input type="date" name="fini" id="finig1" min="1000-01-01" max="3000-12-31" class="form-control">
                      </div>

                      <div class="form-group col-12 col-sm-5 ml-1">
                        <label for="apellidos">Fecha Final:</label>
                        <input type="date" name="fend" id="fendg1" min="1000-01-01" max="3000-12-31" class="form-control">
                      </div>

                      <div class="col-12 col-md-3 ml-1">
                        <button type="submit" id="sendg1" class="btn btn-primary btn-block mb-2">
                          <i class="fas fa-location-arrow pr-1"></i>Consultar</button>
                      </div>

                    </div>
                      </div>
            </div> 
      </div>

      <div class="col-12 col-md-6">
          <div class="card border border-dark bg-light">
                      <h5 class="card-header">Pacientes COVID-19 positivos por fechas.</h5>
                      <div class="card-body">
                      <div class="mt-9" id="g2" style="height: 450px;"></div>

                    <div class="form-row mb-4">
                      <div class="form-group col-12 col-sm-5 ml-1">
                        <label for="nombre">Fecha Inicial:</label>
                        <input type="date" name="fini" id="finig2" max="3000-12-31" min="1000-01-01" class="form-control">
                      </div>

                      <div class="form-group col-12 col-sm-5 ml-1">
                        <label for="apellidos">Fecha Final:</label>
                        <input type="date" name="fend" id="fendg2" min="1000-01-01" max="3000-12-31" class="form-control">
                      </div>

                      <div class="col-12 col-md-3 ml-1">
                        <button type="submit" id="sendg2" class="btn btn-primary btn-block mb-2">
                          <i class="fas fa-location-arrow pr-1"></i>Consultar</button>
                      </div>
                    </div>
                      </div>
          </div>
      </div>

      <div class="col-12 col-md-6">         
            <div class="card border border-dark bg-light">
                      <h5 class="card-header">Pacientes COVID-19 positivos por fechas.</h5>
                      <div class="card-body">
                      <div class="mt-9" id="g3" style="height: 450px;"></div>

                    <div class="form-row mb-4">
                    <div class="form-group col-12 col-sm-5 ml-1">
                      <label for="nombre">Fecha Inicial:</label>
                      <input type="date" name="fini" id="finig3" max="3000-12-31" min="1000-01-01" class="form-control">
                    </div>

                    <div class="form-group col-12 col-sm-5 ml-1">
                      <label for="apellidos">Fecha Final:</label>
                      <input type="date" name="fend" id="fendg3" min="1000-01-01" max="3000-12-31" class="form-control">
                    </div>

                    <div class="col-12 col-md-3 ml-1">
                      <button type="submit" id="sendg3" class="btn btn-primary btn-block mb-2">
                        <i class="fas fa-location-arrow pr-1"></i>Consultar</button>
                    </div>
                    </div>
                      </div>
            </div>
      </div>

</div>


<!-- Funciones de las graficas -->
<script src="graficas.js"></script>