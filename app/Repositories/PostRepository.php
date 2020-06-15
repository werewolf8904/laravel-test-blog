<?php


namespace App\Repositories;


use App\Post;
use App\PostsCategory;
use App\Repositories\Contracts\PostRepositoryInterface;
use App\Upload\FileUploaderInterface;
use Illuminate\Http\UploadedFile;

final class PostRepository implements PostRepositoryInterface
{
    /**
     * @var FileUploaderInterface
     */
    private $fileUploader;

    /**
     * EloquentPostRepository constructor.
     * @param  FileUploaderInterface  $fileUploader
     */
    public function __construct(FileUploaderInterface $fileUploader)
    {
        $this->fileUploader = $fileUploader;
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|mixed
     */
    public function getAllPaginated()
    {
        return Post::paginate();
    }

    /**
     * @param  PostsCategory  $postsCategory
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|mixed
     */
    public function getAllForPostsCategoryPaginated(PostsCategory $postsCategory)
    {
        return $postsCategory->posts()->paginate();
    }

    /**
     * @param  array  $data
     * @param  UploadedFile|null  $file
     * @return mixed|void
     */
    public function create(array $data, ?UploadedFile $file)
    {
        $post = new Post($data);
        $this->loadFile($file, $post);
        $post->save();
    }

    /**
     * @param  UploadedFile|null  $file
     * @param  Post  $post
     */
    protected function loadFile(?UploadedFile $file, Post $post)
    {
        if ($file) {
            $path = $this->fileUploader->store($file, $post->id, $file->getClientOriginalName());
            $post->file = $path;
        }
    }

    /**
     * @param  Post  $post
     * @param  array  $data
     * @param  UploadedFile|null  $file
     * @return mixed|void
     */
    public function update(Post $post, array $data, ?UploadedFile $file)
    {
        $post->fill($data);

        $this->loadFile($file, $post);

        $post->save();
    }

    /**
     * @param  Post  $post
     * @return mixed|void
     * @throws \Exception
     */
    public function delete(Post $post)
    {
        $post->delete();
    }

    /**
     * @return Post
     */
    public function new(): Post
    {
        return new Post();
    }
}
