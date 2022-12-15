@if(Auth::user()->hasRole('Admin'))

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Project Type:</strong>

            <select name="project_type" class="form-control" required>
                @if(old('project_type')==null && $project->project_type==null)
                <option value="" selected disabled>Choose Option</option>
                <option value="1">Development Project</option>
                <option value="2">Research Project</option>
                @else
                <option value="1" @if(old('project_type')==$project->project_type || $project->project_type == 1)
                    selected @endif>Development Project</option>
                <option value="2" @if(old('project_type')==$project->project_type || $project->project_type == 2)
                    selected @endif>Research Project</option>
                @endif
            </select>


            {{-- <select name="examiner2" class="form-control" required>
                @if(old('examiner2')==null && $project->examiner2==null)
                <option value="" selected="true" disabled="disabled">Choose Option</option>
                @foreach($users as $user)
                @if($user->hasRole('Lecturer'))
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
                @endforeach

                @else
                @foreach($users as $user)
                <option value="{{ $user->id }}" @if(old('examiner2')==$user->id || $user->id==$project->examiner2)
                    selected
                    @endif>{{ $user->name }}
                </option>
                @endforeach
                @endif
            </select> --}}

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Project Name:</strong>
            <input type="text" name="project_name" class="form-control" placeholder="Name" required
                value="{{old('project_name', $project->project_name)}}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Student:</strong>
            <select name="student" class="form-control" required>
                @if(old('student')==null && $project->student==null)
                <option value="" selected="true" disabled="disabled">Choose Option</option>
                @foreach($users as $user)
                @if($user->hasRole('Student'))
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
                @endforeach

                @else
                @foreach($users as $user)
                <option value="{{ $user->id }}" @if(old('student')==$user->id || $user->id==$project->student) selected
                    @endif>{{ $user->name }}
                </option>
                @endforeach
                @endif
            </select>

            {{-- <select name="student" class="form-control" required>
                @if(old('student')==null && $data->group_id==null)
                <option value="" selected="true" disabled="disabled">Choose Option</option>
                @foreach($deliveryStaffGroups as $group)
                <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
                @else
                @foreach($deliveryStaffGroups as $group)
                <option value="{{ $group->id }}" @if(old('group_id')==$group->id || $group->id ==
                    $data->group_id) selected @endif>{{ $group->name }}</option>
                @endforeach
                @endif
            </select>

            <select name="group_id" class="form-control" required>
                @if(old('group_id')==null && $data->group_id==null)
                <option value="" selected="true" disabled="disabled">Choose Option</option>
                @foreach($deliveryStaffGroups as $group)
                <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
                @else
                @foreach($deliveryStaffGroups as $group)
                <option value="{{ $group->id }}" @if(old('group_id')==$group->id || $group->id ==
                    $data->group_id) selected @endif>{{ $group->name }}</option>
                @endforeach
                @endif
            </select> --}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Supervisor:</strong>
            {{-- <select name="supervisor" class="form-control" required>
                <option value="" selected="true" disabled="disabled">Choose Option</option>
                @foreach($users as $user)
                @if($user->hasRole('Lecturer'))
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
                @endforeach
            </select> --}}

            <select name="supervisor" class="form-control" required>
                @if(old('supervisor')==null && $project->supervisor==null)
                <option value="" selected="true" disabled="disabled">Choose Option</option>
                @foreach($users as $user)
                @if($user->hasRole('Lecturer'))
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
                @endforeach

                @else
                @foreach($users as $user)
                <option value="{{ $user->id }}" @if(old('supervisor')==$user->id || $user->id==$project->supervisor)
                    selected
                    @endif>{{ $user->name }}
                </option>
                @endforeach
                @endif
            </select>

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Examiner 1:</strong>
            {{-- <select name="examiner1" class="form-control" required>
                <option value="" selected="true" disabled="disabled">Choose Option</option>
                @foreach($users as $user)
                @if($user->hasRole('Lecturer'))
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
                @endforeach
            </select> --}}

            <select name="examiner1" class="form-control" required>
                @if(old('examiner1')==null && $project->examiner1==null)
                <option value="" selected="true" disabled="disabled">Choose Option</option>
                @foreach($users as $user)
                @if($user->hasRole('Lecturer'))
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
                @endforeach

                @else
                @foreach($users as $user)
                <option value="{{ $user->id }}" @if(old('examiner1')==$user->id || $user->id==$project->examiner1)
                    selected
                    @endif>{{ $user->name }}
                </option>
                @endforeach
                @endif
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Examiner 2:</strong>
            <select name="examiner2" class="form-control" required>
                @if(old('examiner2')==null && $project->examiner2==null)
                <option value="" selected="true" disabled="disabled">Choose Option</option>
                @foreach($users as $user)
                @if($user->hasRole('Lecturer'))
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
                @endforeach

                @else
                @foreach($users as $user)
                <option value="{{ $user->id }}" @if(old('examiner2')==$user->id || $user->id==$project->examiner2)
                    selected
                    @endif>{{ $user->name }}
                </option>
                @endforeach
                @endif
            </select>
        </div>
    </div>
    @endif


    @if(Auth::user()->hasRole('Lecturer'))
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Start Date:</strong>
            <input type="date" name="start_date" value="{{old('start_date', $project->start_date)}}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>End Date:</strong>
            <input type="date" name="end_date" value="{{old('end_date', $project->end_date)}}">
        </div>
    </div>
    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Start Date:</strong>
            <input class="date form-control" type="text" name="start_date">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>End Date:</strong>
            <input class="date form-control" type="text" name="end_date">
        </div>
    </div>
    <script type="text/javascript">
        $('.date').datepicker({  
               format: 'mm-dd-yyyy'
             });  
    </script> --}}
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Duration:</strong>
            <input type="number" name="duration" class="form-control" placeholder="Duration"
                value="{{old('duration', $project->duration)}}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Project Progress:</strong>
            <select name="project_progress" class="form-control">
                <option value="" selected disabled>Choose Option</option>
                <option value="1" @if($project->project_progress == 1) selected @endif>Milestone 1</option>
                <option value="2" @if($project->project_progress == 2) selected @endif>Milestone 2</option>
                <option value="3" @if($project->project_progress == 3) selected @endif>Final Report</option>
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Project Status:</strong>
            <select name="project_status" class="form-control">
                <option value="" selected disabled>Choose Option</option>
                <option value="1" @if($project->project_status == 1) selected @endif>On Track</option>
                <option value="2" @if($project->project_status == 2) selected @endif>Delayed</option>
                <option value="3" @if($project->project_status == 3) selected @endif>Extended</option>
                <option value="4" @if($project->project_status == 4) selected @endif>Completed</option>
            </select>
        </div>
    </div>
    @endif
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>