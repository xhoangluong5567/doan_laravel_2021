<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    $brandId = App\Models\Brand::pluck('id')->toArray();
    return [
        'name' => $faker->name,
        'images' => $faker->image(),
        'price' => $faker->numberBetween(100,500),
        'baohanh' => '12 tháng',
        'phukien' => 'Sạc - Cáp - Tai Nghe',
        'khuyenmai' => 'Dán cường lực 12 tháng',
        'tinhtrang' => 'Full Box',
        'desc' => 'Hàng Chính Hãng',
        'brand_id' => $faker -> randomElement($brandId),

    ];
});