<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Tiene una nueva consulta en la página</h1>
    <h2>Asunto: {{$consulta->subject}}</h2>
    <h2>Nombre: {{$consulta->name}}. Email: {{$consulta->email}}</h2>
    <h2>Mensaje:</h2>
    <p>{{$consulta->message}}</p>
  </body>
</html>
