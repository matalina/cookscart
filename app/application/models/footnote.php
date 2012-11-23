<?php
class footnote extends Eloquent 
{
    public static $table = 'footnote';
    
    public function fooddes()
    {
        return $this->belongs_to('FoodDes','ndbNo');
    }
    
    public function nutrdef()
    {
        return $this->belongs_to('NutrDef','ndbNo');
    }
}