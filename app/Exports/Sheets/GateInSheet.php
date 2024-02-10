<?php
namespace App\Exports\Sheets;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use \App\Models\TpsOnline\GateImportIn;
use \App\Models\TpsOnline\GateExpIn;

class GateInSheet implements FromQuery, WithTitle, ShouldAutoSize, WithHeadings
{
    private $request;
    public function __construct($x)
    {
        $this->request = $x;
    }
    public function query()
    {
        if($this->request->type == "IMPORT") {
            return GateImportIn::query()
                ->where('no_bl_awb',$this->request->no_bl_awb)
                ->orWhere('no_daftar_pabean',$this->request->no_daftar_pabean)
                ->orWhere('ref_num',$this->request->ref_num)
                ->orWhere('no_master_bl_awb',$this->request->no_master_bl_awb)
                ->orWhere('wk_inout',$this->request->wk_inout)
                ->orWhere('no_bc11',$this->request->no_bc11);
        }

        if($this->request->type == "EXPORT") {
            return GateExpIn::query()
                        ->where('no_bl_awb',$this->request->no_bl_awb)
                        ->orWhere('no_daftar_pabean',$this->request->no_daftar_pabean)
                        ->orWhere('ref_num',$this->request->ref_num)
                        ->orWhere('no_master_bl_awb',$this->request->no_master_bl_awb)
                        ->orWhere('wk_inout',$this->request->wk_inout)
                        ->orWhere('no_bc11',$this->request->no_bc11);
        }
    }
    public function title(): string
    {
        return $this->request->type.' GateIn';
    }
    public function headings(): array
    {
        return ["ID", "KD DOC", "KD TPS", "NAMA ANGKUT", "NO VOY/FLIGHT", 
        "CALL SIGN", "TGL TIBA", "KD GUDANG", "REF NUMBER", "NO BL/AWB", "TGL BL/AWB", 
        "NO MASTER BL/AWB", "TGL MASTER BL/AWB", "ID CONSIGNEE", "CONSIGNEE", "ALAMAT CONSIGNEE", 
        "BRUTO", "URAIAN", "NO BC11", "TGL BC11", "NO POS BC11", "CONT ASAL", "SERI KEMASAN", "KD KEMASAN", 
        "JML KEMASAN", "KD TIMBUN", "KD DOC INOUT", "NO DOC INOUT", "TGL DOC INOUT", "WAKTU INOUT", 
        "SARANA ANGKUT", "NO POL", "PEL MUAT", "PEL TRANSIT", "PEL BONGKAR", "GUDANG TUJUAN", "KODE KANTOR", 
        "NO DAFTAR PABEAN", "TGL DAFTAR PABEAN", "NO SEGEL", "TGL SEGEL", "NO IJIN", "TGL IJIN", "id_kms_in", "flag_transfer", "date_create", "date_update", "respon", "token"];
    }
}