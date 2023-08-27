<?php
include "logic.php";
include "level.php";

$level = Logic::create_level_from_post_data();

echo Logic::does_level_have_traditional_swing_copter($level) ? 1 : 0;