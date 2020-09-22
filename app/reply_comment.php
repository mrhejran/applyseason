<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use WebDevEtc\BlogEtc\Scopes\BlogCommentApprovedAndDefaultOrderScope;


class reply_comment extends Model
{
    public function post()
    {
        return $this->belongsTo(BlogEtcPost::class,"blog_etc_post_id");
    }
    public function user()
    {
        return $this->belongsTo('App\user','user_id');
    }
   
}
