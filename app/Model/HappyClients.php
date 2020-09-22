<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HappyClients extends Model
{
	public $table='happy_clients';

	protected $fillable = [
		'name', 'type', 'image', 'description'
	];
}
