<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;
trait ImageTrait{

    public function Base64Image($file)
    {
        // Read the file and convert it to Base64
        $base64Image = base64_encode(file_get_contents($file));
        // Get the original file extension
        $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
        // Set the 'img' field in Base64 format with the extension
        $base64Image = 'data:image/' . $extension . ';base64,' . $base64Image;
        return $base64Image;
    }
    
    public function AddImageInPublic($FolderName = "Images", $SupFolderName = "Img" , $img)
    {
        $imagePath = time() . rand() . $SupFolderName . '.'. $img->extension();
        $img->move(public_path( $FolderName.'/'.$SupFolderName), $imagePath);
        return $FolderName.'/'.$SupFolderName.'/'.$imagePath;
    }

    public function UpdateImageInPublic($FolderName = "Images", $SupFolderName = "Img" , $img , $oldimg)
    {
        unlink(public_path($oldimg));
        $imagePath = time() . rand() . $SupFolderName .  '.'.  $img->extension();
        $img->move(public_path( $FolderName.'/'.$SupFolderName), $imagePath);
        return $FolderName.'/'.$SupFolderName.'/'.$imagePath;
    }

    public  function AddImageInStorge($FolderName = "Images", $SupFolderName = "Img" , $img)
    {
     $imagePath = time() . rand() . $SupFolderName . '.'. $img->extension();
     $path = Storage::putFileAs('images', $img, $FolderName.'/'.$SupFolderName.'/'.$imagePath);
     return Storage::url($path);
    }
   
    public  function UpdateImageInStorge($FolderName = "Images", $SupFolderName = "Img" , $img , $oldimg)
    {
        unlink(storage_path($oldimg));
        $imagePath = time() . rand() . $SupFolderName . '.'. $img->extension();
        $path = Storage::putFileAs('images', $img, $FolderName.'/'.$SupFolderName.'/'.$imagePath);
        return Storage::url($path);
    }
}
