<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['users'] = User::orderBy('name', 'ASC')->get();
        return view('admin.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit()
    {
        $this->data['users'] = User::orderBy('name', 'ASC')->get();
        return view('admin.profile.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'telephone' =>'required|min:12',
        ]);

        $user = $request->user();
        $user->update([
            $user->name = $request->name,
            $user->telephone = $request->telephone,
        ]);
        $user->save();

        if (isset($request->image)) {
            $request->validate([
                'image' => 'required', 'file', 'image', 'mimes:jpeg,png,jpg,svg', 'max:1024',
            ]);

            $image = $request->file('image');
            $name = $user->name . '_' . time();
            $fileName = $name . '.' . $image->getClientOriginalExtension();

            $image->move(public_path() . '/images', $fileName);

            Storage::disk('local')->delete(public_path() . '/images', $user->id);

            $user->update([
                $user->name = $request->name,
                $user->telephone = $request->telephone,
                $user->profile_photo_path = $fileName,
            ]);
            $user->save();
        }

        $this->data['user'] = $user->users;
        return redirect('admin/profile/')->with('success', 'Update Profile Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
