<?php

namespace LVeterinaria;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'pet_name', 'pet_img', 'pet_age', 'color', 'weight', 'chip', 'url', 'qr', 'race', 'type'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
    public function record()
    {
    	return $this->hasOne(Record::class);
    }

}
