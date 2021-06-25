<?php

use App\Models\Setting;

class Info{
    // Site Info
    public static function Web($group, $name){
        $q = Setting::where('group', $group)->where('name', $name)->first();

        // Null Check
        if ($q){
            return $q->value;
        }else{
            return null;
        }
    }

    // Site Info by Group
    public static function WebGroup($group){
        return Setting::where('group', $group)->get();
    }

    // Site Info by Keys
    public static function InfoKey($keys, $group = 'general'){
        $keys = explode(',', $keys);
        $query = Setting::where('group', $group)->whereIn('name', $keys)->get();

        // Generate Output
        $output = [];
        foreach($query as $data){
            $output[$data->name] = $data->value;
        }

        // Return Default
        foreach($keys as $key){
            if(!isset($output[$key])){
                $output[$key] = null;
            }
        }

        return $output;
    }
}
