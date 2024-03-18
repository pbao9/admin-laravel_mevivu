<?php

namespace App\Http\Controllers\Blog;

use App\Admin\Http\Controllers\Controller;
use App\Repositories\Blog\PostRepositoryInterface;
// use Illuminate\Http\Request;

class BlogController extends Controller
{

    protected $repoPost;


    public function __construct(
        PostRepositoryInterface $repoPost,
    ) {
        parent::__construct();

        $this->repoPost = $repoPost;
    }

    public function getView()
    {
        return [
            'index' => 'public.posts.index',
            'detail' => 'public.posts.show'

        ];
    }

    public function getRoute()
    {
        return [
            'index' => 'post.index',
            'show' => 'post.show',
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->repoPost->paginate([], [], []);

        // $breadcrums = [['label' => trans('Tin tức')]];

        return view($this->view['index'], [
            'posts' => $posts,
            // 'breadcrums' => $breadcrums,
        ]);
    }

    public function showPost($slug)
    {

        $posts = $this->repoPost->findByOrFail(['slug' => $slug], ['posts', 'categories']);

        // $breadcrums = [
        //     ['label' => $posts->title]
        // ];

        $related = $this->repoPost->getByLimit([
            ['id', '!=', $posts->id]
        ], [
            'categories' => fn ($q) => $q->whereIn('id', $posts->categories->pluck('id')->toArray())
        ], [], 5);

        return view($this->view['detail'], [
            'posts' => $posts,
            'related' => $related,
            // 'breadcrums' => $breadcrums,
        ]);
    }
}
