<?php
namespace Model;
use \DB;

class ColorDBModel extends \Model {
    //$color_in_database = ((!(DB::select('*')->from('colors')->where('hex_value', '=', $color)->limit(1)->execute()->count() > 0))&&(!(DB::select('*')->from('colors')->where('name', '=', $name)->limit(1)->execute()->count() > 0)));
    public static function create_colors() {
        try
        {
            // Create a database with the preset colors
            \DBUtil::create_table(
                'colors',
                array(
                    'id'        => array('type' => 'int', 'auto_increment' => true),
                    'name'      => array('constraint' => 256,'type' => 'varchar'),
                    'hex_value' => array('constraint' => 256,'type' => 'varchar'),
                ),
                array('id')
            );
            \DB::query("ALTER TABLE `colors` ADD UNIQUE (`id`)")->execute();
            \DB::query("ALTER TABLE `colors` ADD UNIQUE (`name`)")->execute();
            \DB::query("ALTER TABLE `colors` ADD UNIQUE (`hex_value`)")->execute();

            DB::insert('colors')->set(array('id' => 1,  'name' => 'red',                'hex_value' => '#FF0000'))->execute();
            DB::insert('colors')->set(array('id' => 2,  'name' => 'orange',             'hex_value' => '#FFA500'))->execute();
            DB::insert('colors')->set(array('id' => 3,  'name' => 'yellow',             'hex_value' => '#FFFF00'))->execute();
            DB::insert('colors')->set(array('id' => 4,  'name' => 'green',              'hex_value' => '#008000'))->execute();
            DB::insert('colors')->set(array('id' => 5,  'name' => 'blue',               'hex_value' => '#0000FF'))->execute();
            DB::insert('colors')->set(array('id' => 6,  'name' => 'purple',             'hex_value' => '#800080'))->execute();
            DB::insert('colors')->set(array('id' => 7,  'name' => 'grey',               'hex_value' => '#808080'))->execute();
            DB::insert('colors')->set(array('id' => 8,  'name' => 'brown',              'hex_value' => '#A52A2A'))->execute();
            DB::insert('colors')->set(array('id' => 9,  'name' => 'black',              'hex_value' => '#000000'))->execute();
            DB::insert('colors')->set(array('id' => 10, 'name' => 'teal',               'hex_value' => '#008080'))->execute();
            DB::insert('colors')->set(array('id' => 11, 'name' => 'navy',               'hex_value' => '#000080'))->execute();
            DB::insert('colors')->set(array('id' => 12, 'name' => 'maroon',             'hex_value' => '#800000'))->execute();
            DB::insert('colors')->set(array('id' => 13, 'name' => 'olive',              'hex_value' => '#808000'))->execute();
            DB::insert('colors')->set(array('id' => 14, 'name' => 'lime',               'hex_value' => '#00FF00'))->execute();
            DB::insert('colors')->set(array('id' => 15, 'name' => 'aqua',               'hex_value' => '#00FFFF'))->execute();
            DB::insert('colors')->set(array('id' => 16, 'name' => 'fuchsia',            'hex_value' => '#FF00FF'))->execute();
            DB::insert('colors')->set(array('id' => 17, 'name' => 'silver',             'hex_value' => '#C0C0C0'))->execute();
            DB::insert('colors')->set(array('id' => 18, 'name' => 'golden rod',         'hex_value' => '#DAA520'))->execute();
            DB::insert('colors')->set(array('id' => 19, 'name' => 'indigo',             'hex_value' => '#4B0082'))->execute();
            DB::insert('colors')->set(array('id' => 20, 'name' => 'khaki',              'hex_value' => '#F0E68C'))->execute();
            DB::insert('colors')->set(array('id' => 21, 'name' => 'lavender',           'hex_value' => '#E6E6FA'))->execute();
            DB::insert('colors')->set(array('id' => 22, 'name' => 'pink',               'hex_value' => '#FFC0CB'))->execute();
            DB::insert('colors')->set(array('id' => 23, 'name' => 'plum',               'hex_value' => '#DDA0DD'))->execute();
            DB::insert('colors')->set(array('id' => 24, 'name' => 'salmon',             'hex_value' => '#FA8072'))->execute();
            DB::insert('colors')->set(array('id' => 25, 'name' => 'sienna',             'hex_value' => '#A0522D'))->execute();
            DB::insert('colors')->set(array('id' => 26, 'name' => 'tan',                'hex_value' => '#D2B48C'))->execute();
            DB::insert('colors')->set(array('id' => 27, 'name' => 'turquoise',          'hex_value' => '#40E0D0'))->execute();
            DB::insert('colors')->set(array('id' => 28, 'name' => 'violet',             'hex_value' => '#EE82EE'))->execute();
            DB::insert('colors')->set(array('id' => 29, 'name' => 'wheat',              'hex_value' => '#F5DEB3'))->execute();
            DB::insert('colors')->set(array('id' => 30, 'name' => 'white',              'hex_value' => '#FFFFFF'))->execute();
            DB::insert('colors')->set(array('id' => 31, 'name' => 'crimson',            'hex_value' => '#DC143C'))->execute();
            DB::insert('colors')->set(array('id' => 32, 'name' => 'dark cyan',          'hex_value' => '#008B8B'))->execute();
            DB::insert('colors')->set(array('id' => 33, 'name' => 'dark orange',        'hex_value' => '#FF8C00'))->execute();
            DB::insert('colors')->set(array('id' => 34, 'name' => 'deep pink',          'hex_value' => '#FF1493'))->execute();
            DB::insert('colors')->set(array('id' => 35, 'name' => 'forest green',       'hex_value' => '#228B22'))->execute();
            DB::insert('colors')->set(array('id' => 36, 'name' => 'gold',               'hex_value' => '#FFD700'))->execute();
            DB::insert('colors')->set(array('id' => 37, 'name' => 'light blue',         'hex_value' => '#ADD8E6'))->execute();
            DB::insert('colors')->set(array('id' => 38, 'name' => 'light green',        'hex_value' => '#90EE90'))->execute();
            DB::insert('colors')->set(array('id' => 39, 'name' => 'medium violet red',  'hex_value' => '#C71585'))->execute();
            DB::insert('colors')->set(array('id' => 40, 'name' => 'slate blue',         'hex_value' => '#6A5ACD'))->execute();
            /*  ACTUAL COMMAND
            create table colors (id int, name varchar(256), hex_value varchar(256), unique(id, name, hex_value), primary key(id));
            insert into colors values (1, 'red', '#FF0000');
            insert into colors values (2, 'orange', '#FFA500');
            insert into colors values (3, 'yellow', '#FFFF00');
            insert into colors values (4, 'green', '#008000');
            insert into colors values (5, 'blue', '#0000FF');
            insert into colors values (6, 'purple', '#800080');
            insert into colors values (7, 'grey', '#808080');
            insert into colors values (8, 'brown', '#A52A2A');
            insert into colors values (9, 'black', '#000000');
            insert into colors values (10, 'teal', '#008080');
            */
            //echo "<script>alert('TABLE CREATED');</script>";
        }
        catch(\Database_Exception $e)
        {
            //echo "<script>alert('TABLE NOT CREATED: $e');</script>";
        }
    }
    public static function clear_colors() {
        // Catch the exception
        try
        {
            // Clear and delete the data base table colors
            \DBUtil::drop_table('colors');
            //echo "<script>alert('TABLE DELETED/CLEARED');</script>";
        }
        catch(\Database_Exception $e)
        {
            //echo "<script>alert('TABLE NOT DELETED/CLEARED: $e');</script>";
        }
    }

    public static function add_color($name, $color) {
        try
        {
            // Check that no color in the table has the same hex or name value
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
            echo "<script>alert('COLOR ADDED');</script>";
        }
        catch(\Database_Exception $e)
        {
            echo "<script>alert('COLOR NOT ADDED: $e');</script>";
        }

    }

    public static function delete_colors($color_id) {
        try
        {
            // Use DB::delete to remove an item. Remember to add ->execute() to the end so that it runs the query
            DB::delete('colors')->where('id','=',$color_id)->execute();
            echo "<script>alert('COLOR DELETED');</script>";
        }
        catch(\Database_Exception $e)
        {
            echo "<script>alert('COLOR NOT DELETED: $e');</script>";
        }
    }

    public static function edit_colors($id, $color) {
        try
        {
            // Edit hex vbalue in database
            DB::update('colors')->set(array(
                'hex_value' => $color,
            ))->where('id', '=', $id)->execute();
            echo "<script>alert('COLOR EDITED');</script>";
        }
        catch(\Database_Exception $e)
        {
            echo "<script>alert('COLOR NOT EDITED: $e');</script>";
        }
    }

    public static function read_colors() {
        try
        {
            // Notice that this query ends in execute then as_array
            // The queries from DB just return an object that needs to be executed, then to get the results
            // You can use as_array to get them all at once or other methods to iterate over the results of the query
            // by row
            // Read colors from color table into an array for front end
            return DB::select('*')->from('colors')->execute()->as_array();
            //echo "<script>alert('COLORS READ');</script>";
        }
        catch(\Database_Exception $e)
        {
            //echo "<script>alert('COLORS NOT READ: $e');</script>";
        }
    }

    public static function color_count() {
        try
        {
            // Get count of rows from color table
            return DB::count_records('colors') ;
            //echo "<script>alert('COLOR COUNT FOUND');</script>";
        }
        catch(\Database_Exception $e)
        {
            //echo "<script>alert('COLOR COUNT NOT FOUND: $e');</script>";
        }
    }

    private static function largest_id() {
        try
        {
            return DB::query('SELECT MAX(id) as id FROM `colors`')->execute()->as_array();
            //echo "<script>alert('LARGEST ID FOUND');</script>";
        }
        catch(\Database_Exception $e)
        {
            //echo "<script>alert('LARGEST ID NOT FOUND: $e');</script>";
        }
    }
}
?>
