<?php
   class HtmlHelper {
      public function show_page_links($paginginfo, $scriptname) {
         $n = $paginginfo->total_pages;
         $curr_page = $paginginfo->current_page; 
         for($i = 1; $i <= $n; $i++) {
            if($i == $curr_page) {
               echo '<a class="selected" href="' . $scriptname . '?page=' . $i . '">' . $i . '</a>';
            } 
            else {
               echo '<a href="' . $scriptname . '?page=' . $i . '">' . $i . '</a>';
            }
         }
      }
   }
?>
