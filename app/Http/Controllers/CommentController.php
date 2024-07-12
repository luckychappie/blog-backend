<?php

namespace App\Http\Controllers;

use App\Events\PostNotificationEvent;
use App\Models\Comment;
use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $comments = Comment::with('user')->where('post_id', $request->post_id)->get();
        return response()->json([
            'status' => 'success',
            'comments' => $comments,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $comment = Comment::create([
            'message' => $request->message,
            'post_id' => $request->post_id,
            'user_id' => $request->user_id,
        ]);

        $users = User::where('role', 'admin')->get();

        Notification::make()
        ->success()
        ->title(Auth::user()->name. ' commented on the post')
        ->body(strtr($request->message, 0, 20))
        ->sendToDatabase($users);

        event(new PostNotificationEvent(Auth::user()->name.' commented on the post.'));

        $commentdata = Comment::where('id', $comment->id)->with('user')->first();

        return response()->json([
            'status' => 'success',
            'message' => 'Comment created successfully',
            'comment' => $commentdata,
        ]);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Comment deleted successfully',
            'comment' => $comment,
        ]);
    }
}
