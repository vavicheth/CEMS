<?php
namespace App\Traits;
use App\Traits\Slim;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class UploadBySlim{
    public static function uploadPhoto(string $field,string $path)
    {
        $image = Slim::getImages($field)[0];

        // Grab the input data (data modified after Slim has done its thing)
        if ( isset($image['output']['data']) ) {
            // Original file name
            $name =str_replace(' ','_',$image['output']['name']);

            // Base64 of the image
            $data = $image['output']['data'];

            // Server path
//            $path = base_path() . $path;
            $path=$path.'/';

            // Save the file to the server
            $file = Slim::saveFile($data, $name, $path);
        }

        return $file;
    }

    public static function deleteAvatarPhoto($avatar= 'test.png',string $path)
    {
        if(File::exists($path.'/'.$avatar)){
            File::delete($path.'/'.$avatar);
        }else{
            return 'File not existing';
        }
    }

    public static function uploadSlimTo64($request_photo)
    {
        $json_image=json_decode($request_photo);
        $image=$json_image->output->image;
        $name=$json_image->output->name;
        list($type,$image)=explode(';',$image);
        list(,$image)=explode(',',$image);

        return (['image'=>$image,'name'=>$name]);
    }

}
