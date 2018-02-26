<?php

namespace LVeterinaria;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
	/**
	 * @var string
	 */
	protected $table = 'records';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'post_id', 'service_id', 'observation'
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function post()
	{
		return $this->belongsTo(Post::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function service()
	{
		return $this->belongsTo(Service::class);
	}
}
