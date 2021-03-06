<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::paginate(5);
        return view('company.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'company_name' => 'required|unique:company',
            'email' => 'required',
            'website' => 'required',
            'logo' => 'mimes:png|max:2048|required|dimensions:min_width=100,min_height=100',
        ]);

        $logo = $request->logo;
        $newlogo = time() . $logo->getClientOriginalName();



        Company::create([
            'company_name' => $request->company_name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => 'storage/app/company/' . $newlogo

        ]);
        $logo->move('storage/app/company/', $newlogo);

        return redirect()->route('company.index');
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
        $company = Company::findorfail($id);
        return view('company.edit', compact('company'));
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
        $this->validate($request, [
            'company_name' => 'required',
            'email' => 'required',
            'website' => 'required',

        ]);
        $company = Company::findorfail($id);
        if ($request->has('logo')) {
            $logo = $request->logo;
            $newlogo = time() . $logo->getClientOriginalName();
            $logo->move('storage/app/company/', $newlogo);
            $data = [
                'company_name' => $request->company_name,
                'email' => $request->email,
                'website' => $request->website,
                'logo' => 'storage/app/company/' . $newlogo
            ];
        } else {
            $data = [
                'company_name' => $request->company_name,
                'email' => $request->email,
                'website' => $request->website,
            ];
        }



        $company->update($data);
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findorfail($id);
        $company->delete();

        return redirect()->back();
    }
}
