<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="{{ asset('/assets/pdf-template/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
</head>

<body>
  <style>
    .table_component {
        overflow: auto;
        width: 100%;
    }
    
    .table_component table {
        border: 1px solid #dededf;
        height: 100%;
        width: 100%;
        table-layout: fixed;
        border-collapse: collapse;
        border-spacing: 1px;
        text-align: left;
    }
    
    .table_component caption {
        caption-side: top;
        text-align: center;
    }
    
    .table_component th {
        border: 1px solid #dededf;
        background-color: #eceff1;
        color: #000000;
        padding: 2px;
    }
    
    .table_component td {
        border: 1px solid #dededf;
        padding: 2px;
        white-space:nowrap;
    }
    
    .table_component tr:nth-child(even) td {
        background-color: #ffffff;
        color: #000000;
    }
    
    .table_component tr:nth-child(odd) td {
        background-color: #00ffff;
        color: #000000;
    }
    </style>
    <div class="table_component" role="region" tabindex="0">
        <table>
            <caption>
                <h3>{{ $title }}</h3>
            </caption>
            <thead>
                <tr>
                    <th>KD TPS</th>
                    <th>Nama Angkut</th>
                    <th>Kode Gudang</th>
                    <th>Refnumber</th>
                    <th>Nomor AWB</th>
                    <th>Nomor MAWB</th>
                    <th>BC11</th>
                    <th>WK IN/OUT</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $v)
                    <tr>
                        <td>{{ $v['kd_tps'] }}</td>
                        <td>{{ $v['nm_angkut'] }}</td>
                        <td>{{ $v['kd_gudang'] }}</td>
                        <td>{{ $v['ref_num'] }}</td>
                        <td>{{ $v['no_bl_awb'] }}</td>
                        <td>{{ $v['no_master_bl_awb'] }}</td>
                        <td>{{ $v['no_bc11'] }}</td>
                        <td>{{ $v['wk_inout'] }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</body>

</html>
