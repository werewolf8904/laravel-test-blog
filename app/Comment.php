<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Comment
 *
 * @property int $id
 * @property string $author
 * @property string $content
 * @property string $belong_to_type
 * @property int $belong_to_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $belong_to
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereBelongToId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereBelongToType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereId($value)
 * @mixin \Eloquent
 */
class Comment extends Model
{
    const UPDATED_AT = null;
    protected $fillable = ['author', 'content'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function belong_to()
    {
        return $this->morphTo();
    }

}
