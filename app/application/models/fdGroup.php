<?php
class FdGroup extends Eloquent 
{
    public static $table = 'fdgroup';
    
    public function fooddes()
    {
        return $this->has_many('FoodDes','fdGrpCd');
    }
}