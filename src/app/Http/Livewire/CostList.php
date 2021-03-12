<?php

namespace App\Http\Livewire;

use App\Models\Cost;
use Livewire\Component;

class CostList extends Component
{
    public $readyToLoad = false;
    public $actual_cost;
    public $bid_cost;

    public function loadCosts()
    {
        $this->readyToLoad = true;
    }

    protected $rules = [
        'actual_cost' => 'required|numeric',
        'bid_cost' => 'required|numeric',
    ];

    public function submit()
    {
        $validatedData = $this->validate();

        // Execution doesn't reach here if validation fails.
        Cost::query()->create($validatedData);
        $this->reset();
        $this->loadCosts();
        $this->alert(
            'success',
            'New budget cost added successfully.'
        );
    }

    public function remove(string $id)
    {
        Cost::query()->findOrFail($id)->forceDelete();
        $this->loadCosts();
        $this->alert(
            'info',
            'Deleted a budget cost.'
        );
    }

    public function render()
    {
        return view('livewire.cost-list', [
            'costs' => $this->readyToLoad
                ? Cost::query()->latest()->get()
                : [],
        ]);
    }
}
