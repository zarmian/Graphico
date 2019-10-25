@extends('layouts.layout')

@section('title','Project')

@section('content')
@foreach($projects as $project)
<div class="page-wrapper">
        <div class="container">
            <div class="project-detail-wrap">
				<div class="project-detail-box">
    <div class="project-detail-info">
        <div class="row">
            <div class="col-lg-8 col-md-7">
                <h1 class="project-detail-title">{{$project->p_title}}</h1>
                <ul class="project-bid-info-list">
                    <li>
						<span>Bids</span><span class="secondary-color">{{$project->no_bids}}</span>                    </li>
                    <li>
                        <span>Budget</span>
                    <span class="secondary-color" >{{$project->budget}}</span>
                    </li>
                    @if($project->status=='Submitted')
                    <li>
                            <span>Submitted Files</span>
                        <button href="/download/{{$project->finalfile}}" class=" normal-btn primary-bg-color" >Click to Download </button>
                        </li>
                        @endif
					                </ul>
            </div>
            <div class="col-lg-4 col-md-5">
                <p class="project-detail-posted">Posted on {{ \Carbon\Carbon::parse($project->created_at)->format('j F, Y') }}</p>
                <span class="project-detail-status secondary-color">
                    {{$project->status}}<span></span>
                </span>
                <div class="project-detail-action">
                    @if(Auth::user()->role==2)
                        <form method="POST" action="/project/{{$project->id}}/bid">
                        {{method_field('PATCH')}}
                        @csrf
                    <Button class="normal-btn primary-bg-color" action="POST" data-project-id="{{$project->id}}">APPLY</Button>
                    </form>
                    @elseif(Auth::user()->role==3)
                    <a href="{{$project->id}}/edit" class="normal-btn primary-bg-color">Edit</a>
                    
                    @endif
	                </div>
            </div>
        </div>
    </div>
</div>
<div class="project-detail-box no-padding">
    <div class="project-detail-desc">
        <h4>Project Desciption</h4>
        <p><p>{{$project->p_description}}</p></p>
        <h4>Attatchment File</h4>
        <button class=" normal-btn primary-bg-color" href="/download/{{$project->file}}">Click to Download</button>
		    </div>
    <div class="project-detail-extend">
        <div class="project-detail-skill">
            <h4>Competition Details</h4>
            @foreach($competitions as $competition)
            <p><p>{{$competition->c_description}}</p></p>
            <h4>Competition Date</h4>
        <span>{{ \Carbon\Carbon::parse($competition->date)->format('j F, Y') }}</span>
            <h4>Attatchment File</h4>
        <button class=" normal-btn primary-bg-color" href="/download/{{$competition->file}}">Click to Download</button>
        @endforeach
			        </div>
                   
		        <div class="project-detail-about">
        @if(Auth::user()->role==2)
        
            <h4>Employer Information</h4>            
            <div class="project-employer-rating">
                <span class="rate-it" data-score="0"></span>
              
                <span class="">{{$counts}} project(s) posted</span>
                @foreach($users as $user)
				<span>{{$user->location}}</span>            </div>
                <div class="project-employer-since">
                <span>
                    Member since: {{Auth::user()->create_at}}                </span>
            </div>
            @endforeach
        
         @else
         
             @if(!$check)
         <div class="table">
                <div class="table-head">
                    <div class="table-col project-title-col">Bidder ID</div>
                    <div class="table-col project-action-col">Action</div>
                </div>
                <div class="current-table-rows" style="display: table-row-group;">
                                                                                                    
                        @foreach($bids as $bid)
                        <div class="table-row">
                                                                    
                                    <div class="table-col project-title-col">
                                    
                                        <a  class="secondary-color" >{{$bid->u_id}}</a>
                                    </div>
                                    
                                    <div class="table-col project-action-col">
                                        
                                    <form method="POST" action="/project/{{$project->id}}/assign/{{$bid->u_id}}">
                                            @csrf
                                        <Button class="normal-btn primary-bg-color" action="POST" data-project-id="">Assign</Button>
                                        </form>
                                        
                                        
                                    </div> 
            
                                                                                 </div>
                                                                                 
                                                                                 @endforeach 
                                                                                 @endif
                                                                                
                                                                                 @endif
                                                                                </div>
                    </div>




        </div>
    </div>
</div>
<

</div>
    </div>
    
    
@endforeach
   
@endsection