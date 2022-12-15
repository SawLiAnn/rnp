<?php
    
namespace App\Http\Controllers;
    
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\User;

class ProjectController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:project-list', ['only' => ['index']]);
         $this->middleware('permission:project-create', ['only' => ['create','store']]);
         $this->middleware('permission:project-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:project-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $projects = Project::latest()->paginate(5);
        $users=User::all();
        return view('projects.index',compact(['users', 'projects']))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $project = new Project;
        // $project = Project::all();

        return view('projects.create', compact(['users', 'project']));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'project_type' => 'required',
            'project_name' => 'required',
            'student'      => 'required',
            'supervisor'   => 'required|different:examiner1|different:examiner2',
            'examiner1'    => 'required|different:examiner2',
            'examiner2'    => 'required',
        ]);

        Project::create($request->all());
    
        return redirect()->route('projects.index')
                        ->with('success','Project created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    // public function show(Project $project)
    // {
    //     return view('projects.show',compact('project'));
    // }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $users = User::all();
        return view('projects.edit',compact(['users', 'project']));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //  request()->validate([
        //     'name' => 'required',
        //     'detail' => 'required',
        // ]);
    
        $project->update($request->all());
    
        return redirect()->route('projects.index')
                        ->with('success','Project updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
    
        return redirect()->route('projects.index')
                        ->with('success','Project deleted successfully');
    }
}