<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ingreso de datos</title>
</head>
<body>
    <h1>Formulario para ingresar información a la base de datos</h1>
    <form action="{{ route('store') }}" method="POST">
        @csrf
        {{-- Elija empresa:
        <select name="empresa" id="#">
            @foreach($datos_empresas as $empresas)
                <option value="{{ $empresas->id_empresas }}">{{ $empresas->nombre_empresas }}</option>
            @endforeach
        </select> --}}
        <br/>
        <br/>
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
        Venta:
        <input type="number" name="valor" size="10">
        <br/><br/>
        Fecha:
        <input type="date" name="fecha">
        <br/><br/>
        <input type="submit" value="Agregar venta">
    </form>
    <br/><br/>
    <a href={{ route('index') }} >A consultas</a>
    
</body>
</html>