<?php
class Pantry extends Eloquent 
{
    public function user()
    {
        return $this->belongs_to('User');
    }
    
    public function fooddes()
    {
        return $this->has_many('FoodDes');
    }
}