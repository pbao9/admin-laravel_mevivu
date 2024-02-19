<?php

namespace App\Enums\Admin;

use App\Supports\Enum;

enum AdminRoles: int
{
    use Enum;

    case SuperAdmin = 1;
    case Admin = 2;
    
    public function listRolesAdminAfterCase(){
        $case = [];
        $flag = false;
        $currentCase = $this;
        
        if($currentCase == self::SuperAdmin){
            $flag = true;
            $case = self::cases();
        }

        if(!$flag){
            foreach(self::cases() as $item){
                if($this == $item){
                    $flag = true;   
                }
    
                if($flag){
                    $case[] = $item;
                }
            }
        }
        return $case;
    }

    public function asArraySelectListRolesAdminAfterCase(){
        $case = [];
        foreach($this->listRolesAdminAfterCase() as $item) {
            $case[$item->value] = $item->description();
        }
        return $case;
    }
}
