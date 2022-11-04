<?php

namespace App\Http\Controllers\Admin;

use App\Mail\SlotFull;
use Illuminate\Http\Request;
use App\Http\Requests\AppRequest;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\AppEditRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class AppCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AppCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation { update as traitUpdate; }

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\App::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/appointment');
        CRUD::setEntityNameStrings('appointment', 'appointments');

        $query = $this->crud->getRequest()->query;
        if ($query->get('dept')) {
            $this->crud->addClause('where', 'dept_id', '=', $query->get('dept'));
        }
        if ($query->get('doc')) {
            $this->crud->addClause('where', 'doctor_id', '=', $query->get('doc'));
        }
        $this->crud->orderBy('priority', 'DESC')->orderBy('created_at', 'ASC');

        if (backpack_user()->hasRole('Nurse')) {
            $this->crud->denyAccess('create','delete');
            $this->crud->addClause('where', 'doctor_id', '=', backpack_user()->doctor_id);
            $this->crud->addClause('where', 'date', '=', now()->toDateString());
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
        CRUD::column('id');
        CRUD::column('expected_time');
        CRUD::column('date');

        CRUD::column('user');
        CRUD::addColumn([
            'label' => 'Doctor',
            'type'  => 'text',
            'value' => function($v) {
                return $v->doc() ? $v->doc()->name : '';
            }
        ]);
        CRUD::addColumn([
            'name' => 'dept',
            'label' => 'Department'
        ]);
        CRUD::column('status');
        CRUD::column('severity');
        CRUD::column('priority');
        
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
    protected function setupCreateOperation()
    {
        CRUD::setValidation(AppRequest::class);

        $this->addUserFields();
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
        CRUD::setValidation(AppEditRequest::class);

        $this->addUserFields();
    }

    public function store()
    {
        // do something before validation, before save, before everything; for example:
        $this->crud->addField(['type' => 'hidden', 'name' => 'expected_time']);
        $this->crud->addField(['type' => 'hidden', 'name' => 'doctor_id']);
        $this->crud->addField(['type' => 'hidden', 'name' => 'is_online']);
        $this->crud->addField(['type' => 'hidden', 'name' => 'dept_id']);
        // $this->crud->removeField('password_confirmation');

        // Note: By default Backpack ONLY saves the inputs that were added on page using Backpack fields.
        // This is done by stripping the request of all inputs that do NOT match Backpack fields for this
        // particular operation. This is an added security layer, to protect your database from malicious
        // users who could theoretically add inputs using DeveloperTools or JavaScript. If you're not properly
        // using $guarded or $fillable on your model, malicious inputs could get you into trouble.

        // However, if you know you have proper $guarded or $fillable on your model, and you want to manipulate 
        // the request directly to add or remove request parameters, you can also do that.
        // We have a config value you can set, either inside your operation in `config/backpack/crud.php` if
        // you want it to apply to all CRUDs, or inside a particular CrudController:
            // $this->crud->setOperationSetting('saveAllInputsExcept', ['_token', '_method', 'http_referrer', 'current_tab', 'save_action']);
        // The above will make Backpack store all inputs EXCEPT for the ones it uses for various features.
        // So you can manipulate the request and add any request variable you'd like.
        // $this->crud->getRequest()->request->add(['author_id'=> backpack_user()->id]);
        // $this->crud->getRequest()->request->remove('password_confirmation');
        
        $doctor_id = $this->crud->getRequest()->dct;
        $doctor = \App\Models\User::find($doctor_id);
        $date = $this->crud->getRequest()->date;
        $this->crud->getRequest()->request->remove('dct');

        $this->crud->getRequest()->request->add(['expected_time'=> \App\Models\App::getExpectedTime($date, $doctor_id)]);
        $this->crud->getRequest()->request->add(['doctor_id'=> $doctor_id]);
        $this->crud->getRequest()->request->add(['dept_id'=> $doctor->dept_id]);
    
        $this->crud->getRequest()->request->add(['is_online'=> false]);

        $response = $this->traitStore();
        // do something after save
        return $response;
    }

    public function update()
    {   
        // do something before validation, before save, before everything; for example:
        $this->crud->addField(['type' => 'hidden', 'name' => 'doctor_id']);
        $this->crud->addField(['type' => 'hidden', 'name' => 'is_online']);
        // $this->crud->addField(['type' => 'hidden', 'name' => 'author_id']);
        // $this->crud->removeField('password_confirmation');

        // Note: By default Backpack ONLY saves the inputs that were added on page using Backpack fields.
        // This is done by stripping the request of all inputs that do NOT match Backpack fields for this
        // particular operation. This is an added security layer, to protect your database from malicious
        // users who could theoretically add inputs using DeveloperTools or JavaScript. If you're not properly
        // using $guarded or $fillable on your model, malicious inputs could get you into trouble.

        // However, if you know you have proper $guarded or $fillable on your model, and you want to manipulate 
        // the request directly to add or remove request parameters, you can also do that.
        // We have a config value you can set, either inside your operation in `config/backpack/crud.php` if
        // you want it to apply to all CRUDs, or inside a particular CrudController:
            // $this->crud->setOperationSetting('saveAllInputsExcept', ['_token', '_method', 'http_referrer', 'current_tab', 'save_action']);
        // The above will make Backpack store all inputs EXCEPT for the ones it uses for various features.
        // So you can manipulate the request and add any request variable you'd like.
        // $this->crud->getRequest()->request->add(['author_id'=> backpack_user()->id]);
        // $this->crud->getRequest()->request->remove('password_confirmation');
        // $this->crud->getRequest()->request->add(['author_id'=> backpack_user()->id]);
        // $this->crud->getRequest()->request->remove('password_confirmation');

        $doctor_id = $this->crud->getRequest()->dct;
        $date = $this->crud->getRequest()->date;
        $this->crud->getRequest()->request->remove('dct');

        $doctor_id && $this->crud->getRequest()->request->add(['doctor_id'=> $doctor_id]);
        
        $app_id = explode('/',$this->crud->getRequest()->getRequestUri())[3];
        $app = \App\Models\App::find($app_id);
        
        $severity = $this->crud->getRequest()->severity;
        $priority = 1;
        if($severity) {
            $this->crud->addField(['type' => 'hidden', 'name' => 'priority']);
            if ($severity == 'Emergency') {
                $priority = 4;
            } else if ($severity == 'Urgent') {
                $priority = 3;
            } else if ($severity == 'Referal') {
                $priority = 2;
            }
        }
        if ($app->status == 'Unpaid' && $this->crud->getRequest()->status == 'Paid') {
            if (strtotime(now()) <= strtotime($app->expected_time) + config('app.time_frame')*60) {
                $priority += 1;
            }
        }
        $this->crud->getRequest()->request->add(['priority'=> $priority]);
        
        $response = $this->traitUpdate();

        // do something after save
        return $response;
    }

    protected function addUserFields()
    {
        CRUD::field('date');
        CRUD::addField([  // Select
            'label'     => "User",
            'type'      => 'select',
            'name'      => 'user_id',
            'options'   => (function ($query) {
                 return $query->whereHas(
                    'roles', function($q){
                        $q->where('name', 'Patient');
                    })->get();
             }), //  you can use this to filter the results show in the select
         ],);

        $doctors = \App\Models\User::role('Doctor')->pluck('name','id')->toArray();
        if ($this->crud->getCurrentOperation() == 'update') {
            $appointment_id = explode('/',$this->crud->getRequest()->getRequestUri())[3];
            $appointment = \App\Models\App::find($appointment_id);

            
            CRUD::addFields([
                [
                    // select_from_array
                    'name'    => 'dct',
                    'label'   => 'Doctor',
                    'type'    => 'select_from_array',
                    'options' => $doctors,
                    'default' => $appointment->doctor_id
                ],
                [
                    // select_from_array
                    'name'    => 'status',
                    'label'   => 'Status',
                    'type'    => 'select_from_array',
                    'options' => [
                        'Unpaid' => 'Unpaid',
                        'Paid' => 'Paid',
                        'Checked' => 'Checked',
                    ]
                ],
                [
                    // select_from_array
                    'name'    => 'severity',
                    'label'   => 'Severity',
                    'type'    => 'select_from_array',
                    'options' => [
                        'Emergency' => 'Emergency',
                        'Urgent' => 'Urgent',
                        'Referal' => 'Referal',
                        'Normal' => 'Normal',
                    ]
                ],
            ]);

            CRUD::addField([
                // select_from_array
                'name'    => 'status',
                'label'   => 'Status',
                'type'    => 'select_from_array',
                'options' => [
                    'Unpaid' => 'Unpaid',
                    'Paid' => 'Paid',
                    'Checked' => 'Checked',
                ],
            ]);


        } else {
            CRUD::addField([
                // select_from_array
                'name'    => 'dct',
                'label'   => 'Doctor',
                'type'    => 'select_from_array',
                'options' => $doctors,
            ]);
        }

        if ($this->crud->getCurrentOperation() == 'update') {
            $this->crud->modifyField('date', [
                'attributes' => [
                    'disabled' => 'disabled'
                ]
            ]);

            $this->crud->modifyField('user_id', [
                'attributes' => [
                    'disabled' => 'disabled'
                ]
            ]);

            $this->crud->modifyField('dct', [
                'attributes' => [
                    'disabled' => 'disabled'
                ]
            ]);
        }
    }

    public function slotFull(Request $request)
    {
        $doc_t = \App\Models\DoctorTime::where('user_id', $request->doc)->first();
        
        $apps = \App\Models\App::where('expected_time', '>=', $doc_t->start)
                                    ->where('expected_time', '<=', $doc_t->end)
                                    ->where('status', 'Unpaid')
                                    ->where('doctor_id', $request->doc)
                                    ->where('date', now()->toDateString())
                                    ->get();
        
        $user_emails = [];

        foreach ($apps as $app) {
            array_push($user_emails, $app->user->email);
        }

        Mail::to($user_emails)->send(new SlotFull());

        return redirect(backpack_url('queue'))->with('success', 'Mails Sent.');
    }
}
