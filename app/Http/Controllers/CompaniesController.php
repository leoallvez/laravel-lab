<?php

namespace App\Http\Controllers;
use App\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();

        if(!is_null($companies))
        {
            return response()->json(['status' => true, 'companies' => $companies], 200);
        }
        return response()->json(['status' => false], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new Company($request->all());

        $company->save();

        return response()->json(['status' => true, 'company' => $company], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);

        if(!is_null($company))
        {
            return response()->json(['status' => true, 'company' => $company], 200);
        }
        return response()->json(['status' => false], 200);
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
        $company = Company::find($id);

        if(!is_null($company))
        {
            $company->update($request->all());

            return response()->json(['status' => true, 'company' => $company ], 200);
        }

        return response()->json(['status' => false], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);

        if(!is_null($company))
        {
            $company->delete();

            return response()->json(['status' => true, 'company' => $company], 200);
        }
        return response()->json(['status' => false], 200);
    }
}
