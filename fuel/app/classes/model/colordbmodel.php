<?php
namespace Model;
use \DB;

// Todo DB Skeleton Code

class ColorDBModel extends \Model {

    public static function add_color($name, $color) {
        // This just finds the next largest id in the database table
        // If the table is empty it sets the first id to 1
        $id = ColorDBModel::largest_id()[0]['id'];
        if ($id == NULL) {
            $id = 1;
        } else {
            $id = $id + 1;
        }
        DB::insert('colors')->set(array(
            'id' => $id,
            'name' => $name,
            'hex_value' => $color,
        ))->execute();
    }

    public static function delete_colors($color_id) {
        // Use DB::delete to remove an item. Remember to add ->execute() to the end so that it runs the query
        // Here is a basic outline:
        DB::delete('colors')->where('id','=',$color_id)->execute();
    }

    public static function update_color() {
        return false;
    }

    public static function edit_colors($id, $color) {
        DB::update('colors')->set(array(
            'hex_value' => $color,
        ))->where('id', '=', $id)->execute();
    }

    public static function read_colors() {
        // Notice that this query ends in execute then as_array
        // The queries from DB just return an object that needs to be executed, then to get the results
        // You can use as_array to get them all at once or other methods to iterate over the results of the query
        // by row
        return DB::select('*')->from('colors')->execute()->as_array();
    }

    public static function color_count() {
        return DB::count_records('colors') ;
    }

    private static function largest_id() {
        return DB::query('SELECT MAX(id) as id FROM `colors`')->execute()->as_array();
    }
}
?>