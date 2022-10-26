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
        <center><h2>REPORTE DE AUDIENCIAS</h2></center>
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
            <b>MOTIVO</b>
        </td>
        <td style="border: 1px solid">
            <b>OBSERVACION</b>
        </td>

        <td style="border: 1px solid">
            <b>FECHA Y HORA AGENDADA</b>
        </td>

        </tr>
        @foreach ($meetings as $item)
        <tr>
            <td style="border: 1px solid"> {{ $item->id}}</td>
            <td style="border: 1px solid"> {{ $item->Names}} {{ $item->First_Names}}</td>
            <td style="border: 1px solid"> {{ $item->CI }}</td>
            <td style="border: 1px solid"> {{ $item->Reason }}</td>
            <td style="border: 1px solid"> {{ $item->Observation }}</td>
            <td style="border: 1px solid"> {{ $item->Meeting_Date }}</td>
        </tr>
        @endforeach
</table>
<p style="font-weight: bold;">TOTAL DE AUDIENCIAS: {{$contar}}</p>
</body>
</html>
