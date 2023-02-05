<?php
echo "Enter your Grade \n";
$grade = fgets(STDIN, 1024);
$grade = trim($grade);

if ($grade > 100 || $grade < 0) {
    echo " You must enter a valid value of grade";
    return;
}

echo "Enter your Grade System \n";
$grade_sys = fgets(STDIN, 1024);
$grade_sys = trim($grade_sys);

if ($grade_sys != "ABC" && $grade_sys != "STANDARD") {
    echo " You must enter a valid value of grade system";
    return;
}

if ($grade_sys == "STANDARD") {
    $grade_sys = array("exellent","very Good", "good", "bad");
} else {
    $grade_sys = array("A", "B", "C", "F");
}

if ($grade >= 90) {
    echo $grade_sys[0];
} elseif ($grade >= 80) {
    echo $grade_sys[1];
} elseif ($grade >= 70) {
    echo $grade_sys[2];
} else {
    echo $grade_sys[3];
}