<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
	public $table='home_page';

	protected $fillable = [
		'page_title', 'slide_title', 'slide_logo', 'slide_about', 'slide_subscrib'
	];
}
