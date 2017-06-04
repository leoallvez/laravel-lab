<?php

namespace App\Http\Controllers;
use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            return response()->json([
                'status' => true, 
                'jobs' => $jobs
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
        $validator = $this->jobValidator($request);

        if(!$validator->fails()) 
        {
            $job = new Job($request->all());

            $job->save();
    
            return response()->json([
                'status' => true, 
                'job' => $job
            ], 200);
        }

        return response()->json(['status' => false, 'errors' => $validator->errors()], 200);
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
            return response()->json([
                'status' => true, 
                'job' => $job
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
        $validator = $this->jobValidator($request);

        if(!$validator->fails())
         {
            $job = Job::find($id);

            if(!is_null($job))
            {
                $job->update($request->all());

                return response()->json([
                    'status' => true,
                     'job' => $job
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
        $job = Job::find($id);

        if(!is_null($job)) 
        {
            $job->delete();

            return response()->json([
                'status' => true, 
                'job' => $job
            ], 200);
        }
        return response()->json(['status' => false], 200);
    }

    protected function JobValidator($request) {
        //Custom Error Messages.
        $messages = [
            'title.required' => 'The title of job is required.',
            'description.required' => 'The description of job is required.'
        ];
        //Validation.
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required'
        ], $messages);

        return $validator;
    }
}
