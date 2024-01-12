<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UseCase\GateInOutDatatablesUseCase;
class InventoryController extends Controller
{
    protected $InOutData;
    public function __construct(GateInOutDatatablesUseCase $InOutData){
        $this->InOutData = $InOutData;
    }

    public function index() {
        // return $table->render('custom.inventory.index');
        return view('custom.inventory.index');
    }
    public function get_data(Request $request){
        return $this->InOutData->make_tables();
        
    }

    public function find_data(Request $request) {
        $tipe = $request->flexRadioDefault;
        
        switch ($tipe) {
            case 'export':
                return $this->export_data($request);
                break;
            
            case 'import':
                return $this->import_data($request);
                break;
        }
    }
    protected function import_data($request){
        // $date = explode('-',$request->date_range);
        // $where_val = $request->search_by_val;
        // $where_param = $request->search_by;
        // $table = new InOutDataTable();
        // $dataTable = $table->html();
        // return view('custom.inventory.index',compact('dataTable'));
        
    }
    protected function export_data($request){
        
    }
}
