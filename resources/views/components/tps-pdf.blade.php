<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$title}}</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

	<link href="{{asset('/assets/pdf-template/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
  </head>
  <body>
    <div class="page-header text-center">
      <h3>{{$title}}</h3>
    </div>
    <div class="row-fluid">
      @php
        $idx = 0    
      @endphp
      @foreach ($data as $v)
      @if ($idx == 5)
          <br>
          @php
        $idx = 0;
      @endphp
      @endif
      @php
        $idx +1;
      @endphp
        <div class="span2">
          <dl>
            <dt>KD TPS</dt>
            <dd>{{$v['kd_tps']}}</dd>
            <dt>Nama Angkut</dt>
            <dd>{{$v['nm_angkut']}}</dd>
            <dt>Kode Gudang</dt>
            <dd>{{$v['kd_gudang']}}</dd>
            <dt>Refnumber</dt>
            <dd>{{$v['ref_num']}}</dd>
            <dt>Nomor AWB</dt>
            <dd>{{$v['no_bl_awb']}}</dd>
            <dt>Nomor MAWB</dt>
            <dd>{{$v['no_master_bl_awb']}}</dd>
            <dt>BC11</dt>
            <dd>{{$v['no_bc11']}}</dd>
          </dl>
      </div>
      @endforeach
       
    </div>
  </body>
</html>