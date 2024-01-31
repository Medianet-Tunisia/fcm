<?php

namespace MedianetFCM\Models;

use Illuminate\Database\Eloquent\Model;

class UserNotification extends Model
{
    protected $table = 'user_notifications';

    public $timestamps = true;

    protected $guarded = ['id'];

    protected $hidden = [
        'id',
        'user_id',
        'notification_id',
        'created_at',
        'updated_at',
    ];

    public function user() {
        return $this->belongsTo(user::class, 'user_id');
    }

    public function notification() {
        return $this->belongsTo(Notification::class, 'notification_id');
    }

    public function simple_notification() {
        return $this->belongsTo(Notification::class, 'notification_id')->where('notification_type', 'simple');
    }
}
