<?php
function rights()
{
    $result = DB::table('rights')
            ->select('rights.name as right_name', 'modules.name as module_name')
            ->join('modules', 'rights.module_id', '=', 'modules.id')
            ->where(['rights.status' => 1])
            ->get()
            ->toArray();

    $array = [];

    for ($i = 0; $i < count($result); $i++)
    {
        $array[$result[$i]->module_name][] = $result[$i];
    }
    return $array;
}

function have_right($right_id)
{
    $user = \Auth::user();
    if ($user['role_id'] == 1)
    {
        return true;
    }
    else
    {
        $result = \DB::table('roles')
                ->where('id', $user['role_id'])
                ->whereRaw("find_in_set('".$right_id."',right_ids)")
                ->first();

        if (!empty($result))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

function access_denied()
{
    abort(403, 'You have no right to perform this action.');
}
//get app languages
function getLanguages(){
   return DB::table('languages')->wherestatus(1)->get();
}
//set language
function set_locale($content=''){
    $content = (array)json_decode($content);
    return $content[App::getLocale()];    
}

function getSettingDataHelper($key)
{
    $settingsArray = Session::get('settings');
    if (!empty($settingsArray[$key])) {
        return $settingsArray[$key];
    } else {
        return '#';
    }
}

?>
