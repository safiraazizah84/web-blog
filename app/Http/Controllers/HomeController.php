<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Verifytoken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;



class HomeController extends Controller
{
    public function index(Request $request) 
    {
        $posts = Post::where('post_status','=','active')->paginate(6);
        
        return view('home.homepage',compact('posts'));
    
    }

    // search
    public function search(Request $request)
    {
        $query = $request->input('query');

        $posts = Post::where('post_status','=','active')
                     ->where(function ($q) use ($query) {
                        $q->where('title','LIKE',"%{$query}%")
                          ->orWhere('description','LIKE',"%{$query}%")
                          ->orWhere('name','LIKE',"%{$query}%");
                     })
                     ->paginate(6);
        return view('home.homepage', compact('posts','query'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
 
        return redirect('/login');
    }

   
    public function homepage()
    {

        $posts = Post::where('post_status','=','active')->paginate(6);

        return view('home.homepage',compact('posts'));
    }
    
    public function post_details($id)
    {
        $post = Post::find($id);
        return view('home.post_details',compact('post'));
    }

    

    //halaman blog
    public function blog_details($id)
    {
        $post = Post::find($id);
        return view('home.post_details',compact('post'));
    }

    public function blog()
    {

        $posts = Post::where('post_status','=','active')->paginate(12);

        return view('home.blog',compact('posts'));
    }

    //halaman about
    public function about_us()
    {
        return view('home.about_us');
    }


    public function create_post()
    {
        return view('home.create_post');
    }



    // user mengirim post

    public function user_post(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:4|max:40',            
            'description' => 'required|string|min:10',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ],[
            'title.required' => 'Isian title wajib diisikan',
            'title.min' => 'Minimal isian untuk title adalah 4 karakter',
            'title.max' => 'Maksimum isian untuk title adalah 40 karakter',
    
            'description.required' => 'Isian description wajib diisikan',
            'description.min' => 'Minimal isian untuk description adalah 10 karakter',
            // 'description.max' => 'Maksimum isian untuk description adalah 1000 karakter',
    
            'image.required' => 'Image wajib diisi',
            'image.image' => 'File yang diunggah harus berupa gambar',
            'image.mimes' => 'Image harus berformat jpeg, png, atau jpg',
            'image.max' => 'Maksimum ukuran file adalah 2MB',
        ]);
    

        $user = Auth()->user();
        $userid = $user->id;
        $username = $user->name;
        $usertype = $user->usertype;


        $post = new Post;
        $post->title =  $request->title;
        // $post->description =  $request->description;
        $post->description = $request->input('description');
        $post->user_id= $userid;
        $post->name= $username;
        $post->usertype= $usertype;
        $post->post_status = 'pending' ;


        // Proses upload gambar dari deskripsi
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Nama unik untuk gambar
            $image->move(public_path('postimage'), $imageName); // Memindahkan gambar ke folder public/postimage
            $post->image = $imageName; // Simpan nama gambar ke database
        }

        $image = $request->image;

        // if($image)
        // {
        //     $imagename = time().'.'.$image->getClientOriginalExtension();

        //     $request->image->move('postimage',$imagename);

        //     $post->image = $imagename;
        // }

        $post->save();
        
        Alert::success('Congrats','You have Added the data Successfully');
        //tanda sudah memasukkan data

        return redirect()->route('home.my_post');
    }

    


    public function my_post(Request $request)
    {
        $user=Auth::user();

        $userid=$user->id;

        $query = $request->input('query');
        
        $data = Post::where('user_id','=',$userid)
                     ->where(function ($q) use ($query) {
                        $q->where('title','LIKE',"%{$query}%")
                          ->orWhere('description','LIKE',"%{$query}%")
                          ->orWhere('name','LIKE',"%{$query}%");
                     })
                     ->paginate(6);
        return view('home.my_post', compact('data','query'));

        // $data = Post::where('user_id','=',$userid)->paginate(12);
     
        // return view('home.my_post',compact('data'));   
    }
    

    public function my_post_del($id)
    {
        $data = Post::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Post deleted Succesfully');
    }

    public function post_update_page($id)
    {
        $data = Post::find($id);
        return view('home.post_page',compact('data'));
    }

    public function update_post_data(Request $request,$id)
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

        $data->title=$request->title;

        $data->description=$request->description;

        $image =$request->image;

        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('postimage',$imagename);

            $data->image=$imagename;

        }

        $data->save();
        return redirect()->route('home.my_post')->with('message','Post Update Successfully');

    }

    //halaman banner
    public function banner_one()
    {
        return view('home.page_banner');
    }


    // public function verifyaccount(){
    //     return view('otp_verification');
    // }

    // public function useractivation(Request $request){
    //     $get_token = $request->token;
    //     $get_token = Verifytoken::where('token',$get_token)->first();

    //     if($get_token){
    //         $get_token->is_activated = 1;
    //         $get_token->save();
    //         $user = User::where('email',$get_token->email)->first();
    //         $user->is_activated = 1;
    //         $user->save();
    //         $getting_token = Verifytoken::where('token',$get_token->token)->first();
    //         $getting_token->delete();
    //         return redirect('/homepage')->with('activated','Your Account has been activated successfully');
    //     }else{
    //         return redirect('/verify-account')->with('incorrect', 'Your OTP is Invalid please check your email once');
    //     }
    // }


}
