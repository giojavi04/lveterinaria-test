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
}
