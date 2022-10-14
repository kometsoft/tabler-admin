<?php

namespace Tabler\App\DataTables;

use Tabler\App\Models\PersonalAccessToken;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PersonalAccessTokensDataTable extends DataTable
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
            ->addColumn('action', function ($model) {
                return view('tabler::components.datatable-actions', [
                    'id' => 'personalaccesstokens-table',
                    'route' => [
                        'show' => route('tabler.admin.personal-access-token.show', $model),
                        'edit' => route('tabler.admin.personal-access-token.edit', $model),
                    ]
                ])->toHtml();
            })
            ->editColumn('created_at', function ($model) {
                return $model->created_at?->format(config('tabler.datetime_format'));
            })
            ->editColumn('updated_at', function ($model) {
                return $model->updated_at?->format(config('tabler.datetime_format'));
            })
            ->editColumn('last_used_at', function ($model) {
                return $model->last_used_at?->diffForHumans() ?? 'Never';
            })
            ->editColumn('expires_at', function ($model) {
                return $model->expires_at?->diffForHumans() ?? 'Never';
            })
            ->editColumn('abilities', function ($model) {
                return implode(', ', $model->abilities);
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\PersonalAccessToken $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PersonalAccessToken $model): QueryBuilder
    {
        return $model->newQuery()->with('tokenable');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('personalaccesstokens-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(8)
                    ->buttons(
                        Button::make('excel'),
                        Button::make('print')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false),
            Column::make('id'),
            Column::make('tokenable.name')->title('Owner'),
            Column::make('name'),
            Column::make('abilities'),
            Column::make('last_used_at'),
            Column::make('expires_at'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'PersonalAccessTokens_' . date('YmdHis');
    }
}
