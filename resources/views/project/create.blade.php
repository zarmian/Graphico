@extends( 'layouts/layout' );

@section('title','Create Project')

@section('content')
<div class="page-wrapper">
    <div class="page-title">
        <div class="container">
            <h2>submit-project</h2>
        </div>
    </div>

    <div class="page-section">
        <div class="container">
        <div class="post-project-box">
        <form class="post" role="form" method="POST" enctype="multipart/form-data" action="{{url('post-project')}}">
        @csrf
            <div class="step-post-project" id="post-project">
                <h2>Your Project Details</h2>
                <div class="input-field tab">
                    <label class="field-title" for="project-title">Your project title</label>
                    <input class="input-item text-field" required id="project-title" type="text" name="p_title">
                </div>
                <div class="input-field tab">
                    <label class="field-title" for="project-describe">Describe what you need done</label>
                <div id="wp-post_content-editor-container" class="wp-editor-container">
                <textarea class="form-control rounded-0" required rows="20" autocomplete="off" cols="40" name="p_description" id="p_description"></textarea>
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
                        <input id="project-budget" step="5" required type="number" class="input-item text-field is_number numberVal" name="budget" min="1">
                        <span></span>
                    </div>
                </div>
                
                <ul class="custom-field"></ul>                <div class="post-project-btn">
                    <button class="btn post-project-next-btn primary-bg-color" type="submit">Submit Project</button>
                </div>
            </div>
        </form>
    </div>
    
</div>
@endsection