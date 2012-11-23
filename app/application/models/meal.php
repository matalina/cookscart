<?php
class Meal extends Eloquent 
{
    public function plan()
    {
        return $this->has_many('Plans');
    }
}