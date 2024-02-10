<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Illuminate\Http\Request;

use \App\Exports\Sheets\GateInSheet;
use \App\Exports\Sheets\GateOutSheet;

class TpsImport implements WithMultipleSheets
{
    use Exportable;
    protected $reqClient;
    public function __construct(Request $reqClient)
    {
        $this->reqClient = $reqClient;
    }
    public function sheets(): array
    {
        return [
            new GateInSheet($this->reqClient),
            new GateOutSheet($this->reqClient),
        ];
    }
}
