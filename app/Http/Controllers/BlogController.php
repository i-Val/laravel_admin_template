<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(5);  //Getting and sending necessary data from the models to the front page
        return view('/admin/view-blogs', compact('blogs')); //returns the blogs page
    }

    public function create()
    {
        return view('add-blog');
    }

    public function store(Request $request)
    {
        $blog = new Blog;
        $data = Validator::make($request->all(), [
            "title" => 'required|string|max:70',
            "description" => 'required|string|max:70',
            "body" => 'required|string',
            "image" => 'required',
            "category"=>'required'
        ]);

        if($data->fails()){
            $response = [
                'status' => 'failure',
                'status_code' => 400,
                'message' => 'Bad Request',
                'errors' => $data->errors(),
            ];

            return response()->json($response, 400);
        }

        //getting the uploaded pictures details
        $gimages = $request->file('image');

        $gbasename = Str::random();
        $goriginal = $gbasename.'.'.$gimages->getClientOriginalExtension();
        $gimages->move('images/blog/', $goriginal);
        $gimagepath = 'images/blog/'.$goriginal;

       
        $blog = Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'body' => $request->body,
            'image'=>$gimagepath,
            'category'=>$request->category
        ]);
       

        return back()->with('message', 'you succeeded!'); 

    }

    public function show($id)
    {   
        $blog = Blog::findOrFail($id);
        return view('admin/view-blog', compact('blog'));
    }
    
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $data = Validator::make($request->all(), [
            "title" => 'required|string|max:70',
            "description" => 'required|string|max:70',
            "body" => 'required|string',
            "image" => 'required',
            "category"=>'required'
        ]);

        if($data->fails()){
            $response = [
                'status' => 'failure',
                'status_code' => 400,
                'message' => 'Bad Request',
                'errors' => $data->errors(),
            ];

            return response()->json($response, 400);
        }

        //getting the uploaded pictures details
        $gimages = $request->file('image');

        $gbasename = Str::random();
        $goriginal = $gbasename.'.'.$gimages->getClientOriginalExtension();
        $gimages->move('images/blog/', $goriginal);
        $gimagepath = 'images/blog/'.$goriginal;

       
        $blog = Blog::update([
            'title' => $request->title,
            'description' => $request->description,
            'body' => $request->body,
            'image'=>$gimagepath,
            'category'=>$request->category,
        ]);
       

        return back()->with('message', 'updated successfully!'); 
    }

    public function search($title)
    {
        $blog = Blog::where('title', 'like', '%' . $title . '%')->orWhere('description', 'like', '%' . $title . '%')->paginate(15);
        return view('/admin/view-blogs', compact('blog'));
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return back()->with('success', 'blog what deleted');
    }
}

