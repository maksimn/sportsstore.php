<?php
   class HtmlHelper {
      private $paginginfo;
      public function show_page_links($paginginfo, $scriptname) {
         $this->paginginfo = $paginginfo;
         $n = $this->paginginfo->total_pages;
         $curr_page = $this->paginginfo->current_page; 
         for($i = 1; $i <= $n; $i++) {
            if($i == $curr_page) {
               echo '<b>' . $i . '</b>';
            } 
            else {
               echo '<a href="' . $scriptname . '?page=' . $i . '">' . $i . '</a>';
            }
         }
      }
   }
?>
