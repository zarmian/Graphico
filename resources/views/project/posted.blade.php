@extends('layouts.layout')

@section('content')
<div class="page-wrapper">
        <div class="page-title">
            <div class="container">
                <h2>Posted Projects</h2>
            </div>
        </div>
        <div class="page-section">
            <div class="container">
                <div class="my-work-employer-wrap">
					                    <ul class="tabs tabs nav-tabs-my-work" role=" tablist ">
                        <li class=" nav-link active"><a data-toggle="tab"
                                              href="#current-project-tab" aria-selected="true"><span>Posted Projects</span></a>
                        </li>
                        
                    </ul>
                    <div class="tab-content">
						           
                                <div class="work-project-box">
                                    <div class="current-employer-project">
                                        <div class="table">
                                            <div class="table-head">
                                                <div class="table-col project-title-col">Project Title</div>
                                                <div class="table-col project-bids-col">Number Bids</div>
                                                <div class="table-col project-budget-col">Budget</div>
                                                <div class="table-col project-open-col">Open Date</div>
                                                <div class="table-col project-status-col">Status</div>
                                                <div class="table-col project-action-col">Action</div>
                                            </div>
                                            
                                            <div class="current-table-rows" style="display: table-row-group;">
                                                                                                    
                                            @foreach($projects as $project)
                                            <div class="table-row">
                                                                                        
                                                        <div class="table-col project-title-col">
                                                        
                                                            <a  class="secondary-color" href="{{$project->id}}">{{$project->p_title}}</a>
                                                        </div>
                                                        <div class="table-col project-bids-col">{{$project->no_bids}}                                                            <span>Bids</span></div>
                                                        <div class="table-col project-budget-col">
                                                                
                                                            <span>Budget</span>{{$project->budget}}
                                                                                                                  </div>
                                                        <div class="table-col project-open-col">
                                                            <span>Open on</span>{{ \Carbon\Carbon::parse($project->created_at)->format('j F, Y') }}                                                        </div>
                                                        <div class="table-col project-status-col">{{$project->status}}</div>
                                                        <div class="table-col project-action-col">
                                                            @if($project->status == 'active')
                                                        <form method="POST" action="/project/{{$project->id}}/archive">
                                                                {{method_field('PATCH')}}
                                                                @csrf
                                                            <Button class="normal-btn primary-bg-color" action="POST" data-project-id="{{$project->id}}">Archive</Button>
                                                            </form>
                                                            @else
                                                            <form method="POST" action="/project/{{$project->id}}/active">
                                                                {{method_field('PATCH')}}
                                                                @csrf
                                                            <Button class=" normal-btn  " action="POST" data-project-id="{{$project->id}}">Active</Button>
                                                            </form>
                                                            @endif
                                                        </div> 
                                                                                                     </div>
                                                                                                     @endforeach 
												                                                    </div>
                                        </div>
										                                    </div>
                                </div>
                            <div id="previous-project-tab" class="employer-previous-project-tab fade panel-tab">
								                                <div class="work-project-box">
                                    <div class="work-project-filter">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-8 col-sm-6 col-xs-12">
                                                    <div class="input-field">
                                                        <label class="field-title">Keyword</label>
                                                        <input type="text" class="search" name="s"
                                                               placeholder="Search projects by keywords">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-6 col-xs-12">
                                                    <div class="input-field">
                                                        <label class="field-title">Status</label>
                                                        <select class="chosen-single"
                                                                name="project_previous_status">
                                                            <option value="">All</option>
                                                            <option value="complete">Completed</option>
                                                            <option value="disputed">Resolved</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="clear-filter work-project-filter-clear secondary-color"
                                               href="">Clear all filters</a>
                                        </form>
                                    </div>
                                </div>
                                <div class="work-project-box">
                                    <div class="previous-employer-project">
                                        <div class="table">
                                            <div class="table-head">
                                                <div class="table-col project-title-col">Project Title</div>
                                                <div class="table-col project-start-col">Start Date</div>
                                                <div class="table-col project-bid-col">Bid Won</div>
                                                <div class="table-col project-status-col">Status</div>
                                                <div class="table-col project-review-col">Review</div>
                                            </div>
                                            <div class="previous-table-rows" style="display: table-row-group;">
												                                            </div>
                                        </div>
										<span class="project-no-results">There are no activities yet.</span>                                    </div>
</div>
								                            </div>
						                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection