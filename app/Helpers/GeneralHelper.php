<?php
function inc_number(&$i = 0){
    $i++;
    return $i;
}

function get_image_product($product_id){
    $product = App\Models\Product::find($product_id);
    return $product->image;
}