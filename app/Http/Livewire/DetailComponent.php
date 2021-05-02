<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use  App\Models;
use Cart;

class DetailComponent extends Component
{
    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item Added In Cart');
        return redirect()->route('product.cart');

    }
    public function render()
    {
        $product = Product::where('slug',$this->slug)->first();
        $popular_product= Product::inRandomOrder()->limit(4)->get();
        $releted_product=Product::where('category_id',$product->category_id)->inRandomOrder()->limit(5)->get();
        return view('livewire.detail-component',['product'=>$product,'popular_product'=>$popular_product,'releted_product'=>$releted_product])->layout('layouts.base');
    }
}
