<?php

namespace App\Http\Livewire\Pages\Posts;

use App\Http\Livewire\Components\Trix;
use App\Models\Category;
use App\Models\Post;
use App\Traits\SharedTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePostPage extends Component
{
    use SharedTrait;
    use WithFileUploads;

    /** @var boolean */
    public $featured = false;

    /** @var object */
    public $image;

    /** @var string */
    public $mode = 'create';

    /** @var object */
    public Post $model;

    /** @var object */
    public Post $post;

    /** @var boolean */
    public $published = false;

    /** @var string */
    public $tags;

    public $listeners = [
        Trix::EVENT_VALUE_UPDATED
    ];

    public function mount()
    {
        $this->authorize();

        if (isset($this->post)) {
            $this->mode = 'edit';
        }

        $this->set_data();
    }

    protected function rules()
    {
        return [
            'featured' => 'boolean',
            'image' => "nullable|image|max:1024",
            'model.category_id' => 'required|string|exists:categories,id',
            'model.content' => 'sometimes',
            'model.excerpt' => 'required|string|max:200',
            'model.title' => 'required|string|min:3',
            'model.user_id' => 'required|string|exists:users,id',
            'published' => 'boolean',
            'tags' => 'nullable|string',
        ];
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'nullable|image|max:1024',
        ]);
    }

    public function authorize()
    {
        // if (auth()->user()->can_post)
    }

    public function trix_value_updated($value)
    {
        $this->model->content = $value;
        if ($this->mode === 'edit') {
            $this->model->update(['content' =>  $this->model->content]);
        }
    }

    public function set_data()
    {
        if ($this->mode === 'edit' && isset($this->post)) {
            $this->model = $this->post;
            $this->published = isset($this->model->published_at) ? true : false;
            $this->featured = isset($this->model->featured_at) ? true : false;

            if (isset($this->model->tags)) {
                $this->tags = implode(', ', $this->model->tags);
            }
        } else {
            $this->model = Post::make([
                'category_id' => '',
                'content' => '',
                'excerpt' => '',
                'featured_at' => '',
                'image' => '',
                'published_at' => '',
                'slug' => '',
                'tags' => '',
                'title' => '',
                'user_id' => auth()->id(),
            ]);
        }
    }

    public function get_slug(): string
    {
        return str()->slug($this->model->title);
    }

    public function set_featured_at()
    {
        if ($this->featured && $this->published) {
            $this->model->featured_at = $this->model->featured_at ?? now();
        } else {
            $this->model->featured_at = null;
        }
    }

    public function set_published_at()
    {
        if ($this->published) {
            $this->model->published_at = $this->model->published_at ?? now();
        } else {
            $this->model->published_at = null;
        }
    }

    public function set_uploaded_image_property($path)
    {
        $deleted_previous_image = true;

        if (isset($this->model->image)) {
            $deleted_previous_image = $this->delete_previous_image($this->model->getAttributes()['image']);
        }

        if ($deleted_previous_image) {
            $this->model->image = $path;
        }
    }

    public function save_and_continue()
    {
        return $this->save(true);
    }

    public function save($done = false)
    {
        $this->validate();

        if (isset($this->image)) {
            $path = $this->image->store('posts');
        }

        if (isset($path)) {
            $this->set_uploaded_image_property($path);
        }

        $tags = isset($this->tags) ? array_map('trim', explode(',', $this->tags)) : null;

        $this->model->slug = $this->get_slug();
        $this->model->tags = $tags;

        $this->set_published_at();
        $this->set_featured_at();

        $this->model->save();
        $this->model->refresh();

        $message = "Post";
        $message .= isset($this->post) === 'create' ? " Created" : " Updated";

        if ($this->published) {
            $message .= " &amp; published";
        }

        if ($done) {
            session()->flash('success', $message);
            return redirect()->route('post', ['post' => $this->model->slug]);
        }

        $this->snotify($message);
    }

    public function render()
    {
        return view('livewire.pages.posts.create-post-page', [
            'page_title' => isset($this->post) ? 'Edit Post' : 'Create Post',
            'categories' => Category::orderby('title')->get()
        ])->extends('layouts.app');
    }
}
