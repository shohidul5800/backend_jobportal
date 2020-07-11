<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class Jobs extends Model
{
    protected $guarded = [];

    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function CheckApplication(){
        return DB::table('jobs_user')->where('user_id', auth()->user()->id)
            ->where('jobs_id', $this->id)->exists();
    }

}
