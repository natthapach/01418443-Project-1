<?php
    class PictureUploader{
        var $path;
        function __construct($path){
            $this->path = $path;
        }

        function uploadByFILES($file, $filename){
            $target = $this->path.$filename;
            if(move_uploaded_file($_FILES[$file]["tmp_name"], $target)){
                return array("result"=>0, "resultText"=>$target);
            }else{
                return array("result"=>1, "resultText"=>"upload fail");
            }
        }

        function uploadByBase64($img, $filename){
            $img = str_replace('data:image/jpeg;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            // echo $img;
            $target = $this->path.$filename;
            
            if(file_put_contents($target, $data)){
                return array("result"=>0, "resultText"=>$target);
            }else{
                return array("result"=>1, "resultText"=>"upload fail");
            }
        }
    }
?>