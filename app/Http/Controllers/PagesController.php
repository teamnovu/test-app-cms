<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomEntryResource;
use Statamic\Facades\Entry;

class PagesController extends Controller
{
    public function index($path = '')
    {
        if (!starts_with($path, '/')) {
            $path = str_start($path, '/');
        }

        $entry = Entry::findByUri($path);

        abort_if(!$entry, 404, 'Page not found');

        return CustomEntryResource::make($entry);
    }
}
