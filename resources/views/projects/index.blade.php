@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Projects</h2>
        </div>
        <div class="pull-right">
            @can('project-create')
            <a class="btn btn-success" href="{{ route('projects.create') }}">Create New Project</a>
            @endcan
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Project Type</th>
        <th>Project Name</th>
        <th>Student</th>
        <th>Supervisor</th>
        <th>Examiner 1</th>
        <th>Examiner 2</th>
        <th>Project Start Date</th>
        <th>Project End Date</th>
        <th>Project Duration (Month)</th>
        <th>Project Progress</th>
        <th>Project Status</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($projects as $project)
    <tr>
        <td>{{ ++$i }}</td>
        <td>@if($project->project_type==1) Development Project @else Research Project @endif</td>

        <td>{{ $project->project_name }}</td>
        {{-- <td>{{ $project->student }}</td> --}}
        <td>
            @if($project->student == null)
            -
            @else
            @foreach($users as $user)
            @if($user->id == $project->student)
            {{ $user->name }}
            @endif
            @endforeach
            @endif
        </td>
        {{-- <td>{{ $project->supervisor }}</td> --}}
        <td>
            @if($project->supervisor == null)
            -
            @else
            @foreach($users as $user)
            @if($user->id == $project->supervisor)
            {{ $user->name }}
            @endif
            @endforeach
            @endif
        </td>
        {{-- <td>{{ $project->examiner1 }}</td>
        <td>{{ $project->examiner2 }}</td> --}}
        <td>
            @if($project->examiner1 == null)
            -
            @else
            @foreach($users as $user)
            @if($user->id == $project->examiner1)
            {{ $user->name }}
            @endif
            @endforeach
            @endif
        </td>
        <td>
            @if($project->examiner2 == null)
            -
            @else
            @foreach($users as $user)
            @if($user->id == $project->examiner2)
            {{ $user->name }}
            @endif
            @endforeach
            @endif
        </td>
        <td>{{ $project->start_date }}</td>
        <td>{{ $project->end_date }}</td>
        <td>{{ $project->duration }}</td>
        {{-- <td>{{ $project->project_progress }}</td> --}}
        <td>
            @if($project->project_progress==1) Milestone 1
            @elseif($project->project_progress==2) Milestone 2
            @elseif($project->project_progress==3) Final Report
            @endif
        </td>

        {{-- <td>{{ $project->project_status }}</td> --}}
        <td>
            @if($project->project_status==1) On Track
            @elseif($project->project_status==2) Delayed
            @elseif($project->project_status==3) Extended
            @elseif($project->project_status==4) Completed
            @endif
        <td>
            <form action="{{ route('projects.destroy',$project->id) }}" method="POST">
                @can('project-edit')
                @if(Auth::user()->hasRole('Admin') || Auth::id()==$project->supervisor)
                <a class="btn btn-primary" href="{{ route('projects.edit',$project->id) }}">Edit</a>
                @endif
                @endcan


                @csrf
                @method('DELETE')
                @can('project-delete')
                <button type="submit" class="btn btn-danger">Delete</button>
                @endcan
            </form>
        </td>
    </tr>
    @endforeach
</table>


{!! $projects->links() !!}


@endsection