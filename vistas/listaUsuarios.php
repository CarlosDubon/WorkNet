<div class="panel panel-primary">    
    <div class="panel-heading">        
        <h3 class="panel-title"><p class="text-center">Usuarios</p></h3>        
    </div>
    <div class="panel-body">
      {{listaUsuarios}}
    </div>
</div>
<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
        $('#miTabla').DataTable();
    });
</script>
