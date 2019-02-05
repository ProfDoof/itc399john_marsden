<?php

/** @test
    @score  0 */
function compiles() { 
    global $files;
    global $cflags;
    $sourcecode = file_get_contents($files[0]);
    return compile_hide_feedback("g++ $cflags -I. $files[0] -o prog");
//      &&   source_excludes_for_loop()
//      &&   source_contains_while_loop();
}

/** @test
    @score  0.20 
    @prereq compiles */
function base() { 
    // One value
    return run_and_check("6\n0\n","Positive","Equal")
       &&  run_and_check("6\n0\n","Positive","Negative")
       &&  run_and_check("-11\n0\n","Negative","Positive")
       &&  run_and_check("-11\n0\n","Negative","Equal"); 
}

/** @test
    @score  0.20 
    @prereq base */
function sample() { 
    // Sample cases shown in problem statement
    return run_and_check("2\n-35\n70\n0\n","Positive","Negative")
       &&  run_and_check("2\n-35\n70\n0\n","Positive","Equal")
       &&  run_and_check("0\n","Equal","Positive")
       &&  run_and_check("0\n","Equal","Negative")
       &&  run_and_check("-3\n-10\n-5\n0\n","Negative","Positive")
       &&  run_and_check("-3\n-10\n-5\n0\n","Negative","Equal"); 
}

/** @test
    @score  0.30
    @prereq sample */
function five() { 
    // Five numbers (so never equal)
    return run_and_check("11\n-18\n-14\n15\n19\n0\n","Positive","Negative")
       &&  run_and_check("14\n2\n7\n-8\n13\n0\n","Positive","Negative")
       &&  run_and_check("-16\n-1\n1\n-8\n5\n0\n","Negative","Positive")
       &&  run_and_check("-20\n14\n17\n7\n-9\n0\n","Positive","Negative")
       &&  run_and_check("14\n19\n-18\n-7\n-9\n0\n","Negative","Positive")
       &&  run_and_check("-9\n-11\n6\n-20\n-9\n0\n","Negative","Positive")
       &&  run_and_check("11\n9\n4\n17\n1\n0\n","Positive","Negative")
       &&  run_and_check("14\n10\n-200\n9\n3\n0\n","Positive","Negative")
       &&  run_and_check("5\n-5\n-17\n-6\n17\n0\n","Negative","Positive");
}

/** @test
    @score  0.30 
    @prereq five */
function more() { 
    return run_and_check("12\n8\n-16\n-20\n13\n3\n19\n-9\n-3\n-1\n0\n","Equal","Positive")
       &&  run_and_check("12\n8\n-16\n-20\n13\n3\n19\n-9\n-3\n-1\n0\n","Equal","Negative")
       &&  run_and_check("13\n6\n-5\n-13\n-4\n13\n14\n13\n-16\n-7\n0\n","Equal","")
       &&  run_and_check("-11\n19\n18\n-20\n12\n-15\n13\n15\n-12\n2\n0\n","Positive","")
       &&  run_and_check("-9\n12\n-13\n3\n4\n11\n-4\n-19\n-11\n0\n","Negative","")
       &&  run_and_check("-3\n11\n18\n5\n10\n2\n19\n2\n-4\n12\n0\n","Positive","")
       &&  run_and_check("-14\n-8\n18\n-9\n2\n-4\n13\n-8\n10\n-13\n0\n","Negative","")
       &&  run_and_check("1\n-9\n18\n-13\n3\n10\n17\n-9\n8\n-9\n0\n","Positive","")
       &&  run_and_check("-13\n-12\n-13\n6\n-6\n-18\n-9\n12\n-6\n-12\n0\n","Negative","")
       &&  run_and_check("-10\n3\n-11\n20\n-3\n7\n-10\n17\n-5\n17\n0\n","Equal",""); 
}

include 'scoring_functions.php';
include 'auto_score.php';



