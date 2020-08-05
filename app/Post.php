<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];
    protected $with = ['categories','images'];
    protected $casts = [
        'awards' => 'array',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_category', 'post_id', 'category_id');
    }

 
    public function files()
    {
        return $this->morphMany(File::class, 'fileble');
    }
    // image and comment may be for videos or blogs

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    // votes may be for videos or comments
    public function votes()
    {
        return $this->morphMany(Vote::class, 'votable');
    }

    public function lyrics()
    {
        return $this->belongsToMany(Lyric::class, 'post_lyric', 'post_id', 'lyric_id');
    }

    public function arrangements()
    {
        return $this->belongsToMany(Arrangement::class, 'post_arrangement', 'post_id', 'arrangement_id');
    }

    public function directors()
    {
        return $this->belongsToMany(Director::class, 'post_director', 'post_id', 'director_id');
    }
    
}
