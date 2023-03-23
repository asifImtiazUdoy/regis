<?php

namespace App\Http\Controllers;

use App\Models\Exhibitor;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
    	//Validate Date
        $request->validate([
            'search' => 'required',
        ],
        [
            'search.required' => 'Please insert your Phone Number or Registration Code to Search',
        ]);

        $exhibitor = Exhibitor::where('regi_code', $request->search)
        ->orWhere('phone', $request->search)->first();
        
        if($exhibitor){
            return redirect()->route('registrant.show', $exhibitor->id);
        }else{
            return back()->with('error', 'Please enter the number you have registered');
        }

        
    }
}
