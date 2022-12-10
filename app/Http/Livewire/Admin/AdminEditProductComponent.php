<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use illuminate\Support\Str;

class AdminEditProductComponent extends Component
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
    public $newimage;
    public $product_id;
    public $scategory_id;

    public $images;
    public $newimages;

    public function mount($product_slug)
    {
        $product = Product::where('slug', $product_slug)->first();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->s_description = $product->short_description;
        $this->description = $product->description;
        $this->reg_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->stock_status = $product->stock_status;
        $this->sku = $product->SKU;
        $this->qty = $product->quantity;
        $this->featured = $product->featured;
        $this->image = $product->image;
        $this->images = explode(",", $product->images);
        $this->category = $product->category_id;
        $this->product_id = $product->id;
        $this->scategory_id = $product->subcategory_id;
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
            'category' => 'required',
        ]);
        if($this->newimage)
        {
            $this->validateOnly($fields, [
                'newimage' => 'required|mimes:jpeg,jpg,png',
            ]);
        }
    }

    public function updateProduct()
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
            'category' => 'required',
        ]);
        if($this->newimage)
        {
            $this->validate([
                'newimage' => 'required|mimes:jpeg,jpg,png',
            ]);
        }

        $product = Product::find($this->product_id);
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

        if($this->newimage)
        {
            unlink('assets/images/products'.'/'.$product->image);
            $imagename = "product-".Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('products', $imagename);
            $product->image = $imagename;
        }

        if($this->newimages)
        {
            if($product->images)
            {
                $images = explode(",",$product->images);
                foreach($images as $image)
                {
                    if($image)
                    {
                        unlink('assets/images/products'.'/'.$image);
                    }
                }
            }

            $imagesname='';
            foreach($this->newimages as $key=>$image)
            {
                $imgName=Carbon::now()->timestamp. $key . '.' . $image->extension();
                $image->storeAs('products', $imgName);
                $imagesname = $imagesname . ',' .$imgName;
            }
            
        }

        $product->category_id = $this->category;
        if($this->scategory_id)
        {
            $product->subcategory_id = $this->scategory_id;
        }

        $product->save();

        session()->flash('success', 'Product Updated successfully');
    }

    public function changeSubcategory()
    {
        $this->scategory_id = 0;
    }

    public function render()
    {
        $categories = Category::all();
        $scategories = Subcategory::where('category_id', $this->category)->get();
        return view('livewire.admin.admin-edit-product-component', compact('categories','scategories'))->layout('layouts.base');
    }
}
