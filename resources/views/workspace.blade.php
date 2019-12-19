<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


@extends('layouts.layout')
@section('title','Workspace')
@section('content')

<?php

$auth_id=Auth::user()->id;
echo($auth_id);
$sender=Auth::user()->id;

 ?>

<style>
    	.msg_cotainer_send{
		margin-top: auto;
		margin-bottom: auto;
		margin-right: 10px;
		border-radius: 25px;
		background-color: #78e08f;
		padding: 10px;
		position: relative;
        
	}
    .msg_cotainer{
		margin-top: auto;
		margin-bottom: auto;
		margin-left: 10px;
		border-radius: 25px;
		background-color: #82ccdd;
		padding: 10px;
		position: relative;
        
	}
    .conversation-wrap
    {
        overflow: visible;
    }
    </style>
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
                <div class="message-container" style="max-height: 550px; overflow-y: scroll;">
                
@if($project->id==$assign->p_id) 
<div class="list-chat-work-place-wrap conversation-wrap conversation" >
          
                @foreach($chat as $chats) 
                 
                    
                    @if($chats -> sender!= $auth_id)  
                    <ul class="conversation-list list-chat-work-place new-list-message-item upload_file_file_list">
                   
                   <div class="d-flex justify-content-end mb-4">
								<div class="msg_cotainer_send"> 
                                {{$chats -> message}}
                                </ul>
                   @else
                   <ul class="conversation-list list-chat-work-place new-list-message-item upload_file_file_list">
                   <div class="d-flex justify-content-start mb-4">
                   <div class="msg_cotainer">
                   {{$chats -> message}}
                     </ul>
                    @endif
                    
                                                                @endforeach
                    </div>
                                                                <div class="conversation-typing-wrap">
                                                                    <form class="workspace-form" action="{{URL::to('/send-message')}}" method="post">
                                                                <div class="conversation-typing">
                                                                <input  type="hidden" name="_token"id="token-message"value="{{csrf_token()}}">
                                 <input id="message" type="text"name="message"required class="form-control input-sm" placeholder="Type your message here..." />
                                </div>         
                                                            
                                     <label class="conversation-send-message-btn "
                                                                           for="conversation-send-message">
                                                                        <input id="conversation-send-message" type="submit">
                                                                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                                        </div>
                                                            </form>
                                                    </div>
                                                            </div>
                                                        </div>
                                             
    
@endif
               
              
     
 

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
                                </div>
                            </form>                       </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<footer></footer>
<script> 
 setInterval(ajaxCall,1000); 
 function ajaxCall() {
    var oldMessage=$("#chat-message li").length;
    var oldscrollHeight = $("#scrolltoheight").prop("scrollHeight");
     $.ajax({
         type:'get',
         url:'{{URL::to('/chat')}}/'+<?php echo $recever ?? '';?>,
         datatype:'html',
         success:function(response){
                $('#chat-message').html(response);
                var newscrollHeight = $("#scrolltoheight").prop("scrollHeight"); //Scroll height after the request
                var newMessage=$("#chat-message li").length;
                if(newscrollHeight > oldscrollHeight){
					$("#scrolltoheight").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div

                }
              }
         });
 }
 $('#message-submit').on('submit',function(e){
    $('#message').focus();
 e.preventDefault();
 var message=$('#message').val();
 var token=$('#token-message').val();
     $.ajax({
             type:'post',
             url:'{{URL::to('/send-message')}}',
             data:{
                 message:message,
                 recever:<?php echo $recever ?? '';?>,
                 sender:<?php echo $sender ?? '';?>,
                 _token:token,
                 
             }
         
             });
             document.getElementById('message-submit').reset();
           
 });
  </script>
@endforeach
@endforeach
@endforeach
@endsection
