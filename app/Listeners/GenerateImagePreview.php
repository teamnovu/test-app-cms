<?php

namespace App\Listeners;

use Spatie\Image\Image;
use Spatie\Image\Manipulations;
use Statamic\Events\AssetUploaded;

class GenerateImagePreview
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Registered  $event
     * @return void
     */
    public function handle(AssetUploaded $event)
    {
        $imagePath = public_path('assets/' . $event->asset->path());
        $imageExt = pathinfo($imagePath, PATHINFO_EXTENSION);
        $tempName = uniqid('img_preview');
        $tempDestination = public_path('assets/' . $tempName . '.' . $imageExt);

        $img = Image::load($imagePath);
        $originalImageHeight = $img->getHeight();
        $originalImageWidth = $img->getWidth();

        $img->optimize()->width(32)->blur(5)->format(Manipulations::FORMAT_JPG)->save($tempDestination);

        $tinyImageDataBase64 = base64_encode(file_get_contents($tempDestination));
        $tinyImageBase64 = 'data:image/jpeg;base64,' . $tinyImageDataBase64;

        $svg = view('placeholderSvg', compact(
            'originalImageWidth',
            'originalImageHeight',
            'tinyImageBase64'
        ));

        $base64Svg = 'data:image/svg+xml;base64,' . base64_encode($svg);

        $event->asset->set('preview', $base64Svg);
        $event->asset->save();

        unlink($tempDestination);
    }
}
