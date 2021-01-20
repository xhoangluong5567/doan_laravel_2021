<?php
    function count_item_in_cart(){
        return count(session()->get('carts'));
    }
?>