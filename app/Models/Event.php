<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'series', 'year', 'theme', 'status', 'event_date',
        'location', 'banner_image', 'description',
        'meta_description', 'is_published', 'sort_order',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'event_date' => 'date',
        'announced_at' => 'datetime',
    ];

    public function sections()
    {
        return $this->hasMany(EventSection::class)->orderBy('sort_order');
    }

    public function galleryImages()
    {
        return $this->hasMany(EventGalleryImage::class)->orderBy('sort_order');
    }

    public function registrations()
    {
        return $this->hasMany(EventRegistration::class)->latest();
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * The newest published edition of each series (e.g. TNDC 2026, EASDC
     * 2025), upcoming editions first — what the homepage and footer show.
     */
    public static function latestPerSeries()
    {
        return static::published()
            ->orderByDesc('year')
            ->get()
            ->groupBy(fn ($event) => $event->series ?: $event->slug)
            ->map->first()
            ->sortBy(fn ($event) => [$event->status === 'upcoming' ? 0 : ($event->status === 'ongoing' ? 1 : 2), -((int) $event->year)])
            ->values();
    }

    /**
     * Registration is only open for events the admin has marked "upcoming" —
     * not yet ongoing/in-progress and not past.
     */
    public function isRegistrationOpen(): bool
    {
        return $this->status === 'upcoming';
    }

    /**
     * True once, right when a published event should be broadcast to
     * subscribers — never again after, regardless of later edits.
     */
    public function needsPublishAnnouncement(): bool
    {
        return $this->is_published && is_null($this->announced_at);
    }

    /**
     * Legacy events keep their original route name (equal to their slug);
     * any other event resolves to the generic /events/{slug} route.
     */
    public function getUrlAttribute(): string
    {
        return Route::has($this->slug)
            ? route($this->slug)
            : route('event.show', $this->slug);
    }
}
