<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;


class BlogController extends Controller
{
    public function blog()
    {
        $blogs = Blog::get();
        return view('admin.blog.index')->with(compact('blogs'));
    }

    public function create_blog()
    {
        return view('admin.blog.add_blog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_blog(Request $request)
    {
        $this->validate($request,[
            'blog_title' => 'required',
            'blog_intro' => 'required',
            'blog_body' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/blog'))
            {
                mkdir('uploads/blog',0777,true);
            }
            $image->move('uploads/blog',$imagename);
        }else{
            $imagename = "default.png";
        }
        $blog = new Blog();
        $blog->blog_title = $request->blog_title;
        $blog->blog_intro = $request->blog_intro;
        $blog->blog_body = $request->blog_body;
        $blog->image = $imagename;
        $blog->save();
        return redirect('/admin/blog/')->with('flash_message_success','Blog has been uploaded successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_blog($id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.edit_blog',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_blog(Request $request, $id)
    {
        $this->validate($request,[
            'blog_title' => 'required',
            'blog_intro' => 'required',
            'blog_body' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str::slug($request->blog_title);
        $blog = Blog::find($id);

        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. 
            $image->getClientOriginalExtension();

            if (!file_exists('uploads/blog'))
            {
                mkdir('uploads/blog',0777,true);
            }
            $image->move('uploads/blog',$imagename);
        }else{
            $imagename = $blog->image;
        }

        $blog->blog_title = $request->blog_title;
        $blog->blog_intro = $request->blog_intro;
        $blog->blog_body = $request->blog_body;
        $blog->image = $imagename;
        $blog->save();
        return redirect('/admin/blog/')->with('flash_message_success','Blog has been edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_blog($id)
    {
        $blog = Blog::find($id);
        if (file_exists('uploads/blog/'.$blog->image))
        {
            unlink('uploads/blog/'.$blog->image);
        }
        $blog->delete();
        Alert::success('Deleted Successfully', 'Success Message');
        return redirect()->back()->with('flash_message_error','Banners Delete Successfully');
    }

    public function updateStatus(Request $request, $id=null)
    {
        $data = $request->all();
        Blog::where('id',$data['id'])->update(['status'=>$data['status']]);
    }
}
