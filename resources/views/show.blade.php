<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
    {{-- <script src="resources/tableToExcel.js"></script> --}}
    <title>Mostrar consulta</title>
</head>
<body>
    <h1>Mostrar consulta</h1>
    <table border="1" id="tabla">
        <caption>Mostrar consulta por fecha agrupado por punto</caption>
        <tr>
            <th>Nombre empresa</th><th>Nit Empresa</th><th>Código punto venta</th><th>Fecha</th>
            <th>Total venta</th>
        </tr>
        @foreach($datos as $dato)
            <tr>
                <th>{{ $dato->nombre_empresa }}</th>
                <th>{{ $dato->id_empresa }}</th>
                <th>{{ $dato->codigo_puntovta }}</th>
                <th>{{ $dato->fecha }}</th>
                <th>{{ $dato->total_venta }}</th>
            </tr>
        @endforeach
    </table>
    <br/><br/>
    <input type="button" onclick="descargarExcel()" value="Exportar tabla en Excel">
    {{-- <input type="button" onclick="prueba()" value="Exportar tabla en Excel"> --}}
    <br/><br/>
    {{-- <script>
        function prueba() {
            console.log( "Ejecutando función prueba()" );
}
    </script> --}}

    <script>
        function descargarExcel(){
        //Creamos un Elemento Temporal en forma de enlace
        var tmpElemento = document.createElement('a');
        // obtenemos la información desde el div que lo contiene en el html
        // Obtenemos la información de la tabla
        var data_type = 'data:application/vnd.ms-excel';
        var tabla_div = document.getElementById('tabla');
        var tabla_html = tabla_div.outerHTML.replace(/ /g, '%20');
        tmpElemento.href = data_type + ', ' + tabla_html;
        //Asignamos el nombre a nuestro EXCEL
        tmpElemento.download = 'Nombre_De_Mi_Excel.xls';
        // Simulamos el click al elemento creado para descargarlo
        tmpElemento.click();
    }
    </script>

    <a href={{ route('index') }}>A consulta</a>
</body>
</html>