<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
	public $table='counter';

	protected $fillable = [
		'page_name', 'cout_Jobs', 'cout_Members', 'cout_Resume', 'cout_Company'
	];
}
