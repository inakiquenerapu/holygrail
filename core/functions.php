<?php

  # THIS FUNCTION
  # Replaces FIRST or LAST occurence of a string in a string
  # fo = first occurrence | lo = last occurrence

  function str_replace_plus($fl,$search,$replace,$text) {
    $pos=($fl=="lo"?strrpos($text,(string)$search):strpos($text,(string)$search));
    if($pos!==false) {
      $text=substr_replace($text,$replace,$pos,strlen($search));
    }
    return $text;
    }

?>