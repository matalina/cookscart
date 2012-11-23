<?php
class Group extends Eloquent 
{
    public function user()
    {
        return $this->belongs_to_and_has_many('User');
    }
}