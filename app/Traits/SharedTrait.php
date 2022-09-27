<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait SharedTrait {
    public function delete_previous_image($file): bool
    {
        return Storage::delete($file);
    }
}
