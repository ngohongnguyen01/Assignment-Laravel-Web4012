<?php


function getValueSetting($configKey)
{
    $setting = App\Models\Setting::where('key', 'facebook')->where('status','=',1)->first();
    if (!empty($setting)) {
        return $setting->value;
    }
    return null;
}

?>
