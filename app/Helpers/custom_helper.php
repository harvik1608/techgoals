<?php
    use App\Models\Setting;

    if (!function_exists('get_setting_val')) {
        function get_setting_val($key)
        {
            $setting = Setting::select('setting_val')->where('setting_key',$key)->first();
            if($setting)
                return $setting['setting_val'];
            else 
                return "";
        }
    }

    if (!function_exists('format_date')) {
        function format_date($flag,$date = "")
        {
            switch($flag) {
                case 1:
                    $date = date("Y-m-d H:i:s");
                    break;

                case 2:
                    $date = date("Y-m-d",strtotime("-".setting('def_join')." day"));
                    break;

                case 3:
                    $date = date("d-M-Y",strtotime($date));
                    break;
            }
            return $date;
        }
    }