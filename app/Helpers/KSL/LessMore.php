<?php
namespace App\Helpers\KSL;

class LessMore
{
    public static function showLessMore($text, $length = 50)
    {
      if (strlen($text) > $length) {
        $text = '<div class="lessmore-ts">'.substr($text, 0, $length).'</div><div class="lessmore-btn lessmore-more"><strong><br><i class="fas fa-ellipsis-h pr-1"></i><i class="fas fa-angle-down"></i></strong></div><div class="lessmore-t d-none">'.substr($text, $length).'</div><div class="lessmore-btn lessmore-less d-none"><strong><br><i class="fas fa-ellipsis-h pr-1"></i><i class="fas fa-angle-up"></i></strong></div>';
      }
      return $text;
    }
}

?>
