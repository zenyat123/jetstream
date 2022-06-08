<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Entity;

class Airplane extends Component
{

    public $airplane;
    public $line;
    public $flight;
    public $airplanes;

    public $entity;
    public $airplane_edit;
    public $line_edit;
    public $flight_edit;

    public $id_delete;
    public $name;

    public $modal_edit;
    public $modal_delete;

    public function mount()
    {

        $this->getAirplanes();

    }

    public function getAirplanes()
    {

        $this->airplanes = Entity::all();

    }

    public function store()
    {

        Entity::create([

            "airplane" => $this->airplane,
            "line" => $this->line,
            "flight" => $this->flight

        ]);

        $this->emit("created");

        $this->reset("airplane", "line", "flight");

        $this->getAirplanes();

    }

    public function edit(Entity $airplane)
    {

        $this->modal_edit = true;

        $this->entity = Entity::find($airplane->id);

        $this->airplane_edit = $airplane->airplane;
        $this->line_edit = $airplane->line;
        $this->flight_edit = $airplane->flight;

    }

    public function update()
    {

        $this->entity->update([

            "airplane" => $this->airplane_edit,
            "line" => $this->line_edit,
            "flight" => $this->flight_edit

        ]);

        $this->getAirplanes();

        $this->modal_edit = false;

    }

    public function confirmDeletion(Entity $airplane)
    {

        $this->modal_delete = true;

        $this->entity = Entity::find($airplane->id);

        $this->id_delete = $this->entity->id;

        $this->name = $this->entity->airplane;

    }

    public function destroy()
    {

        $this->entity->delete();

        $this->getAirplanes();

        $this->modal_delete = false;

    }

    public function render()
    {

        return view("livewire.airplane");

    }

}