<?php

namespace App\UseCase;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

/**
 * Class UseCase.
 *
 * @package namespace App\UseCase;
 */
class ReportCurrentNowUseCase implements ReportCurrentNowUseCaseInterface
{

    public function tbl_use_case()
    {
        return DataTables::of(\App\Models\Report\DataTimbun::select('no_master_bl_awb','no_bl_awb','no_bc11','tgl_bc11'))
        ->addColumn('detail', function ($data) {
            return '<button type="button" class="btn btn-primary btn-xs detail-data" data-awb="'.$data->no_bl_awb.'">
                            <i class="fas fa-lg fa-fw fa-cubes"></i> Detail
                    </button>';
        })
        ->rawColumns(['detail'])
        ->make(true);
    }
    public function awb($awb) {
        return \App\Models\Report\DataTimbun::where('no_bl_awb',$awb)->first();
    }
}
