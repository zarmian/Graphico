@extends('layouts.layout')

@section('content')
<div class="page-wrapper">
        <div class="page-title">
            <div class="container">
                <h2>Available Projects</h2>
            </div>
        </div>
        <div class="page-section section-archive-project project-detail-box">
            <div class="container">
                    <div class="project-list-wrap">            
								<ul class="project-list project-list-container">
@foreach($projects as $project)
<li class="project-item">
    <div class="project-list-wrap">
        <h2 class="project-list-title">
        
            <a href="{{url("/projects/$project->id")}}">{{$project->p_title}}</a>
            
        </h2>
        <div class="project-list-info">
       
            <span>Date: {{ \Carbon\Carbon::parse($project->created_at)->format('j F, Y') }}</span>
            <span>{{$project->no_bids}} Participating</span>
            
		            
        </div>
        
        <div class="project-list-desc">
        
            <p>{{$project->p_description}}</p>
        
        </div>
        
    </div>
    
    <div class=" edit-project">

            <form method="POST" action="/project/{{$project->id}}/bid">
                {{method_field('PATCH')}}
                @csrf
            <Button class="submit-btn rightButton" action="POST" data-project-id="{{$project->id}}">APPLY</Button>
            </form>
            
    </div>
</li>
@endforeach
</ul>
</div>
</div>
</div>


@endsection
