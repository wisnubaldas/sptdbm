<?php

namespace App\UseCase;

use DataTables;
use App\Models\TpsOnline\GateExpIn;
use \App\Models\TpsOnline\GateImportIn;
use \App\Models\TpsOnline\GateImportOut;
use \App\Models\TpsOnline\AutoPenegahan;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\UseCase\ExportGateInOutUseCase;

/**
 * Class UseCase.
 *
 * @package namespace App\UseCase;
 */
class ImportGateInOutUseCase implements ImportGateInOutUseCaseInterface
{
    public $export;
    public function __construct(ExportGateInOutUseCase $export)
    {
        $this->export = $export;
    }
    protected $fillable = array(
        "kd_tps",
        "nm_angkut",
        "no_voy_flight",
        "tg_tiba",
        "kd_gudang",
        "ref_num",
        "no_bl_awb",
        "tgl_bl_awb",
        "no_master_bl_awb",
        "tgl_master_bl_awb",
        "id_consignee",
        "consignee",
        "bruto",
        "kd_kem",
        "jml_kem",
        "kd_dok_inout",
        "no_dok_inout",
        "tgl_dok_inout",
        "wk_inout",
        "no_pol",
        "no_bc11",
        "tgl_bc11",
        "no_pos_bc11",
        "pel_muat",
        "pel_transit",
        "pel_bongkar",
        "no_daftar_pabean",
        "tgl_daftar_pabean",
        "no_segel_bc",
        "tg_segel_bc"
    );

    public function getCurrentNow($request)
    {
        switch ($request->target) {
            case 'IMPORT':
                $query = GateImportIn::doesntHave('tegah');
                break;
            case 'EXPORT':
                $query = GateExpIn::doesntHave('tegah');
                break;
            default:
                $query = GateImportIn::doesntHave('tegah');
                break;
        }
        
        return DataTables::of($query)
            ->filter(function ($query) {
                if (request()->has('no_bl_awb') && request()->filled('no_bl_awb')) {
                    $query->where('no_bl_awb', request('no_bl_awb'));
                }
                if (request()->has('no_bc11') && request()->filled('no_bc11')) {
                    $query->where('no_bc11', request('no_bc11'));
                }
                if (request()->has('no_daftar_pabean') && request()->filled('no_daftar_pabean')) {
                    $query->where('no_daftar_pabean', request('no_daftar_pabean'));
                }
                if (request()->has('no_master_bl_awb') && request()->filled('no_master_bl_awb')) {
                    $query->where('no_master_bl_awb', request('no_master_bl_awb'));
                }
                if (request()->has('wk_inout') && request()->filled('wk_inout')) {
                    $query->where('wk_inout', 'like', request('wk_inout') . "%");
                }
            })
            ->orderColumns(['no_bl_awb', 'wk_inout'], '-:column $1')
            ->addColumn('status_tegah', function ($data) {
                $r = route('custom.carnow.get-data-tegah', $data->no_bl_awb);
                return '<a href="' . $r . '" class="btn btn-danger btn-xs ">
                                <i class="fas fa-lg fa-fw fa-hand-paper"></i> Tegah
                        </a>';
            })
            ->rawColumns(['status_tegah'])
            ->make(true);
    }
    public function getDataTegah($awb)
    {
        $ex = $this->export->getExportTegah($awb);
        if ($ex) {
            return $ex;
        }
        return GateImportIn::where('no_bl_awb', $awb)->first();
    }
    public function setDataTegah($data, $form)
    {

        AutoPenegahan::updateOrCreate(
            ['no_bl_awb' => $form['hawb']],
            [
                'id_kms' => $data->id_kms,
                'type_penegahan' => 1,
                'kd_dok' => $data->kd_dok,
                'nm_angkut' => $data->nm_angkut,
                'no_voy_flight' => $data->no_voy_flight,
                'call_sign' => $data->call_sign,
                'tg_tiba' => $data->tg_tiba,
                'kd_gudang' => $data->kd_gudang,
                'no_bl_awb' => $form['hawb'],
                'tgl_bl_awb' => $data->tgl_bl_awb,
                'no_master_bl_awb' => $data->no_master_bl_awb,
                'tgl_master_bl_awb' => $data->tgl_master_bl_awb,
                'id_consignee' => $data->id_consignee,
                'consignee' => $data->consignee,
                'bruto' => $data->bruto,
                'no_bc11' => $data->no_bc11,
                'tgl_bc11' => $data->tgl_bc11,
                'no_pos_bc11' => $data->no_pos_bc11,
                'cont_asal' => $data->cont_asal,
                'seri_kem' => $data->seri_kem,
                'kd_kem' => $data->kd_kem,
                'jml_kem' => $data->jml_kem,
                'kd_timbun' => $data->kd_timbun,
                'kd_dok_inout' => $data->kd_dok_inout,
                'tgl_dok_inout' => $data->tgl_dok_inout,
                'wk_inout' => $data->wk_inout,
                'kd_sar_angkut' => $data->kd_sar_angkut,
                'no_pol' => $data->no_pol,
                'pel_muat' => $data->pel_muat,
                'pel_transit' => $data->pel_transit,
                'pel_bongkar' => $data->pel_bongkar,
                'kode_kantor' => $data->kode_kantor,
                'no_daftar_pabean' => $data->no_daftar_pabean,
                'tgl_daftar_pabean' => $data->tgl_daftar_pabean,
                'no_segel_bc' => $data->no_segel_bc,
                'tg_segel_bc' => $data->tg_segel_bc,
                'alasan_segel' => $form['alasan'],
                'nama_petugas_segel' => $form['petugas'],
                'flag_release' => 0,
            ]
        );
    }
    // data custom module
    public function getCustomModule()
    {
        $query = GateImportIn::has('tegah');
        return DataTables::of($query)
            ->filter(function ($query) {
                if (request()->has('no_bl_awb') && request()->filled('no_bl_awb')) {
                    $query->where('no_bl_awb', request('no_bl_awb'));
                }
                if (request()->has('no_bc11') && request()->filled('no_bc11')) {
                    $query->where('no_bc11', request('no_bc11'));
                }
                if (request()->has('no_daftar_pabean') && request()->filled('no_daftar_pabean')) {
                    $query->where('no_daftar_pabean', request('no_daftar_pabean'));
                }
                if (request()->has('no_master_bl_awb') && request()->filled('no_master_bl_awb')) {
                    $query->where('no_master_bl_awb', request('no_master_bl_awb'));
                }
                if (request()->has('wk_inout') && request()->filled('wk_inout')) {
                    $query->where('wk_inout', 'like', request('wk_inout') . "%");
                }
            })
            ->orderColumns(['no_bl_awb', 'wk_inout'], '-:column $1')
            ->addColumn('status_tegah', function ($data) {
                if ($data->tegah->flag_release == 0) {
                    return '<strong class="text-danger">Proses Tegah oleh petugas</strong>';
                }
                if ($data->tegah->flag_release == 1) {
                    return '<strong class="text-success">Barang sudah realease</strong>';
                }
            })
            ->addColumn('status_release', function ($data) {
                if ($data->tegah->flag_release == 0) {
                    $r = route('custom-module.get-release', $data->no_bl_awb);
                    return '<a href="' . $r . '" class="btn btn-success btn-xs ">
                                <i class="fas fa-lg fa-fw fa-handshake"></i> Realease
                        </a>';
                }
                if ($data->tegah->flag_release == 1) {
                    return '<button class="btn btn-info btn-xs" onClick=propData.detail_release("'.$data->no_bl_awb.'") >
                        <i class="fas fa-lg fa-fw fa-list-alt"></i> Detail
                    </button>';
                }
            })
            ->rawColumns(['status_tegah', 'status_release'])
            ->make(true);

    }
    public function getDataRelease($awb)
    {
        return GateImportIn::where('no_bl_awb', $awb)->first();
    }
    public function setDataRelease($request)
    {
        AutoPenegahan::updateOrCreate(
            ['no_bl_awb' => $request->hawb],
            [
                'no_bl_awb' => $request->hawb,
                'no_lepas_segel' => $request->no_lepas_segel,
                'petugas_lepas_segel' => $request->petugas_lepas_segel,
                'tgl_lepas_segel' => $request->tgl_lepas_segel,
                'alasan_lepas_segel' => $request->alasan_lepas_segel,
                'flag_release' => 1,
            ]
        );
    }

    // data inventory
    public function getDataInInventory($request)
    {
        $query = GateImportIn::query();
        return DataTables::of($query)
            ->filter(function ($query) {
                if (request()->has('no_bl_awb') && request()->filled('no_bl_awb')) {
                    $query->where('no_bl_awb', request('no_bl_awb'));
                }
                if (request()->has('no_bc11') && request()->filled('no_bc11')) {
                    $query->where('no_bc11', request('no_bc11'));
                }
                if (request()->has('no_daftar_pabean') && request()->filled('no_daftar_pabean')) {
                    $query->where('no_daftar_pabean', request('no_daftar_pabean'));
                }
                if (request()->has('no_master_bl_awb') && request()->filled('no_master_bl_awb')) {
                    $query->where('no_master_bl_awb', request('no_master_bl_awb'));
                }
                if (request()->has('wk_inout') && request()->filled('wk_inout')) {
                    $query->where('wk_inout', 'like', request('wk_inout') . "%");
                }
            })
            ->orderColumns(['no_bl_awb', 'wk_inout'], '-:column $1')
            ->make(true);
    }
    public function getDataOutInventory($request)
    {
        return DataTables::of(GateImportOut::query())
            ->filter(function ($query) {
                if (request()->has('no_bl_awb') && request()->filled('no_bl_awb')) {
                    $query->where('no_bl_awb', request('no_bl_awb'));
                }
                if (request()->has('no_bc11') && request()->filled('no_bc11')) {
                    $query->where('no_bc11', request('no_bc11'));
                }
                if (request()->has('no_daftar_pabean') && request()->filled('no_daftar_pabean')) {
                    $query->where('no_daftar_pabean', request('no_daftar_pabean'));
                }
                if (request()->has('no_master_bl_awb') && request()->filled('no_master_bl_awb')) {
                    $query->where('no_master_bl_awb', request('no_master_bl_awb'));
                }
                if (request()->has('wk_inout') && request()->filled('wk_inout')) {
                    $query->where('wk_inout', 'like', request('wk_inout') . "%");
                }
            })
            ->orderColumns(['no_bl_awb', 'wk_inout'], '-:column $1')
            ->make(true);
    }
    public function abandonImportIn($request)
    {
        $date = Carbon::now()->subDays(30);
        return DataTables::of(GateImportIn::query()->where('tgl_bc11', '<', $date->format('Ymd'))->where('flag_gateout', 6))
            ->filter(function ($query) {
                if (request()->has('no_bl_awb') && request()->filled('no_bl_awb')) {
                    $query->where('no_bl_awb', request('no_bl_awb'));
                }
                if (request()->has('no_bc11') && request()->filled('no_bc11')) {
                    $query->where('no_bc11', request('no_bc11'));
                }
                if (request()->has('no_daftar_pabean') && request()->filled('no_daftar_pabean')) {
                    $query->where('no_daftar_pabean', request('no_daftar_pabean'));
                }
                if (request()->has('no_master_bl_awb') && request()->filled('no_master_bl_awb')) {
                    $query->where('no_master_bl_awb', request('no_master_bl_awb'));
                }
                if (request()->has('wk_inout') && request()->filled('wk_inout')) {
                    $query->where('wk_inout', 'like', request('wk_inout') . "%");
                }
            })
            ->orderColumns(['no_bl_awb', 'wk_inout'], '-:column $1')
            ->make(true);
    }


}
