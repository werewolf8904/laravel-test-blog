<?php


namespace App\Factories;


use App\Comment\CommentableAliasCollection;
use App\Comment\CommentableAliasInterface;
use App\Comment\CommentableInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

final class CommentableFactory
{
    /**
     * @var CommentableAliasCollection
     */
    private CommentableAliasCollection $aliasCollection;

    /**
     * CommentableFactory constructor.
     * @param  CommentableAliasCollection  $aliasCollection
     */
    public function __construct(CommentableAliasCollection $aliasCollection)
    {
        $this->aliasCollection = $aliasCollection;
    }

    /**
     * @param $alias
     * @param $model_id
     * @return CommentableInterface
     */
    public function buildByAlias($alias, $model_id)
    {
        $commentableAlias = $this->getModelClassByAlias($alias);
        return $commentableAlias->getModelClass()::findOrFail($model_id);
    }

    /**
     * @param $alias
     * @return \App\Comment\CommentableAliasInterface
     */
    public function getModelClassByAlias(string $alias): CommentableAliasInterface
    {
        $commentableAliasInterface = $this->aliasCollection->findByAlias($alias);
        if ($commentableAliasInterface === null) {
            throw new ModelNotFoundException('Unable to find model to comment.');
        }
        return $commentableAliasInterface;
    }

    /**
     * @param  string  $class
     * @return \App\Comment\CommentableAliasInterface
     */
    public function getAliasByModelClass(string $class): CommentableAliasInterface
    {
        $commentableAliasInterface = $this->aliasCollection->findByClass($class);
        if ($commentableAliasInterface === null) {
            throw new ModelNotFoundException('Unable to find model to comment.');
        }
        return $commentableAliasInterface;
    }
}
