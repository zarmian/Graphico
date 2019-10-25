@extends('layouts.layout')

@section('title','My Profiles')

@section('content')
<div class="page-wrapper list-profile-wrapper">
    <div class="page-title">
        <div class="container">
            <h2>My Profile</h2>
        </div>
    </div>

    <div class="page-section">
        <div class="container">
            <div class="profile-employer-wrap">
				                <div class="profile-box">
                    <div class="profile-employer-info-wrap active">

                        <div class="profile-freelance-info cnt-profile-hide" id="cnt-profile-default"
                             style="display: block">
                            <div class="freelance-info-avatar">
                                <span class="freelance-avatar"><img alt='' src='http://0.gravatar.com/avatar/e940ca497e9ace65f62723b6ebc59ab6?s=125&amp;d=&amp;r=G' class='avatar avatar-125 photo avatar-default' height='125' width='125' /> </span>
                                <span class="freelance-name">
                                    Zaryab Rashid
									                                </span>
                            </div>
                            <div class="employer-info-content">
                                <div class="freelance-rating">
                                        <span class="rate-it"
                                              data-score="0"></span>

									                                        <span class="">2 projects posted</span>
                                        <span> hire 1 freelancers</span>
									
									<span>Dutch Republic</span>                                </div>

								                                    <div class="employer-mem-since">
                                            <span>
                                                Member since:                                                September 30, 2019                                            </span>
                                    </div>
								
								
								                                    <div class="freelance-about">
										<p>hi</p>
                                    </div>

																	
								                            </div>
                            <div class="employer-info-edit">
                                <a href=""
                                   class="normal-btn-o employer-info-edit-btn profile-show-edit-tab-btn"
                                   data-ctn_edit="ctn-edit-profile">Edit</a>
                            </div>
                            
                        </div>

                        <div class="profile-employer-info-edit cnt-profile-hide" id="ctn-edit-profile"
                             style="display: none">
                            <div class="employer-info-avatar avatar-profile-page">
                                <span class="employer-avatar img-avatar image">
                                    <img alt='' src='http://0.gravatar.com/avatar/e940ca497e9ace65f62723b6ebc59ab6?s=125&amp;d=&amp;r=G' class='avatar avatar-125 photo avatar-default' height='125' width='125' />                                </span>
                                <a href="#" id="user_avatar_browse_button">
									Change                                </a>
                            </div>
                            <div class="employer-info-form" id="accordion" role="tablist"
                                 aria-multiselectable="true">
                                
                            </div>
                        </div>
                    </div>

					                </div>

                <div class="profile-box">
                    <div class="profile-employer-secure-wrap active">

                        <h2>My Account</h2>

                        <div class="profile-employer-secure cnt-profile-hide" id="cnt-account-default"
                             style="display: block">
                            <p>
                                <span>Email address</span>{{Auth::user()->email}}                            </p>
														
							
                            
                        </div>

                        <div class="profile-employer-secure-edit cnt-profile-hide" id="ctn-edit-account"
                             style="display: none">
                            
                        </div>
                    </div>
                    <div class="profile-secure-code-wrap">
                        <p>
                            <span>Password</span>
                            <a href="#" class="change-password">Change Password</a>
                        </p>
						                    </div>
                </div>


				
				
            </div>
        </div>
    </div>
</div>



@endsection