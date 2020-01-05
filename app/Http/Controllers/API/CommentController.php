<?php

namespace App\Http\Controllers\API;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function submitComment(Request $request){
        $comment = Comment::create([
            'body' => $request->body,
            'post_id' => $request->post_id,
            'user_id' => auth()->user()->id
        ]);
        broadcast(new \App\Events\PostComment($comment));
        return response()->json($comment);
    }

    public function index(){
        return response()->json(Comment::orderByDesc('created_at')->get());
    }
}
