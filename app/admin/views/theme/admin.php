<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title></title>
    <!--     <link rel="stylesheet" href="<?php echo baseUrl ?>assets/bower/jasny-bootstrap/dist/css/jasny-bootstrap.min.css">
    -->
  <link rel="stylesheet" href="<?php echo baseUrl ?>assets/bower/bootstrap-theme-paper/paper.css">
 
    <link rel="stylesheet" href="<?php echo baseUrl ?>assets/bower/components-font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo baseUrl ?>assets/bower/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo baseUrl ?>assets/bower/bootstrap-side-navbar/source/assets/stylesheets/navbar-fixed-side.css">
    <script src="<?php echo baseUrl ?>assets/bower/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?php echo baseUrl ?>assets/bower/bootstrap-table/dist/bootstrap-table.min.css">

    <script src="<?php echo baseUrl ?>assets/bower/bootstrap-table/dist/bootstrap-table.min.js"></script>
    <style>
    .table {
    border-bottom:0px !important;
    }
    .table th, .table td {
    border: 1px !important;
    }
    .fixed-table-container {
    border:0px !important;
    }


input[type="button"] {
  transition: all .3s;
    border: 1px solid #ddd;
    padding: 3px 10px;
    text-decoration: none;
    border-radius: 5px;
  font-size: 15px;
}

input[type="button"]:not(.active) {
  background-color:transparent;
}

.active {
  background-color: #299BFF;
  color :#fff;
}

input[type="button"]:hover:not(.active) {
  background-color: #ddd;
}

</style>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-lg-2">
          <nav class="navbar navbar-default navbar-fixed-side">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                <img style="width: 47px;" id="profile-img" class="profile-img-card" src="" />Banco Sangre</a>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="<?php echo baseUrl ?>">HOME</a></li>
                  <li><a href="<?php echo baseUrl ?>admin/bancoPersonal">PERSONAL</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                    <a class="fa fa-cog" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a class="fa fa-sign-out" href="<?php echo baseUrl ?>auth/login/logout">Salir</a></li>
                    </ul>
                  </li>
                </ul>
                </div><!--/.nav-collapse -->
              </div>
            </nav>
          </div>
          <div class="col-sm-9 col-lg-10">
            <br>
            <?php echo $content ?>
          </div>
        </div>
      </div>
      <!-- /container -->
      <!-- MENSAJES FLASH SWEET ALERT 2 -->
      <?php if (Message::hasMessages()): ?>
      <?php echo Message::show() ?>
      <?php endif ?>

      <?php if (Message::hasQuestion()): ?>
      <?php echo Message::showQuestion() ?>
      <?php endif ?>
      <script src="<?php echo baseUrl ?>assets/bower/jquery/dist/jquery.slim.min.js"></script>
      <script src="<?php echo baseUrl ?>assets/bower/bootstrap/dist/js/bootstrap.min.js"></script>
      <script src="<?php echo baseUrl ?>assets/bower/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
      <script type="text/javascript">

// get the table element
var $table = document.getElementById("tablePagination"),
// number of rows per page
$n = 5,
// number of rows of the table
$rowCount = $table.rows.length,
// get the first cell's tag name (in the first row)
$firstRow = $table.rows[0].firstElementChild.tagName,
// boolean var to check if table has a head row
$hasHead = ($firstRow === "TH"),
// an array to hold each row
$tr = [],
// loop counters, to start count from rows[1] (2nd row) if the first row has a head tag
$i,$ii,$j = ($hasHead)?1:0,
// holds the first row if it has a (<TH>) & nothing if (<TD>)
$th = ($hasHead?$table.rows[(0)].outerHTML:"");
// count the number of pages
var $pageCount = Math.ceil($rowCount / $n);
// if we had one page only, then we have nothing to do ..
if ($pageCount > 1) {
  // assign each row outHTML (tag name & innerHTML) to the array
  for ($i = $j,$ii = 0; $i < $rowCount; $i++, $ii++)
    $tr[$ii] = $table.rows[$i].outerHTML;
  // create a div block to hold the buttons
  $table.insertAdjacentHTML("afterend","<div id='buttons'></div");
  // the first sort, default page is the first one
  sort(1);
}

// ($p) is the selected page number. it will be generated when a user clicks a button
function sort($p) {
  /* create ($rows) a variable to hold the group of rows
  ** to be displayed on the selected page,
  ** ($s) the start point .. the first row in each page, Do The Math
  */
  var $rows = $th,$s = (($n * $p)-$n);
  for ($i = $s; $i < ($s+$n) && $i < $tr.length; $i++)
    $rows += $tr[$i];
  
  // now the table has a processed group of rows ..
  $table.innerHTML = $rows;
  // create the pagination buttons
  document.getElementById("buttons").innerHTML = pageButtons($pageCount,$p);
  // CSS Stuff
  document.getElementById("id"+$p).setAttribute("class","active");
}


// ($pCount) : number of pages,($cur) : current page, the selected one ..
function pageButtons($pCount,$cur) {
  /* this variables will disable the "Prev" button on 1st page
     and "next" button on the last one */
  var $prevDis = ($cur == 1)?"disabled":"",
    $nextDis = ($cur == $pCount)?"disabled":"",
    /* this ($buttons) will hold every single button needed
    ** it will creates each button and sets the onclick attribute
    ** to the "sort" function with a special ($p) number..
    */
    $buttons = "<input type='button' value='&lt;&lt; Prev' onclick='sort("+($cur - 1)+")' "+$prevDis+">";
  for ($i=1; $i<=$pCount;$i++)
    $buttons += "<input type='button' id='id"+$i+"'value='"+$i+"' onclick='sort("+$i+")'>";
  $buttons += "<input type='button' value='Next &gt;&gt;' onclick='sort("+($cur + 1)+")' "+$nextDis+">";
  return $buttons;
}
</script>
    </body>
  </html>