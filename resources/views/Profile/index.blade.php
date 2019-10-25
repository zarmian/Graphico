@extends('layouts.layout')
@section('title','All Profiles')

@section('content')

<div class="page-wrapper section-archive-profile">
        <div class="page-title">
            <div class="container">
                <h2>Available Profiles</h2>
            </div>
        </div>

        <div class="page-section">
            <div class="container">
                <div class="page-profile-list-wrap">
                    <div class="profile-list-wrap">
						
      
{{-- @foreach($Users as $User) --}}
								<ul class="profile-list profile-list-container">
	<li class="profile-item">
    <div class="profile-list-wrap">
        <h2 class="profile-list-title">
            <a>Zaryab</a>
        </h2>
        <p class="profile-list-subtitle">Designer</p>
        <div class="profile-list-info">
            <div class="profile-list-detail">
                <span class="rate-it" data-score="4.5"></span>
                <span>15 years experience</span>
                <span>0 projects worked</span>
                <span style="font-weight: normal">$0 earned</span>
            </div>
            <div class="profile-list-desc">
                <p></p> 
            </div>
        </div>
    </div>
</li>
</ul>
{{-- @endforeach --}}
</div>
</div>
</div>
</div>
</div>
@endsection