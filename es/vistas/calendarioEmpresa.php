<?php
  // include("plantilla/Plantilla.php");
  // include("fragmento/NavBarL-Empre.php");
  include("plantilla/planti.php");
  include("fragmento/navbar-empre.php");
 ?>
<head>
<meta charset='utf-8' />
<link href='recursos/Full_calendar/fullcalendar/fullcalendar.css' rel='stylesheet' />
<link href='recursos/Full_calendar/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='recursos/Full_calendar/fullcalendar/lib/moment.min.js'></script>
<script src='recursos/Full_calendar/fullcalendar/lib/jquery.min.js'></script>
<script src='recursos/Full_calendar/fullcalendar/lib/jquery-ui.custom.min.js'></script>
<script src='recursos/Full_calendar/fullcalendar/fullcalendar.min.js'></script>
<script src='recursos/Full_calendar/fullcalendar/lang/es.js'></script>




<script>

	ver= calendar = $(document).ready(function() {
		defaultView: 'agendaWeek',
		$('#calendar').fullCalendar({
			header: {

				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek'
			},
			editable: false,
			events: {
                url: '../controladores/Evento_mostrar.php',
                type: 'GET',
                error: function() {
                    alert('Error con la base de datos');
            }
        }
		});

	});

</script>

</head>
<body>

<center>
    <div id="clanedary" class="row">
        <div class="col-md-7">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Calendario</h3>
              <a href="#" class="text-default dropdown-toggle" id="deE" data-toggle="dropdown"><i class="fa fa-cogs"></i></a>
                <ul class="dropdown-menu" id="enfren">
                    <li><a href="../controladores/verEventosLista.php"><i class="fa fa-eye"></i> Ver lista de mis eventos</a></li>
                </ul>
          </div>
          <div class="panel-body">
            <div id='calendar'></div>
          </div>
        </div>
      </div>
    </div>

    </center>
</body>
