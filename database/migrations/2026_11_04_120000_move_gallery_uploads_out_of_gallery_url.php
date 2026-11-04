<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

/**
 * Uploads live directly under public/ (the "public" disk root), so a
 * public/gallery folder shadowed the /gallery page: the web server served
 * the folder instead of routing to Laravel (404 / directory listing).
 * Move gallery photos to public/gallery-photos and repoint their paths.
 */
class MoveGalleryUploadsOutOfGalleryUrl extends Migration
{
    public function up()
    {
        $this->move('gallery', 'gallery-photos');
    }

    public function down()
    {
        $this->move('gallery-photos', 'gallery');
    }

    private function move(string $from, string $to): void
    {
        $fromDir = public_path($from);
        $toDir = public_path($to);

        if (File::isDirectory($fromDir)) {
            File::ensureDirectoryExists($toDir);
            foreach (File::files($fromDir) as $file) {
                File::move($file->getPathname(), $toDir . DIRECTORY_SEPARATOR . $file->getFilename());
            }
            if (count(File::allFiles($fromDir)) === 0) {
                File::deleteDirectory($fromDir);
            }
        }

        DB::table('gallery_images')
            ->where('image_path', 'like', $from . '/%')
            ->update(['image_path' => DB::raw("CONCAT('{$to}/', SUBSTRING(image_path, " . (strlen($from) + 2) . '))')]);
    }
}
