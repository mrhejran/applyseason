<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Page_Content extends Model
{
	public $table='page_content';

	protected $fillable = [
		'page_name', 'page_section', 'section_title', 'section_img', 'section_description', 'section_status'
	];
}
