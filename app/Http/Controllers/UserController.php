<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function userList(Request $request)
    {
        $allUsers = User::orderBy('id', 'desc')->get();
        return view('admin.users.index', compact('allUsers'));
    }
    public function userCreate(Request $request)
    {
        return view('admin.users.create');
    }
    public function userStore(Request $request)
    {
        $request->validate([
            'name'        => 'required|unique:users,name',
            'email'       => 'required|email|unique:users,email',
            'password'    => 'required|min:8',//|confirmed',
            // 'image'       => 'image|mimes:jpeg,png,jpg,gif,webp',
        ]);
        // ----image----
        // if ($img = $request->image) {
        //     $compressedImage = Image::make($img)->encode('webp', 64);
        //     $compressedImage->orientate();
        //     $compressedImage->resize(1200, null, function ($constraint) {
        //         $constraint->aspectRatio();
        //         $constraint->upsize();
        //     });

        //     $compressedImage->brightness(-1);
        //     $compressedImage->contrast(2);
        //     $compressedImage->sharpen(2);
        //     $compressedImage->encode('webp', 40);
        //     $unique = uniqid();
        //     $compressedImage->save(public_path('admin-assets/uploads/profileimages/' . $unique . '.webp'));
        //     $filename = $compressedImage->basename;
        //     $data['profile_image'] = $filename;
        // }
        // ----
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        // -----
        User::create($data);
        return redirect()->route('user.list')->with('success', 'User Create Successfully');
    }
    public function userEdit(Request $request, $id)
    {
        $TrendsData = User::find($id);
        return view('admin.users.edit', compact('TrendsData'));
    }

    public function userUpdate(Request $request, $id)
    {
        $request->validate([
            'name'         => 'required|unique:users,name,' . $id,
            'email'        => 'required|unique:users,email,' . $id,
            'status'       => 'required',
            // 'password'     => 'required|min:8|conform_password',
            // 'image'        => 'image|mimes:jpeg,png,jpg,gif,webp',
        ]);
        // --image---
        $dataImage = User::where('id', $id)->first();
        $path = public_path('admin-assets/uploads/profileimages/') . $dataImage->profile_image;

        // if ($img = $request->image) {
        //     if (File::exists($path)) {
        //         File::delete($path);
        //     }
        //     $compressedImage = Image::make($img)->encode('webp', 64);
        //     $compressedImage->orientate();
        //     $compressedImage->resize(1200, null, function ($constraint) {
        //         $constraint->aspectRatio();
        //         $constraint->upsize();
        //     });
        //     $compressedImage->brightness(-1);
        //     $compressedImage->contrast(2);
        //     $compressedImage->sharpen(2);
        //     $compressedImage->encode('webp', 40);
        //     $unique = uniqid();
        //     $compressedImage->save(public_path('admin-assets/uploads/profileimages/' . $unique . '.webp'));
        //     $filename = $compressedImage->basename;
        //     $data['profile_image'] = $filename;
        // }
        // ----
        $data['name'] =  $request->name;
        $data['email'] = $request->email;
        $data['status'] = $request->status;

        User::where('id', $id)->update($data);
        return redirect()->route('user.list')->with('success', 'User Details Updated Successfully');
    }

    public function userDelete($id)
    {
        $data = User::find($id);
        $ImagePath = public_path('admin-assets/uploads/profileimages/') . $data->profile_image;
        File::delete($ImagePath);
        $data->delete();
        return redirect()->route('user.list')->with('success', 'User Delete Successfully');
    }
}
