<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator, Redirect, Response, File;
use App\Photo;
use Image;
use Intervention\Image\Exception\NotReadableException;
use Imagick;
use ImagickDraw;

class ImageController extends Controller
{

    public $imageLibrary;

    public function AjaxIndex()
    {

        return view('image');
    }

    public function AjaxStore(Request $request)
    {
        request()->validate([
            'filename' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('filename')) {
            //get filename with extension
            $filenamewithextension = $request->file('filename')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('filename')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . '.' . $extension;


            $file = Input::file('filename');
            $this->imageLibrary = Image::make($file->getRealPath())->save($filenametostore);

//           print_r($img);die;
            $image = asset($filenametostore);
//            return $image;
            $data = [];
            $data['src'] = $image;
            $data['name'] = $filenametostore;

            return $data;
        }
//        if ($files = $request->file('filename')) {
//
//
//            if (!file_exists(public_path('storage/profile_images/'))) {
//                mkdir(public_path('storage/profile_images/'), 0755);
//            }
//            // for save original image
//            $ImageUpload = Image::make($files);
//            $originalPath = public_path('/profile_images/');
//            $ImageUpload->save($originalPath . time() . $files->getClientOriginalName());
//
//            $photo = new Photo();
//            $photo->photo_name = time() . $files->getClientOriginalName();
//            $photo->save();
//        }
//
//        $image = Photo::latest()->first(['photo_name']);
//
//        return Response()->json($image);

    }

    public function AjaxRotate90()
    {
        $image_name = $_POST['filename'];
//        $filenamewithextension = response()->file(public_path() . '/abc.jpg', ['Content-Type' => 'image/jpg']);
        $image = Image::make(public_path() . '/' . $image_name)->rotate('-90');

        $image_path = public_path() . '/' . $image_name;
        if (File::exists($image_path)) {
            $filenamewithextension = response()->file($image_path, ['Content-Type' => 'image/jpg']);
            File::delete($image_path);
        }

        $image->save(public_path() . '/' . $image_name);
//        print_r($filenamewithextension);
        $imagerrr = asset( '/' . $image_name);
//            return $image;
        $data = [];
        $data['src'] = '/' . $image_name;
        $data['name'] = $image_name;

        return $data;
    }

    public function AjaxRotate180()
    {
        $image_name = $_POST['filename'];
        $image = Image::make(public_path() . '/' . $image_name)->rotate('-180');
        $image_path = public_path() . '/' . $image_name;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->save(public_path() . '/' . $image_name);
        $data = [];
        $data['src'] = '/' . $image_name;
        $data['name'] = $image_name;

        return $data;
    }

    public function AjaxRotate270()
    {
        $image_name = $_POST['filename'];
        $image = Image::make(public_path() . '/' . $image_name)->rotate('-270');
        $image_path = public_path() . '/' . $image_name;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->save(public_path() . '/' . $image_name);
        $data = [];
        $data['src'] = '/' . $image_name;
        $data['name'] = $image_name;

        return $data;
    }

    public function AjaxRotate360()
    {
        $image_name = $_POST['filename'];
        $image = Image::make(public_path() . '/' . $image_name)->rotate('-1');
        $image_path = public_path() . '/' . $image_name;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->save(public_path() . '/' . $image_name);
        $data = [];
        $data['src'] = '/' . $image_name;
        $data['name'] = $image_name;

        return $data;
    }

    public function AjaxflipVertical()
    {
        $image_name = $_POST['filename'];
        $image = Image::make(public_path() . '/' . $image_name)->flip('v');
        $image_path = public_path() . '/' . $image_name;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->save(public_path() . '/' . $image_name);
        $data = [];
        $data['src'] = '/' . $image_name;
        $data['name'] = $image_name;

        return $data;
    }

    public function AjaxflipHorizontal()
    {
        $image_name = $_POST['filename'];
        $image = Image::make(public_path() . '/' . $image_name)->flip('h');
        $image_path = public_path() . '/' . $image_name;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->save(public_path() . '/' . $image_name);
        $data = [];
        $data['src'] = '/' . $image_name;
        $data['name'] = $image_name;

        return $data;
    }

    public function Ajaxblur()
    {
        $image_name = $_POST['filename'];
        $image = Image::make(public_path() . '/' . $image_name)->blur('15');
        $image_path = public_path() . '/' . $image_name;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->save(public_path() . '/' . $image_name);
        $data = [];
        $data['src'] = '/' . $image_name;
        $data['name'] = $image_name;

        return $data;
    }

    public function AjaxColorizeBlue()
    {
        $image_name = $_POST['filename'];
        $image = Image::make(public_path() . '/' . $image_name)->colorize(0, 0, 60);
        $image_path = public_path() . '/' . $image_name;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->save(public_path() . '/' . $image_name);
        $data = [];
        $data['src'] = '/' . $image_name;
        $data['name'] = $image_name;

        return $data;
    }

    public function AjaxColorizeRed()
    {
        $image_name = $_POST['filename'];
        $image = Image::make(public_path() . '/' . $image_name)->colorize(60, 0, 0);
        $image_path = public_path() . '/' . $image_name;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->save(public_path() . '/' . $image_name);
        $data = [];
        $data['src'] = '/' . $image_name;
        $data['name'] = $image_name;

        return $data;
    }

    public function AjaxColorizeGreen()
    {
        $image_name = $_POST['filename'];
        $image = Image::make(public_path() . '/' . $image_name)->colorize(0, 60, 0);
        $image_path = public_path() . '/' . $image_name;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->save(public_path() . '/' . $image_name);
        $data = [];
        $data['src'] = '/' . $image_name;
        $data['name'] = $image_name;

        return $data;
    }

    public function AjaxColorizeGreyScale()
    {
        $image_name = $_POST['filename'];
        $image = Image::make(public_path() . '/' . $image_name)->greyscale();
        $image_path = public_path() . '/' . $image_name;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->save(public_path() . '/' . $image_name);
        $data = [];
        $data['src'] = '/' . $image_name;
        $data['name'] = $image_name;

        return $data;
    }

    public function AjaxPixelate()
    {
        $image_name = $_POST['filename'];
        $image = Image::make(public_path() . '/' . $image_name)->pixelate(4);
        $image_path = public_path() . '/' . $image_name;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->save(public_path() . '/' . $image_name);
        $data = [];
        $data['src'] = '/' . $image_name;
        $data['name'] = $image_name;

        return $data;
    }

//low = 35 //medium = 65 //high = 85

    public function AjaxSharpenL()
    {
        $image_name = $_POST['filename'];
        $image = Image::make(public_path() . '/' . $image_name)->sharpen(35);
        $image_path = public_path() . '/' . $image_name;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->save(public_path() . '/' . $image_name);
        $data = [];
        $data['src'] = '/' . $image_name;
        $data['name'] = $image_name;

        return $data;
    }

    public function AjaxSharpenM()
    {
        $image_name = $_POST['filename'];
        $image = Image::make(public_path() . '/' . $image_name)->sharpen(65);
        $image_path = public_path() . '/' . $image_name;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->save(public_path() . '/' . $image_name);
        $data = [];
        $data['src'] = '/' . $image_name;
        $data['name'] = $image_name;

        return $data;
    }

    public function AjaxSharpenH()
    {
        $image_name = $_POST['filename'];
        $image = Image::make(public_path() . '/' . $image_name)->sharpen(85);
        $image_path = public_path() . '/' . $image_name;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->save(public_path() . '/' . $image_name);
        $data = [];
        $data['src'] = '/' . $image_name;
        $data['name'] = $image_name;

        return $data;
    }

    public function AjaxBrightnessL()
    {
        $image_name = $_POST['filename'];
        $image = Image::make(public_path() . '/' . $image_name)->brightness(35);
        $image_path = public_path() . '/' . $image_name;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->save(public_path() . '/' . $image_name);
        $data = [];
        $data['src'] = '/' . $image_name;
        $data['name'] = $image_name;

        return $data;
    }

    public function AjaxBrightnessM()
    {
        $image_name = $_POST['filename'];
        $image = Image::make(public_path() . '/' . $image_name)->brightness(65);
        $image_path = public_path() . '/' . $image_name;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->save(public_path() . '/' . $image_name);
        $data = [];
        $data['src'] = '/' . $image_name;
        $data['name'] = $image_name;

        return $data;
    }

    public function AjaxBrightnessH()
    {
        $image_name = $_POST['filename'];
        $image = Image::make(public_path() . '/' . $image_name)->brightness(85);
        $image_path = public_path() . '/' . $image_name;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->save(public_path() . '/' . $image_name);
        $data = [];
        $data['src'] = '/' . $image_name;
        $data['name'] = $image_name;

        return $data;
    }

    public function AjaxContrastL(Request $request)
    {
        $image_name = $_POST['filename'];
        $image = Image::make(public_path() . '/' . $image_name)->contrast(35);
        $image_path = public_path() . '/' . $image_name;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->save(public_path() . '/' . $image_name);
        $data = [];
        $data['src'] = '/' . $image_name;
        $data['name'] = $image_name;

        return $data;
    }

    public function AjaxContrastM()
    {
        $image_name = $_POST['filename'];
        $image = Image::make(public_path() . '/' . $image_name)->contrast(65);
        $image_path = public_path() . '/' . $image_name;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->save(public_path() . '/' . $image_name);
        $data = [];
        $data['src'] = '/' . $image_name;
        $data['name'] = $image_name;

        return $data;
    }

    public function AjaxContrastH()
    {
        $image_name = $_POST['filename'];
        $image = Image::make(public_path() . '/' . $image_name)->contrast(85);
        $image_path = public_path() . '/' . $image_name;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->save(public_path() . '/' . $image_name);
        $data = [];
        $data['src'] = '/' . $image_name;
        $data['name'] = $image_name;

        return $data;
    }

    public function AjaxGammaL()
    {
        $image_name = $_POST['filename'];
        $image = Image::make(public_path() . '/' . $image_name)->gamma(3);
        $image_path = public_path() . '/' . $image_name;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->save(public_path() . '/' . $image_name);
        $data = [];
        $data['src'] = '/' . $image_name;
        $data['name'] = $image_name;

        return $data;
    }

    public function AjaxGammaM()
    {
        $image_name = $_POST['filename'];
        $image = Image::make(public_path() . '/' . $image_name)->gamma(6);
        $image_path = public_path() . '/' . $image_name;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->save(public_path() . '/' . $image_name);
        $data = [];
        $data['src'] = '/' . $image_name;
        $data['name'] = $image_name;

        return $data;
    }

    public function AjaxGammaH()
    {
        $image_name = $_POST['filename'];
        $image = Image::make(public_path() . '/' . $image_name)->gamma(8);
        $image_path = public_path() . '/' . $image_name;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->save(public_path() . '/' . $image_name);
        $data = [];
        $data['src'] = '/' . $image_name;
        $data['name'] = $image_name;

        return $data;
    }

    public function Ajaxtext()
    {
        $image_name = $_POST['filename'];
        $image = Image::make(public_path() . '/' . $image_name)->text($_POST['text'], $_POST['x'], $_POST['y'], function ($font) {
            $font->file(4);
            $font->size(600);
            $font->color($_POST['color']);
        });
        $image_path = public_path() . '/' . $image_name;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->save(public_path() . '/' . $image_name);
        $data = [];
        $data['src'] = '/' . $image_name;
        $data['name'] = $image_name;

        return $data;
    }

    public function AjaxCrop()
    {
        $image_name = $_POST['filename'];
        $image = Image::make(public_path() . '/' . $image_name)->crop($_POST['w'], $_POST['h'], $_POST['x1'], $_POST['y1']);
        $image_path = public_path() . '/' . $image_name;
        if (File::exists($image_path))
        {
            File::delete($image_path);
        }
        $image->save(public_path() . '/' . $image_name);
        $data = [];
        $data['src'] = '/' . $image_name;
        $data['name'] = $image_name;

        return $data;

    }

}