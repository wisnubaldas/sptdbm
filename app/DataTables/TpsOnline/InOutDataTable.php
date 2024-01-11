<?php

namespace App\DataTables\TpsOnline;
use App\Models\TpsOnline\GateExpOut;
use App\Models\TpsOnline\GateExpIn;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class InOutDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', '<a href="#" class="btn btn-warning btn-sm">Edit</a>')
        ->rawColumns(['action'])
        ->setRowId('id_kms');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(GateExpOut $model): QueryBuilder
    {
        $first = GateExpIn::select(["kd_dok", "kd_tps", "nm_angkut", "no_voy_flight"]);
        return $model
        ->select(["kd_dok", "kd_tps", "nm_angkut", "no_voy_flight"])
        ->union($first)
        ->newQuery();
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
                    ->selectStyleSingle();
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
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'InOut_' . date('YmdHis');
    }
}
