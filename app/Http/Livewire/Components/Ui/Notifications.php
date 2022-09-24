<?php

namespace App\Http\Livewire\Components\Ui;

use Livewire\Component;

class Notifications extends Component
{
    /** @var string */
    public $type = 'info';

    /** @var string */
    public $message = '';

    protected $listeners = ['setData'];

    public function setData($payload): void
    {
        // dd($payload);
        $this->message = $payload['message'] ?? '';
        $this->type = $payload['type'] ?? 'info';
    }

    public function render()
    {
        return view('livewire.components.ui.notifications');
    }
}
