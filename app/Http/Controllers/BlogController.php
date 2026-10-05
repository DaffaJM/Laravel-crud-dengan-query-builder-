<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Unique;

/* bagian controller digunakan untuk menulis fungsi operasi logika, seperti memunculkan data,  */

class BlogController extends Controller
{
   function index(Request $request)
   {
      // $title = $request -> searchTitle;
      // $blogs = DB::table('blogs')->where('title', 'LIKE', '%'.$title.'%')->orderBy('id', 'desc')->paginate(10);
      // // return $blogs;
      // // dd($blogs);
      // return view('blog', ['blogs'=> $blogs, 'title'=> $title]);
      
      $title = $request->title;
      $blogs = Blog::where('title', 'LIKE', '%'.$title.'%')->orderBy('id', 'desc')->paginate(10);
      return view('blog', ['blogs'=> $blogs, 'title'=> $title]);
   }

   function add()
   {
      return view('blog-add');
   }

   function create(Request $request)
   {
      $request->validate([
        'title' => ['required', 'unique:blogs' ,'max:100'],
        'description' => ['required'],
      ]);

      // dd($request->all());
      Blog::create($request->all());

      // DB::table('blogs')->insert([
      //    'title' => $request->title,
      //    'description' => $request->description
      // ]);

      Session::flash('message', 'added succesfully!');

      return redirect()->route('blog');
   }

   function show($id)
   {
      // $blog = DB::table('blogs')->where('id', $id)->first();
      //kalau yang dicari id pakai findorfail,, kalau yang dicari selain id pakai firstOrFail()
      $blog = Blog::findOrFail($id);
     
      
      // if(!$blog){
         //    abort(404);
      // }

      return view('blog-detail', ['blog'=> $blog]);
   }

   function edit($id)
   {
      // $blog = DB::table('blogs')->where('id', $id)->first();
      $blog = Blog::findOrFail($id);
      // if(!$blog){
      //    abort(404);
      // }

      return view('blog-edit', ['blog'=>$blog]);
   }

   function update(Request $request, $id)
   {
      $request->validate([
        'title' => ['required', 'unique:blogs,title,' . $id], 
         'description' => ['required'],
      ]);

      // DB::table('blogs')->where('id', $id)->update([
      //    'title' => $request->title,
      //    'description' => $request->description
      // ]);

      $blog = Blog::findOrFail($id);
      $blog->update($request->all());

      Session::flash('message', 'updated succesfully!');

      return redirect('blog');
   }

   function destroy($id)
   {
      // $blog = DB::table('blogs')->where('id', $id)->delete();

      $blog = Blog::findOrFail($id);
      $blog->delete();

      Session::flash('message', 'Delete Success!');

      return redirect('blog');

   }

   function restore($id)
   {
      $blog = Blog::withTrashed()->findOrFail($id)->restore();
   }

};