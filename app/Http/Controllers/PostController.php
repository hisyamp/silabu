<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Announce;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function index(){
        $role = auth::user()->tipe;
        $data = Post::select('posts.id',
        'file_name1','file_name2','file_name3',
        'file_type1','file_type2','file_type3',
        'size1','size2','size3',
        'path1','path2','path3','u.name','u.unit')
        ->leftjoin('users as u','u.nip','=','posts.user_id')
        // ->where('')
        ->get();
        // dd($role);
        return view('admin.post.index', compact('data','role'));
    }

    public function dashboard(){
        $nip = auth::user()->nip;
        $role = auth::user()->tipe;
        $data = Post::select('path1','path2','path3')
        ->where('user_id','=', $nip)
        ->first();
        // dd($nip);

        return view('admin.post.dashboard',compact('data','role'));

    }

    public function announce(){
        $role = auth::user()->tipe;
        $data = Announce::select('id','pesan','path_file')->orderBy('id','desc')->first();
        // dd($data);
        return view('admin.post.announce',compact('role','data'));
    }

    public function mng_announce(){
        $role = auth::user()->tipe;
        
        
        return view('admin.post.mng_announce',compact('role'));
    }

    public function post_announce(Request $request){
        // dd($request->all());
        $file = $request->file('file_announce');
        $time = time();
        // dd($extension);
        $oriname = $file->getClientOriginalName();
        $newName = $time . $oriname;
        $size = $file->getClientSize();
        $path = Storage::putFileAs('file', $request->file('file_announce'), $newName);
        // dd($oriname);
        Announce::create([
            'pesan' => $request->pesan,
            'nama_file' => $oriname,
            'path_file' => $path,
        ]);
        // dd('aa');

        return redirect()->back();
    }
    public function download_announce()
    {
        $data = Announce::select('id','path_file')->orderBy('id','desc')->first();
        // $pathonid = Post::select('path3')->where('id','=', $id)->first();
        // dd($data->path_file);
        try {
            return Storage::disk('local')->download($data->path_file);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function upload1(Request $request)
    {
        $nip = auth::user()->nip;
        $post = $data = Post::select('user_id')
        ->where('user_id','=', $nip)
        ->first();
        // dd($post);
        // if($post->user_id == null){
        //     dd('aa');
            try {
                $file = $request->file('image1');
                $time = time();
                $extension = $file->getClientOriginalExtension();
                // dd($extension);
                $oriname = $file->getClientOriginalName();
                $newName = $time . $oriname;
                $size = $file->getClientSize();
                $path = Storage::putFileAs('file', $request->file('image1'), $newName);
            
                $newdata = [
                    'file_name1' => $oriname,
                    'file_type1' => $extension,
                    'path1' => $path,
                    'size1' => $size,
                ];
                $data = Post::where('user_id','=',$nip)->first();
                // dd($data);
                $data->update($newdata);
                return redirect()->back();
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        // }else{
        //     // dd('bb');
        //     $data = Post::where('user_id','=',$nip)->get();
        //     dd($data);
        // }
        
        
        
    }
    public function upload2(Request $request)
    {
        $nip = auth::user()->nip;
        $post = $data = Post::select('user_id')
        ->where('user_id','=', $nip)
        ->first();
        try {
            $file = $request->file('image2');
            $time = time();
            $extension = $file->getClientOriginalExtension();
            // dd($extension);
            $oriname = $file->getClientOriginalName();
            $newName = $time . $oriname;
            $size = $file->getClientSize();
            $path = Storage::putFileAs('file', $request->file('image2'), $newName);
        
            $newdata = [
                'file_name2' => $oriname,
                'file_type2' => $extension,
                'path2' => $path,
                'size2' => $size,
            ];
            $data = Post::where('user_id','=',$nip)->first();
            // dd($data);
            $data->update($newdata);
            return redirect()->back();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        
        
    }
    public function upload3(Request $request)
    {
        $nip = auth::user()->nip;
        $post = $data = Post::select('user_id')
        ->where('user_id','=', $nip)
        ->first();
        try {
            $file = $request->file('image3');
            $time = time();
            $extension = $file->getClientOriginalExtension();
            // dd($extension);
            $oriname = $file->getClientOriginalName();
            $newName = $time . $oriname;
            $size = $file->getClientSize();
            $path = Storage::putFileAs('file', $request->file('image3'), $newName);
        
            $newdata = [
                'file_name3' => $oriname,
                'file_type3' => $extension,
                'path3' => $path,
                'size3' => $size,
            ];
            $data = Post::where('user_id','=',$nip)->first();
            // dd($data);
            $data->update($newdata);
            return redirect()->back();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        
        
    }
    
    public function list()
    {
        $files = Storage::files('photo');
        // dd($files);
        return view('admin.post.index',compact('files'));
    }
    public function download1($id)
    {
        
        $pathonid = Post::select('path1')->where('id','=', $id)->first();
        // dd($pathonid->path);
        try {
            return Storage::disk('local')->download($pathonid->path1);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function download2($id)
    {
        
        $pathonid = Post::select('path2')->where('id','=', $id)->first();
        // dd($pathonid->path);
        try {
            return Storage::disk('local')->download($pathonid->path2);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function download3($id)
    {
        
        $pathonid = Post::select('path3')->where('id','=', $id)->first();
        // dd($pathonid->path);
        try {
            return Storage::disk('local')->download($pathonid->path3);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function delete($id)
    {
        
        $pathonid = Post::select('path')->where('id','=', $id)->first();
        // dd($pathonid->path);
        try {
            Storage::disk('local')->delete($pathonid->path);
            $post = Post::findOrFail($id);
            $post->delete();
            return 'deleted';
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    
}
