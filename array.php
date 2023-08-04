<?php
$arr = array(24, 48, 95, 100, 120);

print_r("Popped element is ");
echo array_pop($arr);

print_r("\nAfter popping the last element, ".
				"the array reduces to: \n");
print_r($arr);
?>
