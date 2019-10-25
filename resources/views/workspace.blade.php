@extends('layouts.layout')

@section('title','Workspace')

@section('content')
<div class="page-wrapper">
        <div class="container">
            <div class="project-detail-wrap">
				

<div class="project-detail-box">
    <div class="project-detail-info">
        @foreach($projects as $project)
        <div class="row">
            <div class="col-lg-8 col-md-7">
                <h1 class="project-detail-title"><a href="">{{$project->p_title}}</a></h1>
                <ul class="project-bid-info-list">
                    <li>
                    <span>Employer</span>
                    @foreach($users as $user)
                            <a href="" target="_blank"><span>{{$user->name}}</span></a>
						                    </li>
                    
                    <li>
                        <span>Deadline</span>
                        @foreach($assigns as $assign)
                        <span>{{ \Carbon\Carbon::parse($assign->deadline)->format('j F, Y') }}</span>

                    </li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-5">
                <p class="project-detail-posted">Posted on {{ \Carbon\Carbon::parse($project->created_at)->format('j F, Y') }}</p>
                <span class="project-detail-status">
                    {{$project->status}}                </span>
                <div class="project-detail-action">
					                </div>
            </div>
        </div>
    </div>
</div>


<div class="workspace-project-box">
    <ul class="nav nav-tabs nav-tabs-workspace hidden-lg hidden-md" role="tablist">
        <li class="active"><a href="#workspace-conversation" data-group="conversation" data-toggle="tab"
                              role="tab"><span>Conversation</span></a></li>
		            <li class="next"><a href="#workspace-files" data-group="files" data-toggle="tab"
                                role="tab"><span>Project files</span></a>
            </li>
		
    </ul>
    <div class="row">
        <div class="col-md-8">
            <div id="workspace-conversation"
                 class="project-workplace-details workplace-details workspace-conversation tab-pane fade in active">
                <h2 class="workspace-title">Conversation</h2>
                <div class="message-container">
                    <div class="list-chat-work-place-wrap conversation-wrap conversation">
                        <ul class="conversation-list list-chat-work-place new-list-message-item upload_file_file_list">
							
										                        </ul>
                    </div>
                    <div class="conversation-typing-wrap">
						                            <form class="workspace-form">
                                <div class="conversation-typing">
									<textarea name="comment_content" class="content-chat"
                                              placeholder="Your message here..."></textarea>
                                    <input type="hidden" name="comment_post_ID" value="108"/>
                                </div>
                                <div class="conversation-submit-btn">
                                    <label class="conversation-send-file-btn" for="conversation-send-file">
                                        <div id="upload_file_container">
                                        <span class="et_ajaxnonce"
                                              id="a07a9b0126"></span>
                                            <span class="project_id" data-project="108"></span>
                                            <span class="author_id" data-author="2"></span>
                                            <a href="#" class="attack attach-file"
                                               id="upload_file_browse_button"><i class="fa fa-paperclip"
                                                                                 aria-hidden="true"></i></a>
                                        </div>
                                    </label>

                                    <label class="conversation-send-message-btn disabled"
                                           for="conversation-send-message">
                                        <input id="conversation-send-message" type="submit">
                                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                    </label>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="workspace-files-wrap">

				
                <div id="workspace-files" class="workspace-files tab-pane fade workplace-project-details">
                    <div class="content-require-project content-require-project-attachment active">
                        <h2 class="workspace-title">Project Files</h2>
						                                <div class="workplace-title-arrow file-container" id="file-container">
                                    
                                        
                                                        <form class="post" role="form" method="POST" enctype="multipart/form-data" action="/submit-project/{{$project->id}}">
                                                                    {{method_field('PATCH')}}
                                                                    @csrf
                                        <input class="btn-primary" required type="file" name="file" />
                                                                
                                    </div>
                                </div>
							                        <ul class="workspace-files-list" id="workspace_files_list">
							<li class="no_file_upload"> <div class="post-project-btn">
                                    <button class="btn post-project-next-btn primary-bg-color" type="submit">Submit Project</button>
                                </div></li> 
                            </form>                       </ul>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endforeach
@endforeach
@endsection