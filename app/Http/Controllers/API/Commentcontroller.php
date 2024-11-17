<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{
    /**
     * Lấy danh sách tất cả các bình luận cho một bài viết.
     */
    public function index($postId)
    {
        $comments = Comment::where('post_id', $postId)->get();
        return response()->json($comments, Response::HTTP_OK);
    }

    /**
     * Thêm một bình luận mới.
     */
    public function store(Request $request, $postId)
    {
        $validated = $request->validate([
            'comment' => 'required|string',
            'user_id' => 'nullable|exists:users,id',
            'comment_parent_id' => 'nullable|integer',
        ]);

        $comment = Comment::create(array_merge($validated, [
            'post_id' => $postId,
        ]));

        return response()->json([
            'status' => 'success',
            'message' => 'Bình luận đã được thêm thành công.',
            'data' => $comment,
        ], 200);
    }


    public function show($postId, $id)
    {
        $comment = Comment::where('post_id', $postId)->where('comment_id', $id)->firstOrFail();
        return response()->json($comment, Response::HTTP_OK);
    }


    public function update(Request $request, $postId, $id)
    {
        $comment = Comment::where('post_id', $postId)->where('comment_id', $id)->firstOrFail();

        $validated = $request->validate([
            'comment' => 'required|string',
            'user_id' => 'nullable|exists:users,id',
            'comment_parent_id' => 'nullable|integer',
        ]);

        $comment->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Bình luận đã được cập nhật thành công.',
            'data' => $comment,
        ], Response::HTTP_OK);
    }


    public function destroy($postId, $id)
    {
        $comment = Comment::where('post_id', $postId)->where('comment_id', $id)->firstOrFail();
        $comment->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
