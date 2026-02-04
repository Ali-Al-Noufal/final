<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Workbench\App\Models\User;

class Testemonial extends Model
{
    protected $fillable = [
            'image',
            'title',
            'user_name',
            'description',
            'rating',
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
