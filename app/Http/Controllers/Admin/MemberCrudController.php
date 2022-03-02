<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use App\Models\District;
use App\Http\Requests\MemberRequest;
use App\Http\Requests\MemberUpdateRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
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
        $this->crud->addColumn([
            'name'      => 'row_number',
            'type'      => 'row_number',
            'label'     => 'No.',
            'orderable' => true,
        ])->makeFirstColumn();
        CRUD::column('name');
        CRUD::column('code');
        $this->crud->addColumns([
            [
                'label'     => 'City',
                'type'      => 'select',
                'name'      => 'city_id', // the column that contains the ID of that connected entity;
                'entity'    => 'city', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model'     => "App\Models\City", // foreign key model
            ],
            [
                'label'     => 'Location',
                'type'      => 'select',
                'name'      => 'district_id', // the column that contains the ID of that connected entity;
                'entity'    => 'district', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model'     => "App\Models\District", // foreign key model
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
        $this->crud->setValidation(MemberRequest::class);

        $this->crud->addFields([
            [
                'label' => 'Name',
                'name' => 'name',
                'wrapper' => [
                    'class' => 'form-group col-md-12',
                ]
            ],
            [
                'label' => 'Email',
                'name' => 'email',
                'type' => 'email',
                'wrapper' => [
                    'class' => 'form-group col-md-12',
                ],
            ],
            [
                'label' => 'Location',
                'name' => 'district_id',
                'wrapper' => [
                    'class' => 'form-group col-md-12',
                ],
            ],
        ]);
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

    public function store(MemberRequest $request){
        $code = Member::getCode();
        $district = District::where('id', $request->district_id)->first();
        $data = [
            'district_id' => $request->district_id,
            'city_id' => $district->city_id,
            'code' => $code,
            'name' => $request->name,
            'email' => $request->email,
        ];
        Member::create($data);

        return redirect()->route('member.index');
    }

    public function update(MemberUpdateRequest $request){
        $district = District::where('id', $request->district_id)->first();
        $data = [
            'name' => $request->name,
            'city_id' => $district->city_id,
            'district_id' => $request->district_id,
        ];

        Member::where('uuid', $request->uuid)->update($data);

        return redirect()->route('member.index');
    }
}
