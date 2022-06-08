<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

use App\Models\Entity;

class Airplane extends Component
{

    use WithFileUploads;

    public $airplane;
    public $line;
    public $flight;
    public $airplanes;

    public $entity;
    public $airplane_edit;
    public $line_edit;
    public $flight_edit;
    public $image_edit;
    public $image;
    public $rand;

    public $id_delete;
    public $name;

    public $modal_edit;
    public $modal_delete;

    public function mount()
    {

        $this->getAirplanes();

        $this->rand = rand();

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
            "flight" => $this->flight,
            "image" => ""

        ]);

        $this->emit("created");

        $this->reset("airplane", "line", "flight");

        $this->getAirplanes();

    }

    public function edit($id)
    {

        $this->modal_edit = true;

        $this->entity = Entity::find($id);

        $this->rand = rand();

        $this->reset("image");

        $this->airplane_edit = $this->entity->airplane;
        $this->line_edit = $this->entity->line;
        $this->flight_edit = $this->entity->flight;
        $this->image_edit = $this->entity->image;

    }

    public function update()
    {

        if($this->image)
        {

            $this->entity->image ? Storage::delete($this->entity->image) : "";

            $image = $this->image->store("airplanes");

        }
        else
        {

            $image = $this->entity->image;

        }

        $this->entity->update([

            "airplane" => $this->airplane_edit,
            "line" => $this->line_edit,
            "flight" => $this->flight_edit,
            "image" => $image

        ]);

        $this->reset("image");

        $this->getAirplanes();

        $this->modal_edit = false;

    }

    public function confirmDeletion($id)
    {

        $this->modal_delete = true;

        $this->entity = Entity::find($id);

        $this->id_delete = $this->entity->id;

        $this->name = $this->entity->airplane;

    }

    public function destroy()
    {

        $this->entity->image ? Storage::delete($this->entity->image) : "";

        $this->entity->delete();

        $this->getAirplanes();

        $this->modal_delete = false;

    }

    public function render()
    {

        return view("livewire.airplane");

    }

}