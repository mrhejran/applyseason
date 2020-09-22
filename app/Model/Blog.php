<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	public $table='blog';

	protected $fillable = [
		'TITLE', 'B_URL','DATE_BLOG', 'AUTH_BLOG', 'DEC_BLOG', 'IMG_BLOG', 'STATUS_BLOG'
	];
}
