<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function increaseQuantity( $rowId )
    {

        $product=Cart::get($rowId);
        $qty=$product->qty + 1;
        Cart::update($rowId,$qty);
    }
    public function decreasingQuantity($rowId)
    {
        $product=Cart::get($rowId);
        $qty=$product->qty - 1;
        Cart::update($rowId,$qty);

    }
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        session()->flash('success_message',' Iterm Has been removed successfully' );
    }
    public function destroyAll()
    {
        Cart::destroy();
    }
    public function render()
    {
        return view('livewire.cart-component')->layout("layouts.base");
    }
}
