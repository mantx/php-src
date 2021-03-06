--TEST--
Test tempnam() function: usage variations - invalid/non-existing dir
--SKIPIF--
<?php
if(substr(PHP_OS, 0, 3) == "WIN")
  die("skip Do not run on Windows");
?>
--CONFLICTS--
obscure_filename
--FILE--
<?php
/* Prototype:  string tempnam ( string $dir, string $prefix );
   Description: Create file with unique file name.
*/

/* Passing invalid/non-existing args for $dir,
     hence the unique files will be created in temporary dir */

echo "*** Testing tempnam() with invalid/non-existing directory names ***\n";
/* An array of names, which will be passed as a dir name */
$names_arr = array(
  /* Invalid args */
  -1,
  TRUE,
  FALSE,
  NULL,
  "",
  " ",
  "\0",
  array(),

  /* Non-existing dirs */
  "/no/such/file/dir",
  "php"

);

for( $i=0; $i<count($names_arr); $i++ ) {
  echo "-- Iteration $i --\n";
  try {
    $file_name = tempnam($names_arr[$i], "tempnam_variation3.tmp");
  } catch (TypeError $e) {
    echo $e->getMessage(), "\n";
    continue;
  }

  if( file_exists($file_name) ){

    echo "File name is => ";
    print($file_name);
    echo "\n";

    echo "File permissions are => ";
    printf("%o", fileperms($file_name) );
    echo "\n";

    echo "File created in => ";
    $file_dir = dirname($file_name);

    if (realpath($file_dir) == realpath(sys_get_temp_dir())) {
       echo "temp dir\n";
    }
    else {
       echo "unknown location\n";
    }

  }
  else {
    echo "-- File is not created --\n";
  }

  unlink($file_name);
}
?>
--EXPECTF--
*** Testing tempnam() with invalid/non-existing directory names ***
-- Iteration 0 --

Notice: tempnam(): file created in the system's temporary directory in %stempnam_variation7.php on line %d
File name is => %s%etempnam_variation3.tmp%s
File permissions are => 100600
File created in => temp dir
-- Iteration 1 --

Notice: tempnam(): file created in the system's temporary directory in %stempnam_variation7.php on line %d
File name is => %s%etempnam_variation3.tmp%s
File permissions are => 100600
File created in => temp dir
-- Iteration 2 --
File name is => %s%etempnam_variation3.tmp%s
File permissions are => 100600
File created in => temp dir
-- Iteration 3 --
File name is => %s%etempnam_variation3.tmp%s
File permissions are => 100600
File created in => temp dir
-- Iteration 4 --
File name is => %s%etempnam_variation3.tmp%s
File permissions are => 100600
File created in => temp dir
-- Iteration 5 --

Notice: tempnam(): file created in the system's temporary directory in %stempnam_variation7.php on line %d
File name is => %s%etempnam_variation3.tmp%s
File permissions are => 100600
File created in => temp dir
-- Iteration 6 --
tempnam() expects parameter 1 to be a valid path, string given
-- Iteration 7 --
tempnam() expects parameter 1 to be a valid path, array given
-- Iteration 8 --

Notice: tempnam(): file created in the system's temporary directory in %stempnam_variation7.php on line %d
File name is => %s/tempnam_variation3.tmp%s
File permissions are => 100600
File created in => temp dir
-- Iteration 9 --

Notice: tempnam(): file created in the system's temporary directory in %stempnam_variation7.php on line %d
File name is => %s/tempnam_variation3.tmp%s
File permissions are => 100600
File created in => temp dir
