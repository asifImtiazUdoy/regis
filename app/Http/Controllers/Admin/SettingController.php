<?php

namespace App\Http\Controllers\Admin;

use DB;
use File;
use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $setting = Setting::where('id', 1)->first();
        return view('back.setting.index', compact('setting'));
    }

    //Update password in database
    public function updatePassword(Request $request, $id)
    {
        $user = DB::table('users')->where('id', '=', $id)->first();

        if(Hash::check($request->c_password, $user->password))
        {
            //Validate Date
            $this->validate($request, array(
                'password' => 'required|string|min:8',
            ));

            $user->password = Hash::make($request->input('password'));
            $user->save();
            Session::flash('success', 'Pasword has been updated');
            return back();
        }
        else
        {
            return back()->with('danger', 'Current pasword does not match');
        }
    }

    //setting
    public function info(Request $request, $id)
    {
        $setting = Setting::findOrFail(intval($id));
        $setting->website_name = $request->website_name;
        $setting->website = $request->website;
        $setting->phone = $request->phone;
        $setting->email = $request->email;
        
        if($request->hasfile('logo')){

            $image_path = '/home/livingar/exhibition.livingartbg.com/uploads/images/'.$setting->logo;
            if(File::exists($image_path)){
                File::delete($image_path);
            }
            $file = $request->file('logo');
            $extension = $file->getClientOriginalName();
            $filename = time().'-'.$extension;
            $file->move('uploads/images/', $filename);
            $setting->logo = $filename;
        }

        $setting->save();

        return redirect()->route('setting')->with('success', 'Website info is updated');
    }

    public function banner(Request $request, $id)
    {
        $setting = Setting::findOrFail(intval($id));
        $setting->banner_text_1 = $request->banner_text_1;
        $setting->banner_text_2 = $request->banner_text_2;
        $setting->banner_text_3 = $request->banner_text_3;

        if($request->hasfile('banner_image')){
            $image_path = '/home/livingar/exhibition.livingartbg.com/uploads/images/'.$setting->banner_image;
            if(File::exists($image_path)){
                File::delete($image_path);
            }
            $file = $request->file('banner_image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-'.$extension;
            $file->move('uploads/images/', $filename);
            $setting->banner_image = $filename;
        }

        $setting->save();

        return redirect()->route('setting')->with('success', 'Banner is updated');
    }

    public function pdfHead(Request $request, $id)
    {
        $setting = Setting::findOrFail(intval($id));

        if($request->hasfile('pad_head')){
            
            $image_path = '/home/livingar/exhibition.livingartbg.com/uploads/images/'.$setting->pad_head;
            if(File::exists($image_path)){
                File::delete($image_path);
            }
            $file = $request->file('pad_head');
            $extension = $file->getClientOriginalName();
            $filename = time().'-'.$extension;
            $file->move('uploads/images/', $filename);
            $setting->pad_head = $filename;
        }

        $setting->save();

        return redirect()->route('setting')->with('success', 'Pdf Head is updated');

    }
}
