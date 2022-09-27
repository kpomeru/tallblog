<?php

namespace App\Http\Livewire\Components\Categories;

use App\Models\Category;
use App\Traits\SharedTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditCategory extends Component
{
    use WithFileUploads;
    use SharedTrait;

    protected $listeners = [
        '$refresh',
        'edit'
    ];

    public $image;
    public $category;
    public $showModal = true;

    public function mount()
    {
        // $c = Category::whereNotNull('image')->inRandomOrder()->first();
        // $this->edit($c);
    }

    public function render()
    {
        return view('livewire.components.categories.edit-category');
    }

    protected function rules()
    {
        return [
            'category.hexcode' => "nullable|min:6|max:6",
            'image' => "nullable|image|max:1024",
        ];
    }

    public function edit(Category $category)
    {
        if (isset($category)) {
            $this->clearErrorBag();
            $this->category = $category;
            $this->showModal = true;
        }
    }

    public function clearErrorBag()
    {
        $this->resetErrorBag();
    }

    public function destroy()
    {
        $this->showModal = false;
    }

    public function set_uploaded_image_property($path)
    {
        $deleted_previous_image = true;

        if (isset($this->category->image)) {
            $deleted_previous_image = $this->delete_previous_image($this->category->image);
        }

        if ($deleted_previous_image) {
            $this->category->image = $path;
        }
    }

    public function update()
    {
        $this->validate();

        if (isset($this->image)) {
            $path = $this->image->store('categories');
        }

        if (isset($path)) {
            $this->set_uploaded_image_property($path);
        }

        $this->category->save();
        $this->category->refresh();
        $this->emitUp('$refresh');
        $this->snotify("{$this->category->title} updated.");
        $this->destroy();
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'nullable|image|max:1024',
        ]);
    }
}
