<?php
    class PictureUploader{
        var $path;
        function __construct($path){
            $this->path = $path;
        }

        function upload($file, $filename){
            $target = $this->path.$filename;
            if(move_uploaded_file($_FILES[$file]["tmp_name"], $target)){
                return array("result"=>0, "resultText"=>"upload success in $target");
            }
        }
    }
?>