@extends('layouts.layout')

@section('title','My Projects')

@section('content')
<div class="page-title">
        <div class="container">
            <h2>My-Projects</h2>
        </div>
    </div>
    <div class="page-section">
        <div class="container">
            <div class="my-work-employer-wrap">
                                    <ul class="tabs nav-tabs-my-work">
                    <li class="active"><a data-toggle="tab"
                                          href="#current-project-tab"><span>Current Projects</span></a>
                    </li>
                    
                </ul>
                <div class="tab-content">
                                                <div id="current-project-tab" class="freelancer-current-project-tab panel-tab active">
                            
                            <div class="work-project-box">
                                                                    <div class="current-freelance-project">
                                    <div class="table">
                                        <div class="table-head">
                                            <div class="table-col project-title-col">Project Title</div>
                                            <div class="table-col project-bids-col">Number Bids</div>
                                            <div class="table-col project-status-col">Status</div>
                                            <div class="table-col project-action-col">Action</div>
                                        </div>
                                        <div class="current-table-rows" style="display: table-row-group;">
                                            @foreach($projects as $project)
                                                <div class="table-row">
                                                    <div class="table-col project-title-col ">
                                                                                                                        <a  class="secondary-color" href="projects/{{$project->id}}/show">{{$project->p_title}}</a>
                                                                                                                </div>
                                                    <div class="table-col project-bids-col"> {{$project->no_bids}}                                                           
                                                        <span>Bids</span></div>
                                                    
                                                    
                                                    <div class="table-col project-status-col ">{{$project->status}}</div>
                                                    <div class="table-col project-action-col">
                                                    <a href="workspace/{{$project->id}}" target="">Workspace</a>                                                        </div>
                                                </div>
                                                 @endforeach                                               
                                                                                        </div>
                                    </div>
                                                                        </div>
                            </div>
                            
                                                       
                                        </div>
            </div>
        </div>
    </div>
</div>
@endsection