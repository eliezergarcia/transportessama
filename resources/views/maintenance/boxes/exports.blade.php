<style>
    *{
        font-family: Arial, Helvetica, sans-serif;
    }

    th, td{
        margin: 0px;
        border-spacing: 0px;
        padding: 5px;
        text-align: left;
        font-size: 13px;
        border: 1px solid black;
        vertical-align: top;
    }

    th{
        font-weight: bold;
    }
</style>

<h1>Partes de Cajas</h1>
@foreach($boxes as $box)
<table>
    <thead>
        <tr style="margin: 0px; border-spacing: 0px;">
            <th style="width: 10px; font-weight: bold;">ID</th>
            <th style="width: 15px; font-weight: bold;">TRACTOR</th>
            <th style="width: 15px; font-weight: bold;">TIPO</th>
            <th style="width: 15px; font-weight: bold;">PLACAS</th>
            <th style="width: 20px; font-weight: bold;">VIN</th>
            <th style="width: 20px; font-weight: bold; background: yellow;">STATUS</th>
            <th style="width: 20px; font-weight: bold; background: red;">STATUS</th>
        </tr>
    </thead>
    <tbody>
        <tr style="margin: 0px; border-spacing: 0px;">
            <td style="width: 10px; text-align: left; vertical-align: top;">{{ $box->id }}</td>
            <td style="width: 15px; text-align: left; vertical-align: top;">{{ $box->trailer }}</td>
            <td style="width: 15px; text-align: left; vertical-align: top;">{{ $box->type }}</td>
            <td style="width: 15px; text-align: left; vertical-align: top;">{{ $box->plates }}</td>
            <td style="width: 20px; text-align: left; vertical-align: top;">{{ $box->vin }}</td>
            <td style="width: 20px; text-align: left; vertical-align: top;">
                @foreach($box->yellowPartsExcel() as $part)
                    {{ $part->name }}<br />
                @endforeach
            </td>
            <td style="width: 20px; text-align: left; vertical-align: top;">
                @foreach($box->redPartsExcel() as $part)
                    {{ $part->name }}<br />
                @endforeach
            </td>
        </tr>
    </tbody>
</table>
<br/>
@endforeach
