<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Feedback;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Behat\Transliterator\Transliterator;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $user = Auth::user();

        $email = $user->email;

        $post = DB::table('blogs')->select('*')->paginate(10);
        // $post = $post->get(); 
        $name = $user->user_name;
        
        // echo dd($request);


        return view('blog/blog', compact('email', 'post', 'name'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
        if ($request->getMethod() == 'POST') {
            
            // handle photo
            // $fileimage = time().'.'.$request->image->extension();
            // $request->image->storeAs('public/images', $fileimage);

            // Lưu hình ảnh
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);

            // Edit slug
            $text = $request->title;
            $urlizer = new Urlizer();
            $slug = $urlizer->transliterate($text, "-");
            

            // echo dd($request);
            $Post = new Blog;
            $Post->user_name = Auth::user()->user_name;
            $Post->user_id = Auth::user()->id;
            $Post->create_date = now();
            $Post->slug = $slug;
            $Post->title = $request->title; 
            $Post->body = $request->contentPost;
            $Post->htmlbody = $request->dataPost;
            $Post->image = $imageName;
            
            $Post->save();

            
            // return view('readbooks/readbook', ['imageName' => $imageName, 'email' => $email]) ;
            return redirect()->route('blog');
        }

        if ($request->getMethod() == 'GET'){

            return view('blog/createPost', ['edit' => 'flase']);
        }   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $post = DB::table('blogs')->where('slug', $slug);
        $post = $post->get();
        $user = Auth::user();
        $email = $user->email;
        $name = $user->user_name;

        return view('blog/post', compact('post'));
    }

    public function myArticle(Request $request)
    {
        $user = Auth::user();
        $name = $user->user_name;
        $email = $user->email;

        $sort = Blog::sortable()
                    ->where('user_name', $name)
                    ->paginate(10);
        
        return view('blog/myArticle', compact('sort'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {

        if ($request->getMethod() == 'GET'){
            $user = Auth::user();
            $email = $user->email;

            $post = DB::table('blogs')->where('id', $id);
            $post = $post->get();

            
            return view('blog/editPost', ['post' => $post]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $Post = Blog::find($id);
        if(($request->image)){
            // $fileimage = time().'.'.$request->image->extension();
            // $request->image->storeAs('public/images', $fileimage);
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
        }else{
            $imageName = $Post->image;
        }

        if(($request->dataPost) and ($request->contentPost)){
            $data = $request->dataPost;
            $content = $request->contentPost;
        }else{
            $content = $Post->body;
            $data = $Post->htmlbody ;
            
        }

        $text = $request->title;
        $urlizer = new Urlizer();
        $slug = $urlizer->transliterate($text, "-");
        
        
        $Post->title = $request->title; 
        $Post->body = $content;
        $Post->htmlbody = $data;
        $Post->image = $imageName;
        $Post->slug = $slug;
        $Post->title = $request->title; 
        $Post->create_date = now();
        
        $Post->save();

        return redirect()->route('myArticle');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Post = Blog::find($id);
        $Post->delete();

        return redirect()->route('myArticle');
    }

    protected function storeImage(Request $request) {
        $path = $request->file('photo')->store('public/storage/profile');
        return substr($path, strlen('public/storage'));
    }

    

    //FeedBack User
    public function feedback(Request $request){
        if ($request->getMethod() == 'POST') {
            $feedback = new Feedback ;
            $feedback->email = $request->email;
            $feedback->user_name = $request->name;
            $feedback->numPhone = $request->numPhone;
            $feedback->message = $request->message;
            $feedback->save();

            

            return redirect()->back();
        }
    }
}

class Urlizer extends Transliterator
        {
        }
