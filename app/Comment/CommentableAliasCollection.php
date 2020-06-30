<?php


namespace App\Comment;


use Illuminate\Support\Collection;

final class CommentableAliasCollection
{

    private $collection;

    public function __construct()
    {
        $this->collection = new Collection();
    }

    public function add(CommentableAliasInterface $alias)
    {
        $this->collection->add($alias);
    }

    public function findByAlias($alias): ?CommentableAliasInterface
    {
        return $this->collection->first(function (CommentableAliasInterface $commentableAlias) use ($alias) {
            return $commentableAlias->getAlias() === $alias;
        });
    }

    public function findByClass($class): ?CommentableAliasInterface
    {
        return $this->collection->first(function (CommentableAliasInterface $commentableAlias) use ($class) {
            return $commentableAlias->getModelClass() === $class;
        });
    }
}
