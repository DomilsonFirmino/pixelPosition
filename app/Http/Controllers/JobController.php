<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::latest()->with(['employer','tags'])->get()->groupBy('featured');
        return view('jobs.index',[
            'jobs' => $jobs[0],
            'featureds' => $jobs[1],
            'tags' => Tag::all()
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'title' => ['required'],
            'salary' => ['required'],
            'location' => ['required'],
            'schedule' => ['required'],
            'url' => ['required'],
            'tags' => ['required'],
        ]);

        $attr['featured'] = $request->has('featured');

        $job = Auth::user()->employer->jobs()->create(Arr::except($attr, 'tags'));
        
        if($attr['tags'] ?? false){
            foreach (explode(',',$attr['tags']) as $tag){
                $job->tag($tag);
            }    
        }
        return redirect('/');
    }
}
