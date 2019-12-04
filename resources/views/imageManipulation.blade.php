<div>hi</div>

@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/imgareaselect.css') }}">
@endsection

@section('content')

    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <div class="container" style="background: #2ecc71">
{{--//action="{{ url('imageManipulation') }}"--}}
        <form  method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="file" name="profile_image" id="exampleInputImage" class="image" required>
            </div>
            {{ csrf_field() }}


            <button type="submit" class="btn btn-primary" style="float: left;" id="crop_changes">Upload</button>
        </form>
        <div>


        </div>
    </div>
@endsection



<script>
    jQuery(function ($) {

        var p = $("#previewimage");
        $("body").on("change", ".image", function () {

            var imageReader = new FileReader();
            imageReader.readAsDataURL(document.querySelector(".image").files[0]);

            /*imageReader.onload = function (oFREvent) {
                p.attr('src', oFREvent.target.result).fadeIn();
            };*/
            $("#exampleInputImage").hide();
        });

        ////////////////////////////////////////////For Crop
        /* $("#crop").click(function()
         {
             $("#crop").attr("disabled", true);
             $("#flip").hide();
             $("#rotate").hide();
             $("#crop_changes").show();


             $('#previewimage').imgAreaSelect({
                 maxWidth: '1000', // this value is in pixels
                 onSelectEnd: function (img, selection) {
                     $('input[name="x1"]').val(selection.x1);
                     $('input[name="y1"]').val(selection.y1);
                     $('input[name="w"]').val(selection.width);
                     $('input[name="h"]').val(selection.height);
                 }
             });
         });
         $("#crop_changes").click(function()
         {
             $("#crop").attr("disabled", false);
             $("#flip").show();
             $("#rotate").show();
             $("#crop_changes").hide();
         });*/


    });
</script>
{{--
--}}
