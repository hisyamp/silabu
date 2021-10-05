<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = auth::user()->tipe;
        $user = User::paginate(10);
        
        return view('admin.user.index',compact('user','role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = auth::user()->tipe;
        return view('admin.user.create',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required|min:3|max:50',
        //     'email' => 'required|email',
        //     'tipe' => 'required'
        // ]);

        if($request->input('password')){
            $password = bcrypt($request->password);
        }
        else{     
            $password = bcrypt('11111111');  
        }
        User::create([
            'name' => $request->name,
            'nip' => $request->nip,
            'unit' => $request->unit,
            'tipe' => $request->tipe,
            'password' => $password
         ]);
         
        Post::create([
            'user_id' => $request->nip,
        ]);

        return redirect()->back()->with('success','User berhasil disimpan');
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
    public function edit($id)
    {
        $role = auth::user()->tipe;
        $user = User::find($id);
        // dd($user);
        return view('admin.user.edit',compact('user','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'name' => 'required|min:3|max:50',
        //     'tipe' => 'required'
        // ]);

        if($request->input('password')){
            $user_data = [
                'name' => $request->name,
                'nip' => $request->nip,
                'unit' => $request->unit,
                'tipe' => $request->tipe,
                'password' => bcrypt($request->password)           
            ];
        }else{
            $user_data = [
                'name' => $request->name,
                'nip' => $request->nip,
                'unit' => $request->unit,
                'tipe' => $request->tipe,
            ];
        }
        $user = User::find($id);
        $user->update($user_data);

        return redirect()->route('user.index')->with('success','Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('success','Data berhasil dihapus');
    }
}
