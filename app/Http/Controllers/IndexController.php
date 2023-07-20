<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Spatie\SchemaOrg\Schema;

class IndexController
{
    public function index($slug)
    {
        $data = Page::where('slug', $slug)->firstOrFail();
        $schema = Schema::article()
            ->name($data->title)
            ->articleBody($data->body);

        $schema = $schema->toScript();

        return view('layouts.app')
            ->with([
                'data' => $data,
                'schema' => $schema,
            ]);
    }
}
