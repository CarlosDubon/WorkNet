<html>
    <head>
        <title>WorkNet</title>        
        <meta charset="utf-8">
        <!-- Agregamos todos los css del proyecto-->
        <link href="../vistas/recursos/css/bootstrap.css" rel="stylesheet">                
        <link href="../vistas/recursos/css/bootstrap.min.css" rel="stylesheet">                

        <link href="../vistas/recursos/css/flat-ui.css" rel="stylesheet">        
        <link href="../vistas/recursos/css/jquery.dataTables.css" rel="stylesheet">         
        <link href="../vistas/recursos/css/chat.css" rel="stylesheet">         
        <link href="../style.css" rel="stylesheet"> 
        <link href="../vistas/recursos/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">  
        
        <!-- Agregamos todos los javascript del proyecto-->
        <script src="../vistas/recursos/js/jquery.js"></script>    
        <script src="../vistas/recursos/js/flat-ui.js"></script>    
        <script src="../vistas/recursos/js/jquery.dataTables.js"></script>    
    </head>
    <body>        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    {{menuSuperior}}                                        
                </div>
            </div>
            <br/><br>            
            <div class="row">
                <div class="col-md-4">
                    {{menuLateral}}                    
                </div>
                <div class="col-md-8">
                    {{contenido}}
                </div>
            </div>
        </div>
    </body>    
</html>
