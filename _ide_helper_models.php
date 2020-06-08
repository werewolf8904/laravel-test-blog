<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Comment
 *
 * @property int $id
 * @property string $author
 * @property string $content
 * @property string $belong_to_type
 * @property int $belong_to_id
 * @property \Illuminate\Support\Carbon $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereBelongToId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereBelongToType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereId($value)
 */
	class Comment extends \Eloquent {}
}

namespace App{
/**
 * App\Post
 *
 * @property int $id
 * @property string $name
 * @property string $content
 * @property string $file
 * @property int $posts_categories_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post wherePostsCategoriesId($value)
 */
	class Post extends \Eloquent {}
}

namespace App{
/**
 * App\PostsCategory
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostsCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostsCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostsCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostsCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostsCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostsCategory whereName($value)
 */
	class PostsCategory extends \Eloquent {}
}

