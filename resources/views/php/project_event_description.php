<?php

function length_of_description(string $word){
    if($word!=null && strlen($word)>0){
        $word_cut = explode('.', $word);
        $word= $word_cut[0].".";
    }
    return $word;
}