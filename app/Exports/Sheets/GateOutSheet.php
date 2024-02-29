<?php
namespace App\Exports\Sheets;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use \App\Models\TpsOnline\GateImportOut;
use \App\Models\TpsOnline\GateExpOut;
class GateOutSheet implements FromQuery, WithTitle, ShouldAutoSize, WithHeadings
{
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * @return Builder
     */
    public function query()
    {
        if($this->request->type == "IMPORT") {
            return GateImportOut::query()
                ->where('no_bl_awb',$this->request->no_bl_awb)
                ->orWhere('no_daftar_pabean',$this->request->no_daftar_pabean)
                ->orWhere('ref_num',$this->request->ref_num)
                ->orWhere('no_master_bl_awb',$this->request->no_master_bl_awb)
                ->orWhere('wk_inout','like',$this->request->wk_inout.'%')
                ->orWhere('no_bc11',$this->request->no_bc11);
        }

        if($this->request->type == "EXPORT") {
            return GateExpOut::query()
                        ->where('no_bl_awb',$this->request->no_bl_awb)
                        ->orWhere('no_daftar_pabean',$this->request->no_daftar_pabean)
                        ->orWhere('ref_num',$this->request->ref_num)
                        ->orWhere('no_master_bl_awb',$this->request->no_master_bl_awb)
                        ->orWhere('wk_inout','like',$this->request->wk_inout.'%')
                        ->orWhere('no_bc11',$this->request->no_bc11);
        }
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->request->type.' GateOut';
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