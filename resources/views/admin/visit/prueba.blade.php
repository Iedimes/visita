<!DOCTYPE html>
<html>
<head>
    <style>
        hr {
            border-top: 0.5px solid rgb(182, 180, 180);
        }






    </style>
       <center><img src="{{storage_path('images/MUVHG.jpg')}}" class="imagencentro" width="950" height="140"></center>

    </head>
    <div class="card-header">
        <center><h2>REPORTE DE VISITAS</h2></center>
    </div>
<body>

<table style="font-size: 13px;" CELLPADDING=5 CELLSPACING=0 width="750">


        <tr>
        <td style="border: 1px solid">
            <b>N°</b>
        </td>
        <td style="border: 1px solid">
            <b>NOMBRE Y APELLIDO</b>
        </td>
        <td style="border: 1px solid">
            <b>CI N°</b>
        </td>
        <td style="border: 1px solid">
            <b>HORA DE ENTRADA</b>
        </td>
        <td style="border: 1px solid">
            <b>DEPENDENCIA</b>
        </td>

        <td style="border: 1px solid">
            <b>HORA DE SALIDA</b>
        </td>

        </tr>
        @foreach ($visits as $item)
        <tr>
            <td style="border: 1px solid"> {{ $item->id}}</td>
            <td style="border: 1px solid"> {{ $item->Full_Name}} {{ $item->First_Surname}}</td>
            <td style="border: 1px solid"> {{ $item->CI }}</td>
            <td style="border: 1px solid"> {{ $item->Entry_Datetime }}</td>
            <td style="border: 1px solid"> {{ $item->dependency->name }}</td>
            <td style="border: 1px solid"> {{ $item->Exit_Datetime }}</td>
        </tr>
        @endforeach
</table>
<p style="font-weight: bold;">TOTAL DE VISITAS: {{$contar}}</p>
</body>
</html>
