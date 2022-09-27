<?php

namespace App\Http\Livewire\Components\Users;

use App\Models\User;
use Livewire\Component;

class EditUser extends Component
{
    protected $listeners = [
        '$refresh',
        'edit'
    ];

    public $delete_user;
    public $showModal = true;
    public $user;
    public $verify_email;

    public function mount()
    {
        // $u = User::inRandomOrder()->first();
        // $this->edit($u->id);
    }

    public function render()
    {
        return view('livewire.components.users.edit-user');
    }

    protected function rules()
    {
        return [
            'delete_user' => 'required|boolean',
            'user.email' => "required|email|unique:users,email,{$this->user->id}",
            'user.role' => "required|in:super_admin,admin,contributor,subscriber",
            'verify_email' => 'required|boolean',
        ];
    }

    public function edit($id)
    {
        $user = User::whereId($id)->withTrashed()->first();
        if (!$user) {
            $this->enotify("User not found.");
            return;
        }

        if (isset($user)) {
            $this->clearErrorBag();

            $this->delete_user = isset($user->deleted_at);
            $this->user = $user;
            $this->verify_email = isset($user->email_verified_at);

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

    public function update()
    {
        $this->validate();
        $this->updateDeletedAt();
        $this->updateEmailVerifiedAt();
        $this->user->save();
        $this->user->refresh();
        $this->emitUp('$refresh');
        $this->snotify("{$this->user->username} updated.");
        $this->destroy();
    }

    public function updateDeletedAt()
    {
        if ($this->delete_user && !isset($this->user->deleted_at)) {
            $this->user->deleted_at = now();
        }

        if (!$this->delete_user && isset($this->user->deleted_at)) {
            $this->user->deleted_at = null;
        }
    }

    public function updateEmailVerifiedAt()
    {
        if ($this->verify_email && !isset($this->user->email_verified_at)) {
            $this->user->email_verified_at = now();
        }

        if (!$this->verify_email && isset($this->user->email_verified_at)) {
            $this->user->email_verified_at = null;
        }
    }
}
