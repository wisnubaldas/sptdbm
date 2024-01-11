<?php

namespace App\DataTables\TpsOnline;

use App\Models\TpsOnline\GateExpIn;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class GateExpInDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', '<a href="/dasdasdsd">sdasdasd</a>')
            ->rawColumns(['action'])
            ->setRowId('id_kms');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(GateExpIn $model): QueryBuilder
    {
        return $model->where('flag_gateout',1)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('gateexpin-table')
                    ->columns($this->getColumns())
                    // ->fixedColumns(true)
                    ->responsive(true)
                    // ->scrollCollapse(true)
                    // ->scrollX(true)
                    // ->scrollY(10)
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id_kms'),
            Column::make('kd_dok'),
            Column::make('kd_tps'),
            Column::make('nm_angkut'),
            Column::make('no_voy_flight'),
            Column::make('tg_tiba'),
            Column::make('kd_gudang'),
            Column::make('ref_num'),
            Column::make('no_bl_awb'),
            Column::make('tgl_bl_awb'),
            Column::make('no_master_bl_awb'),
            Column::make('tgl_master_bl_awb'),
            Column::make('id_consignee'),
            Column::make('consignee'),
            Column::make('consignee_alm'),
            Column::make('bruto'),
            Column::make('uraian_brg'),
            Column::make('no_bc11'),
            Column::make('tgl_bc11'),
            Column::make('no_pos_bc11'),
            Column::make('cont_asal'),
            Column::make('seri_kem'),
            Column::make('kd_kem'),
            Column::make('jml_kem'),
            Column::make('kd_timbun'),
            Column::make('kd_dok_inout'),
            Column::make('no_dok_inout'),
            Column::make('tgl_dok_inout'),
            Column::make('wk_inout'),
            Column::make('kd_sar_angkut'),
            Column::make('no_pol'),
            Column::make('pel_muat'),
            Column::make("pel_transit"), 
            Column::make("pel_bongkar"), 
            Column::make("gudang_tujuan"), 
            Column::make("kode_kantor"), 
            Column::make("no_daftar_pabean"), 
            Column::make("tgl_daftar_pabean"), 
            Column::make("no_segel_bc"), 
            Column::make("tg_segel_bc"), 
            Column::make("no_ijin_tps"), 
            Column::make("tgl_ijin_tps"), 
            Column::make("flag_transfer"), 
            Column::make("flag_gateout"), 
            Column::make("respon"), 
            Column::make("token"), 
            Column::make("Manual"),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'GateExpIn_' . date('YmdHis');
    }
}
