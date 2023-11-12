<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Pagination\Cursor;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $comments = Article::find(1)->comments()->with('user')->cursorPaginate(12, ['*'], 'cursor', Cursor::fromEncoded($request->nextCursor));
        if($comments->hasMorePages()) {
            $nextCursor = $comments->nextCursor()->encode();
        }

        return view('app.parts.comments', ['comments' => $comments, 'nextCursor' => $nextCursor]);
    }
}
