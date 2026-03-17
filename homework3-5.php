<?php
// Set the default timezone to avoid warnings
date_default_timezone_set('UTC');

// Get the current month and year
$month = date('n'); // Month number without leading zeros (1-12)
$year = date('Y'); // A four digit representation of a year

// Calculate the number of days in the month
$num_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);

// Get the first day of the month as a timestamp
$first_day_timestamp = mktime(0, 0, 0, $month, 1, $year);

// Get the day of the week for the first day of the month (0=Sun, 6=Sat)
$first_day_of_week = date('w', $first_day_timestamp);

// Day labels for the calendar header
$day_labels = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');

// Start building the HTML table
echo "<h2>" . date('F Y', $first_day_timestamp) . "</h2>"; // Full month name and year
echo "<table border='1' cellpadding='10'>";
echo "<thead><tr>";
foreach ($day_labels as $label) {
    echo "<th>" . $label . "</th>";
}
echo "</tr></thead><tbody><tr>";

// Print empty cells for days before the 1st of the month
for ($i = 0; $i < $first_day_of_week; $i++) {
    echo "<td></td>";
}

// Loop through each day of the month
$day_counter = $first_day_of_week;
for ($day = 1; $day <= $num_days; $day++) {
    echo "<td>" . $day . "</td>";

    // Start a new row at the end of each week (Saturday)
    if ($day_counter % 7 == 6) {
        echo "</tr><tr>";
    }
    $day_counter++;
}

// Print empty cells to fill the last week
while ($day_counter % 7 != 0) {
    echo "<td></td>";
    $day_counter++;
}

echo "</tr></tbody></table>";
?>
