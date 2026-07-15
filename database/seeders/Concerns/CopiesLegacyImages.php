<?php

namespace Database\Seeders\Concerns;

use Illuminate\Support\Facades\Storage;

trait CopiesLegacyImages
{
    /**
     * Copy an existing file from public/ into the "public" storage disk so it
     * can be served through Storage::url() like any admin-uploaded image.
     * Returns the storage-relative path, or null if the source is missing.
     */
    protected function copyLegacyImage(string $publicRelativePath, string $folder): ?string
    {
        $source = public_path($publicRelativePath);

        if (! is_file($source)) {
            return null;
        }

        $destination = $folder . '/' . basename($source);

        if (! Storage::disk('public')->exists($destination)) {
            Storage::disk('public')->put($destination, file_get_contents($source));
        }

        return $destination;
    }
}
