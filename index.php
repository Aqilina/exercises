<?php

//Šioms užduotims atlikti nereikalingas HTML karkasas;

//>> Viskas rašoma su PHP;
//>> Rekomenduojama išsivardumpinti originalius masyvus, o tada atskirai vardumpintis atlikus užduotį;

//----------------------------------------------------------------------------------------------------------------------
//1. Hurdle Jump
//$hurdles = masyvas su 5 skaičiais - rand(1, 10);
//$jump_height = rand(5, 12);
//---> function function_name ($array, $number)
//Funkcija turi patikrinti ar šuolio aukštis yra didesnis, nei kliūtys masyve.
//Jei šuolis didesnis, grąžiname true, kitu atveju false.




function generateArray($hurdle_count, $start, $finish)
{
    $hurdlesArr = [];
    for ($i = 0; $i < $hurdle_count; $i++) {
        $hurdle = rand($start,$finish);
        $hurdlesArr[] = $hurdle;
    }
    return $hurdlesArr;
}

//ATPRINTINAMAS MASYVAS
$hurdles = generateArray(5,1,10);
var_dump($hurdles);


//TIKRINAMA AR PERSOKO
$jump_height = rand(5,12);
function hurdle_jump ($array, $number) {

    foreach ($array as $hurdle) {
        if ($hurdle > $number) {
            return false;
        } else {
            return true;
        }
    }
}
var_dump(hurdle_jump ($hurdles, $jump_height));

print '<br><br><br>';
//--------------------------------------------------------------------------------

//2.Largest swap
//$two_digit_num = rand(11, 99);
//---> function function_name ($number)
//Su funkcija patikrinkite iškritusio skaičiaus atvirkštinę reikšmę, ir jei ji didesnė - grąžins true.
//
//Pvz. jei skaičius 27, jo atvirkštinė reikšmė yra 72 → true.
//Jei iškrito lygus skaičius, pvz., 11 - taip pat grąžiname true.


$two_digit_num = rand(11, 99);

print $two_digit_num . '<br>';

function largest_swap($number)
{
    $int_to_string = strval($number);
    $reversed = strrev($int_to_string);
    print $reversed;

    return $reversed > $number || $reversed === $number;
}

var_dump(largest_swap($two_digit_num));

print '<br><br><br>';
//-------------------------------------------------------------------------------------------

//3.Sort array (using reference)
//$array = [80, 29, 4, -95, -24, 85, 1, 2, 10, 50, 5];

//---> function function_name (&$array)
//Funkcija išrikiuos masyvo skaičius nuo mažiausio iki didžiausio.
//Po funkcijos iškvietimo originalus masyvas turi būti pasikeitęs, t.y. išrikiuotas.

$arrayOriginal = [80, 29, 4, -95, -24, 85, 1, 2, 10, 50, 5];

function array_sorting(&$array)
{
    sort($array);
}

var_dump($arrayOriginal);
array_sorting($arrayOriginal);
var_dump($arrayOriginal);
print '<br><br><br>';
//--------------------------------------------------------------------------------------------

//4. Eliminate odd numbers (using reference)
//    $array = 6 x random skaičiai(1, 3000);
//---> function function_name (&$array)
//Funkcija iš masyvo pašalins visus nelyginius skaičius.
//Po funkcijos iškvietimo originalus masyvas turi būti pasikeitęs (jame turi būti tik lyginiai skaičiai).

function create_array_random ($numberOfIter, $start, $end)
{
    $array = [];
    for ($x = 0; $x < $numberOfIter; $x++) {
        $rand = rand($start, $end);
        $array[$x] = $rand; // !!!!!!!!!!!!!!!!!!!!!!!!!!!!
    }
    return $array;
}
$arrayRand = create_array_random (6, 1, 3000);


function eliminate_odds(&$array)
{
    foreach ($array as $key => &$value) { //!!!! kodel su array splice reikia &
        if ($value % 2 === 1) {
            unset($array[$key]);
            //ARBA
            array_splice($array, $key, 1);
        }
    }
    $array = array_values($array);
}
var_dump($arrayRand);
eliminate_odds($arrayRand);
var_dump($arrayRand);


print '<br><br><br>';
//--------------------------------------------------------------------------------------------

//5. Palindromes only (using reference)

//$numbers_array = [838, 121, 344, 555, 768, 878, 987, 345, 565];
//---> function function_name (&$array);
//Funkcija grąžins masyvą, tik su tais skaičiais, kurių atvirkštinė reikšmė yra tokia pati kaip originalaus skaičiaus.
//838 -> 838 ir t.t.
//Po funkcijos iškvietimo originalus masyvas turi būti pasikeitęs, t.y. tik su palindromais.

$numbers_array = [838, 121, 344, 555, 768, 878, 987, 345, 565];

function find_palindromes (&$array)
{
    foreach ($array as $key => $value) {
        $to_opposite = intval(strrev(strval($value)));
        var_dump($to_opposite);
        if ($to_opposite !== $value) {
            unset($array[$key]);
        }
        //ARBA SU SPLICE !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! pasiziurek
//        array_splice($array, array_search($array, $value), 1);
    }
}
find_palindromes($numbers_array);
var_dump($numbers_array);


print '<br><br><br>';
//--------------------------------------------------------------------------------------------

//6. Alternating caps (using reference)
//---> function function_name (&$string);
//pvz. 'mano batai buvo trys viens pasislepe gaidys' ->
//'MaNo BaTaI bUvO tRyS vIeNs PaSiSlEpE gAiDyS'
//
//Pirma stringo raidė turi būti didžioji, tada mažoji ir t.t., o tarpai nesiskaičiuoja, todėl padavus bet kokį sakinį
// raidės turi būti kapitalizuotos kaip pavyzdyje.
//Kitų simbolių nenaudojame.

$stringToAlt = 'mano batai buvo trys viens pasislepe gaidys';

function alternate_string(&$string)
{
    $capitalize = true;
    $newString = '';

    for($i = 0; $i < strlen($string); $i++){
        if (preg_match("/[a-z]/i", $string[$i])){
            if ($capitalize){
                $newString .= strtoupper($string[$i]);
                $capitalize = false;
            }else{
                $newString .= $string[$i];
                $capitalize = true;
            }
        }else{
            $newString .= $string[$i];
        }
    }
    $string = $newString;
}
alternate_string($stringToAlt);
var_dump($stringToAlt);




print '<br><br><br>';
//--------------------------------------------------------------------------------------------

//7. Sort descending (using reference)
//$high_num = rand(10000, 10000000);
//---> function function_name (&$integer);
//Funkcija iškritusį skaičių išrikiuos pagal skaitmenis nuo didžiausio iki mažiausio.
//Pvz. 864390 -> 987430
//Po funkcijos iškvietimo, skaičius turi būti pasikeitęs - t.y. išrikiuotas integeris.






print '<br><br><br>';
//--------------------------------------------------------------------------------------------

//8. Sum of missing numbers

//1st example - $numbers = [1, 3, 5, 7, 10];
//2nd example - $numbers2 = [10, 20, 30, 40, 50, 60];
//---> function function_name ($array);
//Parašykite funkciją, kuri sudės visus trūkstamus skaičius ir grąžins jų sumą.
//Pvz. $numbers masyvo trūkstami skaičiai yra 2, 3, 6, 8 ir 9.








print '<br><br><br>';
//--------------------------------------------------------------------------------------------

//9. Multiply string characters

//Parašykite funkciją, kuriai galima paduoti stringą ir skaičių.
//Skaičius nurodys, kiek kartų padauginti stringo elementą.
//Pvz. random_function(‘labas’, 2) -> llaabbaass





print '<br><br><br>';
//--------------------------------------------------------------------------------------------
//10. Palindrome strings (using reference)
//
//    $strings_array = ['smaukst', 'abba', 'gorgonzola', 'sedek uzu kedes'];
//---> function function_name (&$array);
//Funkcija grąžins masyvą, tik su tais stringais, kurių atvirkštinė reikšmė yra tokia pati kaip originalaus stringo.
//'abba' -> 'abba'
//Po funkcijos iškvietimo originalus masyvas turi būti pasikeitęs, t.y. tik su palindromais.







print '<br><br><br>';
//--------------------------------------------------------------------------------------------