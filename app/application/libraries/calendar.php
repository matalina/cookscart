<?php
class Calendar
{
    /**
     * Create a New Calendar of Events
     * 
     * $events = array(
     *      1 => array(
     *          array(
     *              'meal' => 'Breakfast',
     *              'recipe_name' => 'Test Recipe',
     *              'recipe_id' => 1,
     *          ),
     *          array(
     *              'meal' => 'Lunch',
     *              'recipe_name' => 'Test Recipe',
     *              'recipe_id' => 1,
     *          ),
     *          [...]
     *      ),
     *      2 => array(
     *          array(
     *              'meal' => 'Breakfast',
     *              'recipe_name' => 'Test Recipe',
     *              'recipe_id' => 1,
     *          ),
     *          array(
     *              'meal' => 'Lunch',
     *              'recipe_name' => 'Test Recipe',
     *              'recipe_id' => 1,
     *          ),
     *          [...]
     *      ),
     *      [...]
     * )
     * 
     * @param integer $year Four digit year to display
     * @param integer $month A digit represenation of a month
     * @param array $events An array of events formated with the key as the date and the value is an array of details for the event
     * @return string Returns a string to be added to a view for display  
     * 
     */
    public static function create($year, $month, $events = array()) 
    {
        $time = mktime(0,0,0,$month,1,$year);
        $first_day = date('w',$time);
        $days_of_month = date('t',$time);
        
        $j = 0; // days of the week counter
        $output = '<table class="calendar"><thead>
            <tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr>
            </thead>';
        $output .= '<tfoot class="show_js"><tr><td colspan="3">
            '.HTML::link('#','Prev',array('id' => 'prev')).'
            </td><td>&nbsp;</td><td colspan="3">
            '.HTML::link('#','Next',array('id' => 'next')).'
            </td></tr></tfoot>';    
        $output .= '<tbody>';
        for($i = 1 - $first_day; $i <= $days_of_month; $i++) {
            if($j == 0) {
                $output .= '<tr>';
            }
            if($i < 1) {
                $output .= '<td>&nbsp;</td>';
            }
            else {
                $output .= '<td><div class="date text-right">'.$i.'</div>';
                if(isset($events[$i])) {
                    foreach($events[$i] as $meal) {
                        $output .= '<div class="meal">';
                        $output .= $meal['meal'];
                        $output .= '<br/>'.HTML::link('recipe/view/'.$meal['recipe_id'],$meal['recipe_name']);
                        $output .= '</div>';
                    }
                }
                $output .= '</td>';
            }
            if($j == 6) {
                $output .= '</tr>';
                $j = 0;
            }
            else {
                $j++;
            }
        }
        for($i = $j; $i <= 6; $i++) {
                $output .= '<td>&nbsp;</td>';
        }
        $output .= '</tbody></table>';
        
        return $output;
    }
}
        