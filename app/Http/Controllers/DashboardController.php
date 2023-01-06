<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function getAll()
    {
        $posts = DB::select('
            select id, title, description, published, pinned
            from posts
            order by pinned desc, created_at desc
        ');

        return $posts;
    }

    public function getOne()
    {
        $posts = DB::select('
            select id, title, description, slug, thumbnail, content, published, pinned
            from posts
            order by pinned desc, created_at desc
        ');

        return $posts[0];
    }

    public function create(Request $request)
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

    public function edit(Request $request)
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

    public function delete(Request $request)
    {
        DB::delete('
            delete from posts
            where id = ?
        ', [$request->id]);
    }
}
