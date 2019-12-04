<html lang="en">
<head>
    <title>Image Manipulation</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/imgareaselect.css') }}">
</head>
<body>

<div class="container">
    <h3 class="jumbotron" style="text-align: center">Image Manipulation</h3>
    <form method="post" id="FrmImgUpload" action="javascript:void(0)" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4" id="uploadBar">
                <input type="file" id="input_image" name="filename" class="form-control" required>
                <input type="hidden" name="x1" value=""/>
                <input type="hidden" name="y1" value=""/>
                <input type="hidden" name="w" value=""/>
                <input type="hidden" name="h" value=""/>
            </div>

        </div>
        <div class="row" id="uploadBtn">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-success" style="margin-top:10px">Upload Image</button>
            </div>
        </div>
        <div id="button_panel" style="display: none">
            <div id="main_function_panel">
                <button type="button" class="btn btn-primary" id="rotateBtn" style="float: left; background: yellowgreen">Rotate Image</button>
                <button type="button" class="btn btn-primary" style="float: left; background: yellowgreen" id="flip">Flip Image</button>
                <button type="button" class="btn btn-primary" onclick="blurb()" style="float: left; background: #2ecc71">Blur Image
                </button>
                <button type="button" class="btn btn-primary" style="float: left; background: #2ecc71" id="colorizeBtn">Colorize Image</button>
                <button type="button" class="btn btn-primary" onclick="pixelate()" style="float: left; background: #2ecc71">Pixelate
                    Image
                </button>


                <button type="button" class="btn btn-primary" id="textBtn" style="float: left; background: #2ecc71">Add Text</button>
                <button type="button" class="btn btn-primary" id="cropBtn" style="float: left; background: #2ecc71">Crop Image
                </button>


                <button type="button" class="btn btn-primary" style="float: left; background: #1fbdbd" id="imageSettingBtn">Image
                    Setting
                </button>
            </div>
            <div id="rotation_group" style="display: none">
                <button type="button" class="btn btn-primary" id="rotateBackBtn"
                        style="float: left; background: yellowgreen">Back To Main
                </button>
                <br><br>
                <button type="button" class="btn btn-primary" onclick="rotate90()" style="float: left; background: yellowgreen" id="flip">Rotate 90</button>
                <button type="button" class="btn btn-primary" onclick="rotate180()" style="float: left; background: yellowgreen" id="flip">Rotate 180</button>
                <button type="button" class="btn btn-primary" onclick="rotate270()" style="float: left; background: yellowgreen"
                        id="flip">Rotate 270
                </button>
                <button type="button" class="btn btn-primary" onclick="rotate360()" style="float: left; background: yellowgreen; display: none"
                        id="flip">Rotate 360
                </button>
            </div>
            <div id="flip_group" style="display: none">
                <button type="button" class="btn btn-primary" id="flipBackBtn"
                        style="float: left; background: yellowgreen">Back To Main
                </button>
                <br><br>
                <button type="button" class="btn btn-primary" onclick="flipVertical()" style="float: left; background: yellowgreen" id="flip">Flip Vertical</button>
                <button type="button" class="btn btn-primary" onclick="flipHorizontal()" style="float: left; background: yellowgreen"
                        id="flip">Flip Horizontal
                </button>
            </div>
            <div id="colorize_group" style="display: none">
                <button type="button" class="btn btn-primary" id="colorizeBackBtn"
                        style="float: left; background: yellowgreen">Back To Main
                </button>
                <br><br>
                <button type="button" class="btn btn-primary" onclick="colorizeBlue()" style="float: left; background: #1d8bdf">Bluish
                    Image
                </button>
                <button type="button" class="btn btn-primary" onclick="colorizeGreen()" style="float: left; background: forestgreen">
                    Greenish Image
                </button>
                <button type="button" class="btn btn-primary" onclick="colorizeRed()" style="float: left; background: indianred">
                    Redish Image
                </button>
                <button type="button" class="btn btn-primary" onclick="colorizeGreyScale()"
                        style="float: left; background: indianred">Grey Scale Image
                </button>
            </div>
            <div id="imageSetting_group" style="display: none">
                <button type="button" class="btn btn-primary" id="imageSettingBackBtn"
                        style="float: left; background: yellowgreen">Back To Main
                </button>
                <br><br>
                <button type="button" class="btn btn-primary" style="float: left; background: #1d8bdf" id="sharpenBtn">Sharpen Image
                </button>
                <button type="button" class="btn btn-primary" style="float: left; background: forestgreen" id="brightnessBtn">
                    Brightness Image
                </button>
                <button type="button" class="btn btn-primary" style="float: left; background: indianred" id="contrastBtn">Contrast
                    Image
                </button>
                <button type="button" class="btn btn-primary" style="float: left; background: indianred" id="gammaBtn">Gamma Image
                </button>
            </div>
            <div id="sharpen_group" style="display: none">
                <button type="button" class="btn btn-primary" id="sharpenBackBtn"
                        style="float: left; background: yellowgreen">Back To Main
                </button>
                <br><br>
                <button type="button" class="btn btn-primary" onclick="sharpenLow()" style="float: left; background: #1d8bdf">Low
                    Sharpen
                </button>
                <button type="button" class="btn btn-primary" onclick="sharpenMedium()" style="float: left; background: forestgreen">
                    Medium Sharpen
                </button>
                <button type="button" class="btn btn-primary" onclick="sharpenHigh()" style="float: left; background: indianred">High
                    Sharpen
                </button>
            </div>
            <div id="brightness_group" style="display: none">
                <button type="button" class="btn btn-primary" id="brightnessBackBtn"
                        style="float: left; background: yellowgreen">Back To Main
                </button>
                <br><br>
                <button type="button" class="btn btn-primary" onclick="brightnessLow()" style="float: left; background: #1d8bdf">Low
                    Brightness
                </button>
                <button type="button" class="btn btn-primary" onclick="brightnessMedium()"
                        style="float: left; background: forestgreen">Medium Brightness
                </button>
                <button type="button" class="btn btn-primary" onclick="brightnessHigh()" style="float: left; background: indianred">
                    High Brightness
                </button>
            </div>
            <div id="contrast_group" style="display: none">
                <button type="button" class="btn btn-primary" id="contrastBackBtn"
                        style="float: left; background: yellowgreen">Back To Main
                </button>
                <br><br>
                <button type="button" class="btn btn-primary" onclick="contrastLow()" style="float: left; background: #1d8bdf">Low
                    Contrast
                </button>
                <button type="button" class="btn btn-primary" onclick="contrastMedium()" style="float: left; background: forestgreen">
                    Medium Contrast
                </button>
                <button type="button" class="btn btn-primary" onclick="contrastHigh()" style="float: left; background: indianred">High
                    Contrast
                </button>
            </div>
            <div id="gamma_group" style="display: none">
                <button type="button" class="btn btn-primary" id="gammaBackBtn"
                        style="float: left; background: yellowgreen">Back To Main
                </button>
                <br><br>
                <button type="button" class="btn btn-primary" onclick="gammaLow()" style="float: left; background: #1d8bdf">Low
                    Gamma
                </button>
                <button type="button" class="btn btn-primary" onclick="gammaMedium()" style="float: left; background: forestgreen">
                    Medium Gamma
                </button>
                <button type="button" class="btn btn-primary" onclick="gammaHigh()" style="float: left; background: indianred">High
                    Gamma
                </button>
            </div>
            <div id="text_group" style="display: none">
                <button type="button" class="btn btn-primary" id="textBackBtn"
                        style="float: left; background: yellowgreen">Back To Main
                </button>
                <br><br>
                <input type="text" placeholder="Input text" id="input_text" style="float: left;"/><br><br>
                <input type="text" placeholder="Click on image to place Text" disabled id="xy_location"/><br><br>
                <select id="color_box">
                    <option value="">Select Color</option>
                    <option value="#000000" style="background-color: Black;color: #FFFFFF;">Black</option>
                    <option value="#808080" style="background-color: Gray;">Gray</option>
                    <option value="#A9A9A9" style="background-color: DarkGray;">DarkGray</option>
                    <option value="#D3D3D3" style="background-color: LightGrey;">LightGray</option>
                    <option value="#FFFFFF" style="background-color: White;">White</option>
                    <option value="#7FFFD4" style="background-color: Aquamarine;">Aquamarine</option>
                    <option value="#0000FF" style="background-color: Blue;">Blue</option>
                    <option value="#000080" style="background-color: Navy;color: #FFFFFF;">Navy</option>
                    <option value="#800080" style="background-color: Purple;color: #FFFFFF;">Purple</option>
                    <option value="#FF1493" style="background-color: DeepPink;">DeepPink</option>
                    <option value="#EE82EE" style="background-color: Violet;">Violet</option>
                    <option value="#FFC0CB" style="background-color: Pink;">Pink</option>
                    <option value="#006400" style="background-color: DarkGreen;color: #FFFFFF;">DarkGreen</option>
                    <option value="#008000" style="background-color: Green;color: #FFFFFF;">Green</option>
                    <option value="#9ACD32" style="background-color: YellowGreen;">YellowGreen</option>
                    <option value="#FFFF00" style="background-color: Yellow;">Yellow</option>
                    <option value="#FFA500" style="background-color: Orange;">Orange</option>
                    <option value="#FF0000" style="background-color: Red;">Red</option>
                    <option value="#A52A2A" style="background-color: Brown;">Brown</option>
                    <option value="#DEB887" style="background-color: BurlyWood;">BurlyWood</option>
                    <option value="#F5F5DC" style="background-color: Beige;">Beige</option>
                </select><br><br>
                <button type="button" class="btn btn-primary" style="float: left; background: #1fbdbd" id="text_apply">Apply Text</button>
            </div>
            <div id="crop_group" style="display: none">
                <button type="button" class="btn btn-primary" id="cropBackBtn"
                        style="float: left; background: yellowgreen">Back To Main</button>
                <br><br>
                <button type="button" class="btn btn-primary" style="float: left; background: #1d8bdf" id="applyCrop">Apply Crop</button>
            </div>
        </div>
        </br></br></br>
        <div class="row">
            <div class="col-md-8">
                <strong>Image:</strong>
                <br/>
                {{--                <p><img id="previewimage" style="display:none;"/></p>--}}
                <img id="ImgOri" src=""/>
                {{--                <img id="ImgHAider" class="hehaiderll" src="{{ url('/abc.jpg') }}"/>--}}
            </div>
            {{--<div class="col-md-4">
                <strong>Thumbnail Image:</strong>
                <br/>
                <img id="ImgThumb" src=""/>
            </div>--}}
        </div>
    </form>
</div>
</body>
</html>

<script>

    var image_name;
    $(document).ready(function (e) {
        var x = "";
        var y = "";
        var counter;
        $('#text_apply').click(function () {
            counter = 0;
            var color_code = $('#color_box').val();
            var text = $('#input_text').val();
            if (color_code == "") {
                alert("Select the correct Color");
            } else {
                counter++;
            }
            if (x == "" && y == "") {
                alert("Select the postion for placing text");
            } else {
                counter++;
            }
            if (text.length == 0) {
                alert("Please Enter the Text");
            } else {
                counter++;
            }
            if (counter == 3) {
                addText(text, x, y, color_code);
            }

        });


        $('img').click(function (e) {
            var offset = $(this).offset();
            x = e.pageX - offset.left;
            y = e.pageY - offset.top;
            var xy = x + ", " + y;
            $('#xy_location').val(xy);
        });

        $('#rotateBtn').click(function () {
            $('#rotation_group').show();
            $('#main_function_panel').hide();
        });
        $('#rotateBackBtn').click(function () {
            $('#rotation_group').hide();
            $('#main_function_panel').show();
        });

        $('#flip').click(function () {
            $('#flip_group').show();
            $('#main_function_panel').hide();
        });
        $('#flipBackBtn').click(function () {
            $('#flip_group').hide();
            $('#main_function_panel').show();
        });

        $('#colorizeBackBtn').click(function () {
            $('#colorize_group').hide();
            $('#main_function_panel').show();
        });
        $('#colorizeBtn').click(function () {
            $('#main_function_panel').hide();
            $('#colorize_group').show();
        });

        $('#imageSettingBtn').click(function () {
            $('#main_function_panel').hide();
            $('#imageSetting_group').show();
        });

        $('#imageSettingBackBtn').click(function () {
            $('#imageSetting_group').hide();
            $('#main_function_panel').show();
        });

        $('#sharpenBtn').click(function () {
            $('#imageSetting_group').hide();
            $('#sharpen_group').show();
        });
        $('#sharpenBackBtn').click(function () {
            $('#sharpen_group').hide();
            $('#imageSetting_group').show();
        });

        $('#brightnessBtn').click(function () {
            $('#imageSetting_group').hide();
            $('#brightness_group').show();
        });
        $('#brightnessBackBtn').click(function () {
            $('#brightness_group').hide();
            $('#imageSetting_group').show();
        });

        $('#contrastBtn').click(function () {
            $('#imageSetting_group').hide();
            $('#contrast_group').show();
        });
        $('#contrastBackBtn').click(function () {
            $('#contrast_group').hide();
            $('#imageSetting_group').show();
        });

        $('#gammaBtn').click(function () {
            $('#imageSetting_group').hide();
            $('#gamma_group').show();
        });
        $('#gammaBackBtn').click(function () {
            $('#gamma_group').hide();
            $('#imageSetting_group').show();
        });

        $('#textBtn').click(function () {
            $('#main_function_panel').hide();
            $('#text_group').show();
        });
        $('#textBackBtn').click(function () {
            $('#text_group').hide();
            $('#main_function_panel').show();
        });

        var x1;
        var y1;
        var w;
        var h;

        $('#cropBtn').click(function () {
            $('#main_function_panel').hide();
            $('#crop_group').show();


            var p = $("#ImgOri");
            $("body").on("change", ".image", function () {
                var imageReader = new FileReader();
                alert(imageReader.readAsDataURL(document.querySelector(".image").files[0]));
                imageReader.onload = function (oFREvent) {
                    p.attr('src', oFREvent.target.result).fadeIn();
                };
            });
            $('#ImgOri').imgAreaSelect({
                onSelectEnd: function (img, selection) {
                    $('input[name="x1"]').val(selection.x1);
                    $('input[name="y1"]').val(selection.y1);
                    $('input[name="w"]').val(selection.width);
                    $('input[name="h"]').val(selection.height);

                    x1 = $('input[name="x1"]').val();
                    y1 = $('input[name="y1"]').val();
                    w = $('input[name="w"]').val();
                    h = $('input[name="h"]').val();


                }
            });
        });

        $('#cropBackBtn').click(function () {
            $('#crop_group').hide();
            $('#main_function_panel').show();
        });

        $('#applyCrop').click(function () {
            if (x1 == "" && y1 == "" && h == "" && w == "") {
                alert("Please select the cropping area");
            } else {
                cropImage(w, h, x1, y1);

            }
        });

        $('#FrmImgUpload').on('submit', (function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{url('intervention-ajax-image-upload')}}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (data) {
                    // alert(data);
                    $('#input_image')[0].files[0] = '';
                    $('#button_panel').show();
                    $('#ImgOri').attr('src', (data.src));
                    $('#uploadBtn').hide();
                    $('#uploadBar').hide();
                    myCallback(data.name);

                },
                error: function (data) {
                }
            });
        }));

        function myCallback(response) {
            image_name = response;
            // Do whatever you need with result variable
        }
    });

    //
    function rotate90() {
        var fd = new FormData();
        var images = $('#ImgOri').attr('src');
        fd.append('input', images);
        fd.append('filename', window.image_name);
        $.ajax({
            url: "{{url('intervention-rotate-90')}}",
            processData: false,
            contentType: false,
            type: "POST",
            data: fd,
            success: function (data) {
                console.log(data);
                if (data)
                {
                    $('#ImgOri').attr('src', "{{ url('/') }}" + '/' + data.src);

                }
            },
            Error: function (data) {
                alert(data);

            }


        });
    }

    function rotate180() {
        var fd = new FormData();
        var images = $('#ImgOri').attr('src');
        fd.append('input', images);
        fd.append('filename', window.image_name);
        $.ajax({
            url: "{{url('intervention-rotate-180')}}",
            processData: false,
            contentType: false,
            type: "POST",
            data: fd,
            success: function (response) {
                if (response) {
                    $('#ImgOri').attr('src', "{{ url('/') }}" + '/' + response.src);
                }
            },
            Error: function (response) {
                alert(response);

            }


        });
    }

    function rotate270() {
        var fd = new FormData();
        var images = $('#ImgOri').attr('src');
        fd.append('input', images);
        fd.append('filename', window.image_name);
        $.ajax({
            url: "{{url('intervention-rotate-270')}}",
            processData: false,
            contentType: false,
            type: "POST",
            data: fd,
            success: function (response) {
                if (response) {
                    $('#ImgOri').attr('src', "{{ url('/') }}" + '/' + response.src);
                }
            },
            Error: function (response) {
                alert(response);

            }


        });
    }

    function rotate360() {
        var fd = new FormData();
        var images = $('#ImgOri').attr('src');
        fd.append('input', images);
        fd.append('filename', window.image_name);
        $.ajax({
            url: "{{url('intervention-rotate-360')}}",
            processData: false,
            contentType: false,
            type: "POST",
            data: fd,
            success: function (response) {
                if (response) {
                    $('#ImgOri').attr('src', "{{ url('/') }}" + '/' + response.src);
                }
            },
            Error: function (response) {
                alert(response);

            }


        });
    }

    function flipVertical() {
        var fd = new FormData();
        var images = $('#ImgOri').attr('src');
        fd.append('input', images);
        fd.append('filename', window.image_name);
        $.ajax({
            url: "{{url('intervention-flip-v')}}",
            processData: false,
            contentType: false,
            type: "POST",
            data: fd,
            success: function (response) {
                if (response) {
                    $('#ImgOri').attr('src', "{{ url('/') }}" + '/' + response.src);
                }
            },
            Error: function (response) {
                alert(response);
            }
        });
    }

    function flipHorizontal() {
        var fd = new FormData();
        var images = $('#ImgOri').attr('src');
        fd.append('input', images);
        fd.append('filename', window.image_name);
        $.ajax({
            url: "{{url('intervention-flip-h')}}",
            processData: false,
            contentType: false,
            type: "POST",
            data: fd,
            success: function (response) {
                if (response) {
                    $('#ImgOri').attr('src', "{{ url('/') }}" + '/' + response.src);
                }
            },
            Error: function (response) {
                alert(response);

            }


        });
    }

    function blurb() {
        var fd = new FormData();
        var images = $('#ImgOri').attr('src');
        fd.append('input', images);
        fd.append('filename', window.image_name);
        $.ajax({
            url: "{{url('intervention-blur')}}",
            processData: false,
            contentType: false,
            type: "POST",
            data: fd,
            success: function (response) {
                if (response) {
                    $('#ImgOri').attr('src', "{{ url('/') }}" + '/' + response.src);
                }
            },
            Error: function (response) {
                alert(response);

            }
        });
    }

    function colorizeBlue() {
        var fd = new FormData();
        var images = $('#ImgOri').attr('src');
        fd.append('input', images);
        fd.append('filename', window.image_name);
        $.ajax({
            url: "{{url('intervention-colorize-blue')}}",
            processData: false,
            contentType: false,
            type: "POST",
            data: fd,
            success: function (response) {
                if (response) {
                    $('#ImgOri').attr('src', "{{ url('/') }}" + '/' + response.src);
                }
            },
            Error: function (response) {
                alert(response);

            }
        });
    }

    function colorizeGreen() {
        var fd = new FormData();
        var images = $('#ImgOri').attr('src');
        fd.append('input', images);
        fd.append('filename', window.image_name);
        $.ajax({
            url: "{{url('intervention-colorize-green')}}",
            processData: false,
            contentType: false,
            type: "POST",
            data: fd,
            success: function (response) {
                if (response) {
                    $('#ImgOri').attr('src', "{{ url('/') }}" + '/' + response.src);
                }
            },
            Error: function (response) {
                alert(response);

            }
        });
    }

    function colorizeRed() {
        var fd = new FormData();
        var images = $('#ImgOri').attr('src');
        fd.append('input', images);
        fd.append('filename', window.image_name);
        $.ajax({
            url: "{{url('intervention-colorize-red')}}",
            processData: false,
            contentType: false,
            type: "POST",
            data: fd,
            success: function (response) {
                if (response) {
                    $('#ImgOri').attr('src', "{{ url('/') }}" + '/' + response.src);
                }
            },
            Error: function (response) {
                alert(response);

            }
        });
    }

    function colorizeGreyScale() {
        var fd = new FormData();
        var images = $('#ImgOri').attr('src');
        fd.append('input', images);
        fd.append('filename', window.image_name);
        $.ajax({
            url: "{{url('intervention-colorize-greyScale')}}",
            processData: false,
            contentType: false,
            type: "POST",
            data: fd,
            success: function (response) {
                if (response) {
                    $('#ImgOri').attr('src', "{{ url('/') }}" + '/' + response.src);
                }
            },
            Error: function (response) {
                alert(response);

            }
        });
    }

    function pixelate() {
        var fd = new FormData();
        var images = $('#ImgOri').attr('src');
        fd.append('input', images);
        fd.append('filename', window.image_name);
        $.ajax({
            url: "{{url('intervention-pixelate')}}",
            processData: false,
            contentType: false,
            type: "POST",
            data: fd,
            success: function (response) {
                if (response) {
                    $('#ImgOri').attr('src', "{{ url('/') }}" + '/' + response.src);
                }
            },
            Error: function (response) {
                alert(response);

            }
        });
    }

    function sharpenLow() {
        var fd = new FormData();
        var images = $('#ImgOri').attr('src');
        fd.append('input', images);
        fd.append('filename', window.image_name);
        $.ajax({
            url: "{{url('intervention-sharpen-l')}}",
            processData: false,
            contentType: false,
            type: "POST",
            data: fd,
            success: function (response) {
                if (response) {
                    $('#ImgOri').attr('src', "{{ url('/') }}" + '/' + response.src);
                }
            },
            Error: function (response) {
                alert(response);

            }
        });
    }

    function sharpenMedium() {
        var fd = new FormData();
        var images = $('#ImgOri').attr('src');
        fd.append('input', images);
        fd.append('filename', window.image_name);
        $.ajax({
            url: "{{url('intervention-sharpen-m')}}",
            processData: false,
            contentType: false,
            type: "POST",
            data: fd,
            success: function (response) {
                if (response) {
                    $('#ImgOri').attr('src', "{{ url('/') }}" + '/' + response.src);
                }
            },
            Error: function (response) {
                alert(response);

            }
        });
    }

    function sharpenHigh() {
        var fd = new FormData();
        var images = $('#ImgOri').attr('src');
        fd.append('input', images);
        fd.append('filename', window.image_name);
        $.ajax({
            url: "{{url('intervention-sharpen-h')}}",
            processData: false,
            contentType: false,
            type: "POST",
            data: fd,
            success: function (response) {
                if (response) {
                    $('#ImgOri').attr('src', "{{ url('/') }}" + '/' + response.src);
                }
            },
            Error: function (response) {
                alert(response);

            }
        });
    }

    function brightnessLow() {
        var fd = new FormData();
        var images = $('#ImgOri').attr('src');
        fd.append('input', images);
        fd.append('filename', window.image_name);
        $.ajax({
            url: "{{url('intervention-brightness-l')}}",
            processData: false,
            contentType: false,
            type: "POST",
            data: fd,
            success: function (response) {
                if (response) {
                    $('#ImgOri').attr('src', "{{ url('/') }}" + '/' + response.src);
                }
            },
            Error: function (response) {
                alert(response);

            }
        });
    }

    function brightnessMedium() {
        var fd = new FormData();
        var images = $('#ImgOri').attr('src');
        fd.append('input', images);
        fd.append('filename', window.image_name);
        $.ajax({
            url: "{{url('intervention-brightness-m')}}",
            processData: false,
            contentType: false,
            type: "POST",
            data: fd,
            success: function (response) {
                if (response) {
                    $('#ImgOri').attr('src', "{{ url('/') }}" + '/' + response.src);
                }
            },
            Error: function (response) {
                alert(response);

            }
        });
    }

    function brightnessHigh() {
        var fd = new FormData();
        var images = $('#ImgOri').attr('src');
        fd.append('input', images);
        fd.append('filename', window.image_name);
        $.ajax({
            url: "{{url('intervention-brightness-h')}}",
            processData: false,
            contentType: false,
            type: "POST",
            data: fd,
            success: function (response) {
                if (response) {
                    $('#ImgOri').attr('src', "{{ url('/') }}" + '/' + response.src);
                }
            },
            Error: function (response) {
                alert(response);

            }
        });
    }

    function contrastLow() {
        var fd = new FormData();
        var images = $('#ImgOri').attr('src');
        fd.append('input', images);
        fd.append('filename', window.image_name);
        $.ajax({
            url: "{{url('intervention-contrast-l')}}",
            processData: false,
            contentType: false,
            type: "POST",
            data: fd,
            success: function (response) {
                if (response) {
                    $('#ImgOri').attr('src', "{{ url('/') }}" + '/' + response.src);
                }
            },
            Error: function (response) {
                alert(response);

            }
        });
    }

    function contrastMedium() {
        var fd = new FormData();
        var images = $('#ImgOri').attr('src');
        fd.append('input', images);
        fd.append('filename', window.image_name);
        $.ajax({
            url: "{{url('intervention-contrast-m')}}",
            processData: false,
            contentType: false,
            type: "POST",
            data: fd,
            success: function (response) {
                if (response) {
                    $('#ImgOri').attr('src', "{{ url('/') }}" + '/' + response.src);
                }
            },
            Error: function (response) {
                alert(response);

            }
        });
    }

    function contrastHigh() {
        var fd = new FormData();
        var images = $('#ImgOri').attr('src');
        fd.append('input', images);
        fd.append('filename', window.image_name);
        $.ajax({
            url: "{{url('intervention-contrast-h')}}",
            processData: false,
            contentType: false,
            type: "POST",
            data: fd,
            success: function (response) {
                if (response) {
                    $('#ImgOri').attr('src', "{{ url('/') }}" + '/' + response.src);
                }
            },
            Error: function (response) {
                alert(response);

            }
        });
    }

    function gammaLow() {
        var fd = new FormData();
        var images = $('#ImgOri').attr('src');
        fd.append('input', images);
        fd.append('filename', window.image_name);
        $.ajax({
            url: "{{url('intervention-gamma-l')}}",
            processData: false,
            contentType: false,
            type: "POST",
            data: fd,
            success: function (response) {
                if (response) {
                    $('#ImgOri').attr('src', "{{ url('/') }}" + '/' + response.src);
                }
            },
            Error: function (response) {
                alert(response);

            }
        });
    }

    function gammaMedium() {
        var fd = new FormData();
        var images = $('#ImgOri').attr('src');
        fd.append('input', images);
        fd.append('filename', window.image_name);
        $.ajax({
            url: "{{url('intervention-gamma-m')}}",
            processData: false,
            contentType: false,
            type: "POST",
            data: fd,
            success: function (response) {
                if (response) {
                    $('#ImgOri').attr('src', "{{ url('/') }}" + '/' + response.src);
                }
            },
            Error: function (response) {
                alert(response);

            }
        });
    }

    function gammaHigh() {
        var fd = new FormData();
        var images = $('#ImgOri').attr('src');
        fd.append('input', images);
        fd.append('filename', window.image_name);
        $.ajax({
            url: "{{url('intervention-gamma-h')}}",
            processData: false,
            contentType: false,
            type: "POST",
            data: fd,
            success: function (response) {
                if (response) {
                    $('#ImgOri').attr('src', "{{ url('/') }}" + '/' + response.src);
                }
            },
            Error: function (response) {
                alert(response);

            }
        });
    }

    function addText(text, x, y, color) {
        var fd = new FormData();
        var images = $('#ImgOri').attr('src');
        fd.append('input', images);
        fd.append('filename', window.image_name);

        fd.append('text', text);
        fd.append('x', x);
        fd.append('y', y);
        fd.append('color', color);
        $.ajax({
            url: "{{url('intervention-add-text')}}",
            processData: false,
            contentType: false,
            type: "POST",
            data: fd,
            success: function (response) {
                if (response) {
                    $('#ImgOri').attr('src', "{{ url('/') }}" + '/' + response.src);
                }
            },
            Error: function (response) {
                alert(response);

            }
        });
    }

    function cropImage(w, h, x1, y1) {
        var fd = new FormData();
        var images = $('#ImgOri').attr('src');
        fd.append('input', images);
        fd.append('filename', window.image_name);

        fd.append('w', w);
        fd.append('h', h);
        fd.append('x1', x1);
        fd.append('y1', y1);
        fd.append('saved', window.image_name);
        $.ajax({
            url: "{{url('intervention-crop')}}",
            processData: false,
            contentType: false,
            type: "POST",
            data: fd,
            success: function (response) {
                if (response) {
                    $('#ImgOri').attr('src', "{{ url('/') }}" + '/' + response.src);
                }
            },
            Error: function (response) {
                alert(response);

            }
        });
    }

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('js/jquery.imgareaselect.min.js') }}"></script>


