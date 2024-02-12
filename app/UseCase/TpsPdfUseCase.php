<?php

namespace App\UseCase;

use Barryvdh\DomPDF\Facade\Pdf;
use \App\Models\TpsOnline\GateImportIn;
use \App\Models\TpsOnline\GateImportOut;
use \App\Models\TpsOnline\GateExpIn;
use \App\Models\TpsOnline\GateExpOut;
/**
 * Class UseCase.
 *
 * @package namespace App\UseCase;
 */
class TpsPdfUseCase implements TpsPdfUseCaseInterface
{
    public function inventory($request,$title){
        $data = [];
        switch ($request->type) {
            case 'IMPORT':
                $gate_in = $this->import_gate_in($request)->get();
                $gate_out = $this->import_gate_out($request)->get();
                $data = array_merge($gate_out->toArray(),$gate_in->toArray());
                break;
            
            case 'EXPORT':
                $gate_in = $this->export_gate_in($request)->get();
                $gate_out = $this->export_gate_out($request)->get();
                $data = array_merge($gate_out->toArray(),$gate_in->toArray());
                break;
        }

        // return view('components.tps-pdf',compact('data','title','tHead'));
        $pdf = Pdf::loadView('components.tps-pdf', compact('data','title'))
                    ->setPaper('a4', 'landscape');
        $pdf->setOptions([
            'isRemoteEnabled' => true,
        ]);
        return $pdf->download('invoice.pdf');
    }
    protected function import_gate_in($r){
        return GateImportIn::select(["kd_tps", "nm_angkut", "kd_gudang", "ref_num", "no_bl_awb", "no_master_bl_awb", "no_bc11","wk_inout"])
        ->where('no_bl_awb',$r->no_bl_awb)
        ->orWhere('no_daftar_pabean',$r->no_daftar_pabean)
        ->orWhere('ref_num',$r->ref_num)
        ->orWhere('no_master_bl_awb',$r->no_master_bl_awb)
        ->orWhere('wk_inout',$r->wk_inout)
        ->orWhere('no_bc11',$r->no_bc11);
    }
    protected function import_gate_out($r){
        return GateImportOut::select(["kd_tps", "nm_angkut", "kd_gudang", "ref_num", "no_bl_awb", "no_master_bl_awb", "no_bc11","wk_inout"])
        ->where('no_bl_awb',$r->no_bl_awb)
        ->orWhere('no_daftar_pabean',$r->no_daftar_pabean)
        ->orWhere('ref_num',$r->ref_num)
        ->orWhere('no_master_bl_awb',$r->no_master_bl_awb)
        ->orWhere('wk_inout',$r->wk_inout)
        ->orWhere('no_bc11',$r->no_bc11);
    }
    protected function export_gate_in($r){
        return GateExpIn::select(["kd_tps", "nm_angkut", "kd_gudang", "ref_num", "no_bl_awb", "no_master_bl_awb", "no_bc11","wk_inout"])
        ->where('no_bl_awb',$r->no_bl_awb)
        ->orWhere('no_daftar_pabean',$r->no_daftar_pabean)
        ->orWhere('ref_num',$r->ref_num)
        ->orWhere('no_master_bl_awb',$r->no_master_bl_awb)
        ->orWhere('wk_inout',$r->wk_inout)
        ->orWhere('no_bc11',$r->no_bc11);
    }
    protected function export_gate_out($r){
        return GateExpOut::select(["kd_tps", "nm_angkut", "kd_gudang", "ref_num", "no_bl_awb", "no_master_bl_awb", "no_bc11","wk_inout"])
        ->where('no_bl_awb',$r->no_bl_awb)
        ->orWhere('no_daftar_pabean',$r->no_daftar_pabean)
        ->orWhere('ref_num',$r->ref_num)
        ->orWhere('no_master_bl_awb',$r->no_master_bl_awb)
        ->orWhere('wk_inout',$r->wk_inout)
        ->orWhere('no_bc11',$r->no_bc11);
    }

    
}
