<?php
namespace App\Helpers\KSL;

class NavLessons
{
    public static function navlessons($seg1 = "", $seg2 = "", $seg3 = "", $seg4 = "")
    {
      if ($seg4){
        $link =
        '<li><a href="/">Home</a></li>
        <li class="chevron"><i class="fas fa-chevron-right"></i></li>
        <li><a href="'.url('lessons').'">Lessons</a></li>
        <li class="chevron"><i class="fas fa-chevron-right"></i></li>
        <li><a href="'.url('lessons/'.$seg1.'#'.$seg2).'">'.$seg1.'</a></li>
        <li class="chevron"><i class="fas fa-chevron-right"></i></li>
        <li><a href="'.url('lessons/'.$seg1.'#'.$seg3).'">'.$seg2.'</a></li>
        <li class="chevron"><i class="fas fa-chevron-right"></i></li>
        <li><a href="'.url('lessons/'.$seg1.'#'.$seg4).'">'.$seg3.'</a></li>
        <li class="chevron"><i class="fas fa-chevron-right"></i></li>
        <li><a href="'.url('lessons/'.$seg1.'/'.$seg2.'/'.$seg3.'/'.$seg4).'">'.$seg4.'</a></li>';
      } else if ($seg3) {
        $link =
        '<li><a href="/">Home</a></li>
        <li class="chevron"><i class="fas fa-chevron-right"></i></li>
        <li><a href="'.url('lessons').'">Lessons</a></li>
        <li class="chevron"><i class="fas fa-chevron-right"></i></li>
        <li><a href="'.url('lessons/'.$seg1.'#'.$seg2).'">'.$seg1.'</a></li>
        <li class="chevron"><i class="fas fa-chevron-right"></i></li>
        <li><a href="'.url('lessons/'.$seg1.'#'.$seg3).'">'.$seg2.'</a></li>
        <li class="chevron"><i class="fas fa-chevron-right"></i></li>
        <li><a href="'.url('lessons/'.$seg1.'/'.$seg2.'/'.$seg3).'">'.$seg3.'</a></li>';
      } else if($seg2) {
        $link =
        '<li><a href="/">Home</a></li>
        <li class="chevron"><i class="fas fa-chevron-right"></i></li>
        <li><a href="'.url('lessons').'">Lessons</a></li>
        <li class="chevron"><i class="fas fa-chevron-right"></i></li>
        <li><a href="'.url('lessons/'.$seg1.'#'.$seg2).'">'.$seg1.'</a></li>
        <li class="chevron"><i class="fas fa-chevron-right"></i></li>
        <li><a href="'.url('lessons/'.$seg1.'/'.$seg2).'">'.$seg2.'</a></li>';
      }
      return $link;
    }
}

?>
