<?php
for ($i = 1; $i <= 5; $i++) {
  echo $i * 2 . "<br/>";
}

$count = 1;
while ($count <= 20) {
  echo $count . "<br/>";
  $count += 1;
}

$countt = 0;
while ($countt <= 100) {
  if ($countt % 3 === 0) {
    $countt += 1;
    continue;
  }
  if ($countt === 20) {
    break;
  }
  echo $countt . '<br/>';
  $countt += 1;
}

$num = 0;
do {
  echo "num = " . $num . '<br/>';
  $num++;
} while ($num < 3);

$Fizz = "Fizz";
$Buzz = "Buzz";
$FizzBuzz = "FizzBuzz";

for ($a = 1; $a <= 50; $a++) {
  if ($a % 15 == 0) {
    echo $FizzBuzz;
  } else if ($a % 3 == 0) {
    echo $Fizz;
  } else if ($a % 5 == 0) {
    echo $Buzz;
  } else {
    echo $a;
  }
}

for ($y = 1; $y < 6; $y++) {
  for ($j = 1; $j < 6; $j++) {
    echo "●";
  }
  echo "<br />";
}
