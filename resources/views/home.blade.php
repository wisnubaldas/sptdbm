@extends('template.index')

@section('content')
    <div>

        <ol class="breadcrumb float-xl-end">
            <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <h1 class="page-header">Dashboard <small>TPS Online Data Activity</small></h1>
        <x-dashboard.status-panel />

        <div class="row">
            <div class="col-xl-8">
                <x-dashboard.chart-dashboard-one />

                <div class="panel panel-inverse" data-sortable-id="index-8">
                    <div class="panel-heading">
                        <h4 class="panel-title">Log Sending TPS Online</h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
                                    class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
                                    class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i
                                    class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
                                    class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="panel-body p-0">
                        <div class="todolist">
                            <div class="todolist-item">
                                <div class="todolist-input">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="todolist1"
                                            data-change="todolist" />
                                    </div>
                                </div>
                                <label class="todolist-label" for="todolist1">INFO: ISPN004021: Sukses sending server BC :
                                    Import</label>
                            </div>
                            <div class="todolist-item">
                                <div class="todolist-input">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="todolist2"
                                            data-change="todolist" />
                                    </div>
                                </div>
                                <label class="todolist-label" for="todolist2">INFO: ISPN004021: Sukses sending server BC :
                                    Import</label>
                            </div>
                            <div class="todolist-item">
                                <div class="todolist-input">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="todolist3"
                                            data-change="todolist" />
                                    </div>
                                </div>
                                <label class="todolist-label" for="todolist3">INFO: ISPN004021: Sukses sending server BC :
                                    Import</label>
                            </div>
                            <div class="todolist-item">
                                <div class="todolist-input">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="todolist4"
                                            data-change="todolist" />
                                    </div>
                                </div>
                                <label class="todolist-label" for="todolist4">ERROR: ISPN004021: Gagal sending server BC :
                                    Import</label>
                            </div>
                            <div class="todolist-item">
                                <div class="todolist-input">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="todolist5"
                                            data-change="todolist" />
                                    </div>
                                </div>
                                <label class="todolist-label" for="todolist5">ERROR: ISPN004021: Gagal sending server BC :
                                    Import</label>
                            </div>
                            <div class="todolist-item">
                                <div class="todolist-input">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="todolist6"
                                            data-change="todolist" />
                                    </div>
                                </div>
                                <label class="todolist-label" for="todolist6">INFO: ISPN004021: Sukses sending server BC :
                                    Import</label>
                            </div>
                            <div class="todolist-item">
                                <div class="todolist-input">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="todolist7"
                                            data-change="todolist" />
                                    </div>
                                </div>
                                <label class="todolist-label" for="todolist7">INFO: ISPN004021: Sukses sending server BC :
                                    Import</label>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            {{-- end grid --}}

            <div class="col-xl-4">
                <div class="panel panel-inverse" data-sortable-id="index-6">
                    <div class="panel-heading">
                        <h4 class="panel-title">Analytics Kode Dokumen</h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
                                    class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
                                    class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-warning"
                                data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
                                    class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-panel align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Kode Doc</th>
                                    <th>Total</th>
                                    <th>Flow</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td nowrap><label class="badge bg-danger">SPPB BC 2.3</label></td>
                                    <td>13,203 <span class="text-success"><i class="fa fa-arrow-up"></i></span></td>
                                    <td>
                                        <div id="sparkline-unique-visitor"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap><label class="badge bg-warning">NPE</label></td>
                                    <td>1000</td>
                                    <td>
                                        <div id="sparkline-bounce-rate"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap><label class="badge bg-success">PIBK</label></td>
                                    <td>1230</td>
                                    <td>
                                        <div id="sparkline-total-page-views"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap><label class="badge bg-blue">SPPBMCP</label></td>
                                    <td>309211</td>
                                    <td>
                                        <div id="sparkline-avg-time-on-site"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap><label class="badge bg-default text-gray-900">Persetujuan PLP</label>
                                    </td>
                                    <td>59823</td>
                                    <td>
                                        <div id="sparkline-new-visits"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap><label class="badge bg-inverse">SPPB PIB (BC 2.0)</label></td>
                                    <td>98923</td>
                                    <td>
                                        <div id="sparkline-return-visitors"></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="panel panel-inverse" data-sortable-id="index-7">
                    <div class="panel-heading">
                        <h4 class="panel-title">Status Respon</h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
                                    class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
                                    class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-warning"
                                data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
                                    class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="donut-chart" class="h-300px"></div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@push('js')
    <script src="../assets/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
    <script src="../assets/plugins/flot/source/jquery.canvaswrapper.js" type="text/javascript"></script>
    <script src="../assets/plugins/flot/source/jquery.colorhelpers.js" type="text/javascript"></script>
    <script src="../assets/plugins/flot/source/jquery.flot.js" type="text/javascript"></script>
    <script src="../assets/plugins/flot/source/jquery.flot.saturated.js" type="text/javascript"></script>
    <script src="../assets/plugins/flot/source/jquery.flot.browser.js" type="text/javascript"></script>
    <script src="../assets/plugins/flot/source/jquery.flot.drawSeries.js" type="text/javascript"></script>
    <script src="../assets/plugins/flot/source/jquery.flot.uiConstants.js" type="text/javascript"></script>
    <script src="../assets/plugins/flot/source/jquery.flot.time.js" type="text/javascript"></script>
    <script src="../assets/plugins/flot/source/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="../assets/plugins/flot/source/jquery.flot.pie.js" type="text/javascript"></script>
    <script src="../assets/plugins/flot/source/jquery.flot.crosshair.js" type="text/javascript"></script>
    <script src="../assets/plugins/flot/source/jquery.flot.categories.js" type="text/javascript"></script>
    <script src="../assets/plugins/flot/source/jquery.flot.navigate.js" type="text/javascript"></script>
    <script src="../assets/plugins/flot/source/jquery.flot.touchNavigate.js" type="text/javascript"></script>
    <script src="../assets/plugins/flot/source/jquery.flot.hover.js" type="text/javascript"></script>
    <script src="../assets/plugins/flot/source/jquery.flot.touch.js" type="text/javascript"></script>
    <script src="../assets/plugins/flot/source/jquery.flot.selection.js" type="text/javascript"></script>
    <script src="../assets/plugins/flot/source/jquery.flot.symbol.js" type="text/javascript"></script>
    <script src="../assets/plugins/flot/source/jquery.flot.legend.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/jvectormap-next/jquery-jvectormap.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js" type="text/javascript"></script>
    <script src="../assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="../assets/plugins/accounting.js" type="text/javascript"></script>
    <script src="../assets/plugins/moment.locales.js" type="text/javascript"></script>
    <script src="../assets/js/demo/dashboard.js" type="text/javascript"></script>
    <script>
        var handleInteractiveChart = function(d) {
            "use strict";
            $('#tgl-sekarang').html(moment().locale('id').format('MMMM YYYY'))

            // ################# bikin label nya ###################################
            let dataLabel = function() {
                let tgl = moment().locale('id').daysInMonth();
                let arrDays = [];
                while (tgl) {
                    let curr = moment().locale('id').date(tgl).format('MMM Do')
                    arrDays.push([tgl, curr]);
                    tgl--;
                }
                return arrDays.reverse();
                // console.log(arrDays.reverse());
            }

            function showTooltip(x, y, contents,lbl) {
                $('<div id="tooltip" class="flot-tooltip">' + lbl+' ' + accounting.formatNumber(contents) + ' awb </div>').css({
                    top: y - 45,
                    left: x - 55
                }).appendTo("body").fadeIn(200);
            }
            if ($('#interactive-chart').length !== 0) {

                // ############ bikin datanya ###############################
                let ngeloop = function(d) {
                    let x = []
                    for (const key in d) {
                        if (Object.hasOwnProperty.call(d, key)) {
                            const el = d[key];
                            x.push([el.tgl, el.jml]);
                        }
                    }
                    return x;

                }
                var data1 = ngeloop(d.import)
                var data2 = ngeloop(d.eksport)

                var xLabel = dataLabel

                $.plot($("#interactive-chart"), [{
                    data: data1,
                    label: "Import",
                    color: COLOR_BLUE,
                    lines: {
                        show: true,
                        fill: false,
                        lineWidth: 2
                    },
                    points: {
                        show: true,
                        radius: 3,
                        fillColor: COLOR_WHITE
                    },
                    shadowSize: 0
                }, {
                    data: data2,
                    label: 'Export',
                    color: COLOR_GREEN,
                    lines: {
                        show: true,
                        fill: false,
                        lineWidth: 2
                    },
                    points: {
                        show: true,
                        radius: 3,
                        fillColor: COLOR_WHITE
                    },
                    shadowSize: 0
                }], {
                    xaxis: {
                        ticks: xLabel,
                        tickDecimals: 0,
                        tickColor: COLOR_DARK_TRANSPARENT_2
                    },
                    yaxis: {
                        ticks: 10,
                        tickColor: COLOR_DARK_TRANSPARENT_2,
                        min: 0,
                        max: 200
                    },
                    grid: {
                        hoverable: true,
                        clickable: true,
                        tickColor: COLOR_DARK_TRANSPARENT_2,
                        borderWidth: 1,
                        backgroundColor: 'transparent',
                        borderColor: COLOR_DARK_TRANSPARENT_2
                    },
                    legend: {
                        labelBoxBorderColor: COLOR_DARK_TRANSPARENT_2,
                        margin: 10,
                        noColumns: 1,
                        show: true
                    }
                });
                var previousPoint = null;
                $("#interactive-chart").bind("plothover", function(event, pos, item) {
                    $("#x").text(pos.x.toFixed(2));
                    $("#y").text(pos.y.toFixed(2));
                    if (item) {
                        if (previousPoint !== item.dataIndex) {
                            previousPoint = item.dataIndex;
                            $("#tooltip").remove();
                            var y = item.datapoint[1].toFixed(2);

                            var content = y;
                            var lbl = item.series.label
                            showTooltip(item.pageX, item.pageY, content,lbl);
                        }
                    } else {
                        $("#tooltip").remove();
                        previousPoint = null;
                    }
                    event.preventDefault();
                });
            }
        };
        let statusPanel = function(d) {
            $('#gate-in-import').html(accounting.formatNumber(d.import.gate_in))
            $('#gate-out-import').html(accounting.formatNumber(d.import.gate_out))
            $('#gate-in-export').html(accounting.formatNumber(d.export.gate_in))
            $('#gate-out-export').html(accounting.formatNumber(d.export.gate_out))
        }
        let cardData = "{{ route('card-data') }}";
        let chartOne = "{{ route('get-data-chart') }}";
        $(document).ready(function() {
            $.ajax({
                url: cardData,
                method: "GET",
            }).done(function(response) {
                statusPanel(response)
            }).fail(function(jqXHR, textStatus) {
                console.log(jqXHR)
            });

            $.ajax({
                url: chartOne,
                method: "GET",
            }).done(function(response) {
                // console.log(response)
                handleInteractiveChart(response)
            }).fail(function(jqXHR, textStatus) {
                console.log(jqXHR)
            });


        })
    </script>
@endpush

@push('css')
    <link href="../assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
    <link href="../assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="../assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
@endpush
