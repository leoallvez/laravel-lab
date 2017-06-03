<?php

namespace App\Http\Controllers;
use App\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::all();

        if(!is_null($jobs)) 
        {
            return response()->json(['status' => true, 'jobs' => $jobs], 200);
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
        $job = new Job($request->all());

        $job->save();
   
        return response()->json(['status' => true, 'job' => $job]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::find($id);

        if(!is_null($job))
        {
            return response()->json(['status' => true, 'job' => $job], 200);
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
        $job = Job::find($id);

        if(!is_null($job))
        {
            $job->update($request->all());

            return response()->json(['status' => true, 'job' => $job], 200);
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
        $job = Job::find($id);

        if(!is_null($job)) 
        {
            $job->delete();

            return response()->json(['status' => true, 'job' => $job], 200);
        }
        return response()->json(['status' => false], 200);
    }
}
