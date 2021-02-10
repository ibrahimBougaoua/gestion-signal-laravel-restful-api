<?php

namespace App\Traits;

trait UploadImage {

    public function upload($name)
    {
        if($name != '')
        {
            $_name = time().'.'.$name->getClientOriginalExtension();
            file_put_contents('storage/'.$_name, base64_decode($name));
            return $_name;
        }
        return null;
    }

}
