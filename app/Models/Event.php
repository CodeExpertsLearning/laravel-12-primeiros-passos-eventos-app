<?php

namespace App\Models;

use App\Enums\EventStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\{HasSlug, SlugOptions};

class Event extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'title',
        'description',
        'body',
        'slug',
        'start_event',
        'end_event',
        'cover',
        'status'
    ];

    protected function casts()
    {
        return [
            'start_event' => 'datetime',
            'end_event'   => 'datetime',
            'status'      => EventStatus::class
        ];
    }

    public function body(): Attribute
    {
        return new Attribute(
            set: fn ($value) => strip_tags(
                $value,
                '<p><strong><b><em><i><h1><h2><h3><h4><h5><h6><br><hr><blockquote><code><pre>'
            )
        );
    }

    public function startEvent(): Attribute
    {
        return new Attribute(
            set: fn ($value) => \DateTime::createFromFormat(
                'd/m/Y H:i:s', $value
            )->format('Y-m-d H:i:s')
        );
    }

    public function endEvent(): Attribute
    {
        return new Attribute(
            set: fn ($value) => \DateTime::createFromFormat(
                'd/m/Y H:i:s', $value
            )->format('Y-m-d H:i:s')
        );
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
