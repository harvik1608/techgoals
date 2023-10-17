<?php
    namespace App\Http\Traits;
    use File;

    trait GeneralTrait {
        public function remove_file($path,$img) {
            if($img != "" && File::exists($path.'/'.$img)){
                File::delete($path.'/'.$img);
            }
        }
    }