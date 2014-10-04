<?php
   class HtmlHelper {
      private $paginginfo;
      public function set_paginginfo($paginginfo) {
         $this->paginginfo = $paginginfo;
      }
      public function show_page_links($scriptname) {
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
