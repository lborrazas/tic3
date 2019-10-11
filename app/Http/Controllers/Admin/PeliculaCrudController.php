<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PeliculaRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PeliculaCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class PeliculaCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Pelicula');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/pelicula');
        $this->crud->setEntityNameStrings('pelicula', 'peliculas');
    }

    protected function setupListOperation()
    {

        $this->crud->addColumn(
            [   // color_picker
                'label' => 'Background Color',
                'name' => 'background_color',
                'type' => 'color_picker',
                'default' => '#000000',
                'color_picker_options' => ['customClass' => 'custom-class']
            ]
        );

        $this->crud->addColumn(
            [   // Address
                'name' => 'location',
                'label' => 'Address',
                'type' => 'address_algolia',
                // optional
                // 'store_as_json' => true
            ]);

    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(PeliculaRequest::class);

        $this->crud->addField(
            [   // color_picker
                'label' => 'Background Color',
                'name' => 'background_color',
                'type' => 'color_picker',
                'default' => '#000000',
                'color_picker_options' => ['customClass' => 'custom-class']
            ]
        );

        $this->crud->addField(
            [   // Address
                'name' => 'location',
                'label' => 'Address',
                'type' => 'address_algolia',
                // optional
                //'store_as_json' => true
            ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
