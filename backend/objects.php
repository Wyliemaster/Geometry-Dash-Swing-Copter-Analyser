<?php
require_once "globals.php";

class GDObject
{
    public $object_id = 0; // 1
    public $position_x = 0.0; // 2
    public $position_y = 0.0; // 3
    public $flip_x = false; // 4
    public $flip_y = false; // 5
    public $rotation = 0.0; // 6
    public $colour_red = 0; // 7
    public $colour_green = 0; // 8
    public $colour_blue = 0; // 9
    public $trigger_duration = 0.0; // 10
    public $touch_triggered = false; // 11
    public $secret_coin_id = 0; // 12 (RobTop Coins)
    public $special_object_checked = false; // 13
    public $tint_ground = false; // 14
    public $player_colour_primary = false; // 15
    public $player_colour_secondary = false; // 16
    public $blending = false; // 17
    public $legacy_colour_channel = 0; // 19
    public $editor_layer_1 = 0; // 20
    public $primary_colour_channel = 0; // 21;
    public $secondary_colour_channel = 0; // 22
    public $target_colour_id = 0; // 23
    public $z_layer = 0; // 24
    public $z_order = 0; // 25
    public $move_trigger_offset_x = 0; // 28
    public $move_trigger_offset_y = 0; // 29
    public $easing = 0; // 30
    public $text = ""; // 31
    public $scale = 0.0; // 32
    public $single_group_id = 0; // 33
    public $group_parent = false; // 34
    public $opacity = 0.0; // 35
    public $primary_colour_hsv_enabled = false; // 41
    public $secondary_colour_hsv_enabled = false; // 42
    public $primary_colour_hsv = ""; // 43
    public $secondary_colour_hsv = ""; // 44
    public $trigger_fade_in = 0.0; // 45
    public $trigger_hold = 0.0; // 46
    public $trigger_fade_out = 0; // 47
    public $pulse_mode = 0; // 48
    public $copied_hsv = ""; // 49
    public $trigger_target_colour_id = 0; // 50
    public $trigger_target_group_id = 0; // 51
    public $pulse_type = 0; // 52
    public $teleport_portal_y_offset = 0.0; // 54
    public $teleport_portal_ease_teleport_transition = false; // 55
    public $activate_group = false; // 56
    public $group_ids = ""; // 57
    public $lock_to_player_x = false; // 58
    public $lock_to_player_y = false; // 59
    public $copy_opacity = false; // 60
    public $editor_layer_2 = 0; // 61
    public $spawn_triggered = false; // 62
    public $spawn_delay = 0.0; // 63
    public $dont_fade = false; // 64
    public $primary_colour_only = false; // 65
    public $secondary_colour_only = false; // 66
    public $dont_enter = false; // 67
    public $degrees = 0; // 68
    public $rotation_loops = 0; // 69
    public $lock_object_rotation = false; // 70
    public $secondary_target_id = 0; // 71
    public $follow_trigger_mod_x = 0.0; // 72
    public $follow_trigger_mod_y = 0.0; // 73
    public $shake_strength = 0.0; // 75
    public $animation_id = 0; // 76
    public $counter = 0; // 77
    public $subtract_count_trigger = false; // 78
    public $pickup_mode = 0; // 79
    public $item_id = 0; // 80
    public $touch_trigger_hold = false; // 81
    public $touch_trigger_toggle_mode = 0; // 82
    public $shake_interval = 0.0; // 84
    public $easing_rate = 0.0; // 85
    public $exclusive = false; // 86
    public $trigger_multi_trigger = false; // 87
    public $instant_count_comparison = 0; // 88
    public $touch_trigger_dual_mode = false; // 89
    public $follow_y_trigger_speed = 0.0; // 90
    public $follow_y_delay = 0.0; // 91
    public $follow_y_offset = 0.0; // 92
    public $collision_on_exit = false; // 93
    public $dynamic_block = false; // 94
    public $collision_b_block_id = 0; // 95
    public $disable_glow = false; // 96
    public $rotation_speed = 0.0; // 97
    public $disable_rotation = false; // 98
    public $orb_multi_activate = false; // 99
    public $enable_use_target = false; // 100
    public $target_position = ""; // 101
    public $disable_spawn_in_editor = false; // 102
    public $high_detail_mode = false; // 103
    public $multi_activate_trigger = false; // 104
    public $follow_y_max_speed = 0.0; // 105
    public $animated_random_start = false; // 106
    public $animated_speed = 0.0; // 107
    public $linked_group_ids = 0; // 108

    public static function create($object)
    {
        $instance = new GDObject();
        $data = explode(",", $object);
        $size = count($data);

        for ($i = 0; $i < $size; $i += 2) {
            GDObject::set_value($instance, $data[$i], $data[$i + 1]);
        }

        return $instance;
    }

    public static function set_value($ctx, $key, $value)
    {
        switch (intval($key)) {
            case GlobalVariables::OBJECT_ID:
                $ctx->object_id = $value;
                break;
            case GlobalVariables::POSITION_X:
                $ctx->position_x = $value;
                break;
            case GlobalVariables::POSITION_Y:
                $ctx->position_y = $value;
                break;
            case GlobalVariables::FLIP_X:
                $ctx->flip_x = $value;
                break;
            case GlobalVariables::FLIP_Y:
                $ctx->flip_y = $value;
                break;
            case GlobalVariables::ROTATION:
                $ctx->rotation = $value;
                break;
            case GlobalVariables::COLOUR_RED:
                $ctx->colour_red = $value;
                break;
            case GlobalVariables::COLOUR_GREEN:
                $ctx->colour_green = $value;
                break;
            case GlobalVariables::COLOUR_BLUE:
                $ctx->colour_blue = $value;
                break;
            case GlobalVariables::TRIGGER_DURATION:
                $ctx->trigger_duration = $value;
                break;
            case GlobalVariables::TOUCH_TRIGGERED:
                $ctx->touch_triggered = $value;
                break;
            case GlobalVariables::SECRET_COIN_ID:
                $ctx->secret_coin_id = $value;
                break;
            case GlobalVariables::SPECIAL_OBJECT_CHECKED:
                $ctx->special_object_checked = $value;
                break;
            case GlobalVariables::TINT_GROUND:
                $ctx->tint_ground = $value;
                break;
            case GlobalVariables::PLAYER_COLOUR_PRIMARY:
                $ctx->player_colour_primary = $value;
                break;
            case GlobalVariables::PLAYER_COLOUR_SECONDARY:
                $ctx->player_colour_secondary = $value;
                break;
            case GlobalVariables::BLENDING:
                $ctx->blending = $value;
                break;
            case GlobalVariables::LEGACY_COLOUR_CHANNEL:
                $ctx->legacy_colour_channel = $value;
                break;
            case GlobalVariables::EDITOR_LAYER_1:
                $ctx->editor_layer_1 = $value;
                break;
            case GlobalVariables::PRIMARY_COLOUR_CHANNEL:
                $ctx->primary_colour_channel = $value;
                break;
            case GlobalVariables::SECONDARY_COLOUR_CHANNEL:
                $ctx->secondary_colour_channel = $value;
                break;
            case GlobalVariables::TARGET_COLOUR_ID:
                $ctx->target_colour_id = $value;
                break;
            case GlobalVariables::Z_LAYER:
                $ctx->z_layer = $value;
                break;
            case GlobalVariables::Z_ORDER:
                $ctx->z_order = $value;
                break;
            case GlobalVariables::MOVE_TRIGGER_OFFSET_X:
                $ctx->move_trigger_offset_x = $value;
                break;
            case GlobalVariables::MOVE_TRIGGER_OFFSET_Y:
                $ctx->move_trigger_offset_y = $value;
                break;
            case GlobalVariables::EASING:
                $ctx->easing = $value;
                break;
            case GlobalVariables::TEXT:
                $ctx->text = $value;
                break;
            case GlobalVariables::SCALE:
                $ctx->scale = $value;
                break;
            case GlobalVariables::SINGLE_GROUP_ID:
                $ctx->single_group_id = $value;
                break;
            case GlobalVariables::GROUP_PARENT:
                $ctx->group_parent = $value;
                break;
            case GlobalVariables::OPACITY:
                $ctx->opacity = $value;
                break;
            case GlobalVariables::PRIMARY_COLOUR_HSV_ENABLED:
                $ctx->primary_colour_hsv_enabled = $value;
                break;
            case GlobalVariables::SECONDARY_COLOUR_HSV_ENABLED:
                $ctx->secondary_colour_hsv_enabled = $value;
                break;
            case GlobalVariables::PRIMARY_COLOUR_HSV:
                $ctx->primary_colour_hsv = $value;
                break;
            case GlobalVariables::SECONDARY_COLOUR_HSV:
                $ctx->secondary_colour_hsv = $value;
                break;
            case GlobalVariables::TRIGGER_FADE_IN:
                $ctx->trigger_fade_in = $value;
                break;
            case GlobalVariables::TRIGGER_HOLD:
                $ctx->trigger_hold = $value;
                break;
            case GlobalVariables::TRIGGER_FADE_OUT:
                $ctx->trigger_fade_out = $value;
                break;
            case GlobalVariables::PULSE_MODE:
                $ctx->pulse_mode = $value;
                break;
            case GlobalVariables::COPIED_HSV:
                $ctx->copied_hsv = $value;
                break;
            case GlobalVariables::TRIGGER_TARGET_COLOUR_ID:
                $ctx->trigger_target_colour_id = $value;
                break;
            case GlobalVariables::TRIGGER_TARGET_GROUP_ID:
                $ctx->trigger_target_group_id = $value;
                break;
            case GlobalVariables::PULSE_TYPE:
                $ctx->pulse_type = $value;
                break;
            case GlobalVariables::TELEPORT_PORTAL_Y_OFFSET:
                $ctx->teleport_portal_y_offset = $value;
                break;
            case GlobalVariables::TELEPORT_PORTAL_EASE_TELEPORT_TRANSITION:
                $ctx->teleport_portal_ease_teleport_transition = $value;
                break;
            case GlobalVariables::ACTIVATE_GROUP:
                $ctx->activate_group = $value;
                break;
            case GlobalVariables::GROUP_IDS:
                $ctx->group_ids = $value;
                break;
            case GlobalVariables::LOCK_TO_PLAYER_X:
                $ctx->lock_to_player_x = $value;
                break;
            case GlobalVariables::LOCK_TO_PLAYER_Y:
                $ctx->lock_to_player_y = $value;
                break;
            case GlobalVariables::COPY_OPACITY:
                $ctx->copy_opacity = $value;
                break;
            case GlobalVariables::EDITOR_LAYER_2:
                $ctx->editor_layer_2 = $value;
                break;
            case GlobalVariables::SPAWN_TRIGGERED:
                $ctx->spawn_triggered = $value;
                break;
            case GlobalVariables::SPAWN_DELAY:
                $ctx->spawn_delay = $value;
                break;
            case GlobalVariables::DONT_FADE:
                $ctx->dont_fade = $value;
                break;
            case GlobalVariables::PRIMARY_COLOUR_ONLY:
                $ctx->primary_colour_only = $value;
                break;
            case GlobalVariables::SECONDARY_COLOUR_ONLY:
                $ctx->secondary_colour_only = $value;
                break;
            case GlobalVariables::DONT_ENTER:
                $ctx->dont_enter = $value;
                break;
            case GlobalVariables::DEGREES:
                $ctx->degrees = $value;
                break;
            case GlobalVariables::ROTATION_LOOPS:
                $ctx->rotation_loops = $value;
                break;
            case GlobalVariables::LOCK_OBJECT_ROTATION:
                $ctx->lock_object_rotation = $value;
                break;
            case GlobalVariables::SECONDARY_TARGET_ID:
                $ctx->secondary_target_id = $value;
                break;
            case GlobalVariables::FOLLOW_TRIGGER_MOD_X:
                $ctx->follow_trigger_mod_x = $value;
                break;
            case GlobalVariables::FOLLOW_TRIGGER_MOD_Y:
                $ctx->follow_trigger_mod_y = $value;
                break;
            case GlobalVariables::SHAKE_STRENGTH:
                $ctx->shake_strength = $value;
                break;
            case GlobalVariables::ANIMATION_ID:
                $ctx->animation_id = $value;
                break;
            case GlobalVariables::COUNTER:
                $ctx->counter = $value;
                break;
            case GlobalVariables::SUBTRACT_COUNT_TRIGGER:
                $ctx->subtract_count_trigger = $value;
                break;
            case GlobalVariables::PICKUP_MODE:
                $ctx->pickup_mode = $value;
                break;
            case GlobalVariables::ITEM_ID:
                $ctx->item_id = $value;
                break;
            case GlobalVariables::TOUCH_TRIGGER_HOLD:
                $ctx->touch_trigger_hold = $value;
                break;
            case GlobalVariables::TOUCH_TRIGGER_TOGGLE_MODE:
                $ctx->touch_trigger_toggle_mode = $value;
                break;
            case GlobalVariables::SHAKE_INTERVAL:
                $ctx->shake_interval = $value;
                break;
            case GlobalVariables::EASING_RATE:
                $ctx->easing_rate = $value;
                break;
            case GlobalVariables::EXCLUSIVE:
                $ctx->exclusive = $value;
                break;
            case GlobalVariables::TRIGGER_MULTI_TRIGGER:
                $ctx->trigger_multi_trigger = $value;
                break;
            case GlobalVariables::INSTANT_COUNT_COMPARISON:
                $ctx->instant_count_comparison = $value;
                break;
            case GlobalVariables::TOUCH_TRIGGER_DUAL_MODE:
                $ctx->touch_trigger_dual_mode = $value;
                break;
            case GlobalVariables::FOLLOW_Y_TRIGGER_SPEED:
                $ctx->follow_y_trigger_speed = $value;
                break;
            case GlobalVariables::FOLLOW_Y_DELAY:
                $ctx->follow_y_delay = $value;
                break;
            case GlobalVariables::FOLLOW_Y_OFFSET:
                $ctx->follow_y_offset = $value;
                break;
            case GlobalVariables::COLLISION_ON_EXIT:
                $ctx->collision_on_exit = $value;
                break;
            case GlobalVariables::DYNAMIC_BLOCK:
                $ctx->dynamic_block = $value;
                break;
            case GlobalVariables::COLLISION_B_BLOCK_ID:
                $ctx->collision_b_block_id = $value;
                break;
            case GlobalVariables::DISABLE_GLOW:
                $ctx->disable_glow = $value;
                break;
            case GlobalVariables::ROTATION_SPEED:
                $ctx->rotation_speed = $value;
                break;
            case GlobalVariables::DISABLE_ROTATION:
                $ctx->disable_rotation = $value;
                break;
            case GlobalVariables::ORB_MULTI_ACTIVATE:
                $ctx->orb_multi_activate = $value;
                break;
            case GlobalVariables::ENABLE_USE_TARGET:
                $ctx->enable_use_target = $value;
                break;
            case GlobalVariables::TARGET_POSITION:
                $ctx->target_position = $value;
                break;
            case GlobalVariables::DISABLE_SPAWN_IN_EDITOR:
                $ctx->disable_spawn_in_editor = $value;
                break;
            case GlobalVariables::HIGH_DETAIL_MODE:
                $ctx->high_detail_mode = $value;
                break;
            case GlobalVariables::MULTI_ACTIVATE_TRIGGER:
                $ctx->multi_activate_trigger = $value;
                break;
            case GlobalVariables::FOLLOW_Y_MAX_SPEED:
                $ctx->follow_y_max_speed = $value;
                break;
            case GlobalVariables::ANIMATED_RANDOM_START:
                $ctx->animated_random_start = $value;
                break;
            case GlobalVariables::ANIMATED_SPEED:
                $ctx->animated_speed = $value;
                break;
            case GlobalVariables::LINKED_GROUP_IDS:
                $ctx->linked_group_ids = $value;
                break;
        }
    }

    public static function is_mode_portal($object)
    {
        switch (intval($object->object_id)) {
            case GlobalVariables::CUBE_PORTAL:
            case GlobalVariables::SHIP_PORTAL:
            case GlobalVariables::BALL_PORTAL:
            case GlobalVariables::BIRD_PORTAL:
            case GlobalVariables::DART_PORTAL:
            case GlobalVariables::ROBOT_PORTAL:
            case GlobalVariables::SPIDER_PORTAL:
                return true;
            default:
                return false;
        }
    }

    public static function is_gravity_orb($object)
    {
        if (intval($object->object_id) == GlobalVariables::BLUE_ORB || intval($object->object_id) == GlobalVariables::GREEN_ORB)
        {
            return true;
        }
        return false;
    }

    public static function is_dual_portal($object)
    {
        if (intval($object->object_id) == GlobalVariables::DUAL_PORTAL)
        {
            return true;
        }
        return false;
    }
}
