<?php

class Usda_Setup {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
	    ini_set('memory_limit', '1024M');
	    // Set up Food Des Table
		Schema::create('fooddes', function($table)
        {
            $table->increments('id');
            $table->string('ndbNo',5)->unique();
            $table->string('fdGrpCd',4);
            $table->string('longDesc',200);
            $table->string('shrtDesc',60);
            $table->string('comName',100);
            $table->string('manufacName',65);
            $table->string('survey',1);
            $table->string('refDesc',135);
            $table->integer('refuse');
            $table->string('sciName',65);
            $table->decimal('nFactor',4,2);
            $table->decimal('proFactor',4,2);
            $table->decimal('fatFactor',4,2);
            $table->decimal('choFactor',4,2);
            $table->timestamps();
        });
        
        // Populate Food Des Table
        $content = File::get(path('storage').'database/FOOD_DES.txt');
        $lines = explode(PHP_EOL,$content);
        foreach($lines as $row) {
            $items = explode('^',$row);
            $info = new FoodDes;
            $info->ndbNo = strtolower(trim(str_replace('~','',$items[0])));
            $info->fdGrpCd = strtolower(trim(str_replace('~','',$items[1])));
            $info->longDesc = strtolower(trim(str_replace('~','',$items[2])));
            $info->shrtDesc = strtolower(trim(str_replace('~','',$items[3])));
            $info->comName = strtolower(trim(str_replace('~','',$items[4])));
            $info->manufacName = strtolower(trim(str_replace('~','',$items[5])));
            $info->survey = strtolower(trim(str_replace('~','',$items[6])));
            $info->refDesc = strtolower(trim(str_replace('~','',$items[7])));
            $info->refuse = strtolower(trim(str_replace('~','',$items[8])));
            $info->sciName = strtolower(trim(str_replace('~','',$items[9])));
            $info->nFactor = strtolower(trim(str_replace('~','',$items[10])));
            $info->proFactor = strtolower(trim(str_replace('~','',$items[11])));
            $info->fatFactor = strtolower(trim(str_replace('~','',$items[12])));
            $info->choFactor = strtolower(trim(str_replace('~','',$items[13])));
            
            
            $info->save();
        } 
        
        // Set up Food Group Table
        Schema::create('fdgroup', function($table)
        {
            $table->increments('id');
            $table->string('fdGrpCd',4)->unique();
            $table->string('fdGrpDesc',60);
            $table->timestamps();
        });
        
        // Populate Food Group Table
        $content = File::get(path('storage').'database/FD_GROUP.txt');
        $lines = explode(PHP_EOL,$content);
        foreach($lines as $row) {
            $items = explode('^',$row);
            $info = new FdGroup;
            $info->fdGrpCd = strtolower(trim(str_replace('~','',$items[0])));
            $info->fdGrpDesc = strtolower(trim(str_replace('~','',$items[1])));
            
            $info->save();
        } 
        
        // Set up Nutr Def Table
        Schema::create('nutrdef', function($table)
        {
            $table->increments('id');
            $table->string('nutrNo',3)->unique();
            $table->string('units',7);
            $table->string('tagname',20);
            $table->string('nutrDesc',60);
            $table->string('numDec',1);
            $table->integer('srOrder');
            $table->timestamps();
        });
        
        // Populate Nutr Def Table
        $content = File::get(path('storage').'database/NUTR_DEF.txt');
        $lines = explode(PHP_EOL,$content);
        foreach($lines as $row) {
            $items = explode('^',$row);
            $info = new nutrDef;
            $info->nutrNo = strtolower(trim(str_replace('~','',$items[0])));
            $info->units = strtolower(trim(str_replace('~','',$items[1])));
            $info->tagname = strtolower(trim(str_replace('~','',$items[2])));
            $info->nutrDesc = strtolower(trim(str_replace('~','',$items[3])));
            $info->numDec = strtolower(trim(str_replace('~','',$items[4])));
            $info->srOrder = strtolower(trim(str_replace('~','',$items[5])));
            
            $info->save();
        } 
        
        // Set up Weight Table
        Schema::create('weight', function($table)
        {
            $table->increments('id');
            $table->string('ndbNo',5);
            $table->string('seq',2);
            $table->decimal('amount',5,3);
            $table->string('msreDesc',84);
            $table->decimal('gmWgt',7,1);
            $table->integer('numDataPts');
            $table->decimal('stdDev',7,3);
            $table->timestamps();
        });
        
        // Populate Weight Table
        $content = File::get(path('storage').'database/WEIGHT.txt');
        $lines = explode(PHP_EOL,$content);
        foreach($lines as $row) {
            $items = explode('^',$row);
            $info = new weight;
            $info->ndbNo = strtolower(trim(str_replace('~','',$items[0])));
            $info->seq = strtolower(trim(str_replace('~','',$items[1])));
            $info->amount = strtolower(trim(str_replace('~','',$items[2])));
            $info->msreDesc = strtolower(trim(str_replace('~','',$items[3])));
            $info->gmWgt = strtolower(trim(str_replace('~','',$items[4])));
            $info->numDataPts = strtolower(trim(str_replace('~','',$items[5])));
            $info->stdDev = strtolower(trim(str_replace('~','',$items[6])));
            
            $info->save();
        } 
        
        // Set up Footnote Table
        Schema::create('footnote', function($table)
        {
            $table->increments('id');
            $table->string('ndbNo',5);
            $table->string('footntNo',4);
            $table->string('footntType',1);
            $table->string('nutrNo',3);
            $table->string('footntTxt',200);
            $table->timestamps();
        });
        
        // Populate FootNote Table
        $content = File::get(path('storage').'database/FOOTNOTE.txt');
        $lines = explode(PHP_EOL,$content);
        foreach($lines as $row) {
            $items = explode('^',$row);
            $info = new footnote;
            $info->ndbNo = strtolower(trim(str_replace('~','',$items[0])));
            $info->footntNo = strtolower(trim(str_replace('~','',$items[1])));
            $info->footntType = strtolower(trim(str_replace('~','',$items[2])));
            $info->nutrNo = strtolower(trim(str_replace('~','',$items[3])));
            $info->footntTxt = strtolower(trim(str_replace('~','',$items[4])));
            
            $info->save();
        } 
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('foodDes');
        Schema::drop('weight');
        Schema::drop('footnote');
        Schema::drop('fdGroup');
        Schema::drop('nutrDef');
	}

}