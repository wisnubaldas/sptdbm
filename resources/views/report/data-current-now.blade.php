@extends('template.index')

@section('content')
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Report</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Current Now</a></li>
        <li class="breadcrumb-item active">index</li>
    </ol>

    <h1 class="page-header">Progres In/Out <small>data Per hari</small></h1>

    <div class="row bg-white p-2">
        <div class="col-8">
            <div class="table-responsive">
                <table id="tbl-current" class="table table-striped table-bordered align-middle display nowrap"
                    style="width: 100%">
                </table>
            </div>
        </div>
        <div class="col-4" >
            <!-- begin widget-card -->
            <div class="widget-card rounded" id="wiget-nya">
                <div class="widget-card-cover rounded"
                    style="background-image: url(../assets/img/gallery/logistic-bg.jpg); opacity: 0.2;"></div>
                <div class="widget-card-content">
                    <h4 class="text-purple-700">Detail Barang</h4>
                </div>
                <div class="widget-card-content bottom">
                        <i class="fas fa-box-open fa-5x text-purple-700" style="float:left; padding-right:5px;"></i>
                        <h5 class="text-purple-700 mt-10px"><b>MASTER AWB<span class="text-red" id="no_master_bl_awb"> </span></b></h5>
                        <h5 class="text-purple-700 mt-10px"><b>AWB<span class="text-red" id="no_bl_awb"> </span></b></h5>
                        <h5 class="text-purple-700 mt-10px"><b>No BC11<span class="text-red" id="no_bc11"> </span></b></h5>
                        <h5 class="text-purple-700 mt-10px"><b>Tgl BC11<span class="text-red" id="tgl_bc11"></span></b></h5>
                        <h5 class="text-purple-700 mt-10px"><b>Flight<span class="text-red" id="no_voy_flight"> </span></b></h5>
                        <h5 class="text-purple-700 mt-10px"><b>Bruto<span class="text-red" id="bruto"> </span></b></h5>
                        <h5 class="text-purple-700 mt-10px"><b>In<span class="text-red" id="document_in"> </span></b></h5>
                        <h5 class="text-purple-700 mt-10px"><b>Out<span class="text-red" id="document_out"> </span></b></h5>
                </div>
            </div>
            <!-- end widget-card -->
        </div>
    </div>
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
        $(document).ready(function() {
            // console.log(custom)
            let tblCurrentData = {{ Js::from(route('table-curent-now')) }};
            let tblCurrent = $('#tbl-current').DataTable({
                // deferLoading: 57,
                lengthChange: false,
                searching: true,
                responsive: false,
                serverSide: true,
                processing: true,
                scrollX: true,
                ajax: tblCurrentData,
                columns: [{
                        data: "no_master_bl_awb",
                        orderable: false,
                        searchable: true,
                        title: "MASTER AWB"
                    },
                    {
                        data: "no_bl_awb",
                        orderable: false,
                        searchable: true,
                        title: "AWB"
                    },
                    {
                        data: "no_bc11",
                        orderable: false,
                        searchable: true,
                        title: "BC11",
                        className: 'text-center'
                    },
                    {
                        data: "tgl_bc11",
                        orderable: false,
                        searchable: true,
                        title: "TGL BC11",
                        className: 'text-center'
                    },
                    {
                        data: "detail",
                        orderable: false,
                        searchable: true,
                        title: "#",
                        className: 'text-center'
                    },
                ],

            });
        })

        $(document).on('click', '.detail-data', function() {
            let awb = $(this).data('awb')
            let url = {{ Js::from(route('detail-current-now')) }}
            $.ajax({
                type: "get",
                url: url,
                data: {
                    awb:awb
                },
                dataType: "json",
                beforeSend:function(){
                    $('#wiget-nya').addClass('loader');
                },
                success: function (r) {
                    // console.log(r)
                    $('#wiget-nya').removeClass('loader');
                        let x = ['no_master_bl_awb','no_bl_awb','no_bc11','tgl_bc11','no_voy_flight','bruto','document_in','document_out',]
                        for (const i of x) {
                            // console.log(i)
                            $('#'+i).text('  '+r[i])
                        }
                }

            }).fail(function(){
                $('#wiget-nya').removeClass('loader');
                $('#wiget-nya').html('<h4>Server error</h4>')
            });
        });
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
        /* HTML: <div class="loader"></div> */
        .loader {
            width: auto;
            font-weight: bold;
            font-family: monospace;
            white-space: pre;
            font-size: 30px;
            line-height: 5em;
            height:5em;
            overflow: hidden;
            padding: 5%;
            margin: 5%;
        }
        .loader:before {
            content:"Loading...\A⌰oading...\A⌰⍜ading...\A⌰⍜⏃ding...\A⌰⍜⏃⎅ing...\A⌰⍜⏃⎅⟟ng...\A⌰⍜⏃⎅⟟⋏g...\A⌰⍜⏃⎅⟟⋏☌...\A⌰⍜⏃⎅⟟⋏☌⟒..\A⌰⍜⏃⎅⟟⋏☌⟒⏁.\A⌰⍜⏃⎅⟟⋏☌⟒⏁⋔"; 
            white-space: pre;
            display: inline-block;
            animation: l39 1s infinite steps(11) alternate;
        }
            @keyframes l39 {
            100%{transform: translateY(-100%)}
        }
    </style>
@endpush
