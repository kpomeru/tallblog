<?php

namespace App\Http\Livewire\Components;

use App\Traits\SharedTrait;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Trix extends Component
{
    use WithFileUploads;
    use SharedTrait;

    const EVENT_VALUE_UPDATED = 'trix_value_updated';

    /** @var array<objects> */
    public $photos = [];

    /** @var array<objects> */
    public $files_to_delete = [];

    /** @var bool */
    public $disabled;

    /** @var string */
    public $trix_id;

    /** @var string */
    public $value;

    public function mount($value = '')
    {
        $this->value = $value;
        $this->trix_id = 'trix-' . str()->random();
    }

    public function updatedValue($value)
    {
        if (!$this->disabled) {
            $this->emit(self::EVENT_VALUE_UPDATED, $this->value);
        }
    }

    public function render()
    {
        return view('livewire.components.trix');
    }

    public function completeUpload(string $uploadedUrl, string $trixUploadCompletedEvent): void
    {
        foreach ($this->photos as $photo) {
            if ($photo->getFilename() == $uploadedUrl) {
                $filename = $photo->store('posts/editor');
                $url = asset($filename);
                // $url = Storage::url($newFilename);

                $this->dispatchBrowserEvent($trixUploadCompletedEvent, [
                    'url' => $url,
                    'href' => $url,
                ]);
            }
        }
    }

    public function removeUploadedFile($name): void
    {
        // array_push($this->files_to_delete, $name);
    }
}
