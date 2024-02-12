<?php

namespace App\UseCase;

use Barryvdh\DomPDF\Facade\Pdf;
use \App\Models\TpsOnline\GateImportIn;
use \App\Models\TpsOnline\GateImportOut;
/**
 * Class UseCase.
 *
 * @package namespace App\UseCase;
 */
class TpsPdfUseCase implements TpsPdfUseCaseInterface
{
    public $tHead =  array("KODE DOK", "kd_tps", "nm_angkut", "kd_gudang", "ref_num", "no_bl_awb", "no_master_bl_awb", "no_bc11", "tgl_bc11",  "jml_kem","no_dok_inout", "wk_inout",  "no_daftar_pabean",  "no_segel_bc");
    public function inventory($request,$title){
        $data = [];
        switch ($request->type) {
            case 'IMPORT':
                $gate_in = $this->import_gate_in($request)->take(100)->get();
                $gate_out = $this->import_gate_out($request)->take(100)->get();
                $data = array_merge($gate_out->toArray(),$gate_in->toArray());
                break;
            
            case 'EXPORT':
                break;
        }
        $tHead = $this->tHead;

        // return view('components.tps-pdf',compact('data','title','tHead'));
        $pdf = Pdf::loadView('components.tps-pdf', compact('data','title','tHead'))
                    ->setPaper('a4', 'landscape');
        $pdf->setOptions([
            'isRemoteEnabled' => true,
        ]);
        return $pdf->download('invoice.pdf');
    }
    protected function import_gate_in($r){
        return GateImportIn::select(["kd_tps", "nm_angkut", "kd_gudang", "ref_num", "no_bl_awb", "no_master_bl_awb", "no_bc11"]);
        // ->where('no_bl_awb',$r->no_bl_awb)
        // ->orWhere('no_daftar_pabean',$r->no_daftar_pabean)
        // ->orWhere('ref_num',$r->ref_num)
        // ->orWhere('no_master_bl_awb',$r->no_master_bl_awb)
        // ->orWhere('wk_inout',$r->wk_inout)
        // ->orWhere('no_bc11',$r->no_bc11);
    }
    protected function import_gate_out($r){
        return GateImportOut::select(["kd_tps", "nm_angkut", "kd_gudang", "ref_num", "no_bl_awb", "no_master_bl_awb", "no_bc11"]);
        // ->where('no_bl_awb',$r->no_bl_awb)
        // ->orWhere('no_daftar_pabean',$r->no_daftar_pabean)
        // ->orWhere('ref_num',$r->ref_num)
        // ->orWhere('no_master_bl_awb',$r->no_master_bl_awb)
        // ->orWhere('wk_inout',$r->wk_inout)
        // ->orWhere('no_bc11',$r->no_bc11);
    }
    protected function export_gate_in($r){

    }
    protected function export_gate_out($r){

    }

    
}
