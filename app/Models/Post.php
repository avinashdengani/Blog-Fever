<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    const PENDING = 'pending';
    const APPROVED = 'approved';
    const DISAPPROVED = 'disapproved';
    protected $guarded = ['id'];

    protected $dates = ['published_at'];

    public function getImagePathAttribute()
    {
        return 'storage/' .$this->image;
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
    public function hasTag(int $tag_id):bool
    {
        return in_array($tag_id, $this->tags->pluck('id')->toArray());
    }
    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    /**
     *  Query Scopes
     */

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now());
    }
    public function scopeNotPublished($query)
    {
        return $query->where('published_at', '=', null)->orWhere('published_at', '>=', now());
    }
    public function scopeSearch($query)
    {
        $search = request('search');
        if($search) {
            return $query->where("title", "like", "%$search%");
        }
        return $query;
    }
    public function scopeApprovedPosts($query)
    {
        return $query->where('approval_status', '=', self::APPROVED);
    }
}
