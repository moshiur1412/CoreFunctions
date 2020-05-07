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
        // $array = array_diff_uassoc($a4, $a5, 'self::diffFunction'); // [green, blue, yellow, white, diff] -->checked key+val
        $array = array_diff_ukey($a4, $a5, 'self::diffFunction');  // [yellow, white] --> searching key
        
        dd($array);
    }

    public function diffFunction($a, $b){

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
