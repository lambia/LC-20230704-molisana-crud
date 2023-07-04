<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prodotti = config("products");

        foreach($prodotti as $prodotto) {
            $newProduct = new Product();
            $newProduct->title = $prodotto["titolo"];
            $newProduct->description = $prodotto["descrizione"];
            $newProduct->type = $prodotto["tipo"];
            $newProduct->image = $prodotto["src"];
            $newProduct->cooking_time = $prodotto["cottura"];
            $newProduct->weight = $prodotto["peso"];
            $newProduct->save();
        }
    }
}
