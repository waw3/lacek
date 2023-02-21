<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
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
            ->editColumn('blogs', function ($user) {
                return $user->blogs->count();
            })
            ->editColumn('created_at', function ($user) {
                $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at)
                    ->format('d-m-Y h:i:s a');
                return $formatedDate;
            })
            ->editColumn('updated_at', function ($user) {
                $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $user->updated_at)
                    ->format('d-m-Y h:i:s a');
                return $formatedDate;
            })
            ->addColumn('edit', function ($user) {
                $url = url(route('dashboard.users.edit', $user->id));
                $EditButton = '<a class="btn btn-danger btn-sm" href="' . $url . '"><i class="fa fa-pencil"></i></a>';
                return $EditButton;
            })
            ->addColumn('delete', function ($user) {

                $DelButton = '<form action="' . url(route('dashboard.users.destroy', $user->id)) . '" method="post" onsubmit="return confirm(\'are you sure you want to delete this user?\')">
                    <input type="hidden" name="_token" value="' . csrf_token() . '" />
                    <input type="hidden" name="_method" value="delete">
                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>';

                if($user->id == auth()->user()->id)
                    $DelButton = '';

                return $DelButton;
            })
            ->rawColumns(['edit', 'delete'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model): QueryBuilder
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
            ->setTableId('users-table')
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
            Column::make('first_name'),
            Column::make('last_name'),
            Column::make('email'),
            Column::make('blogs')
                ->searchable(true),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('edit')
                ->title('')
                ->exportable(false)
                ->printable(false)
                ->width(50),
            Column::computed('delete')
                ->title('')
                ->exportable(false)
                ->printable(false)
                ->width(50)
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
