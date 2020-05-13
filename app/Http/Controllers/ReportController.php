<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Report;
use Gate;
use Auth;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$reports = Report::all();
    	return view('reports.index', ['reports' => $reports]);
    }

    public function create() 
    {
        if(Gate::denies('post-reports')) {
            return redirect(route('reports.index'));
        }

    	return view('reports.create');
    }

    public function store(Request $request) 
    {
    	$this->validate(request(), [
    		'title' => 'required',
    		'body' => 'required'
    	]);

    	$report = new Report;

    	$report->title = $request->title;
    	$report->body = $request->body;
    	$report->user_id = $request ->user_id;

    	if($report->save()) {
    		$request->session()->flash('success', 'Report has been posted');
        }
        else {
            $request->session()->flash('error', ' Error posting the report');
        }

        return redirect()->route('reports.index');
    }

    public function edit(Report $report)
    {
        if(Gate::denies('edit-reports')) {
            return redirect(route('reports.index'));
        }

        return view('reports.edit')->with('report', $report);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        $report->title = $request->title;
        $report->body = $request->body;
        $report->user_id = $request->user_id;
        
        if($report->save())
        {
            $request->session()->flash('success','Report has been updated');
        }
        else 
        {
            $request->session()->flash('error', ' Error updating the report');
        }

        return redirect()->route('reports.index');
    }

    public function destroy(Report $report, Request $request)
    {
        if(Gate::denies('delete-reports')) {
            return redirect(route('reports.index'));
        }

        if($report->delete())
        {
            $request->session()->flash('success','Report has been deleted');
        }
        else 
        {
            $request->session()->flash('error', ' Error deleting the report');
        }

        return redirect()->route('reports.index');
    }
}
