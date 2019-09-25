<?php
// License: GNU General Public License v2 or later
// License URI: http://www.gnu.org/licenses/gpl-2.0.html
//
// dispht.php
// merge downloaded HTML file from http://www.guidetojapanese.org/learn/grammar etc.
// download process by wget Windows like wget -O introducthon.html http://www.guidetojapanese.org/learn/grammar
// and put output ex) introduction.html file name in script array $filea like $filea = array('introduction',...); 
?>
<?php
//set file name list in array
$filea = array('signs','verbs','writing'); // no '.html'

//output HTML main header
print('<!DOCTYPE html><html><head><meta charset="UTF-8" /><title>kim tae Nihongo Tebiki</title></head><body><div>' . "\n" . "\n" . "\n" . "\n" . "\n");

//proces each HTML files downloaded
foreach ($filea as $f) {
  $b = dispht($f . '.html');
}

//footer HTML main
print( "\n" . "\n" . "\n" . "\n" . "\n" . '</div></body></html>' . "\n");

//main process to find textbook-part from HTML
function dispht($filename) {
  $ts = '';
  
  //open file and save $ts as long string
  $handle = fopen($filename, "r");
  while ($line = fgets($handle)) {
    $ts .= $line;
  }
  fclose($handle);

  //find textbook-part
  preg_match("/<h1.*?>(.*)<\/h1>(.*)<legend>Book Navigation<\/legend>/s", $ts, $a);

  //found with pattern.. output target HTML strings in $a[1] and  $a[2] 
  if (isset($a[1]) && isset($a[2]) ) {
    print('</fieldset><br /><br /><br /><br /><br /><br /><h1>--------' . $a[1] . '--------</h1><br /><br /><br /><br /><br />' . "\n");
    print($a[2]);
  }
}

?>
<?php
// License: GNU General Public License v2 or later
// License URI: http://www.gnu.org/licenses/gpl-2.0.html
?>
