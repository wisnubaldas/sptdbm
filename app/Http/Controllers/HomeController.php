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

        return [
            'import' => $import,
            'ekspor' => $export,
            'import_bruto' => $dashboardUseCase->chart_bruto(),
            'import_bruto_tahun' => $dashboardUseCase->donat_per_tahun(),
            'log_xml' => $dashboardUseCase->log_xml(),
        ];
    }
}
