<!DOCTYPE html>
<html>
<head>
<title>Video LLamda</title>
</head>
<body>
<!-- jQuery -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<!-- Opentok -->
<script src="http://static.opentok.com/v0.91/js/TB.min.js"></script>
<!-- Sesión -->
<script type="text/javascript">
   var apiKey = '<?=API_Config::API_KEY?>';
   var sessionId = '<?=$sessionId?>';
   var token = '<?=$token?>';
   TB.setLogLevel(TB.DEBUG);
   var session = TB.initSession(sessionId);
   session.addEventListener('sessionConnected', sessionConnectedHandler);
   session.addEventListener('streamCreated', streamCreatedHandler);
   session.connect(apiKey, token);
   var publisher;
   function sessionConnectedHandler(event) {
      var publishProps = {height:120, width:161};
      publisher = TB.initPublisher(apiKey, 'TokVideoStreamUsuario', publishProps);
      session.publish(publisher);
      subscribeToStreams(event.streams);
   }
   function streamCreatedHandler(event) {
      subscribeToStreams(event.streams);
   }
   function subscribeToStreams(streams) {
      for (var i = 0; i < streams.length; i++) {
         if (streams[i].connection.connectionId == session.connection.connectionId) {
            return;
         }
         var divid = 'stream' + streams[i].streamId;
         $("#TokVideoStreamOtrosUsuarios").html("<div id='stream"+streams[i].streamId+"'></div>");
         var publishProps = {height:361, width:482};
         session.subscribe(streams[i], divid);
      }
   }
</script>
<!-- Como me ven a mi otros usuarios -->
<div id="TokVideoStreamUsuario"></div>
<br/><br/>
<!-- Vista de otros usuarios -->
<div id="TokVideoStreamOtrosUsuarios"></div>
</body>
<html>