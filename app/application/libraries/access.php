<?php
class Access
{
    public static function inGroup($groups) 
    {
        // If not logged in no access
        if(!Auth::check()) {
            return false;
        }
        
        // Set up variables
        $user = Auth::user();
        $check = NULL;
        
        // If the parameter is not an array, make it one
        if(!is_array($groups)) {
            $groups = array($groups);
        }
        
        // Loop throuh each group
        foreach($groups as $group) {
            // if the group is an integer, is there a matching user/group pair
            if(is_int($group)) {
                $check = GroupUser::where('user_id', '=', $user->id)->where('group_id', '=', $group_id)->first();
            }
            // if the group is an string, get the group id and check if there is a matching user/group pair
            else if(is_string($group)) {
                $grp = Group::where('group','=',$group)->first();
                $check = GroupUser::where('user_id', '=', $user->id)->where('group_id', '=', $grp->id)->first();
            }
            // other wise no access can be granted
            else {
                return false;
            }
        }
        
        // if there is a matching pair grant access
        if($check) {
            return true;
        }
        // other wise do not
        else {
            return false;
        }
    }
}