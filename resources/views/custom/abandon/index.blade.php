@extends('template.index')

@section('content')
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Custom</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Abandon</a></li>
        <li class="breadcrumb-item active">index</li>
    </ol>

    <h1 class="page-header">Abandon <small> Barang Timbun Lewat 30 Hari</small></h1>
    <ul class="nav nav-tabs " id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#IMPORT" role="tab" aria-controls="IMPORT"
                aria-selected="true">IMPORT</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#IMPORT" role="tab" aria-controls="IMPORT"
                aria-selected="false">EXPORT</a>
        </li>
    </ul>
    <div class="tab-content bg-white p-3 rounded-bottom" id="myTabContent">
        <x-form-search action="#" method="" excel="{{route('abandon.download-excel')}}" pdf="{{route('download-pdf')}}"/>
        {{-- panel table IN --}}
        <div class="panel panel-inverse">
            <div class="panel-heading panel-heading bg-red-700 text-white">
                <h4 class="panel-title fw-bold">Data Abandon</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"
                        data-bs-original-title="" title="" data-tooltip-init="true"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
                            class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i
                            class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
                            class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <div class="modal-content">
                    <div class="table-responsive">
                        <table id="tbl-gatein" class="table table-striped table-bordered align-middle display nowrap"
                            style="width: 100%">
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('js')
    <script src="{{ asset('/assets/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/moment/min/moment.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <script>
        let tblGateIn
        $(document).ready(function() {
            let importIn = {{ Js::from(route('abandon.import-in')) }};
            let exportIn = {{ Js::from(route('abandon.export-in')) }};

            tblGateIn = $('#tbl-gatein').DataTable({
                // deferLoading: 57,
                lengthChange: false,
                searching: false,
                responsive: false,
                serverSide: false,
                processing: true,
                scrollX: true,
                ajax: importIn,
                columns: custom.fieldTable
            });
            $('#myTab a').on('click', function(e) {
                // e.preventDefault()
                $(this).tab('show')
            })
            $('#myTab a').on('shown.bs.tab', function(e) {
                // console.log(e.target.innerText)
                // console.log(e.relatedTarget);
                switch (e.target.innerText) {
                    case 'IMPORT':
                        propData.tab = 'IMPORT'
                        tblGateIn.ajax.url(importIn).load()
                        break;
                    case 'EXPORT':
                        propData.tab = 'EXPORT'
                        tblGateIn.ajax.url(exportIn).load()
                        break;
                }
            })
            propData.searchable(tblGateIn, null,importIn, null, exportIn, null)

        });

        $('#export-excel').on('click',function(a){
                const headers = [];
                const data = [];
                $('#tbl-gatein thead th').each(function () {
                    headers.push($(this).text().trim());
                });

                data.push(headers); // tambahkan header sebagai baris pertama
                // const jsonData = tbl.rows({ search: 'applied' }).data().toArray();
                
                
                // Ambil data dari DataTables
                tblGateIn.rows({ search: 'applied' }).every(function () {
                    const rowNode = this.node(); // Ambil node DOM barisnya
                    const row = [];
                    $(rowNode).find('td').each(function () {
                        row.push($(this).text().trim());
                    });
                    data.push(row);
                });
                    // Buat worksheet dan workbook
                    const worksheet = XLSX.utils.aoa_to_sheet(data);
                    const workbook = XLSX.utils.book_new();
                    XLSX.utils.book_append_sheet(workbook, worksheet, "Data");

                    // Simpan file Excel
                    XLSX.writeFile(workbook, "abadon.xlsx");
            })
    </script>
@endpush

@push('css')
    <link href="{{ asset('/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" />
    <style type="text/css">
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
