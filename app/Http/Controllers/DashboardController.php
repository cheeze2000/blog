<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $posts = DB::select('
            select id, title, description, published, pinned
            from posts
            order by pinned desc, created_at desc
        ');

        return Inertia::render('Dashboard', [
            'user' => Auth::user(),
            'posts' => $posts,
        ]);
    }

    public function createPostPage()
    {
        return Inertia::render('Editor', [
            'user' => Auth::user(),
            'post' => ['id' => 0],
            'id' => 0,
        ]);
    }

    public function editPostPage($id)
    {
        $posts = DB::select('
            select id, title, description, slug, thumbnail, content, published, pinned
            from posts
            where id = ?
            order by pinned desc, created_at desc
        ', [$id]);

        $post = $posts[0];
        $slug = $post->slug;

        return Inertia::render('Editor', [
            'user' => Auth::user(),
            'post' => $post,
            'id' => intval($id),
            'url' => url("/previews/$slug"),
        ]);
    }

    public function createPost(Request $request)
    {
        $slug = $request->slug == '' ? Str::slug($request->title) : $request->slug;
        $read_time = ceil(strlen($request->content) / 500);

        DB::insert('
            insert into posts (title, description, slug, thumbnail, content, read_time, published, pinned)
            values (?, ?, ?, ?, ?, ?, ?, ?)
        ', [
            $request->title,
            $request->description,
            $slug,
            $request->thumbnail,
            $request->content,
            $read_time,
            $request->published,
            $request->pinned,
        ]);
    }

    public function editPost(Request $request)
    {
        $slug = $request->slug == '' ? Str::slug($request->title) : $request->slug;
        $read_time = ceil(strlen($request->content) / 500);

        DB::update('
            update posts
            set title = ?, description = ?, slug = ?, thumbnail = ?, content = ?, read_time = ?, published = ?, pinned = ?
            where id = ?
        ', [
            $request->title,
            $request->description,
            $slug,
            $request->thumbnail,
            $request->content,
            $read_time,
            $request->published,
            $request->pinned,
            $request->id,
        ]);
    }

    public function deletePost(Request $request)
    {
        DB::delete('
            delete from posts
            where id = ?
        ', [$request->id]);
    }
}
