@extends( 'layouts/layout' );

@section('title','Edit Project')

@section('content')
<div class="page-wrapper">
        <div class="page-title">
            <div class="container">
                <h2>Edit-project( {{$project->p_title}} )</h2>
            </div>
        </div>
    
        <div class="page-section">
            <div class="container">
            <div class="post-project-box">
            <form class="post" role="form" method="POST" enctype="multipart/form-data" action="/projects/{{$project->id}}">
                {{method_field('PATCH')}}
            @csrf
                <div class="step-post-project" id="post-project">
                    <h2>Your Project Details</h2>
                    <div class="input-field ">
                        <label class="field-title" for="project-title">Your project title</label>
                    <input class="input" id="project-title" type="text" name="p_title" value="{{$project->p_title}}">
                    </div>
                    <div class="input-field tab">
                        <label class="field-title" for="project-describe">Describe what you need done</label>
                    <div id="wp-post_content-editor-container" class="wp-editor-container">
                    <textarea class="form-control rounded-0" rows="20" autocomplete="off" cols="40" name="p_description" id="p_description">{{$project->p_description}}</textarea>
                    </div>
                    </div>
    
                    </div>
                    <div class="input-field tab" id="gallery_place">
                        <label class="field-title" for="">Attachments (optional)</label>
                        <div class="edit-gallery-image" id="gallery_container">
                            <ul class="attached-list gallery-image carousel-list" id="image-list"></ul>
                            <div  id="carousel_container">
                                    <input class="btn-primary" required type="file" name="file" />
                                                             
                                
                            </div>
                            <p class="allow-upload">(Upload maximum 5 files with extensions including png, jpg, pdf, xls, and doc format)</p>
                        </div>
                    </div>
                    <div class="input-field tab">
                        <label class="field-title" for="project-budget">Your project budget</label>
                        <div class="project-budget">
                            <input id="project-budget" step="1" required type="number" class="input-item text-field is_number numberVal" name="budget" min="{{$project->budget}}" value="{{$project->budget}}">
                            <span></span>
                        </div>
                    </div>
                    
                    <ul class="custom-field"></ul>                <div class="post-project-btn">
                        <button class="btn post-project-next-btn primary-bg-color" type="submit">Update Project</button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
@endsection