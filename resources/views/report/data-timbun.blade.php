@php
$tab = ['tab-1','tab-2','tab-3'];    
@endphp

@extends('template.index')

@section('content')
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Report</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Data Timbun</a></li>
        <li class="breadcrumb-item active">index</li>
    </ol>

    <h1 class="page-header">Data <small>timbun Per hari</small></h1>
    
@endsection

@push('js')
    <script src="{{ asset('/assets/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-fixedcolumns-bs4/js/fixedColumns.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/moment/min/moment.min.js') }}"></script>
    <script>
        
       
    </script>
@endpush

@push('css')
    <link href="{{ asset('/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css') }}"
        rel="stylesheet" />
    <style type="text/css">
        td.highlight {
            background-color: #e9ecef !important;
        }

        html.dark td.highlight {
            background-color: rgba(var(--dt-row-hover), 0.082) !important;
        }

        .modal-loader {
            background: rgba(255, 255, 255, 0.85);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 10;
        }
    </style>
@endpush
