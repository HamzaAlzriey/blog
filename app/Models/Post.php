<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'image',
        'category_id',
        'published',
        'user_id'
        
    ];

    use HasFactory;

    public function comments()
    {
        return $this->hasMany(Comment::class,'post_id','id'); 
    }
    public function tags() 
    { 
        return $this->belongsToMany(Tag::class); 
    } 


    public function category()
    {
        return $this->belongsTo(Category::class); 
    }

    public function user()
    {
        return $this->belongsTo(User::class); 
    }


    public function userAvatar($request){
        
        if (!$request->hasFile('image')) {
            return '';
        }
        $image = $request->file('image');
        $name = $image->hashName();
        // dd($name);
        $destination = public_path('/images');
        $image->move($destination,$name);
        return $name;
    }

    public function getImageAttribute($image)
    {
        if (!str_contains($image, 'https')){
            return asset('images/' . $image);
        }
        return $image;
    }
}
