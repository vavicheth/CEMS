<?php
namespace App\Traits;
use App\Traits\Slim;

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
            $path = base_path() . $path;

            // Save the file to the server
            $file = Slim::saveFile($data, $name, $path);
        }

        return $file;
    }
}
