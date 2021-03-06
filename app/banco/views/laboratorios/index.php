<div id="panel" class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title text-muted"><i class="fa fa-eyedropper fa-2x"></i> LABORATORIOS</h3>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <form id="formulario" method="POST" action="<?php echo baseUrl ?>banco/laboratorios/busqueda">
          <?php echo Token::field() ?>
          <div class="col-md-6">
            <div class="col-md-10">
              <input class="form-control" name="razon_social" type="text" id="myInput" onkeyup="myFunction()" placeholder="Nombre de laboratorio..">
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <a class="btn btn-block btn-default animated" href="javascript:{}" onclick="$('#formulario').submit();"><i class="fa fa-search fa-2x text-primary"></i></a>
              </div>
            </div>
          </div>
          </form>
          <div class="col-md-6">
          <div class="col-md-12">
            <a class="btn btn-default pull-right animated fadeIn" href="<?php echo baseUrl ?>banco/laboratorios/create">  <i class="fa fa-plus text-primary"></i> Agregar Laboratorio</a>
          </div>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table id="myTable" class="table table-striped table-condensed animated fadeIn" data-striped="true">
          <thead>
            <tr class="bg-primary text-white">
              <th width="40%"><i class="fa fa-address-card-o"></i> Nombre</th>
              <th><i class="fa fa-envelope"></i> Email</th>
              <th><i class="fa fa-volume-control-phone"></i> Telefono</th>
              <th width="4%"><i class="fa fa-eye"></i> Ver</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($laboratorios as $c): ?>
            <tr>
              <td><?php echo $c->razon_social ?></td>
              <td><?php echo $c->email ?></td>
              <td><?php echo $c->telefono ?></td>
              <td width="15%">
              <a class="btn btn-default" href="<?php echo baseUrl ?>banco/laboratorios/<?php echo $c->id ?>"><i class="fa fa-search text-primary"></i></a>
              </td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
    </div> <!-- /.box-footer-->
  </div>
  <script>
  var options = {
  data: [
  <?php foreach ($laboratorios as $l): ?>
  "<?php echo $l->razon_social ?>",
  <?php endforeach ?>
  ],
    list: {
    showAnimation: {
      type: "fade", //normal|slide|fade
      time: 200,
      callback: function() {}
    },

    hideAnimation: {
      type: "slide", //normal|slide|fade
      time: 200,
      callback: function() {}
    }
  }
  };
  $("#myInput").easyAutocomplete(options);
  </script>
  <script>
  function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
  td = tr[i].getElementsByTagName("td")[0];
  if (td) {
  if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
  tr[i].style.display = "";
  } else {
  tr[i].style.display = "none";
  }
  }
  }
  }
  </script>