<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>HOLA MUNDO</h1>
    {{auth()->user()->name}}
    <form method="POST" action="{{route('cerrar_sesion')}}">
        @csrf
        <input type="submit" value="cerrar_sesion">
    </form>
</body>
</html>
