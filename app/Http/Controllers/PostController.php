<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PostsImport;
use App\Exports\PostsExport;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        return view('posts.index', compact('posts'));
    }


    
    // Import posts from Excel
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv'
        ]);

        Excel::import(new PostsImport, $request->file('file'));
        
        return redirect()->route('posts.index')->with('success', 'Data imported successfully.');
    }

    public function exportPosts()
{
    return Excel::download(new PostsExport, 'posts.xlsx');
}
    
}
