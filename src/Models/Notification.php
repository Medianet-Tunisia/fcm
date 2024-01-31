<?php

namespace MedianetFCM\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'notifications';

    protected $guarded = ['id'];

    protected $appends = [
        'type',
        'title',
        'description',
        'image'
    ];

    protected $hidden = [
        'translation'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function translation()
    {
        return $this->hasOne(NotificationTranslation::class)->where('locale', locale());
    }

    public function translations()
    {
        return $this->hasMany(NotificationTranslation::class);
    }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */
    public function getTitleAttribute()
    {
        return optional($this->translation)->title ?? null;
    }

    public function getDescriptionAttribute()
    {
        return optional($this->translation)->description ?? null;
    }

    public function getImageAttribute()
    {
        if (is_null(optional($this->translation)->image)) {
            return "";
        }

        return config('fcm.image_upload_url') . optional($this->translation)->image;
    }

    public function getTypeAttribute($value)
    {
        return ($this->notification_type == config('fcm.notification_types.version')) ? "1" : "2";
    }

    public function getOsAttribute($value)
    {
        return ($this->notification_type == config('fcm.notification_types.version')) ? $value : null;
    }

    public function getVersionAttribute($value)
    {
        return ($this->notification_type == config('fcm.notification_types.version')) ? $value : null;
    }

    public function getRequiredAttribute($value)
    {
        return ($this->notification_type == config('fcm.notification_types.version')) ? $value : null;
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
