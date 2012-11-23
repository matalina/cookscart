<?php
class Plan extends Eloquent 
{
    public function recipe()
    {
        return $this->has_many('Recipe');
    }
    
    public function user()
    {
        return $this->belongs_to('User');
    }
}