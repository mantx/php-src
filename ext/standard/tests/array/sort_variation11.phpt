--TEST--
Test sort() function : usage variations - sort mixed values, 'sort_flag' as default/SORT_REGULAR (OK to fail as result is unpredectable)
--FILE--
<?php
/* Prototype  : bool sort ( array &$array [, int $sort_flags] )
 * Description: This function sorts an array.
                Elements will be arranged from lowest to highest when this function has completed.
 * Source code: ext/standard/array.c
*/

/*
 * testing sort() by providing mixed value array for $array argument with following flag values.
 * flag value as defualt
 * SORT_REGULAR - compare items normally
*/

echo "*** Testing sort() : usage variations ***\n";

// mixed value array
$mixed_values = array (
  array(),
  array(array(33, -5, 6), array(11), array(22, -55), array() ),
  -4, "4", 4.00, "b", "5", -2, -2.0, -2.98989, "-.9", "True", "",
  NULL, "ab", "abcd", 0.0, -0, "abcd\x00abcd\x00abcd", '', true, false
);

echo "\n-- Testing sort() by supplying mixed value array, 'flag' value is default --\n";
$temp_array = $mixed_values;
var_dump(sort($temp_array) );
var_dump($temp_array);

echo "\n-- Testing sort() by supplying mixed value array, 'flag' value is SORT_REGULAR --\n";
$temp_array = $mixed_values;
var_dump(sort($temp_array, SORT_REGULAR) );
var_dump($temp_array);

echo "Done\n";
?>
--EXPECT--
*** Testing sort() : usage variations ***

-- Testing sort() by supplying mixed value array, 'flag' value is default --
bool(true)
array(22) {
  [0]=>
  bool(false)
  [1]=>
  int(-4)
  [2]=>
  float(-2.98989)
  [3]=>
  int(-2)
  [4]=>
  float(-2)
  [5]=>
  string(3) "-.9"
  [6]=>
  float(0)
  [7]=>
  string(0) ""
  [8]=>
  int(0)
  [9]=>
  string(0) ""
  [10]=>
  NULL
  [11]=>
  string(1) "4"
  [12]=>
  bool(true)
  [13]=>
  string(1) "5"
  [14]=>
  string(4) "True"
  [15]=>
  string(2) "ab"
  [16]=>
  string(4) "abcd"
  [17]=>
  string(14) "abcd abcd abcd"
  [18]=>
  string(1) "b"
  [19]=>
  float(4)
  [20]=>
  array(0) {
  }
  [21]=>
  array(4) {
    [0]=>
    array(3) {
      [0]=>
      int(33)
      [1]=>
      int(-5)
      [2]=>
      int(6)
    }
    [1]=>
    array(1) {
      [0]=>
      int(11)
    }
    [2]=>
    array(2) {
      [0]=>
      int(22)
      [1]=>
      int(-55)
    }
    [3]=>
    array(0) {
    }
  }
}

-- Testing sort() by supplying mixed value array, 'flag' value is SORT_REGULAR --
bool(true)
array(22) {
  [0]=>
  bool(false)
  [1]=>
  int(-4)
  [2]=>
  float(-2.98989)
  [3]=>
  int(-2)
  [4]=>
  float(-2)
  [5]=>
  string(3) "-.9"
  [6]=>
  float(0)
  [7]=>
  string(0) ""
  [8]=>
  int(0)
  [9]=>
  string(0) ""
  [10]=>
  NULL
  [11]=>
  string(1) "4"
  [12]=>
  bool(true)
  [13]=>
  string(1) "5"
  [14]=>
  string(4) "True"
  [15]=>
  string(2) "ab"
  [16]=>
  string(4) "abcd"
  [17]=>
  string(14) "abcd abcd abcd"
  [18]=>
  string(1) "b"
  [19]=>
  float(4)
  [20]=>
  array(0) {
  }
  [21]=>
  array(4) {
    [0]=>
    array(3) {
      [0]=>
      int(33)
      [1]=>
      int(-5)
      [2]=>
      int(6)
    }
    [1]=>
    array(1) {
      [0]=>
      int(11)
    }
    [2]=>
    array(2) {
      [0]=>
      int(22)
      [1]=>
      int(-55)
    }
    [3]=>
    array(0) {
    }
  }
}
Done
