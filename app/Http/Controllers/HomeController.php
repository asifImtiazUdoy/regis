<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\School;
use App\Models\Exhibitor;
use App\Models\Setting;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd('working');
        $countries = Country::orderBy('name', 'ASC')->get();
        $schools = School::orderBy('name', 'ASC')->get();
        return view('front.index', compact('countries', 'schools'));
    }

    public function store(Request $request)
    {
        //Validate Date
        $request->validate([
            'group' => 'required',
            'name' => 'required|string|max:255',
            'phone'  => 'required|unique:exhibitors',
            'email' => 'required|string|email|max:255|unique:exhibitors',
            'country_id' => 'required',
            'school' => 'required|string|max:255',
            'b_date' => 'required',
            'b_month' => 'required',
            'b_year' => 'required',
            'art_name' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'artwork' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'payment_number' => 'required',
            'transaction_id' => 'required',
        ],
        [
            'group.required' => 'Please select a group',
            'name.required' => 'Please insert participant name',
            'phone' => 'Please insert participant phone numer',
            'country_id.required' => 'Please select country',
            'school.required' => 'Please insert your school name',
            'art_name.required' => 'Please insert artwork name',
            'image.required' => 'Please select participant image',
            'image.max' => 'Please select a image under 2 MB',
            'artwork.max' => 'Please select a image under 2 MB',
            'payment_number' => 'Please insert number from you pay',
            'transaction_id' => 'Please insert bkash payment transaction ID',
        ]);

        $exhibitor = new Exhibitor;

        $exhibitor->regi_code = mt_rand(10000, 99999);
        $exhibitor->group = $request->group;
        $exhibitor->name = $request->name;
        $exhibitor->email = $request->email;
        $exhibitor->phone = $request->phone;
        $exhibitor->b_date = $request->b_date;
        $exhibitor->b_month = $request->b_month;
        $exhibitor->b_year = $request->b_year;
        $exhibitor->country_id = $request->country_id;
        $exhibitor->school = $request->school;
        $exhibitor->art_name = $request->art_name;
        $exhibitor->media = $request->media;
        $exhibitor->size = $request->size;
        $exhibitor->year = $request->year;

        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-'.$extension;
            $file->move('uploads/images/', $filename);
            $exhibitor->image = $filename;
        }
        if($request->hasfile('artwork')){
            $file = $request->file('artwork');
            $extension = $file->getClientOriginalName();
            $filename = time().'-'.$extension;
            $file->move('uploads/images/', $filename);
            $exhibitor->artwork = $filename;
        }

        $exhibitor->link = $request->link;
        $exhibitor->payment_number = $request->payment_number;
        $exhibitor->transaction_id = $request->transaction_id;

        $exhibitor->save();

        $data = array(
            'exhibitor'      =>  $exhibitor,
        );

        Mail::to($request->email)->send(new SendMail($data));


        return redirect()->route('registrant.show', $exhibitor->id)->with('success', 'Thank you for registration!! Download your copy')->with('mail', 'We sent you a mail with confirmation!');

    }

    public function show($id)
    {
        $setting = Setting::where('id', 1)->first();
        $exhibitor = Exhibitor::where('id', '=', $id)->firstOrFail();
        return view('front.show', compact('exhibitor', 'setting'));
    }

    public function pdf($id)
    {
        $exhibitor = Exhibitor::with('country', 'school')->findOrFail(intval($id));
        $setting = Setting::where('id', 1)->first();

        $pdf = PDF::loadView('front.pdf', compact('exhibitor', 'setting'));

        // return $pdf->download($exhibitor->regi_code.'-'.$exhibitor->created_at.'.pdf');

        return view('front.pdf', compact('exhibitor', 'setting'));
    }
}
