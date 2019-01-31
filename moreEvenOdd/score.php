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
    return run_and_check("6\n0\n","Even","Equal")
       &&  run_and_check("6\n0\n","Even","Odd")
       &&  run_and_check("11\n0\n","Odd","Even")
       &&  run_and_check("11\n0\n","Odd","Equal");
}

/** @test
    @score  0.20
    @prereq base */
function sample() {
    // Sample cases shown in problem statement
    return run_and_check("17\n36\n10\n0\n","Even","Odd")
       &&  run_and_check("17\n36\n10\n0\n","Even","Equal")
       &&  run_and_check("0\n","Equal","Even")
       &&  run_and_check("0\n","Equal","Odd")
       &&  run_and_check("38\n15\n19\n0\n","Odd","Even")
       &&  run_and_check("38\n15\n19\n0\n","Odd","Equal");
}

/** @test
    @score  0.30
    @prereq sample */
function five() {
    // Five numbers (so never equal)
    return run_and_check("12\n-18\n14\n15\n19\n0\n","Even","Odd")
       &&  run_and_check("14\n2\n7\n8\n13\n0\n","Even","Odd")
       &&  run_and_check("16\n7\n1\n8\n5\n0\n","Odd","Even")
       &&  run_and_check("20\n14\n17\n7\n16\n0\n","Even","Odd")
       &&  run_and_check("14\n19\n18\n7\n9\n0\n","Odd","Even")
       &&  run_and_check("9\n11\n6\n20\n9\n0\n","Odd","Even")
       &&  run_and_check("11\n9\n4\n16\n2\n0\n","Even","Odd")
       &&  run_and_check("14\n10\n200\n9\n3\n0\n","Even","Odd")
       &&  run_and_check("5\n5\n17\n6\n17\n0\n","Odd","Even");
}

/** @test
    @score  0.30
    @prereq five */
function more() {
    return run_and_check("12\n8\n16\n20\n13\n3\n19\n9\n3\n2\n0\n","Equal","Even")
       &&  run_and_check("12\n8\n16\n20\n13\n3\n19\n9\n3\n2\n0\n","Equal","Odd")
       &&  run_and_check("13\n6\n5\n13\n4\n13\n14\n13\n16\n8\n0\n","Equal","")
       &&  run_and_check("11\n19\n18\n20\n12\n15\n13\n14\n12\n2\n0\n","Even","")
       &&  run_and_check("9\n12\n13\n3\n4\n11\n4\n19\n11\n0\n","Odd","")
       &&  run_and_check("3\n11\n18\n5\n10\n2\n19\n2\n4\n12\n0\n","Even","")
       &&  run_and_check("14\n8\n18\n9\n2\n4\n13\n8\n10\n13\n0\n","Even","")
       &&  run_and_check("1\n9\n18\n13\n3\n10\n17\n9\n8\n9\n0\n","Odd","")
       &&  run_and_c0heck("13\n129\n13\n6\n6\n18\n9\n15\n6\n13\n0\n","Odd","")
       &&  run_and_check("10\n3\n112\n20\n3\n7\n10\n17\n5\n14\n0\n","Equal","");
}

include 'scoring_functions.php';
include 'auto_score.php';
