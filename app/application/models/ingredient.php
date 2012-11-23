<?php
class Ingredient extends Eloquent 
{
    public function recipe()
    {
        return $this->belongs_to('Recipe');
    }
    
    public function fooddes()
    {
        return $this->belongs_to('FoodDes');
    }
}