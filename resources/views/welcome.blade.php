<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <a href="https://facebook.com">Salta</a>
    
    <a href="{{ url('/correo') }}">URL</a>
    <a href="{{ path('mi_ruta') }}">URL</a>

    <form action="/correo" method="post">
    @csrf
        <label for="">Ingrese su correo</label>
        <input type="email" name="correo">

        <label for="">Ingrese su correo</label>
        <textarea name="mensaje" ></textarea>

        <input type="submit" value="Enviar Correo">
        
    </form>

</body>
</html>