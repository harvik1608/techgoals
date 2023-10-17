<?php
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
            }
            return $date;
        }
    }