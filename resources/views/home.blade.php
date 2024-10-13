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
            <div class="col-xl-12">
                <x-dashboard.chart-dashboard-one />
            </div>
            <div class="col-xl-12">
                {{-- <x-dashboard.chart-dashboard-two /> --}}

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
                        <div class="todolist" id="td-list">
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
            <div class="col-xl-6">
                <div class="panel panel-inverse pb-2" data-sortable-id="index-6">
                    <div class="panel-heading">
                        <h4 class="panel-title">Rekap In/Out Per Bulan</h4>
                    </div>
                    <canvas id="rekap-perbulan"></canvas>
                </div>
            </div>

            {{-- end grid --}}
            <div class="col-xl-6">
                <div class="panel panel-inverse pb-2" data-sortable-id="index-6">
                    <div class="panel-heading">
                        <h4 class="panel-title">Bruto Per Bulan</h4>
                      
                    </div>
                    <canvas id="doughnut-chart"></canvas>
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
    <script src="../assets/plugins/chart.js/dist/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js"
        integrity="sha512-JPcRR8yFa8mmCsfrw4TNte1ZvF1e3+1SdGMslZvmrzDYxS69J7J49vkFL8u6u8PlPJK+H3voElBtUCzaXj+6ig=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../assets/plugins/accounting.js" type="text/javascript"></script>
    <script src="../assets/plugins/moment.locales.js" type="text/javascript"></script>
    <script src="../assets/js/demo/dashboard.js" type="text/javascript"></script>
    <script src="../assets/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script>
        let makeData = {
            donatOne: function(d) {
                // masih burem logika nya ini :((((((()))))))
                let bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sept', 'Okt', 'Nov', 'Des']
                let idx = 0;
                for (const i of bulan) {
                    if (d[idx] !== undefined) {
                        let blnNya = parseInt(d[idx].bln) - 1;
                        bulan[blnNya] = parseFloat(d[idx].berat)
                    }
                    idx++;
                }
                return bulan.map(function(x) {
                    return parseFloat(x);
                });

            },
            removeTag: function(str) {
                if ((str === null) || (str === ''))
                    return false;
                else
                    str = str.toString();

                // Regular expression to identify HTML tags in
                // the input string. Replacing the identified
                // HTML tag with a null string.
                return str.replace(/(<([^>]+)>)/ig, '');
            }
        }
        let logXml = function(d) {
            let data = d.log_xml.reverse();
            let res = [];
            for (const key in data) {
                if (Object.hasOwnProperty.call(data, key)) {
                    const el = data[key];
                    let tmpl = `<div class="todolist-item">
                                <div class="todolist-input">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="${el.id}"
                                            data-change="todolist" />
                                    </div>
                                </div>
                                <label class="todolist-label" for="${el.id}">
                                    INFO: <strong>${el.jns_api}</strong> STATUS: <strong>${makeData.removeTag(el.xml_response)}</strong>
                                </label>
                            </div>`
                    res.push(tmpl)
                }
            }
            $('#td-list').html(res.join(''))
        }
        var handleInteractiveChart = function(d) {
            "use strict";
            $('#tgl-sekarang').html(moment().locale('id').format('MMMM YYYY'))

            // ################# bikin label nya ###################################
            let dataLabel;
            if (d.hasOwnProperty('periode')) {
                // console.log(d.periode)
                const mulaiBulan = moment(d.periode.start);
                const akhirBulan = moment(d.periode.end);
                const arrayHari = [];

                for (let m = moment(mulaiBulan); m.diff(akhirBulan, 'days') <= 0; m.add(1, 'days')) {
                    arrayHari.push([moment(m).locale('id').format('MMDD'), moment(m).locale('id').format('MMM Do')]);
                }
                // console.log(arrayHari)
                dataLabel = arrayHari
            } else {
                let tgl = moment().locale('id').daysInMonth();
                // console.log(tgl)
                let arrDays = [];
                while (tgl) {
                    let curr = moment().locale('id').date(tgl).format('MMM Do')
                    arrDays.push([tgl, curr]);
                    tgl--;
                }
                // console.log(arrDays);
                dataLabel = arrDays.reverse();
                // console.log(arrDays.reverse());

            }

            function showTooltip(x, y, contents, lbl) {
                $('<div id="tooltip" class="flot-tooltip">' + lbl + ' ' + accounting.formatNumber(contents) +
                    ' awb </div>').css({
                    top: y - 45,
                    left: x - 55
                }).appendTo("body").fadeIn(200);
            }

            if ($('#interactive-chart').length !== 0) {

                // ############ bikin datanya ###############################
                let ngeloop = function(d) {

                    // if (d.hasOwnProperty('periode')) {
                    //     let x = []
                    //     for (const key in d) {
                    //         if (Object.hasOwnProperty.call(d, key)) {
                    //             const el = d[key];
                    //             x.push([el.tgl, el.jml]);
                    //         }
                    //     }
                    //     return x;

                    // } else {
                    let x = []
                    for (const key in d) {
                        if (Object.hasOwnProperty.call(d, key)) {
                            const el = d[key];
                            x.push([el.tgl, el.jml]);
                        }
                    }
                    // console.log(x,'data jadi nya')

                    return x;
                    // }
                }

                // console.log(dataLabel, 'data label nya')
                // console.log(d.import, ' data mentah nya')
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
                        lineWidth: 3
                    },
                    points: {
                        show: true,
                        radius: 6,
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
                        // max: 200
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
                            showTooltip(item.pageX, item.pageY, content, lbl);
                        }
                    } else {
                        $("#tooltip").remove();
                        previousPoint = null;
                    }
                    event.preventDefault();
                });
            }

        }

        var handleChartTwo = function(d) {
            // ############### bikin  datanya ###############
            let ngeloop = function(d) {
                let x = []
                let idx = 0;
                for (const key in d) {
                    if (Object.hasOwnProperty.call(d, key)) {
                        const el = d[key];
                        x.push([parseInt(el.tgl), parseFloat(el.berat)]);
                    }
                }
                return x;

            }
            var d1 = ngeloop(d.import_bruto);
            // console.log(d1)
            $.plot($('#interactive-chart-two'), [{
                data: d1,
                label: 'Import Bruto',
                color: COLOR_INDIGO,
                lines: {
                    show: true,
                    fill: true,
                    lineWidth: 2.5
                },
                points: {
                    show: true,
                    radius: 5,
                    fillColor: COLOR_WHITE
                },
                shadowSize: 0
            }], {
                xaxis: {
                    tickColor: COLOR_BLACK,
                    tickSize: 1
                },
                yaxis: {
                    tickColor: COLOR_BLACK,
                    tickSize: 2
                },
                grid: {
                    hoverable: true,
                    clickable: true,
                    tickColor: COLOR_BLUE_TRANSPARENT_1,
                    borderWidth: 2,
                    backgroundColor: 'transparent',
                    borderColor: COLOR_BLUE_TRANSPARENT_1
                },
                legend: {
                    noColumns: 1,
                    show: true
                }
            });

            function showTooltip(x, y, contents, lbl) {
                $('<div id="tooltip" class="flot-tooltip">' + lbl + ' ' + accounting.formatNumber(contents, 2) +
                    ' Kg </div>').css({
                    top: y - 45,
                    left: x - 55
                }).appendTo("body").fadeIn(200);
            }
            var previousPoint = null;

            $("#interactive-chart-two").bind("plothover", function(event, pos, item) {
                $("#x").text(pos.x.toFixed(2));
                $("#y").text(pos.y.toFixed(2));
                if (item) {
                    if (previousPoint !== item.dataIndex) {
                        previousPoint = item.dataIndex;
                        $("#tooltip").remove();
                        var y = item.datapoint[1].toFixed(2);

                        var content = y;
                        var lbl = item.series.label
                        showTooltip(item.pageX, item.pageY, content, lbl);
                    }
                } else {
                    $("#tooltip").remove();
                    previousPoint = null;
                }
                event.preventDefault();
            });
        }

        let statusPanel = function(d) {
            $('#gate-in-import').html(accounting.formatNumber(d.import.gate_in))
            $('#gate-out-import').html(accounting.formatNumber(d.import.gate_out))
            $('#gate-in-export').html(accounting.formatNumber(d.export.gate_in))
            $('#gate-out-export').html(accounting.formatNumber(d.export.gate_out))
        }

        // JQUERY first page

        let cardData = "{{ route('card-data') }}";
        let chartOne = "{{ route('get-data-chart') }}";

        console.log(cardData)

        $(document).ready(function() {
            // date picker
            $("#default-daterange").daterangepicker({
                opens: "right",
                format: "DD/MM/YYYY",
                separator: " to ",
                startDate: moment().subtract(29, "days"),
                endDate: moment(),
                maxSpan: {
                    days: 32
                }
            }, function(start, end) {
                $("#default-daterange input").val(start.format("D MMMM, YYYY") + " - " + end.format(
                    "D MMMM, YYYY"));
            });
            $('#default-daterange').on('apply.daterangepicker', function(ev, picker) {
                const start = picker.startDate.format('YYYYMMDD');
                const end = picker.endDate.format('YYYYMMDD');
                // console.log(start);
                // console.log(end);
                $.ajax({
                    url: chartOne,
                    method: "GET",
                    data: {
                        'start': start,
                        'end': end
                    }
                }).done(function(response) {
                    response.periode = {
                        'start': start,
                        'end': end
                    }
                    // console.log(response)
                    handleInteractiveChart(response)
                    // handleChartTwo(response)
                    // chartDonatOne(response)
                    // logXml(response)
                }).fail(function(jqXHR, textStatus) {
                    console.log(jqXHR)
                });

            })
            // ajax buat card atas 
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
                handleChartTwo(response)
                chartDonatOne(response)
                logXml(response)
                rekapPie(response.rekap_pertahun)
            }).fail(function(jqXHR, textStatus) {
                console.log(jqXHR)
            });


        })
    </script>
    <script>
        let rekapPie = function(data) {
            // console.log('rekap chart pie', data)
            let ctx = document.getElementById('rekap-perbulan').getContext('2d');
            const xValues = data.bulan;
            const yValues = data.jml;
            const barColors = [
                COLOR_PINK_TRANSPARENT_7,
                COLOR_SILVER_TRANSPARENT_7,
                COLOR_RED_TRANSPARENT_7,
                COLOR_PURPLE_TRANSPARENT_7,
                COLOR_ORANGE_TRANSPARENT_7,
                COLOR_YELLOW_TRANSPARENT_7,
                COLOR_AQUA_TRANSPARENT_7,
                COLOR_INDIGO_TRANSPARENT_7,
                COLOR_BLUE_TRANSPARENT_7,
                COLOR_GREEN_TRANSPARENT_7,
                COLOR_GREY_TRANSPARENT_7,
                COLOR_DARK_TRANSPARENT_7
            ];
            Chart.defaults.set('plugins.datalabels', {
                color: '#232624',
                font:{
                    size:16,
                    weight:'bold'
                }
            });
            new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: "pie",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: "World Wide Wine Production 2018"
                    }
                }
            });
        }

        let chartDonatOne = function(d) {
            Chart.defaults.set('plugins.datalabels', {
                color: '#232624',
                font:{
                    size:16,
                    weight:'bold'
                }
            });
            let dataNya = makeData.donatOne(d.import_bruto_tahun)
            Chart.defaults.font.family = FONT_FAMILY;
            Chart.defaults.font.weight = FONT_WEIGHT;

            var ctx6 = document.getElementById('doughnut-chart').getContext('2d');
            window.myDoughnut = new Chart(ctx6, {
                plugins: [ChartDataLabels],
                type: 'doughnut',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sept', 'Okt', 'Nov',
                        'Des'
                    ],
                    datasets: [{
                        data: dataNya,
                        backgroundColor: [
                            COLOR_PINK_TRANSPARENT_7,
                            COLOR_SILVER_TRANSPARENT_7,
                            COLOR_RED_TRANSPARENT_7,
                            COLOR_PURPLE_TRANSPARENT_7,
                            COLOR_ORANGE_TRANSPARENT_7,
                            COLOR_YELLOW_TRANSPARENT_7,
                            COLOR_AQUA_TRANSPARENT_7,
                            COLOR_INDIGO_TRANSPARENT_7,
                            COLOR_BLUE_TRANSPARENT_7,
                            COLOR_GREEN_TRANSPARENT_7,
                            COLOR_GREY_TRANSPARENT_7,
                            COLOR_DARK_TRANSPARENT_7
                        ],
                        borderColor: [
                            COLOR_PINK,
                            COLOR_SILVER,
                            COLOR_RED,
                            COLOR_PURPLE,
                            COLOR_ORANGE,
                            COLOR_YELLOW,
                            COLOR_AQUA,
                            COLOR_INDIGO,
                            COLOR_BLUE,
                            COLOR_GREEN,
                            COLOR_GREY,
                            COLOR_DARK
                        ],
                        borderWidth: 2,
                        label: 'My dataset'
                    }]
                }
            });
        }
    </script>
@endpush

@push('css')
    <link href="../assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
    <link href="../assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="../assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <link href="../assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
@endpush
