
<div class="panel panel-primary" id="portafoliod">
  <div class="panel-heading">
    <h3 class="panel-title">Portfolio</h3>
  </div>
  <div class="panel-body">
      {{listaArchivos}}

  </div>
</div>
 <script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
        $('#miTabla').DataTable();
    });
</script>
<script type="text/javascript">
$(".rate").on("click",function(){
    var star = $(this).attr("data-value");
    $.ajax({
        url: "../controladores/votar.php?idPortafolio = 7",
        type: "post",
        data: {numero:star},
        beforeSend:function(){
            console.log("uno");
        },
        success:function(data){
            console.log("dos"+data);
        }
    });
});
</script>
