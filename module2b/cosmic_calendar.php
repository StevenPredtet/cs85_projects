<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cosmic Calendar</title>
    <!-- All styling for the final output page is included below -->
    <style>
        body { font-family: sans-serif; background-color: #1a202c; color: #e2e8f0; }
        .container { max-width: 800px; margin: 2rem auto; padding: 2rem; background-color: #2d3748; border-radius: 8px; box-shadow: 0 5px 15px rgba(0,0,0,0.2); }
        h1 { text-align: center; color: #9f7aea; }
        .calendar-grid { display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; }
        .day-box { width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; border-radius: 5px; background-color: #4a5568; font-size: 1.2rem; }
        .cosmic-name { background-color: #9f7aea; color: #fff; transform: scale(1.1); box-shadow: 0 0 15px #9f7aea; }
        .cosmic-month { border: 2px solid #f6e05e; }
        .cosmic-both { background-color: #ed8936; color: #fff; border: 2px solid #f6e05e; transform: scale(1.1); box-shadow: 0 0 15px #ed8936; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cosmic Calendar</h1>
        <div class="calendar-grid">
            <?php
                // --- YOUR ENTIRE PHP SCRIPT GOES HERE ---
                     $firstName = "Steven";

                $jsonString = file_get_contents('http://worldtimeapi.org/api/ip');

                $dataObject = json_decode($jsonString);

                if ($dataObject) {
                    $dayOfYear = $dataObject->day_of_year;
                    $month = $dataObject->month;

                    $nameLength = strlen($firstName);
                    $start = $nameLength;
                    $end = $dayOfYear;

                    for ($i = $start; $i <= $end; $i++) {
                        $cssClass = "day-box";

                        if ($i % $nameLength == 0 && $i % $month == 0) {
                            $cssClass .= " cosmic-both";
                        } elseif ($i % $nameLength == 0) {
                            $cssClass .= " cosmic-name";
                        } elseif ($i % $month == 0) {
                            $cssClass .= " cosmic-month";
                        }

                        echo "<div class='$cssClass'>$i</div>";
                    }
                }
            ?>

            <?php
            /*
            MY DEBUGGING LOG:
            Problem: The API call was failing on some networks causing errors.
            Solution: Added a check to confirm $dataObject before accessing its properties,
            preventing crashes and clarifying it was a network issue.
            */
            ?>
        </div>
    </div>
</body>
</html>