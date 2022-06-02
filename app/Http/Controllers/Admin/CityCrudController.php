<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CityRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CityCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CityCrudController extends CrudController
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
        CRUD::setModel(\App\Models\City::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/city');
        CRUD::setEntityNameStrings('city', 'cities');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::column('city_name');
        // CRUD::column('province_name ');

        // CRUD::addColumn([
        //     'name' => 'city_name',
        //     'label' => 'City',
        //     'type' => 'text',
        //     'wrapper' => [
        //         'class' => 'form-group col-md-6'
        //     ]
        // ]);

        // CRUD::addColumn([
        //     'name' => 'province_name',
        //     'label' => 'Province',
        //     'type' => 'select',
        //     'entity' => 'province',
        //     'attribute' => 'province_name',
        //     'model' => 'App\Models\Province',
        //     'wrapper' => [
        //         'class' => 'form-group col-md-6'
        //     ]
        // ]);


            $this->crud->addColumns([
                [
                    'label' => 'City',
                    'name' => 'city_name',
                    'type' => 'text',
                ],
                [
                    'label' => 'Province',
                    'name' => 'province_name',
                    'type' => 'select',
                    'entity' => 'province',
                    'attribute' => 'province_name',
                    'model' => 'App\Models\Province',
                ],
            ]);


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
        CRUD::setValidation(CityRequest::class);

        // CRUD::field('city_name');


        CRUD::addField([
            'name' => 'city_name',
            'label' => 'City',
            'type' => 'text',
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ]
        ]);
        
        CRUD::addField([
            'name' => 'province_id',
            'label' => 'Province',
            'type' => 'select',
            'entity' => 'province',
            'attribute' => 'province_name',
            'model' => 'App\Models\Province',
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ]
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
