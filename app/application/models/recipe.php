<?php
class Recipe extends Eloquent 
{
    public function user()
    {
        return $this->belongs_to('User');
    }
    
    public function plan()
    {
        return $this->belongs_to_and_has_many('Plans');
    }
    
    public function ingredient()
    {
        return $this->has_many('Ingredient');
    }
}