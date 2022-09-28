<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait SharedTrait {
    public function delete_previous_image($file): bool
    {
        return Storage::delete($file);
    }

    public function super_access(): bool
    {
        return auth()->user()->role === 'super_admin';
    }
}
