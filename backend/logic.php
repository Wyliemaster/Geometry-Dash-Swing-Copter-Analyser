<?php
require_once "globals.php";

class Logic
{
    public static function decompress($string)
    {
        return gzdecode(base64_decode(str_replace("_", "/", str_replace("-", "+", $string))));
    }

    public static function create_level_from_post_data($key = "level_string")
    {
        $post_data = Logic::decompress($_POST[$key]);
        return Level::create($post_data);
    }

    // This function estimates if the level has a ball copter.
    // it won't be correct 100% of the time
    public static function does_level_have_traditional_swing_copter($level)
    {
        if ($level->settings->two_player == true)
            return false;

        $mode_portals = [];
        $orbs = [];
        $dual_portals = [];


        $objects = $level->objects;
        $total_objects = count($objects);

        for ($i = 0; $i < $total_objects; $i++) {
            $obj = $objects[$i];

            if (GDObject::is_mode_portal($obj)) {
                array_push($mode_portals, $obj);
            }

            if (GDObject::is_gravity_orb($obj)) {
                array_push($orbs, $obj);
            }

            if (GDObject::is_dual_portal($obj)) {
                array_push($dual_portals, $obj);
            }
        }

        if (empty($dual_portals) && !$level->settings->dual_mode)
            return false;


        return Logic::analyse_portals($mode_portals, $orbs, $dual_portals) | ($level->settings->dual_mode ? Logic::analyse_start($orbs) : false);
    }

    public static function analyse_portals($mode, $orbs, $dual)
    {
        $orbs_after_dual = [];

        $mode_size = count($mode);
        $orbs_size = count($orbs);
        $dual_size = count($dual);

        for ($i = 0; $i < $mode_size; $i++) {

            $portal = $mode[$i];

            for ($j = 0; $j < $dual_size; $j++) {
                reset($orbs_after_dual);
                $dual_portal = $dual[$j];
                $position_difference = intval($dual_portal->position_x) - intval($portal->position_x);

                if (
                    $position_difference < GlobalVariables::PORTAL_FROM_PORTAL_THREADHOLD
                    && $position_difference > -GlobalVariables::PORTAL_FROM_PORTAL_THREADHOLD
                ) {
                    for ($k = 0; $k < $orbs_size; $k++) {
                        $orb = $orbs[$k];

                        $orb_difference =  intval($orb->position_x) - intval($dual_portal->position_x);

                        if (
                            $orb_difference < GlobalVariables::ORB_FROM_PORTAL_THRESHOLD_MAX
                            && $orb_difference > GlobalVariables::ORB_FROM_PORTAL_THRESHOLD_MIN
                        ) {
                            array_push($orbs_after_dual, $orb);
                        }
                    }
                }

                if (count($orbs_after_dual) >= GlobalVariables::ORBS_BEFORE_SWING_IS_DETECTED) {
                    return true;
                }
            }
        }
        return false;
    }

    public static function analyse_start($orbs)
    {
        $orbs_within_threshold = [];
        $orbs_size = count($orbs);

        for ($i = 0; $i < $orbs_size; $i++) {
            $orb = $orbs[$i];

            if (
                intval($orb->position_x) < GlobalVariables::ORB_FROM_PORTAL_THRESHOLD_MAX
                && intval($orb->position_x) > GlobalVariables::ORB_FROM_PORTAL_THRESHOLD_MIN
            ) {
                array_push($orbs_within_threshold, $orb);
            }
        }
        if (count($orbs_within_threshold) >= GlobalVariables::ORBS_BEFORE_SWING_IS_DETECTED) {
            return true;
        }

        return false;
    }
}
