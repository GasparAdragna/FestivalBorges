<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="/css/custom.css" rel="stylesheet">
    <link href="/css/all.min.css" rel="stylesheet">
    <title>Agregar Orador</title>
</head>
<body>
    <div class="container mt-3">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form action="" method="post">
            @csrf
            <div class="form-group">
                <label for="first_name" class="form-label">Nombre</label>
                <input type="text" name="first_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="last_name" class="form-label">Apellido</label>
                <input type="text" name="last_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="location" class="form-label">Location</label>
                <input type="text" name="location" class="form-control">
            </div>
            <div class="form-group">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control">
            </div>
            <div class="form-group">
                <label for="bio" class="form-label">Descripcion</label>
                <textarea name="bio" id="description" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="photo" class="form-label">Foto</label>
                <input type="text" name="photo" class="form-control">
            </div>
            <button class="btn btn-primary">Enviar</button>
        </form>
    </div>
</body>
</html>