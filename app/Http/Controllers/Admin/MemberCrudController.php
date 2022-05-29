<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MemberRequest;
use App\Http\Requests\MemberUpdateRequest;
use App\Models\Member;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudField;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class MemberCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MemberCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        $this->crud->setModel(\App\Models\Member::class);
        $this->crud->setRoute('/member');
        $this->crud->setEntityNameStrings('Member', 'Members');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->addColumns([
            [
                'label' => 'Code',
                'name' => 'code',
            ],
            [
                'label' => 'Name',
                'name' => 'name',
            ],
            [
                'label' => 'Email',
                'name' => 'email',
            ],
            [
                'label' => 'Location',
                'name' => 'district_name',
                'entity' => 'district',
                'attribute' => 'district_name',
            ],
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        

        $this->crud->addFields([
            [
                'label' => 'Code',
                'name' => 'code',
                'wrapper' => [
                    'class' => 'form-group col-md-6',
                ]
            ],
            [
                'label' => 'Name',
                'name' => 'name',
                'wrapper' => [
                    'class' => 'form-group col-md-6',
                ]
            ],
            [
                'label' => 'Email',
                'name' => 'email',
                'type' => 'email',
                'wrapper' => [
                    'class' => 'form-group col-md-6',
                ],
            ],
            [
                'label' => 'Location',
                'name' => 'district_id',
                'type' => 'select',
                'entity' => 'district',
                'attribute' => 'district_name',
                'model' => 'App\Models\District',
                'wrapper' => [
                    'class' => 'form-group col-md-6',
                ],
            ],
        ]);

        $this->crud->setValidation(MemberRequest::class);
        
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
        
        $this->crud->removeField('code');
        $this->crud->setValidation(MemberUpdateRequest::class);
    }
}
