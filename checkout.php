<?php
const APPLY_DISCOUNT_A = 3;
const APPLY_DISCOUNT_B = 2;
const APPLY_DISCOUNT_C_1 = 3;
const APPLY_DISCOUNT_C_2 = 2;
const C_DISCOUNT_PRICE_1 = 50;
const C_DISCOUNT_PRICE_2 = 38;
const A_DISCOUNT_PRICE = 130;
const B_DISCOUNT_PRICE = 45;
const D_DISCOUNT_PRICE = 15;
$price = ['A'=>50, 'B'=>30, 'C'=>20, 'D'=>15, 'E'=>5];

$cart=[
    'A'=>2,
    'B'=>1,
    'C'=>2,
    'D'=>1
];
$total =0;
$display=[];


foreach($cart as $key => $value){
    if('A'===$key){
        $itemsWithDiscount = round($value/APPLY_DISCOUNT_A);
        $itemsWithNoDiscount = $value % APPLY_DISCOUNT_A;
        $a_total = $itemsWithDiscount * A_DISCOUNT_PRICE + $itemsWithNoDiscount * $price[$key];
        $display[$key]=$a_total;
    }
    if('B'===$key){
        $itemsWithDiscount = round($value/APPLY_DISCOUNT_B);
        $itemsWithNoDiscount = $value % APPLY_DISCOUNT_B;
        $b_total = $itemsWithDiscount * B_DISCOUNT_PRICE + $itemsWithNoDiscount * $price[$key];
        $display[$key]=$b_total;
    }
    if('C'===$key){
        $itemsWithDiscount = intdiv($value,APPLY_DISCOUNT_C_1);
        $itemsWithNoDiscount = $value % APPLY_DISCOUNT_C_1;
        $atotal = $itemsWithDiscount * C_DISCOUNT_PRICE_1;

        if($itemsWithNoDiscount === 2){
            $itemsWithDiscount2 = round($itemsWithNoDiscount/APPLY_DISCOUNT_C_2);
            $itemsWithNoDiscount2= $itemsWithDiscount % APPLY_DISCOUNT_C_2;
            $atotal2 = $itemsWithDiscount2 * C_DISCOUNT_PRICE_2;
        }
        else{
            $atotal2 = $itemsWithNoDiscount * $price[$key];
        }
    }
    if('D'===$key){
        
        if(isset($cart['A']) && $cart['A']>= $value){
            $dtotal = $value * D_DISCOUNT_PRICE;
        }
    $display[$key] = $atotal;
    }

}
echo array_sum(array_values($display));
