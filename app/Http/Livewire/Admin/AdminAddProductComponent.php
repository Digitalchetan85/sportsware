<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $s_description;
    public $description;
    public $reg_price;
    public $sale_price;
    public $stock_status;
    public $sku;
    public $qty;
    public $featured;
    public $image;
    public $category;
    public $images;
    public $scategory_id;


    public function mount()
    {
        $this->stock_status = 'instock';
        $this->featured = 0;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required',
            's_description' => 'required',
            'description' => 'required',
            'reg_price' => 'required',
            'sale_price' => 'required',
            'stock_status' => 'required',
            'sku' => 'required',
            'qty' => 'required',
            'featured' => 'required',
            'image' => 'required',
            'category' => 'required',
        ]);
    }

    public function addProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            's_description' => 'required',
            'description' => 'required',
            'reg_price' => 'required',
            'sale_price' => 'required',
            'stock_status' => 'required',
            'sku' => 'required',
            'qty' => 'required',
            'featured' => 'required',
            'image' => 'required',
            'category' => 'required',
        ]);

        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->s_description;
        $product->description = $this->description;
        $product->regular_price = $this->reg_price;
        $product->sale_price = $this->sale_price;
        $product->stock_status = $this->stock_status;
        $product->sku = $this->sku;
        $product->quantity = $this->qty;
        $product->featured = $this->featured;


        // $imagename = "product-".Carbon::now()->timestamp.'.'.$this->image->extension();
        $imagename = "product-".Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('products', $imagename);
        $product->image = $imagename;
        if($this->images)
        {
            $imagesname = '';
            foreach($this->images as $key=>$image)
            {
                $imgName = Carbon::now()->timestamp. $key. '.' .$image->extension();
                $image->storeAs('products',$imgName);
                $imagesname = $imagesname . ',' . $imgName;
            }
            $product->images = $imagesname;
        }
        $product->category_id = $this->category;
        if($this->scategory_id)
        {
            $product->subcategory_id = $this->scategory_id;
        }
        $product->save();

        session()->flash('success', 'Product added successfully');
    }

    public function changeSubcategory()
    {
        $this->scategory_id = 0;
    }

    public function render()
    {

        $categories = Category::all();
        $scategories = Subcategory::where('category_id', $this->category)->get();
        return view('livewire.admin.admin-add-product-component',compact('categories','scategories'))->layout('layouts.base');
    }
}
