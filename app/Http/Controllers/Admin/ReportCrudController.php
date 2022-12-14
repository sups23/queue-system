<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ReportRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ReportCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ReportCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Report::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/report');
        CRUD::setEntityNameStrings('report', 'reports');

        $this->crud->denyAccess('create', 'edit', 'delete');

        if (backpack_user()->hasRole('Nurse')) {
            $this->crud->allowAccess('create', 'edit', 'delete');

            $this->crud->addClause('whereHas', 'appointment', function($q){
                $q->where('doctor_id', backpack_user()->doctor_id);
            });
        }
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn([
            'label' => 'Appointment',
            'type'  => 'text',
            'value' => function($v) {
                $app = \App\Models\App::find($v->app_id);
                return $app->user->name . ' -- ' . $app->expected_time . ' -- ' . $app->dept->name;
            }
        ]);

        CRUD::addColumn([
            'name'      => 'media', // The db column name
            'label'     => 'Report', // Table column heading
            'type'      => 'image',
            'prefix' => 'storage/',
            // image from a different disk (like s3 bucket)
            // 'disk'   => 'disk-name', 
            // optional width/height if 25px is not ok with you
            'height' => 'auto',
            'width'  => '200px',
        ]);
        CRUD::column('created_at');
        CRUD::column('updated_at');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ReportRequest::class);

        $apps = \App\Models\App::where('doctor_id', backpack_user()->doctor_id)
                                    ->where('status', 'Checked')
                                    ->get();
        $apps_array = [];
        foreach ($apps as $app) {
            $apps_array[$app->id] = $app->user->name . ' -- ' . $app->expected_time . ' -- ' . $app->dept->name;
        }

        CRUD::addField([
            // select_from_array
            'name'    => 'app_id',
            'label'   => 'Appointment',
            'type'    => 'select_from_array',
            'options' => $apps_array,
        ]);

        CRUD::addField([   // Upload
            'name'      => 'media',
            'label'     => 'Report',
            'type'      => 'upload',
            'upload'    => true,
        ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
