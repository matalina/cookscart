<?php

class Load_Nutdata {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
	    ini_set('memory_limit', '2048M');
		// Set up Nut Data Table
        Schema::create('nutdata', function($table)
        {
            $table->increments('id');
            $table->string('ndbNo',5);
            $table->string('nutrNo',3);
            $table->decimal('nurtVal',10,3);
            $table->integer('numDataPts');
            $table->decimal('stdError',8,3);
            $table->string('srcCd',2);
            $table->string('derivCd',4);
            $table->string('refNdbNo',5);
            $table->string('addNutrMark',1);
            $table->integer('numStudies');
            $table->decimal('min',10,3);
            $table->decimal('max',10,3);
            $table->integer('df');
            $table->decimal('lowEb',10,3);
            $table->decimal('upEb',10,3);
            $table->string('statCmt',10);
            $table->string('addModDate',10);
            $table->string('cc',1);
            $table->timestamps();
        });
        
        gc_enable();
        
        // Populate Nut Data Table
        $fp = fopen(path('storage').'database/NUT_DATA.txt','r');
        $count = 0;
        while($row = fgets($fp)) {    
            $this->populate($row);
            unset($row);
            $count++;
            if($count < 100){
                gc_collect_cycles();
                $count = 0;
            }
        }
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('nutData');
	}
    
    private function populate($row) 
    {
        $items = explode('^',$row);
        $info = new nutData;
        $info->ndbNo = strtolower(trim(str_replace('~','',$items[0])));
        $info->nutrNo = strtolower(trim(str_replace('~','',$items[1])));
        $info->nurtVal = strtolower(trim(str_replace('~','',$items[2])));
        $info->numDataPts = strtolower(trim(str_replace('~','',$items[3])));
        $info->stdError = strtolower(trim(str_replace('~','',$items[4])));
        $info->srcCd = strtolower(trim(str_replace('~','',$items[5])));
        $info->derivCd = strtolower(trim(str_replace('~','',$items[6])));
        $info->refNdbNo = strtolower(trim(str_replace('~','',$items[7])));
        $info->addNutrMark = strtolower(trim(str_replace('~','',$items[8])));
        $info->numStudies = strtolower(trim(str_replace('~','',$items[9])));
        $info->min = strtolower(trim(str_replace('~','',$items[10])));
        $info->max = strtolower(trim(str_replace('~','',$items[11])));
        $info->df = strtolower(trim(str_replace('~','',$items[12])));
        $info->lowEb = strtolower(trim(str_replace('~','',$items[13])));
        $info->upEb = strtolower(trim(str_replace('~','',$items[14])));
        $info->statCmt = strtolower(trim(str_replace('~','',$items[15])));
        $info->addModDate = strtolower(trim(str_replace('~','',$items[16])));
        $info->cc = strtolower(trim(str_replace('~','',$items[17])));
        
        $info->save();
        
        unset($info);
        unset($items);
    }
}