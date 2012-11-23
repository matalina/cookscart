<?php
class foodDes extends Eloquent 
{
    public static $table = 'fooddes';
    
    public function fdgroup()
    {
        return $this->has_one('FdGroup','fdGrpCd');
    }
    
    public function nutdata() {
        return $this->has_many('NutData','ndbNo');
    }
    
    public function weight() {
        return $this->has_many('Weight','ndbNo');
    }
    
    public function footnote() {
        return $this->has_many('Footnote','ndbNo');
    }
}