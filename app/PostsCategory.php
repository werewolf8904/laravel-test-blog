<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PostsCategory
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Post[] $posts
 * @property-read int|null $posts_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostsCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostsCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostsCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostsCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostsCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostsCategory whereName($value)
 * @mixin \Eloquent
 */
class PostsCategory extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'description'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get all of the post's comments.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'belong_to');
    }
}
