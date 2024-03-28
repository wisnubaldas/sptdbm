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
    public function get_dashboard(DashboardUseCase $dashboardUseCase) {
        return $dashboardUseCase->panel_header();
    }
    public function get_data_chart(DashboardUseCase $dashboardUseCase) {
        return [
            'import'=>$dashboardUseCase->chart_import(),
            'ekspor'=>$dashboardUseCase->chart_ekspor()
        ];
    }

}
