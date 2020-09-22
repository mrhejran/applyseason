<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contact_info extends Model
{
	public $table='contact_info';

	protected $fillable = [
		'address', 'contact_no', 'email', 'website_link', 'map_location'
	];
}
