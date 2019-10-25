<header class="header-wrapper">
    <div class="header-wrap" id="main_header">
        <div class="container">
            <div class="site-logo">
                <a href="{{ url('/home') }}">
					<img alt="Graphico" src="/img/logo-fre.png" >                </a>
                <div class="hamburger">
					                    <span class="hamburger-menu">
                            <div class="hamburger hamburger--elastic" tabindex="0" aria-label="Menu" role="button"
                                 aria-controls="navigation">
                                <div class="hamburger-box">
                                    <div class="hamburger-inner"></div>
                                </div>
                            </div>
                        </span>
                </div>
            </div>
            <!-- <?php

				$active_profile = '';
				$active_project = '';
				$action_link    = '';
				$input_hint     = '';
				$current_url    = '';
				$current_url    = '';

				if ( Auth::user() ) {
                        $user_role = Auth::user()->role ;
					if ( $user_role == '2' ) {
						$active_project = 'active';
						$action_link    = '';
						$input_hint     = 'Find Projects';
					} else if ( $user_role == '3' ) {
						$active_profile = 'active';
						$action_link    = '';
						$input_hint     =  'Find Freelancers';
					} else {
						$active_profile = 'active';
						$action_link    = '';
						$input_hint     =  'Find Freelancers';
					}
				} else {
					$active_profile = 'active';
					$action_link    = '';
					$input_hint     = 'Find Freelancers';
				}
				?> -->
			            <div class="search-wrap">
				
                {{-- <form class="form-search" action="{{$action_link}}" method="post">
                    <div class="search dropdown">
                            
                        <input class="search-field" name="keyword"
                               value="" type="text"
                               
                               placeholder="{{$input_hint }}">
                        <ul class="dropdown-menu search-dropdown">
                            <li><a class="{{$active_profile}}" data-type="profile"
                                   data-action="profiles/index.html">Find Freelancers</a>
                            </li>
                            <li><a class="{{$active_project}}" data-type="project"
                                   data-action="projects/index.html">Find Projects</a>
                            </li>
                        </ul>

                    </div>
                </form> --}}
            </div>
			        <div class="account-info-tablet">
                    <ul class="dropdown-menu">
                        <li>
                            <a href="">MY PROFILE</a>
                        </li>
                        <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                    </ul>
                </div>
               
                @if(Auth::user())
                   
                @if(Auth::user()->role==2)
                
                    <div class="menu-top">
                <ul class="menu-main">
                    <!-- Menu freelancer -->
					
						                            <li class="menu-freelancer dropdown-empty">
                                <a href="{{url('projects/myproject')}}">MY PROJECT</a>
                            </li>
                            <li class="menu-employer dropdown-empty">
                                <a href="{{ url('/projects') }}">PROJECTS</a>
                            </li>
											                    <!-- Main Menu -->
					                    <!-- Main Menu -->
                </ul>
            </div> 
            <div class="account-wrap dropdown">
                    <a class="notification dropdown-toggle" data-toggle="dropdown" href="">
                        <i class="fa fa-bell-o" aria-hidden="true"></i>
						                    </a>
					<ul class="list_notify dropdown-menu dropdown-menu-notifi dropdown-keep-open notification-list"><li style="text-align: center;"><a class="view-more-notify" href="">See all notifications</a></li></ul>                    <div class="account dropdown">
                        <div class="account-info">
                                
                             <a href="{{ route('logout') }}"onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><img alt='' src='http://0.gravatar.com/avatar/e49be11430fba3a78e6169d0eeb8418c?s=96&amp;d=&amp;r=G' class='avatar avatar-96 photo avatar-default' height='96' width='96' />                            
                            <span> {{ Auth::user()->name}}  <span></a>
                        </div>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/profile">MY PROFILE</a>
                            </li>
							                            <li><a href="">LOGOUT</a></li>
                        </ul>
                    </div>
                </div>
			        </div>
    </div>


                
                @else
                
			            <div class="menu-top">
                <ul class="menu-main">
                    <!-- Menu freelancer -->
					
						                            <li class="menu-employer dropdown">
                                <a>PROJECTS<i class="fa fa-caret-down"
                                                                             aria-hidden="true"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ url('projects/posted') }}">All Projects Posted</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('projects/create') }}">Post a Project</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-employer dropdown-empty">
                                <a href="">FREELANCERS</a>
                            </li>
											                    <!-- Main Menu -->
					                    <!-- Main Menu -->
                </ul>
            </div>
            <div class="account-wrap dropdown">
                    <div class="account ">
                        <div class="account-info">
                        <a href="{{ route('logout') }}"onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><img alt='' src='http://0.gravatar.com/avatar/e49be11430fba3a78e6169d0eeb8418c?s=96&amp;d=&amp;r=G' class='avatar avatar-96 photo avatar-default' height='96' width='96' />                            
                            <span> {{ Auth::user()->email}}  <span></a>
                            
                           
                
                        <ul class="dropdown-menu">
                            <li>
                                <a href="">MY PROFILE</a>
                            </li>
                            <li><a href="">LOGOUT</a>
                        </li>
                        </ul>
                    </div>
                </div>
                    </div>
                    </div>
    </div>
                @endif
                @else
                
            <div class="menu-top">
                <ul class="menu-main">
                    <!-- Menu freelancer -->
					        <li class="menu-freelancer dropdown">
                            <a>FREELANCERS<i class="fa fa-caret-down"
                                                                          aria-hidden="true"></i></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/register">Find Projects</a>
                                </li>
								                                    <li>
                                        <a href="/register">Create Profile</a>
                                    </li>
								                            </ul>
                        </li>
                        <li class="menu-employer dropdown">
                            <a>EMPLOYERS<i class="fa fa-caret-down" aria-hidden="true"></i></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/register">Post a Project</a>
                                </li>
                                <li>
                                    <a href="/register">Find Freelancers</a>
                                </li>
                            </ul>
                        </li>
                        
					                    
                </ul>
            </div>
			    <div class="account-wrap">
                    <div class="login-wrap">
                        <ul class="login">
                            <li>
                                <a href="login">LOGIN</a>
                            </li>
							                                <li>
                                    <a href="register">SIGN UP</a>
                                </li>
							                        </ul>
                    </div>
                </div>
			        </div>
    </div>
                        
                    @endif
    
</header>