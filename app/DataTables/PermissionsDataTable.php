<?php

namespace App\DataTables;

use App\Models\Permission;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PermissionsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->editColumn('created_at', function ($permission) {
            $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $permission->created_at)
                ->format('d-m-Y h:i:s a');
            return $formatedDate;
        })
        ->editColumn('updated_at', function ($permission) {
            $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $permission->updated_at)
                ->format('d-m-Y h:i:s a');
            return $formatedDate;
        })
        ->addColumn('edit', function ($permission) {
            $url = url(route('dashboard.permissions.edit', $permission->id));
            $EditButton = '<a href="' . $url . '">Edit</a>';
            return $EditButton;
        })
        ->addColumn('delete', function ($permission) {
            $url = url(route('dashboard.permissions.destroy', $permission->id));
            $csrf = csrf_token();
            $DelButton = '<form action="' . $url . '" method="post">
                <input type="hidden" name="_token" value="' . $csrf . '" />
                <input type="hidden" name="_method" value="delete">
                <button class="btn btn-danger btn-sm">del</button>
                </form>';
            return $DelButton;
        })
        ->rawColumns(['edit', 'delete'])
        ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Permission $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Permission $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('permissions-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->parameters([
                        "dom"           => "<'row'<'col-sm-12'<'text-center bg-body-light py-2 mb-2'B>>><'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                        "buttons"       => ['excel', 'csv', 'pdf', 'print'],
                        "autoWidth"     => false,
                        "responsive"     => true
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('edit')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60),
            Column::computed('delete')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Permissions_' . date('YmdHis');
    }
}
