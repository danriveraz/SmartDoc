<!doctype html><!--Realizado por Daniel Alejandro Rivera, ing-->
<html>
<head>
<meta charset="utf-8">
<title>SmartDoc</title>
</head>
<style> 
.btn {
  -webkit-border-radius: 5;
  -moz-border-radius: 5;
  border-radius: 5px;
  font-family: Arial;
  color: #ffffff;
  font-size: 16px;
  background: #2d0031;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}

.btn:hover {
  background: #5e0166;
  text-decoration: none;
}
</style>
<body>

<div class="_rp_x5 ms-font-weight-regular ms-font-color-neutralDark" id="Item.MessageNormalizedBody" style="font-family: wf_segoe-ui_normal, &quot;Segoe UI&quot;, &quot;Segoe WP&quot;, Tahoma, Arial, sans-serif, serif, EmojiFont;">
  <div class="rps_8dd2">
<div>
  <div style="background-color:white; padding: 15px 0px 50px; margin: 0px; text-align: center; font-family: Arial, Helvetica, sans-serif, serif, EmojiFont;">
<br>
<a href="" target="_blank" rel="noopener noreferrer"><img style="width:70%;" data-imagetype="External" src=""></a> <br>
<br>

<br>
<div style="background-color:#F1F1F1; border:solid 1px #c0c0c0; margin:0 auto; padding:15px; width:90%">
<h2 style="color:#2d0031; font-family: 'Roboto', sans-serif; margin-top:2px;margin-bottom: 5px;">Hola  {{$data->nombrePaciente}}</h2>
<p>¡Tu cita odontológica ha sido modificada! Verificala con los siguientes datos...</p>
<p>Motivo: {{$data->titulo}}</p>
<p>Día: {{$data->fechaInicio}}</p>
<p>Hora: {{$data->hora}}</p>
<p>Doctor: {{$personal->nombreCompleto}}</p>

<br>
<br>
<p>
</div>
<div style="margin:0 auto; width:90%; padding:15px">

</div>
<br>

</div>

</div>
</div></div> <div style="display: none;"></div> 

</body>
</html>