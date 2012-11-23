<?php
class Profile_Controller extends Base_Controller 
{
    
    public function get_dashboard() 
    {
        $events = array(
            1 => array(
                array(
                    'meal' => 'Breakfast',
                    'recipe_name' => 'Test Recipe',
                    'recipe_id' => 1,
                ),
                array(
                    'meal' => 'Lunch',
                    'recipe_name' => 'Test Recipe',
                    'recipe_id' => 1,
                ),
                array(
                    'meal' => 'Dinner',
                    'recipe_name' => 'Test Recipe',
                    'recipe_id' => 1,
                ),
                array(
                    'meal' => 'Snack',
                    'recipe_name' => 'Test Recipe',
                    'recipe_id' => 1,
                )
            )
        );
        $calendar = Calendar::create(2012,11,$events);
        Section::inject('calendar', $calendar);
        return View::make('profile.dashboard');
    }
}