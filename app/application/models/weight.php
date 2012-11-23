<?php
class Weight extends Eloquent 
{
    public static $table = 'weight';
    
    public function fooddes()
    {
        return $this->belongs_to('FoodDes','ndbNo');
    }
}