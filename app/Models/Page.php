<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\SchemaCollection;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class Page extends Model
{
    use HasFactory, HasSEO;

    protected $fillable = [
      'title',
      'slug',
      'body',
    ];

    public function getDynamicSEOData(): SEOData
    {

        // Override only the properties you want:
        return new SEOData(
            title: $this->title,
            description: $this->description,
            author: $this->author,
        );
    }
}
