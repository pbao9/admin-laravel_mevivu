<?php

namespace App\Admin\Services\Blog\Post;
use Illuminate\Http\Request;

interface PostServiceInterface
{
    public function store(Request $request);
    public function update(Request $request);
    public function delete($id);
    public function actionMultipleRecode(Request $request);
}