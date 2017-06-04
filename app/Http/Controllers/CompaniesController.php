<?php

namespace App\Http\Controllers;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            return response()->json([
                'status' => true, 
                'companies' => $companies
            ], 200);
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
        $validator = $this->companyValidator($request);

        if(!$validator->fails()) 
        {
            $company = new Company($request->all());

            $company->save();
            return response()->json([
                'status' => true, 
                'company' => $company
            ], 200);
        }
        return response()->json([
            'status' => false, 
            'errors' => $validator->errors()
        ], 200);
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
            return response()->json([
                'status' => true, 
                'company' => $company
            ], 200);
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
        $validator = $this->companyValidator($request);

        if(!$validator->fails()) 
        {
            $company = Company::find($id);

            if(!is_null($company))
            {
                $company->update($request->all());

                return response()->json([
                    'status' => true, 
                    'company' => $company 
                ], 200);
            }
            return response()->json([
                 'status' => false, 
                 'errors' => ['Job not found']
            ], 200);
        }
        return response()->json([
            'status' => false, 
            'errors' => $validator->errors()
        ], 200);
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

            return response()->json([
                'status' => true, 
                'company' => $company
            ], 200);
        }
        return response()->json(['status' => false], 200);
    }

    protected function companyValidator($request) {
        //Custom Error Messages.
        $messages = [
            'name.required' => 'The name of company is required.',
            'email.required' => 'The email of company is required.'
        ];
        //Validation.
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required'
        ], $messages);

        return $validator;
    }
}
