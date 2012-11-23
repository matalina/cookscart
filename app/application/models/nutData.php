<?php
class nutData extends Eloquent 
{
    public static $table = 'nutdata';
    
    public function nutrdef()
    {
        return $this->has_one('NutrDef','nutrNo');
    }
    
    public function fooddes() 
    {
        return $this->belongs_to('FoodDes','ndbNo');
    }
    
}