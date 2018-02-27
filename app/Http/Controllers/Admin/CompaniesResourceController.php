<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use App\Http\Middleware\CustomIdFilter;
use App\Company;

class CompaniesResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $companies = Company::paginate(10);

        return view('Companies.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
    	$validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'logo' => 'required|dimensions:min_width=100,min_height=200'  
        ]);
        $path = $request->logo->store('/', 'uploads');
		$companie = new Company;
		$companie->name = $request->name;
		$companie->email = $request->email;
		$companie->website = $request->website;
		$companie->logo = $path;
		$companie->save();

		return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if (!Company::find($id)) {
            abort(404);
        }

        $name = Company::find($id)->name;
        $email = Company::find($id)->email;
        $website = Company::find($id)->website;
        $logo = Company::find($id)->logo;        

        return view('Companies.show', ['name' => $name, 'email' => $email, 'website' => $website, 'logo' => $logo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if (!Company::find($id)) {
            abort(404);
        }

        $name = Company::find($id)->name;
        $email = Company::find($id)->email;
        $website = Company::find($id)->website;
        $logo = Company::find($id)->logo;        

        return view('Companies.edit', ['name' => $name, 'email' => $email, 'website' => $website, 'id' => $id, 'logo' => $logo]);
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
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'logo' => 'required|dimensions:min_width=100,min_height=200'  
        ]);
        
        $path = $request->logo->store('/', 'uploads');

        if (Storage::disk('uploads')->exists(Company::find($id)->logo)) {
            Storage::disk('uploads')->delete(Company::find($id)->logo);
        }

        Company::where('id', $id)
          ->update(['name' => $request->name, 'email' => $request->email, 'website' => $request->website, 'logo' => $path]);

        return back()->with('status', 'Profile updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Storage::disk('uploads')->exists(Company::find($id)->logo)) {
            Storage::disk('uploads')->delete(Company::find($id)->logo);
        }

        Company::destroy($id);

        return redirect()->route('companies.index');
    }
}
