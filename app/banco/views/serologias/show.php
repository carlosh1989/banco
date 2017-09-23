<div id="panel" class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title text-muted"><i class="fa fa-user fa-2x"></i><i class="fa fa-tint"></i>
    HISTORIAL DE SEROLOGÍA DE <b><?php echo strtoupper($donante->nombre_apellido) ?>
    </b></h3>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-8 col-md-offset-4">
        <div class="col-md-3 col-md-offset-4">
          <a class="btn btn-primary" href="#"><i class="fa fa-calendar"></i> DÍAS LIMITE</a>
        </div>
        <div class="col-md-4 col-md-offset-0">
          <a class="btn btn-default animated fadeIn" href="<?php echo baseUrl ?>banco/serologias/create/<?php echo $donante->id ?>">  <i class="fa fa-plus text-primary"></i> Agregar Nueva Serología</a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-condensed table-responsive animated fadeIn" data-striped="true">
          <thead>
            <tr class="bg-primary text-white">
              <th>Responsable</th>
              <th>VIH</th>
              <th>HBSAG</th>
              <th>ANTIVHC</th>
              <th>SIFILIS</th>
              <th>CHAGAS</th>
              <th>Fecha</th>
              <th>Días</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $count = 0;
            $serologia = $donante->serologias;
            ?>
            <?php foreach ($serologia as $se): ?>
            <?php
            if($count == 0)
            {
            $primero = 'bg-success text-white';
            }
            else
            {
            $primero = "";
            }
            ?>
            <tr class="<?php echo $primero ?>">
              <td width="35%"><?php echo $se->responsable ?></td>
              <td width="10%"><?php echo $se->VIH ?></td>
              <td width="10%"><?php echo $se->HBSAG ?></td>
              <td width="10%"><?php echo $se->ANTIVHC ?></td>
              <td width="10%"><?php echo $se->SIFILIS ?></td>
              <td width="10%"><?php echo $se->CHAGAS ?></td>
              <td width="25%">
                <?php echo $se->fecha ?>
              </td>
              <td width="5%">
                <script type="text/javascript">
                $( "#myModalOkTiempo" ).click(function() {
                alert( "Handler for .click() called." );
                });
                $( document ).ready(function() {
                $( "#target" ).click(function() {
                alert( "Handler for .click() called." );
                });
                })
                </script>
                <?php
                $end_Date=$se->fecha;
                $end = \Carbon\Carbon::parse($end_Date);
                $now = \Carbon\Carbon::now();
                $lengthFromEnd = $end->diffInDays($now);
                ?>
                <?php if ($count == 0): ?>
                <?php if ($lengthFromEnd <= 90): ?>
                <button id="#target" style="font-size: 1em;" class="btn btn-success pull-right oktime"><b><i class="fa fa-calendar-check-o"></i> <?php echo $lengthFromEnd ?></b></button>
                <?php else: ?>
                <button id="#target" style="font-size: 1em;" class="btn btn-default pull-right badtime"><b><i class="fa fa-calendar-times-o"></i> <?php echo $lengthFromEnd ?></b></button>
                <?php endif ?>
                <?php else: ?>
                <b class="pull-right" href="#"><i class="fa fa-calendar-times-o"></i> <?php echo $lengthFromEnd ?></b>
                <?php endif ?>
              </td>
            </tr>
            <?php $count = $count + 1; ?>
            <?php endforeach ?>
          </tbody>
        </table>
        
        <script>
        $( ".oktime" ).click(function() {
        swal(
        'Ok!',
        'El donante en el rango de tiempo.',
        'success'
        )
        });

        $( ".badtime" ).click(function() {
        swal(
        'Upps!',
        'El donante no esta en el rango de tiempo.',
        'error'
        )
        });
        </script>
        <!-- Modal -->
        <div id="myModalOkTiempo" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <p><b class="fa fa-check text-success fa-2x"></b> El paciente esta adentro del rango acordado.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal -->
        <div id="myModalBadTiempo" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <p><b class="fa fa-times text-danger fa-2x"></b> El paciente no esta adentro del rango acordado.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>