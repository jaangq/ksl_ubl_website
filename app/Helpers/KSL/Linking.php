<?php
namespace App\Helpers\KSL;

class Linking
{
    public static function linking($pages, $cat = '', $subcat = '', $subsubcat = '', $slug_title)
    {
      $link = url(str_slug($pages, '-').'/'.str_slug($cat, '-'));
      if ($pages == 'lessons' || $pages == 'Lessons') {
        if ($subcat) {
          $link .= '/'.str_slug($subcat, '-');
          if ($subsubcat) {
            $link .= '/'.str_slug($subsubcat, '-');
          }
        }
        $link .= '/'. str_slug($slug_title, '-');
      } else {
        $link = url(str_slug($pages, '-').'/'.str_slug($slug_title, '-'));
      }
      return $link;
    }
}

?>
