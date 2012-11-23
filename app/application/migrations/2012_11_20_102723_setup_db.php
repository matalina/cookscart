<?php

class Setup_Db {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
	    // Create Group Table
	    Schema::create('groups', function($table) 
        {
            $table->increments('id');
            $table->string('group',25);
            $table->string('description',200);
            $table->timestamps();
        });
        
        // Populate default Groups
        $default = new Group;
        $default->group = 'Admin';
        $default->save();
        $group_id = $default->id;
        
        $default->group = 'Member';
        $default->save();
        
        // Create User Table
		Schema::create('users', function($table) 
        {
            $table->increments('id');
            $table->string('email',200);
            $table->string('username',25);
            $table->string('code',60);
            $table->string('password',60);
            $table->timestamps();
        });
        
        // Populate Default User
        $default = new User;
        
        $default->email = 'admin@cookscart.dev';
        $default->username = 'cookscart';
        $default->code = '';
        $default->password = Hash::make('c00ksc@rt');
        
        $default->save();
        $user_id = $default->id;
        
        // Create Group User Recipe Table
        Schema::create('group_user', function($table) 
        {
            $table->increments('id');
            $table->integer('group_id');
            $table->integer('user_id');
            $table->timestamps();
        });
        
        // Assign User to Admin Group
        $user_group = new GroupUser;
        $user_group->user_id = $user_id;
        $user_group->group_id = $group_id;
        $user_group->save();
        
        // Create Pantry Table
        Schema::create('pantries', function($table) 
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('fooddes_id');
            $table->decimal('qty',10,2);
            $table->string('unit',125);
            $table->timestamps();
        });
        
        // Create Recipe Table
        Schema::create('recipes', function($table) 
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name',200);
            $table->text('instructions');
            $table->integer('servings');
            $table->text('rnotes');
            $table->timestamps();
        });
        
        // Create Ingredients Table
        Schema::create('ingredients', function($table) 
        {
            $table->increments('id');
            $table->integer('recipe_id');
            $table->integer('fooddes_id');
            $table->decimal('qty',10,2);
            $table->string('unit',125);
            $table->text('inote');
            $table->timestamps();
        });
        
        // Create Plan Table
        Schema::create('plans', function($table) 
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->date('for_date');
            $table->timestamps();
        });
        
        // Create Plan Recipe Table
        Schema::create('plan_recipe', function($table) 
        {
            $table->increments('id');
            $table->integer('plan_id');
            $table->integer('recipe_id');
            $table->integer('meal_id');
            $table->timestamps();
        });
        
        // Create Meal Table
        Schema::create('meals', function($table) 
        {
            $table->increments('id');
            $table->string('meal',25);
            $table->timestamps();
        });
        
        // Populate Meal Table
        $meal = new Meal;
        $meal->meal = 'Breakfast';
        $meal->save();
        
        $meal->meal = 'Lunch';
        $meal->save();
        
        $meal->meal = 'Brunch';
        $meal->save();
        
        $meal->meal = 'Dinner';
        $meal->save();
        
        $meal->meal = 'Supper';
        $meal->save();
        
        $meal->meal = 'Snack';
        $meal->save();
        
        // Create Comments Table
        Schema::create('comments', function($table) 
        {
            $table->increments('id');
            $table->integer('recipe_id');
            $table->integer('user_id');
            $table->text('comment');
            $table->timestamps();
        });
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user');
	}

}