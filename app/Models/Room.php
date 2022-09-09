<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Whitecube\NovaFlexibleContent\Value\FlexibleCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory, HasSlug;

    public static $codelockList = null;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'gallery' => FlexibleCast::class,
        'equipment' => FlexibleCast::class,
        'additional_rates' => FlexibleCast::class,
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('name')->saveSlugsTo('slug');
    }

    /**
     * TODO
     * Attach the room to the booking.
     */
    // public function bookings()
    // {
    //     return $this->hasMany(Booking::class);
    // }

    // TODO
    // public static function getCodeLocksList()
    // {
    //     if (!is_null(self::$codelockList)) {
    //         return self::$codelockList;
    //     }

    //     $codelock = new CodelocksController();
    //     $locks = $codelock->list()->get();

    //     $data = [];

    //     foreach ($locks ?? [] as $lock) {
    //         $data[$lock['LockId']] = $lock['LockName'] . ' - ' . $lock['LockId'];
    //     }

    //     self::$codelockList = $data;
    //     return self::$codelockList;
    // }
}
