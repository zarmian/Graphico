
@extends( 'layouts/layout' );

@section('title','Create Competition')

@section('content')
<div class="page-wrapper">
    <div class="page-title">
        <div class="container">
          
        <h2>submit-Competition for </h2>
        
        </div>
    </div>

    <div class="page-section">
        <div class="container">
        <div class="post-project-box">
        <form class="post" role="form" method="POST" enctype="multipart/form-data" action="{{url('post-competition')}}">
        @csrf
        
            <div class="step-post-project" id="post-project">
                <h2>Your Competition Details</h2>
                <p>The competition details will help you get the Designers with the required SkillSet and Creativity. This will not only enhance the quality of your project but also save time for you.</p>
                <div class="input-field tab">
                    <label class="field-title" for="project-describe">Describe what you need done</label>
                <div id="wp-post_content-editor-container" class="wp-editor-container">
                <textarea class="form-control rounded-0" required rows="20" autocomplete="off" cols="40" name="c_description" id="c_description"></textarea>
                </div>
                </div>

                </div>
                <div class="input-field tab" id="gallery_place">
                    <label class="field-title" for="">Attachments (optional)</label>
                    <div class="edit-gallery-image" id="gallery_container">
                        <ul class="attached-list gallery-image carousel-list" id="image-list"></ul>
                        <div  id="carousel_container">
                                <input class="btn-primary" required type="file" name="file" />
                            <span class="et_ajaxnonce hidden" id="ca57442818"></span>
                        </div>
                        <p class="allow-upload">(Upload maximum 5 files with extensions including png, jpg, pdf, xls, and doc format)</p>
                    </div>
                </div>
                <div class=" date-container" id="date_picker">
                    <label class="field-title">Select date for your Competition to be Held</label>
                    <div class=" input-item " name="date" data-provide="datepicker"></div>
                    <input class="form-control datepicker" required id="date" name="date" placeholder="YYYY-MM-DD" type="text"/>
                </div>
                
                <ul class="custom-field"></ul>                <div class="post-project-btn">
                    <button class="btn post-project-next-btn primary-bg-color" type="submit">Submit Competition</button>
                </div>
            </div>
        
        </form>
    </div>
    
</div>
@endsection
@section('scripts')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
        });
    </script>
@endsection