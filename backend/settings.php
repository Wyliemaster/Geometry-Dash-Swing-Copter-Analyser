<?php
require_once "globals.php";

class Settings
{
    public $audio_track = 0; // kA1
    public $starting_mode = 0; // kA2
    public $mini_mode = false; // kA3
    public $starting_speed = 0; // kA4
    public $background_id = 0; // kA6
    public $ground_id = 0; // kA7
    public $dual_mode = false; // kA8
    public $using_start_pos = false; // kA9
    public $two_player = false; // kA10
    public $gravity_flipped = false; // kA11
    public $song_offset = 0.0; // kA13
    public $guidelines = ""; // kA14
    public $fade_in = false; // kA15
    public $fade_out = false; // kA16
    public $ground_line_id = 0; // kA17
    public $font_id = 0; // kA18

    public static function create($settings_string)
    {
        $instance = new Settings();

        $data = explode(",", $settings_string);
        $size = count($data);
        for ($i = 0; $i < $size; $i += 2) { 
            Settings::set_value($instance, $data[$i], $data[$i + 1]);
        }
        return $instance;
    }

    public static function set_value($ctx, $key, $value)
    {
        switch($key)
        {
            case GlobalVariables::AUDIO_TRACK:
                $ctx->audio_track = $value;
                break;
            case GlobalVariables::GAME_MODE:
                $ctx->starting_mode = $value;
                break;
            case GlobalVariables::MINI_MODE:
                $ctx->mini_mode = $value;
                break;
            case GlobalVariables::SPEED:
                $ctx->starting_speed = $value;
                break;
            case GlobalVariables::BACKGROUND_ID:
                $ctx->background_id = $value;
                break;
            case GlobalVariables::GROUND_ID:
                $ctx->dual_mode = $value;
                break;
            case GlobalVariables::DUAL_MODE:
                $ctx->dual_mode = $value;
                break;
            case GlobalVariables::USES_START_POS:
                $ctx->using_start_pos = $value;
                break;
            case GlobalVariables::TWO_PLAYER:
                $ctx->two_player = $value;
                break;
            case GlobalVariables::FLIP_GRAVITY:
                $ctx->gravity_flipped = $value;
                break;
            case GlobalVariables::SONG_OFFSET:
                $ctx->song_offset = $value;
                break;
            case GlobalVariables::GUIDELINES:
                $ctx->guidelines = $value;
                break;
            case GlobalVariables::FADE_IN:
                $ctx->fade_in = $value;
                break;
            case GlobalVariables::FADE_OUT:
                $ctx->fade_out = $value;
                break;
            case GlobalVariables::GROUND_LINE_ID:
                $ctx->ground_line_id = $value;
                break;
            case GlobalVariables::FONT_ID:
                $ctx->font_id = $value;
                break;
        }
    }
}