<?php
class User extends Eloquent 
{
    public function group()
    {
        return $this->belongs_to_and_has_many('Group');
    }
}