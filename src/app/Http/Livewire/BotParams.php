<?php

namespace App\Http\Livewire;

use App\Models\Deadline;
use App\Models\Discipline;
use App\Models\Page;
use App\Models\Service;
use Livewire\Component;

class BotParams extends Component
{
    public $readyToLoad = false;

    public function loadParams()
    {
        $this->readyToLoad = true;
    }

    public function services(string $id)
    {
        $param = Service::query()->findOrFail($id);
        if (!$param->is_allowed) {
            $param->is_allowed = true;
            $this->alert(
                'success',
                'Activated ' . $param->name
            );
        } else {
            $param->is_allowed = false;
            $this->alert(
                'error',
                'De-activated ' . $param->name
            );
        }
        $param->save();
        $this->loadParams();
    }

    public function disciplines(string $id)
    {
        $param = Discipline::query()->findOrFail($id);
        if (!$param->is_allowed) {
            $param->is_allowed = true;
            $this->alert(
                'success',
                'Activated ' . $param->name
            );
        } else {
            $param->is_allowed = false;
            $this->alert(
                'error',
                'De-activated ' . $param->name
            );
        }
        $param->save();
        $this->loadParams();
    }

    public function pages(string $id)
    {
        $param = Page::query()->findOrFail($id);
        if (!$param->is_allowed) {
            $param->is_allowed = true;
            $this->alert(
                'success',
                'Activated ' . $param->from . ' - ' . $param->to . ' ' . $param->metric
            );
        } else {
            $param->is_allowed = false;
            $this->alert(
                'error',
                'De-activated ' . $param->from . ' - ' . $param->to . ' ' . $param->metric
            );
        }
        $param->save();
        $this->loadParams();
    }

    public function deadlines(string $id)
    {
        $param = Deadline::query()->findOrFail($id);
        if (!$param->is_allowed) {
            $param->is_allowed = true;
            $this->alert(
                'success',
                'Activated ' . $param->from . ' - ' . $param->to . ' ' . $param->metric
            );
        } else {
            $param->is_allowed = false;
            $this->alert(
                'error',
                'De-activated ' . $param->from . ' - ' . $param->to . ' ' . $param->metric
            );
        }
        $param->save();
        $this->loadParams();
    }

    public function render()
    {
        return view('livewire.bot-params', [
            'services' => $this->readyToLoad
                ? Service::query()->orderBy('name')->get()
                : [],
            'pages' => $this->readyToLoad
                ? Page::query()->oldest('from')->get()
                : [],
            'deadlines' => $this->readyToLoad
                ? Deadline::query()->oldest('from')->get()
                : [],
            'disciplines' => $this->readyToLoad
                ? Discipline::query()->oldest('name')->get()
                : []
        ]);
    }
}
