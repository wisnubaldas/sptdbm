<?php

namespace App\UseCase;

use DataTables;
use \App\Models\TpsOnline\GateImportIn;
use \App\Models\TpsOnline\GateImportOut;
use \App\Models\TpsOnline\AutoPenegahan;
use Illuminate\Support\Facades\DB;
/**
 * Class UseCase.
 *
 * @package namespace App\UseCase;
 */
class ImportGateInOutUseCase implements ImportGateInOutUseCaseInterface
{
    protected $fillable = array("kd_tps", "nm_angkut", "no_voy_flight","tg_tiba", 
    "kd_gudang", "ref_num", "no_bl_awb", "tgl_bl_awb", "no_master_bl_awb", "tgl_master_bl_awb", 
    "id_consignee", "consignee", "bruto", "kd_kem","jml_kem", "kd_dok_inout",
    "no_dok_inout", "tgl_dok_inout", "wk_inout","no_pol",
    "no_bc11", "tgl_bc11", "no_pos_bc11", "pel_muat", "pel_transit","pel_bongkar",
     "no_daftar_pabean", "tgl_daftar_pabean", "no_segel_bc","tg_segel_bc");

    public function getCurrentNow($request)
    {
        // dd(request()->has('bc11'));
        $query = GateImportIn::doesntHave('tegah');
        // $union = GateImportOut::doesntHave('tegah')->union($query)->where('tg_tiba',20200102);
        // return $union->get();
        // return DataTables::queryBuilder($union)
        // ->setTotalRecords($union->count())

        return DataTables::eloquent($query)
                ->orderColumns(['no_bl_awb', 'wk_inout'], '-:column $1')
                ->addColumn('status_tegah', function($data){
                    $r = route('custom.carnow.get-data-tegah',$data->no_bl_awb);
                    return '<a href="'.$r.'" class="btn btn-danger btn-sm ">
                                <i class="fas fa-lg fa-fw fa-hand-paper"></i> Tegah
                        </a>';
                })
                ->rawColumns(['status_tegah'])
                ->make(true);
    }
    public function getDataTegah($awb){
        return GateImportIn::where('no_bl_awb',$awb)->first();
    }
    public function setDataTegah($data,$form){
        
        AutoPenegahan::updateOrCreate(
            ['no_bl_awb' =>  $form['hawb']],
            [
                'id_kms' => $data->id_kms,
                'type_penegahan'=>1,
                'kd_dok'=>$data->kd_dok,
                'nm_angkut'=>$data->nm_angkut,
                'no_voy_flight'=>$data->no_voy_flight,
                'call_sign'=>$data->call_sign,
                'tg_tiba'=>$data->tg_tiba,
                'kd_gudang'=>$data->kd_gudang,
                'no_bl_awb'=>$form['hawb'],
                'tgl_bl_awb'=>$data->tgl_bl_awb,
                'no_master_bl_awb'=>$data->no_master_bl_awb,
                'tgl_master_bl_awb'=>$data->tgl_master_bl_awb,
                'id_consignee'=>$data->id_consignee,
                'consignee'=>$data->consignee,
                'bruto'=>$data->bruto,
                'no_bc11'=>$data->no_bc11,
                'tgl_bc11'=>$data->tgl_bc11,
                'no_pos_bc11'=>$data->no_pos_bc11,
                'cont_asal'=>$data->cont_asal,
                'seri_kem'=>$data->seri_kem,
                'kd_kem'=>$data->kd_kem,
                'jml_kem'=>$data->jml_kem,
                'kd_timbun'=>$data->kd_timbun,
                'kd_dok_inout'=>$data->kd_dok_inout,
                'tgl_dok_inout'=>$data->tgl_dok_inout,
                'wk_inout'=>$data->wk_inout,
                'kd_sar_angkut'=>$data->kd_sar_angkut,
                'no_pol'=>$data->no_pol,
                'pel_muat'=>$data->pel_muat,
                'pel_transit'=>$data->pel_transit,
                'pel_bongkar'=>$data->pel_bongkar,
                'kode_kantor'=>$data->kode_kantor,
                'no_daftar_pabean'=>$data->no_daftar_pabean,
                'tgl_daftar_pabean'=>$data->tgl_daftar_pabean,
                'no_segel_bc'=>$data->no_segel_bc,
                'tg_segel_bc'=>$data->tg_segel_bc,
                'alasan_segel'=>$form['alasan'],
                'nama_petugas_segel'=>$form['petugas'],
                'flag_release'=>0,
            ]
        );
    }
}
