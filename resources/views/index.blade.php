<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabla inicial</title>
</head>
<body>
    <h1>Elegir datos para mostrar</h1>
    <form action="{{ route('show') }}" method="POST">
        @csrf
        
        Elija punto de venta:
        <select name="punto_venta" id="#">
            @foreach($datos_puntovta as $puntovta)
                <option value="{{ $puntovta->codigo_punto }}">
                    {{ $puntovta->nombre_puntovta }} 
                </option>

            @endforeach
        </select>
        <br/>
        <br/>
        Elije la fecha de la consulta
        <input type="date" name="fecha">
        <br/><br/>
        <input type="submit" value="Mostrar consulta">
    </form>
    <br/><br/>
    <a href={{ route('create') }}>Ingresar un dato</a>
    
</body>
</html>