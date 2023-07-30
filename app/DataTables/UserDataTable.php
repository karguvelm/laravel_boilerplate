<?php

namespace App\DataTables;

use App\User;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends BaseDataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->editColumn('created_at', function ($model) {
                return $model->created_at->format('Y-m-d');
            })
            ->addColumn('action', function ($model) {
                $action = '<a href="' . route('webadmin.users.edit', $model->id) . '" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit text-white"></i></a>&nbsp;';
                if($model->email != "admin@admin.com")
                {
                    $action .= ' <a href="javascript:void(0);" class="btn btn-danger btn-sm btndelete" data-id="' . $model->id . '" data-model="users" data-route="webadmin" data-loading-text="<i class=\'fa fa-spin fa-spinner\'></i> Please Wait..." title="Delete"><i class="fa fa-trash text-white"></i></a>';
                }
                return $action;
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $params = $this->getBuilderParameters();
        $params['order'] = [[0, 'asc']];
        $params['buttons'] = [];
        $actionParam['width'] = '210px';

        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction($this->getActionParamters())
            ->parameters($params);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return $columns = ['name', 'email', 'created_at'];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'User_' . date('YmdHis');
    }
}
