<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Workbench\App\Models\User;

class Project extends Model
{
        protected $fillable = [
        'title',
        'type',
        'image',
        'description',
        'gh_url',
        'domain',
        'basic_languages',
        'framework',
        'libraries',
        'date'
    ];
        public function user(){
        return $this->belongsTo(User::class);
    }
            function getImageUrlAttribute(){
        if($this->image){
            return asset("/files/images".$this->image);
        }
        return null;
    }
        protected $appends=[
        "image_url",
    ];
}
