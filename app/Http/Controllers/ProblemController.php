<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProblemController extends Controller
{
    
    
    public function solutions($id){
        
        # Indexed Array --> Two Ways for decleartions 
        $cars = array("Volvo","BMW", "Toyota", "Honda", "Mercedes", "Opel", "Land rover", "Saab");
       
        // $cars[0] = "Volvo2";
        // $cars[1] = "BMW";
        // $cars[2] = "Toyota";

        # Print Array -->
        // for($i= 0; $i < count($cars); $i++){
        //     // echo $cars[$i];
        //     // echo "<br>";
        // }

        // $sort = sort($cars); // Return true for ascending
        // $rsort = rsort($cars); // Return true for reverse 
                
        // dd($rsort);


        # Associative Array -->
        $age = array("A" => 10, "b" =>5, "D"=>18, "c"=> 15, "E"=> 50);

        // asort($age); // Return ASC Values
        // ksort($age); // Return ASC Keys
        // arsort($age); // Values DESC 
        // krsort($age); // Keys DESC
        
        // dd($age);

        // foreach($age as $k => $v){
        //     // echo "Key: " .$k. " Value: ". $v."<br>";
        // }


        # Multidimentional Array -->
        $cars2 = [
            ["E", 22, 18],
            ["a", 6, 22],
            ["D", 4, 9],
            ["A", 11, 8]
        ];

        // dd(count($cars2));
        // for($row=0; $row< 4; $row++){
        //     echo "<p> Row Number $row </p><ul>";
        //     for($col=0; $col<3; $col++){
        //         echo "<li>".$cars2[$row][$col]. "</li>";
        //     }
        //     echo "</ul>";
        // }

        # Array Functions -->

        $array_change_key_case = array_change_key_case($age, CASE_UPPER); // Default CASE_LOWER
       
        $array_chunk = array_chunk($cars,3); // default false;
        
        $array_chunk = array_chunk($age, 3, true); // Reindex as default:false

        $arrColValue = [
            ['id' => 1022, 'name' => 'Abir', 'gender' => 'F'],
            ['id' => 2541, 'name' => 'fake', 'gender' => 'M'],
            ['id' => 8596, 'name' => 'tuppa', 'gender' => 'F'],
            ['id' => 258, 'name' => 'nop', 'gender' => 'M'],
            ['id' => 585, 'name' => 'Bon', 'gender' => 'F']
        ];

        // $array_column = array_column($arrColValue,'name','id'); // return ID and Name
        // $array_column = array_column($arrColValue,null,'id'); // return ID with full array
        // $array_column = array_column($arrColValue,'name', null); // return ID and Name
      
        $fname=array("Peter","Ben","Joe");
        $age=array("35","37","43");
        
        $a=array("A","Cat","Dog","A","Dog");
        // $array_combine = array_combine($fname, $age); // should be equal number elements

        $array_count_values = array_count_values($a); // return value->count();

        $a4 = [ "a" => "red", "b" => "green", "c"=> "blue", "f" => "yellow", "h" => "white", "k" => "diff"];
        $a5 = [ "a" => "red", "c" => "green", "b"=> "blue", "g" => "black", "i" => "white", "k" => "diff1" ];

        // $array = array_diff($a4, $a5);                                // [yellow, diff] --> Searching value
        // $array = array_diff_key($a4, $a5);                              // [yellow, white] --> Searching key
        // $array = array_diff_uassoc($a4, $a5, 'self::arrayFunction'); // [green, blue, yellow, white, diff] -->checked key+val
        // $array = array_diff_ukey($a4, $a5, 'self::arrayFunction');  // [yellow, white] --> searching key
        
        // $array = array_fill(2,5,"blue"); // index=2,Ele=5, val=blue 
        // $array = array_fill(2,5,["blue", "Black"]); // index=2; Ele=5; val=[];
        // $array = array_fill_keys(["a", "b", "c"], "blue"); // key[], value 
        // $array = array_fill_keys(["a", "b", "c"], ["blue", "black"]); // Key[], val=[]
        
        // $array = array_filter([1,2,3,4], 'self::testOdd'); // 0=>1, 2=>3
        // $array = array_filter([1,2,3,4], 'self::testOdd', ARRAY_FILTER_USE_KEY ); // 1=>2, 3=>4
        // $array = array_filter([1,2,3,4], 'self::testOdd', ARRAY_FILTER_USE_BOTH ); // 0=>1, 2=>3
        
        // $array = array_flip($a4); // reverse [value=>key] red=>a, green=>b ...
       
        // $array = array_intersect($a4, $a5); // [red, green, blue, white]
        
        // $array = array_intersect($a4,$a5); // [red, green, blue, white]
        // $array = array_intersect_assoc($a4, $a5); // [a=>red]
        // $array = array_intersect_key($a4, $a5); // [red, green, blue, diff]
        // $array = array_intersect_uassoc($a4, $a5, 'self::arrayFunction'); // [red]
        // $array = array_intersect_ukey($a4, $a5, 'self::arrayFunction'); // [red, green, blue, diff]
        
        // $array = array_key_exists("red", $a4); // true/ false return

        // $array = array_keys($a4); // [key=>key]

        // $array= array_map('self::arrayMap',$a4, $a5); // checked Value-->

        // $array= array_merge($a4, $a5);
        # Results ---> 
        // "a" => "red"
        // "b" => "blue"
        // "c" => "green"
        // "f" => "yellow"
        // "h" => "white"
        // "k" => "diff1"
        // "g" => "black"
        // "i" => "white"
       
        // $array= array_merge_recursive($a4, $a5); // save key []
        # Results -->
        // "a" => array:2 [▶]
        // "b" => array:2 [▶]
        // "c" => array:2 [▶]
        // "f" => "yellow"
        // "h" => "white"
        // "k" => array:2 [▶]
        // "g" => "black"
        // "i" => "white"
        
        
        // $a=array("Dog","Cat","Horse");
        // $array = array_multisort($a);
        // print_r($a4); echo "<br>"; print_r($a5);
        
        // $array = array_pad($a, 5, "blue"); // return 5 elements
        // $array = array_pop($a);
        // $array = array_pop($a);

        // $a = [5,5,1,2];
        // print_r($a);
        // $array = array_product($a); // multiply 
        // $array = array_push($a, "test1", "B2");
        // $array = array_rand($a, 3);

        // $array = array_reduce($a, 'self::arrReduce');
        
        // $a1=array("red","green");
        // $a2=array("blue","yellow");
        
        // $array = array_replace($a1,$a2);

        $a1 = [
            "a"=> ["red", "b" => ["green", "blue"]]
        ];
        $a2 = [
            "a"=> ["Yellow", "b" => ["black"]]
        ];

        print_r($a1); echo "<br>"; print_r($a2);
        $array = array_replace_recursive($a1, $a2); // a=> [], b=> []
        
        dd($array);
    }

    public function arrReduce($v1, $v2){
        return $v1. "-". $v2;
    }
    public function arrayMap($v1, $v2){
        if($v1 === $v2){
            return "Same: ". $v1;
        }
        return "different";
        # Results -->
        // 0 => "Same: red"
        // 1 => "Same: green"
        // 2 => "Same: blue"
        // 3 => "different"
        // 4 => "Same: white"
        // 5 => "different"
    }


    public function testOdd($a){
        return ($a & 1);
    }

    public function arrayFunction($a, $b){

        if($a === $b){
            return 0;
        }

        return ($a>$b) ? 1 : -1;
    }


    public function solutions_3($id){
        
        $people = [
            ['name' => 'John Doe', 'email' => 'j@gmail.com', 'age' => 42],
            ['name' => 'Mohn Doe', 'email' => 'm@gmail.com', 'age' => 50]
        ];

        // $output = array_fill_keys(array_column($people, "email"), $people);
        $email = array_column($people, 'email');

        $output = array_fill_keys($people, $email);
        
        dd($email);
    }

    
    public function solutions_2($id){
        
        $people = [
            ['name' => 'John Doe', 'email' => 'j@gmail.com', 'age' => 42],
            ['name' => 'Mohn Doe', 'email' => 'm@gmail.com', 'age' => 50]
        ];

        $output = array_column($people, null, "email");
        
        dd($output);
    }
    
    public function solutions_1($id){
        
        \Log::info("Req=ProblemController@problem Called");

        $people = [
            ['name' => 'John Doe', 'email' => 'j@gmail.com', 'age' => 42],
            ['name' => 'Mohn Doe', 'email' => 'm@gmail.com', 'age' => 50]
        ];

        $full_array= [];
        $email = [];
       
        foreach($people as $key => $p){
            $full_array[] = $p;
        }
        
        foreach($full_array as $k => $v){
            $email[] = $v['email'];
        }
        
        $array_map = array_map('self::output', $people, $email);
    
        dd($email);

    }

    function output($people, $email){

        return [$email => $people];
    }


}
