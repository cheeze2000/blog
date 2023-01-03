<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class PostController extends Controller
{
    public function get(Request $request)
    {
        $slash = '\'/\'';
        $offset = $request->offset;
        $posts = DB::select("
            select id, title, pinned, concat('posts', $slash, id, $slash, slug) as url, thumbnail, read_time
            from posts
            where published = true
            order by pinned desc, created_at desc
            limit 7 offset ?
        ", [$offset]);

        return [
            'posts' => array_slice($posts, 0, 6),
            'offset' => count($posts) < 7 ? -1 : $offset + 6,
        ];
    }

    public function view($id)
    {
        $posts = DB::select('
            select id, title, description, thumbnail, content, read_time
            from posts
            where id = ? and published = true
        ', [$id]);

        if (empty($posts)) {
            return redirect('/');
        } else {
            return Inertia::render('Post', [
                'user' => Auth::user(),
                'post' => $posts[0],
            ]);
        }
    }
}
