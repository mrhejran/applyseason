<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contact_Messages extends Model
{
	public $table='contact_message';

	protected $fillable = [
		'name', 'email', 'subject', 'messages', 'stauts'
	];
}
