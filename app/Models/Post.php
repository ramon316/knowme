<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Post extends Model
{
    use HasFactory;

    use HasTrixRichText;

    protected $fillable=[
        'title',
        'content',
        'category',
        'image'
    ];

    public function getUrlImageAttribute(){
        return  Storage::url($this->image);
    }
}
