<?php
namespace App\Helpers\KSL;

class Alerts
{
    public static function makesAlert($text, $type, $strongText)
    {
      if (
        ($text !== '') && ($type === 'primary' || $type === 'secondary' || $type === 'danger' || $type === 'warning' || $type === 'info' || $type === 'light' || $type === 'dark' || $type === 'success')
      ) {
        $text = "<p class='alert alert-".$type."'><strong>".$strongText."</strong>. ".$text."</p>";
      }
      return $text;
    }
}

?>
