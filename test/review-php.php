<?php

// Others: 
// strlen($string) = Getting the length of the string
// count($array) = Counting the length of array
// define("constVar", "This is a Constant variable.");

// Access Modifiers:
// Public = Everyone can access the methods & and properties 
// Private = Only inside the class can access the methods & properties
// Protected = Only inside the class and the class that inherits it can access the methods & properties

// Arithmetic Operators:
// Addition (+)
// Subtraction (-)
// Multiplication (*)
// Division (/)
// Modulus (%)
// Increment (++)
// Decrement (--)

// Assignment Operators:
// Addition (x+=y)
// Subtraction (x-=y)
// Multiplication (x*=y)
// Division (x/=y)
// Modulus (x%=y)

// Comparison Operators:
// Equal (==)
// Identical (===)
// Not Equal (!=)
// Not Equal (<>)
// Not Identical (!==)
// Greater Than (>)
// Less Than (<)
// Greater Than or Equal to (>=)
// Less Than or Equal to (<=)

// Logical Operators:
// And (and)
// Or (or)
// Xor (xor)
// And (&&)
// Or (||)
// Not (!)

// Indexed Array:
// $names = array("David", "Amy", "John");

// Associative Array:
// $people = array("David"=>"27", "Amy"=>"21", "John"=>"42");

// Multi-dimensional Array:
// $people = array(
// 'online'=>array('David', 'Amy'),
// 'offline'=>array('John', 'Rob', 'Jack'),
// 'away'=>array('Arthur', 'Daniel')
// );


// If else if statement:
// if (condition) {
//     code to be executed if condition is true;
//   } elseif (condition) {
//     code to be executed if condition is true;
//   } else {
//      code to be executed if condition is false;
//   }

// While Loop: 
// while (condition is true) {
//     code to be executed;
//  }

// Do While Loop:
// do {
//     code to be executed;
//   } while (condition is true);

// For Loop:
// for (init; condition; increment) {
//     code to be executed;
//  }

// Foreach Loop:
// foreach (array as $value) {
//    code to be executed;
// }
// foreach (array as $key => $value) {
//     code to be executed;
// }

// Switch Statement:
// switch (n) {
//     case value1:
//       code to be executed if n=value1
//       break;
//     case value2:
//        code to be executed if n=value2
//        break;
//     default:
//       code to be executed if n is different from all labels
//   }

// Break Statement:
// The break statement is used to exit a loop prematurely.
// When encountered, it causes the loop to terminate immediately, and the program continues executing the code after the loop.
// It's commonly used when a specific condition is met, and you want to exit the loop early.
// Example:
// for ($i = 0; $i < 10; $i++) {
//     if ($i === 5) {
//         break; 
//     }
//     echo $i . ' ';
// }

// Continue Statement:
// The continue statement is used to skip the remaining code within a loop for the current iteration.
// When encountered, it immediately moves to the next iteration of the loop.
// It's commonly used when you want to skip executing certain code for specific iterations but continue with the next iteration.
// Example:
// for ($i = 0; $i < 10; $i++) {
//     if ($i % 2 === 0) {
//         continue; // Skip even numbers
//     }
//     echo $i . ' ';
// }

// Others:
// $string = "qwerpotiopzuxcn,bmasz;lcvbopqw[perof";
// $vowels = array("a", "e", "o", "i", "u");
// $vowelsCount = 0;
// for ($i = 0; $i < strlen($string); $i++) {
//     foreach ($vowels as $value) {
//         if ($string[$i] == $value) {
//             $vowelsCount++;
//         } 
//     }
// }
// echo "Vowels Count: " . $vowelsCount;

// class Person {
//     private $name;
//     private $course;
//     private $age;

//     public function __construct($name, $course, $age) {
//         $this->name = $name;
//         $this->course = $course;
//         $this->age = $age;
//     }

//     public function setName($name) {
//         $this->name = $name;
//     }

//     public function getName() {
//         return $this->name;
//     }

// }
// $person = new Person("Cyrus Cantero", "BS Information System", 21);
// echo $person->getName();

// $person = array (
//     "Cyrus" => 21,
//     "Paolo" => 22,
//     "Bai" => 22,
//     "Christian" => 30,
//     "Jose" => 50,
//     "Juan" => 50
// );
// foreach ($person as $key => $value) {
//     for ($i = 0; $i < count($value); $i++) {
//         echo "$key => $value[$i] \n";
//     }
// }
// print_r($person);


// $numbers = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
// $evenNumbers = array();
// $oddNumbers = array();
// foreach ($numbers as $value) {
//     if ($value % 2 === 0) {
//         array_push($evenNumbers, $value);
//     } else {
//         array_push($oddNumbers, $value);
//     }
// }
// print_r($evenNumbers);