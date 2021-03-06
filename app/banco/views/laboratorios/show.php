<div id="panel" class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title text-muted"><i class="fa fa-eyedropper fa-2x"></i> LABORATORIO</h3>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-lg-4 animated fadeIn">
        <table class="table table-user-information panel panel-default animated fadeIn">
          <tbody>
            <tr>
              <td style="background: #E0E0E0;"><b><i class="fa fa-address-card-o"></i> Razon social:</b></td>
              <td><?php echo ucwords($laboratorio->razon_social) ?></td>
            </tr>
            <tr>
              <td style="background: #E9E9E9;"><b><i class="fa fa-envelope"></i> Email:</b></td>
              <td><?php echo $laboratorio->email ?></td>
            </tr>
            <tr>
              <td style="background: #E0E0E0;"><b><i class="fa fa-volume-control-phone"></i> Telefono:</b></td>
              <td><?php echo $laboratorio->telefono ?></td>
            </tr>
            <tr>
              <td style="background: #E9E9E9;"><b><i class="fa fa-map-signs"></i> Dirección:</b></td>
              <td><?php echo $laboratorio->direccion ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-lg-4 animated fadeIn">
        <?php if ($laboratorio->laboratorio_imagenes): ?>
        <a class="example-image-link" href="<?php echo $laboratorio->laboratorio_imagenes->first()->imagen_grande ?>" data-lightbox="example-set"><img class="example-image img-responsive" src="<?php echo $laboratorio->laboratorio_imagenes->first()->imagen_medio ?>" alt=""/></a>
        <?php else: ?>
        <h4>No hay imagenes</h4>
        <?php endif ?>
      </div>
      <div class="col-lg-4 animated fadeIn">
        <div id="map"></div>
        <script>
        function initMap() {
        var uluru = {lat: <?php echo $laboratorio->lat ?>, lng: <?php echo $laboratorio->lng ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 17,
        center: uluru
        });
        var marker = new google.maps.Marker({
        position: uluru,
        map: map
        });
        }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJAW7MQOeI2ZgWp58Zdphfa9F7AQy3YRI&callback=initMap&libraries=places"
        async defer></script>
        
      </div>
    </div>
    <hr>
    <?php if ($laboratorio->laboratorio_personal): ?>
    <div class="panel panel-default animated fadeIn">
      <div class="panel-heading">
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-6">
              <h3 class="panel-title text-primary"><i class="fa fa-user-secret fa-2x text-primary"></i> PERSONAL</h3>
            </div>
            <div class="col-md-6">
              <a class="btn btn-default pull-right animated fadeIn" href="<?php echo baseUrl ?>banco/laboratoriosPersonal/create/<?php echo $laboratorio->id ?>">  <i class="fa fa-plus text-primary"></i> Agregar Personal</a>
            </div>
          </div>
        </div>
      </div>
      <div class="panel-body">
        <table class="table table-striped table-condensed table-responsive" data-striped="true">
          <thead>
            <tr class="">
              <th><i class="fa fa-address-card-o"></i> Nombre</th>
              <th><i class="fa fa-envelope"></i> Email</th>
              <th><i class="fa fa-volume-control-phone"></i> Telefono</th>
              <th><i class="fa fa-eye"></i> Ver</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($laboratorio->laboratorio_personal as $c): ?>
            <tr>
              <td><?php echo $c->nombre_apellido ?></td>
              <td><?php echo $c->usuario->email ?></td>
              <td><?php echo $c->telefono_celular ?></td>
              <td width="15%">
                <a class="btn btn-default" href="<?php echo baseUrl ?>banco/laboratoriosPersonal/<?php echo $c->id ?>"><i class="fa fa-search text-primary"></i></a>
              </td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
        <?php else: ?>
        <h3>no Hay</h3>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>