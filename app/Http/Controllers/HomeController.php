<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\UseCase\DashboardUseCase;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function get_dashboard(DashboardUseCase $dashboardUseCase)
    {
        return $dashboardUseCase->panel_header();
    }

    public function get_data_chart(Request $request, DashboardUseCase $dashboardUseCase)
    {

        if ($request->query()) {
            $import = $dashboardUseCase->chart_import($request);
            $export = $dashboardUseCase->chart_ekspor($request);
        } else {
            $import = $dashboardUseCase->chart_import();
            $export = $dashboardUseCase->chart_ekspor();
        }
        $rekap_out = $dashboardUseCase->pie_pertahun()->map(function ($item, $key) {
            switch ($item->bln) {
                case '01':
                    $item->bln = 'Januari';
                    break;
                case '02':
                    $item->bln = 'Februari';
                    break;
                case '03':
                    $item->bln = 'Maret';
                    break;
                case '04':
                    $item->bln = 'April';
                    break;
                case '05':
                    $item->bln = 'Mei';
                    break;
                case '06':
                    $item->bln = 'Juni';
                    break;
                case '07':
                    $item->bln = 'Juli';
                    break;
                case '08':
                    $item->bln = 'Agustus';
                    break;
                case '09':
                    $item->bln = 'September';
                    break;
                case '10':
                    $item->bln = 'Oktober';
                    break;
                case '11':
                    $item->bln = 'November';
                    break;
                case '12':
                    $item->bln = 'Desember';
                    break;
            }
            return $item;
        });
        $bulan = [];
        $jml = [];
        foreach ($rekap_out as $v) {
            array_push($bulan, $v->bln);
            array_push($jml, $v->jml_out);
        }
        return [
            'import' => $import,
            'ekspor' => $export,
            'import_bruto' => $dashboardUseCase->chart_bruto(),
            'import_bruto_tahun' => $dashboardUseCase->donat_per_tahun(),
            'log_xml' => $dashboardUseCase->log_xml(),
            'rekap_pertahun' => compact('bulan', 'jml'),
        ];
    }
}
