<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Statamic\Facades\Entry;
use Statamic\Http\Resources\API\EntryResource;

class PagesController extends Controller
{
    public function index($path = '')
    {
        if (! starts_with($path, '/')) {
            $path = str_start($path, '/');
        }

        $entry = Entry::findByUri($path);

        abort_if(! $entry, 404, 'Page not found');

        return EntryResource::make($entry);
    }
}
