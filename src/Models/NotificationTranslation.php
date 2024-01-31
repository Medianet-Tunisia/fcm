<?php

namespace MedianetFCM\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationTranslation extends Model
{
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'notification_translations';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = [
        'notification_id',
        'locale',
        'title',
        'description',
        'image',
    ];
    protected $hidden = [
        'id',
        'notification_id',
        'locale',
        'created_at',
        'updated_at',
    ];
    // protected $dates = [];

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
    public function notification()
    {
        return $this->belongsTo(Notification::class);
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
    public function getImageAttribute($value)
    {
        if (! is_null($value)) {
            return config('fcm.image_upload_url').'/'.$value;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
