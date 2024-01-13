<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Article;
use Auth;

class CommentController extends Controller
{
    public function store(CommentRequest $request) {
    	$data = $request->except('comment_post_ID', 'comment_parent', '_token');
    	$data['article_id'] = $request->input('comment_post_ID');
    	$data['parent_id'] = $request->input('comment_parent');

    	$user = Auth::user();

    	$comment = new Comment($data);

    	if($user) {
            $comment->user_id = $user->id;
        }

        $post = Article::find($data['article_id']);
        $post->comments()->save($comment);

        $comment->load('user');

        // $data['id'] = $comment->id;
        // $data['email'] = (!empty($data['email']) ? $data['email'] : $user->email);
        // $data['name'] = (!empty($data['name']) ? $data['name'] : $user->name);
        // $data['hash'] = md5($data['email']);

        // $view_comment = view(env('THEME') . '.site.contentOneComment')
        // 						->with('data', $data)
        // 						->render();

        // return Response::json([
        //             'success' => TRUE, 
        //             'comment' => $view_comment,
        //             'data' => $data
        //         ]);

        return redirect()->back();
    }
}
