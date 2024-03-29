<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // Show all listings
    public function index() {
        $listings = Listing::latest()
        ->filter(request(['tag', 'search']))
        ->paginate(6);

        return view('listings.index', [
            'listings' => $listings,
        ]);
    }

    // Show single listing
    public function show(Listing $listing) {
        return view('listings.show', [
            'data' => $listing,
          ]);
    }

    // Show create form
    public function create() {
        return view('listings.create');
    }

    // Store listing data
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully');
    }

    public function edit(Listing $listing) {
        return view('listings.edit', ['listing' => $listing]);
    }

    public function update(Request $request, Listing $listing) {
        // logged in user is the owner
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('message', 'Listing update successfully');
    }

    public function destroy(Listing $listing) {
        // logged in user is the owner
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized');
        }

        $listing->delete();

        return redirect('/')->with('message', 'Listing deleted successfully!');
    }

    public function manage() {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}
