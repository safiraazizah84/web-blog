<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Mail\AcceptPostMail;
use App\Mail\RejectPostMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        
    }

    
    public function index() 
    {
        $posts = Post::paginate(10);

        return view('admin.show_post',compact('posts'));
    }

    // search
    public function search(Request $request) 
    {
        $search = $request->search;

        $posts = Post::where(function($query) use ($search) {
            
            $query->where('title','LIKE',"%{$search}%")
            ->orWhere('post_status','LIKE',"%{$search}%")
            ->orWhere('name','LIKE',"%{$search}%");
       })
       ->paginate(10);

        return view('admin.show_post', compact('posts', 'search'));
    }

    
    //halaman utama admin
    public function admin_post()
    {

        $posts = Post::paginate(10);

        return view('admin.show_post',compact('posts'));
    }


    public function post_page()
    {
        return view('admin.post_page');
    }

    public function add_post(Request $request)
    {

        $request->validate([
            'title' => 'required|string|min:4|max:25',            
            'description' => 'required|string|min:10',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ],[
            'title.required' => 'Isian title wajib diisikan',
            'title.min' => 'Minimal isian untuk title adalah 4 karakter',
            'title.max' => 'Maksimum isian untuk title adalah 25 karakter',
    
            'description.required' => 'Isian description wajib diisikan',
            'description.min' => 'Minimal isian untuk description adalah 10 karakter',
            // 'description.max' => 'Maksimum isian untuk description adalah 1000 karakter',
    
            'image.required' => 'Image wajib diisi',
            'image.image' => 'File yang diunggah harus berupa gambar',
            'image.mimes' => 'Image harus berformat jpeg, png, atau jpg',
            'image.max' => 'Maksimum ukuran file adalah 2MB',
        ]);

        

        $user=Auth()->user();

        $userid = $user->id;

        $name = $user->name;

        $usertype = $user->usertype;


        $post=new Post;

        $post->title = $request->title;

        $post->description = $request->description;

        $post->post_status = 'active';


        $post->user_id = $userid;

        $post->name = $name;

        $post->usertype = $usertype;

        ////////////////

        $image=$request->image;

        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('postimage',$imagename);

            $post->image = $imagename;
        }

       

        ////////////////
        
        $post->save();

        return redirect()->route('admin.show_post')->with('massage', 'Post Added Successfully');

    }

    public function show_post()
    {

        // $post = Post::all();

        $posts = Post::paginate(10);

        return view('admin.show_post',compact('posts'));
    }

    // delete
    public function delete_post($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect()->back()->with('message', 'Post Deleted Succesfully');
    }

    // edit

    public function edit_page($id)
    {
        $post=Post::find($id);

        return view('admin.edit_page', compact('post'));


    }

    
    // update

    public function update_post(Request $request,$id)
    {

        $request->validate([
            'title' => 'required|string|min:4|max:40',            
            'description' => 'required|string|min:10',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ],[
            'title.required' => 'Isian title wajib diisikan',
            'title.min' => 'Minimal isian untuk title adalah 4 karakter',
            'title.max' => 'Maksimum isian untuk title adalah 40 karakter',
    
            'description.required' => 'Isian description wajib diisikan',
            'description.min' => 'Minimal isian untuk description adalah 10 karakter',
            // 'description.max' => 'Maksimum isian untuk description adalah 1000 karakter',
    
            'image.image' => 'File yang diunggah harus berupa gambar',
            'image.mimes' => 'Image harus berformat jpeg, png, atau jpg',
            'image.max' => 'Maksimum ukuran file adalah 2MB',
        ]);

        $data = Post::find($id);

        $data->title = $request->title;

        $data->description = $request->description;

        $oldImage = $data->image; // Get the old image file name

        $image = $request->image;
        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $data->image = $imagename;

            // Delete the old image file
            if ($oldImage) {
                $oldImagePath = public_path('postimage/'.$oldImage);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }

        $data->save();
        return redirect()->route('admin.show_post')->with('message','Post Updated Successfully');
    }


    public function accept_post($id)
    {
        $data = Post::find($id);

        // Cari user berdasarkan nama di post
        $user = User::where('name',$data->name)->first();

        if ($user && !empty($user->email)) {

        $data->post_status='active';

        $data->accepted_at = now(); // Menyimpan waktu saat di-accept

        $data->save();

        // kirim email
        Mail::to($user->email)->send(new AcceptPostMail($data));

        return redirect()->back()->with('message','Post accepted and email sent');

        }
    }

    public function reject_post($id)
    {
        $data = Post::find($id);

        $user = User::where('name',$data->name)->first();

        if ($user && !empty($user->email)) {
        
        $data->post_status='rejected';

        $data->rejected_at = now(); // Menyimpan waktu saat di-reject

        $data->save();

        // kirim email
        Mail::to($user->email)->send(new RejectPostMail($data));

        return redirect()->back()->with('message','Post rejected and email sent');

        }
    }


    public function descript($id)
    {
        $post = Post::find($id);

        return view('home.post_details',compact('post'));
    }

    


    

}
