<?php

namespace LVeterinaria;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	/**
	 * @var string
	 */
	protected $table = 'services';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'description', 'img'
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function record()
	{
		return $this->hasOne(Record::class);
	}
}
