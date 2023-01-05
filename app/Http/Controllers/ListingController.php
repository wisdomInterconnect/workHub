<?php

namespace App\Http\Controllers;
use App\Models\listing;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{


    //show create form
    public function create(){
        return view('listings.create');
     }


    //show all listing
    public function index(){
        // dd(request('tag'));
        // dd(Listing::latest()->filter(request(['tag', 'search']))->paginate(2));
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
            
            
        ]);

    }
    
     

     //store Listing Data
     public function store(Request $request){
        // dd($request->file('logo'));
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
        //logo upload
        if($request-> hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }
        //Add users id
        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);
        // Session::flash('message','listing Created');
        return redirect('/')->with('message', 'listing created successfully');
     }


     //Show Edit Form
     public function edit(Listing $listing){
        return view('listings.edit', ['listing' => $listing]);
     }
     
     //Update Listing Data
     public function update(Request $request, Listing $listing){
        // dd($request->file('logo'));

        //Make sure logged in user is owner
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
        //logo upload
        if($request-> hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }

        $listing->update($formFields);
        // Session::flash('message','listing Created');
        return back()->with('message', 'listing updated successfully');
     }
     
     //Delete Listing
     public function destroy(Listing $listing){
        //Make sure logged in user is owner
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }

        $listing->delete();
        return redirect('/')->with('message', 'Listing Deleted Successfully');


     }

     //Manage Listings
     public function manage(){
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
     }


     
      
      //Show single Listing
      public function show(Listing $listing){
        return view('listings.show', [
            'listing' => $listing
        ]);

     }
}
//common Resource Routes
//index - Show all listings
//show - show single listing
//create - show form to create new listing
//store - store new listing
//edit - show form to edit listing
//update - Update listing
//destroy - delete listing
