<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'status',
        'user_id'
    ];

    const STATUS_PENDING = 1;
    const STATUS_CONFIRMED = 2;
    const STATUS_DELIVERED = 3;

    /**
     * Return list of status codes and labels

     * @return array
     */
    public static function listStatus()
    {
        return [
            self::STATUS_PENDING => 'Pending',
            self::STATUS_CONFIRMED => 'Confirmed',
            self::STATUS_DELIVERED => 'Delivered'
        ];
    }

    public function isPending()
    {
        return $this->status == self::STATUS_PENDING;
    }

    public function isConfirmed()
    {
        return $this->status == self::STATUS_CONFIRMED;
    }

    public function isDelivered()
    {
        return $this->status == self::STATUS_DELIVERED;
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
