<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DoctorRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class DoctorCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DoctorCrudController extends CrudController
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
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/doctor');
        CRUD::setEntityNameStrings('doctor', 'doctors');

        $this->crud->denyAccess('create', 'update', 'delete');

        $this->crud->addClause('whereHas', 'roles', function($q){
            $q->where('name', 'Doctor');
        });
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('id');
        CRUD::column('name');
        CRUD::column('email');

        $this->crud->removeButton('show');
        // CRUD::addColumn([
        //     'label' => 'Doctor',
        //     'type'  => 'text',
        //     'value' => function($v) {
        //         return $v->doctor() ? $v->doctor()->name : '';
        //     }
        // ]);
        CRUD::addColumn([
            'label' => 'Department',
            'type'  => 'text',
            'value' => function($v) {
                return $v->dept() ? $v->dept()->name : '';
            },
            'orderable' => true,

        ]);
        CRUD::column('gender');
        CRUD::column('address');

        $this->crud->addButtonFromModelFunction('line', 'view_appointment', 'viewAppointment', 'beginning');
        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation(){
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
        CRUD::setValidation(UserEditRequest::class);
        
        $this->addUserFields(); 

        \App\Models\User::updating(function ($entry) {
            if (request('password') == null) {
                $entry->password = $entry->getOriginal('password');
            } else {
                $entry->password = \Hash::make(request('password'));
            }
            $entry->dept_id = $this->crud->getRequest()->dpt;
            $entry->doctor_id = $this->crud->getRequest()->dct;
        });
    }

    protected function addUserFields()
    {
        CRUD::field('name');
        CRUD::field('email');
        CRUD::field('password');
        CRUD::field('age');
        
        $doctors = \App\Models\User::role('Doctor')->pluck('name','id')->toArray();
        $depts = \App\Models\Dept::pluck('name','id')->toArray();
        if ($this->crud->getCurrentOperation() == 'update') {
            $user_id = explode('/',$this->crud->getRequest()->getRequestUri())[3];
            $user = \App\Models\User::find($user_id);

            CRUD::addField([
                // select_from_array
                'name'    => 'dct',
                'label'   => 'Doctor',
                'type'    => 'select_from_array',
                'options' => $doctors,
                'default' => $user->doctor_id
            ]);
            CRUD::addField([
                // select_from_array
                'name'    => 'dpt',
                'fake' => true,
                'label'   => 'Department',
                'type'    => 'select_from_array',
                'options' => $depts,
                'default' => $user->dept_id
            ]);
        } else {
            CRUD::addField([
                // select_from_array
                'name'    => 'dct',
                'label'   => 'Doctor',
                'type'    => 'select_from_array',
                'options' => $doctors,
            ]);
            CRUD::addField([
                // select_from_array
                'name'    => 'dpt',
                'fake' => true,
                'label'   => 'Department',
                'type'    => 'select_from_array',
                'options' => $depts,
            ]);
        }


        CRUD::addField([
            // select_from_array
            'name'    => 'gender',
            'label'   => 'Gender',
            'type'    => 'select_from_array',
            'options' => [
                'Male' => 'Male',
                'Female' => 'Female'
            ],
        ]);

        CRUD::addField([   // Checklist
            'label'     => 'Roles',
            'type'      => 'checklist',
            'name'      => 'roles',
            'entity'    => 'roles',
            'attribute' => 'name',
            'model'     => "Backpack\PermissionManager\app\Models\Role",
            'pivot'     => true,
            // 'number_of_columns' => 3,
        ]);

        CRUD::field('address');
    }
}
