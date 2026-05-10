<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductStocks;
use App\Models\ProductWithCategory;
use App\Models\Variation;
use Illuminate\Database\Seeder;

class PerfumeProductSeeder extends Seeder
{
    private Variation $sizeVariation;

    public function run(): void
    {
        $this->command->info('Creating Variations...');
        $this->seedVariations();

        $this->command->info('Creating Categories...');
        $cats = $this->seedCategories();

        $this->command->info('Creating Brands...');
        $brands = $this->seedBrands();

        $this->command->info('Downloading & creating Products...');
        $this->seedProducts($cats, $brands);

        $this->command->info('Done! 20 perfume products seeded.');
    }

    // ─── Variations ───────────────────────────────────────────────────────────

    private function seedVariations(): void
    {
        $this->sizeVariation = Variation::firstOrCreate(
            ['title' => 'Size'],
            ['bn_title' => 'সাইজ', 'is_active' => 1]
        );
    }

    // ─── Categories ───────────────────────────────────────────────────────────

    private function seedCategories(): array
    {
        $mens = Category::firstOrCreate(['title' => "Men's Perfume"], [
            'bn_title'                   => 'পুরুষের পারফিউম',
            'parent_id'                  => 0,
            'is_menu_active'             => 1,
            'menu_position'              => 1,
            'position'                   => 1,
            'is_featured'                => 1,
            'is_menu_item'               => 1,
            'publish_product_in_home_page' => 1,
            'is_active'                  => 1,
            'description'                => 'Premium fragrances crafted exclusively for men.',
        ]);

        $womens = Category::firstOrCreate(['title' => "Women's Perfume"], [
            'bn_title'                   => 'মহিলাদের পারফিউম',
            'parent_id'                  => 0,
            'is_menu_active'             => 1,
            'menu_position'              => 2,
            'position'                   => 2,
            'is_featured'                => 1,
            'is_menu_item'               => 1,
            'publish_product_in_home_page' => 1,
            'is_active'                  => 1,
            'description'                => 'Elegant fragrances crafted exclusively for women.',
        ]);

        $unisex = Category::firstOrCreate(['title' => 'Unisex Perfume'], [
            'bn_title'                   => 'ইউনিসেক্স পারফিউম',
            'parent_id'                  => 0,
            'is_menu_active'             => 1,
            'menu_position'              => 3,
            'position'                   => 3,
            'is_featured'                => 0,
            'is_menu_item'               => 1,
            'publish_product_in_home_page' => 1,
            'is_active'                  => 1,
            'description'                => 'Gender-neutral fragrances for everyone.',
        ]);

        // Sub-categories
        $woody = Category::firstOrCreate(['title' => 'Woody & Spicy'], [
            'bn_title'   => 'উডি ও স্পাইসি',
            'parent_id'  => $mens->id,
            'position'   => 1,
            'is_active'  => 1,
        ]);

        $fresh = Category::firstOrCreate(['title' => 'Fresh & Aquatic'], [
            'bn_title'   => 'ফ্রেশ ও অ্যাকোয়াটিক',
            'parent_id'  => $mens->id,
            'position'   => 2,
            'is_active'  => 1,
        ]);

        $oriental = Category::firstOrCreate(['title' => 'Oriental & Musky'], [
            'bn_title'   => 'ওরিয়েন্টাল ও মাস্কি',
            'parent_id'  => $mens->id,
            'position'   => 3,
            'is_active'  => 1,
        ]);

        $floral = Category::firstOrCreate(['title' => 'Floral'], [
            'bn_title'   => 'ফ্লোরাল',
            'parent_id'  => $womens->id,
            'position'   => 1,
            'is_active'  => 1,
        ]);

        $sweet = Category::firstOrCreate(['title' => 'Sweet & Fruity'], [
            'bn_title'   => 'সুইট ও ফ্রুটি',
            'parent_id'  => $womens->id,
            'position'   => 2,
            'is_active'  => 1,
        ]);

        return compact('mens', 'womens', 'unisex', 'woody', 'fresh', 'oriental', 'floral', 'sweet');
    }

    // ─── Brands ───────────────────────────────────────────────────────────────

    private function seedBrands(): array
    {
        $list = [
            'Chanel'         => ['bn_title' => 'শ্যানেল',        'image' => $this->downloadImage('https://picsum.photos/seed/chanel-brand/200/100',       'brand_chanel.jpg')],
            'Dior'           => ['bn_title' => 'ডিওর',           'image' => $this->downloadImage('https://picsum.photos/seed/dior-brand/200/100',         'brand_dior.jpg')],
            'Versace'        => ['bn_title' => 'ভার্সাচে',       'image' => $this->downloadImage('https://picsum.photos/seed/versace-brand/200/100',      'brand_versace.jpg')],
            'Giorgio Armani' => ['bn_title' => 'জর্জিও আর্মানি', 'image' => $this->downloadImage('https://picsum.photos/seed/armani-brand/200/100',       'brand_armani.jpg')],
            'Hugo Boss'      => ['bn_title' => 'হুগো বস',        'image' => $this->downloadImage('https://picsum.photos/seed/hugoboss-brand/200/100',     'brand_hugoboss.jpg')],
            'Calvin Klein'   => ['bn_title' => 'ক্যালভিন ক্লেইন', 'image' => $this->downloadImage('https://picsum.photos/seed/calvinklein-brand/200/100', 'brand_ck.jpg')],
            'Tom Ford'       => ['bn_title' => 'টম ফোর্ড',       'image' => $this->downloadImage('https://picsum.photos/seed/tomford-brand/200/100',      'brand_tomford.jpg')],
            'Jo Malone'      => ['bn_title' => 'জো মালোন',       'image' => $this->downloadImage('https://picsum.photos/seed/jomalone-brand/200/100',     'brand_jomalone.jpg')],
            'YSL'            => ['bn_title' => 'ওয়াইএসএল',      'image' => $this->downloadImage('https://picsum.photos/seed/ysl-brand/200/100',          'brand_ysl.jpg')],
            'Gucci'          => ['bn_title' => 'গুচি',           'image' => $this->downloadImage('https://picsum.photos/seed/gucci-brand/200/100',        'brand_gucci.jpg')],
        ];

        $brands = [];
        $pos = 1;
        foreach ($list as $title => $data) {
            $brands[$title] = Brand::firstOrCreate(['title' => $title], array_merge($data, [
                'position'    => $pos++,
                'is_featured' => 1,
                'is_active'   => 1,
                'description' => "Premium luxury fragrance house - {$title}.",
                'meta_title'  => "{$title} Perfumes | Buy Original {$title} Fragrances",
            ]));
        }

        return $brands;
    }

    // ─── Products ─────────────────────────────────────────────────────────────

    private function seedProducts(array $cats, array $brands): void
    {
        $sid = $this->sizeVariation->id;

        $products = [
            // ── MEN ──────────────────────────────────────────────────────────
            [
                'title'      => 'Dior Sauvage EDP',
                'bn_title'   => 'ডিওর সাভেজ ইডিপি',
                'brand'      => 'Dior',
                'category'   => 'mens',
                'sub_cat'    => 'fresh',
                'is_featured'=> 1,
                'is_tranding'=> 1,
                'todays_deal'=> 0,
                'feature'    => 'Fresh, woody & iconic. A raw and noble masculine fragrance.',
                'bn_feature' => 'তাজা, উডি ও আইকনিক – একটি কাঁচা ও মহৎ পুরুষালী সুগন্ধি।',
                'description'=> '<p>Dior Sauvage EDP is an intense, noble and wild masculine fragrance. Top notes of Bergamot open the scent, followed by Sichuan Pepper in the heart and Atlas Cedar at the base. This long-lasting fragrance embodies freedom and raw nature.</p><ul><li>Top Notes: Bergamot</li><li>Heart Notes: Sichuan Pepper, Lavender</li><li>Base Notes: Atlas Cedar, Ambroxan</li></ul>',
                'tags'       => 'dior,sauvage,mens perfume,woody,fresh,edp',
                'image_seed' => 'dior-sauvage',
                'price'      => 12500,
                'discount'   => ['type' => 'percentage', 'amount' => 10],
                'variants'   => [
                    ['30ml',  7500,  20],
                    ['60ml',  12500, 30],
                    ['100ml', 18500, 25],
                    ['200ml', 32000, 10],
                ],
            ],
            [
                'title'      => 'Versace Eros EDT',
                'bn_title'   => 'ভার্সাচে ইরোস ইডিটি',
                'brand'      => 'Versace',
                'category'   => 'mens',
                'sub_cat'    => 'oriental',
                'is_featured'=> 1,
                'is_tranding'=> 0,
                'todays_deal'=> 1,
                'feature'    => 'Bold, sensual and powerful. The fragrance of a god.',
                'bn_feature' => 'সাহসী, কামুক ও শক্তিশালী – একটি দেবতার সুগন্ধি।',
                'description'=> '<p>Versace Eros EDT is a bold and sensual fragrance for men, inspired by the Greek God of Love. Fresh mint and Italian lemon open the scent, followed by geranium, ambroxan and cedar.</p><ul><li>Top Notes: Fresh Mint, Italian Lemon, Green Apple</li><li>Heart Notes: Tonka Bean, Ambroxan, Geranium</li><li>Base Notes: Virginian Cedar, Vetiver, Oakmoss</li></ul>',
                'tags'       => 'versace,eros,mens perfume,oriental,bold,edt',
                'image_seed' => 'versace-eros',
                'price'      => 10500,
                'discount'   => ['type' => 'flat', 'amount' => 500],
                'variants'   => [
                    ['30ml',  6500,  25],
                    ['50ml',  10500, 35],
                    ['100ml', 17000, 20],
                ],
            ],
            [
                'title'      => 'Armani Acqua di Gio EDP',
                'bn_title'   => 'আর্মানি আকোয়া ডি জিও ইডিপি',
                'brand'      => 'Giorgio Armani',
                'category'   => 'mens',
                'sub_cat'    => 'fresh',
                'is_featured'=> 1,
                'is_tranding'=> 1,
                'todays_deal'=> 0,
                'feature'    => 'Aquatic, fresh and mineral. The scent of the Mediterranean sea.',
                'bn_feature' => 'অ্যাকোয়াটিক, তাজা ও মিনারেল – ভূমধ্যসাগরের সুগন্ধি।',
                'description'=> '<p>Armani Acqua di Gio EDP captures the essence of water, earth and sky. This iconic marine fragrance opens with bergamot and green mandarin, evolves into a heart of rosemary and guaiacwood, and settles on a warm base of patchouli and incense.</p><ul><li>Top Notes: Bergamot, Yuzu, Sage</li><li>Heart Notes: Marine Notes, Rosemary, Guaiacwood</li><li>Base Notes: Patchouli, Incense, Mineral Notes</li></ul>',
                'tags'       => 'armani,acqua di gio,mens perfume,aquatic,fresh,edp',
                'image_seed' => 'armani-acquadigio',
                'price'      => 13000,
                'discount'   => ['type' => 'percentage', 'amount' => 8],
                'variants'   => [
                    ['40ml',  8500,  20],
                    ['75ml',  13000, 30],
                    ['125ml', 19500, 15],
                ],
            ],
            [
                'title'      => 'Hugo Boss Bottled EDT',
                'bn_title'   => 'হুগো বস বটেলড ইডিটি',
                'brand'      => 'Hugo Boss',
                'category'   => 'mens',
                'sub_cat'    => 'woody',
                'is_featured'=> 0,
                'is_tranding'=> 1,
                'todays_deal'=> 0,
                'feature'    => 'Classic, refined and sophisticated. A timeless masculine icon.',
                'bn_feature' => 'ক্লাসিক, পরিশীলিত ও পরিশ্রুত – একটি কালজয়ী পুরুষালী আইকন।',
                'description'=> '<p>Hugo Boss Bottled EDT is the original masculine signature fragrance. An elegant blend of apple, cinnamon and sandalwood creates a confident, timeless scent for the modern man.</p><ul><li>Top Notes: Apple, Bergamot, Plum</li><li>Heart Notes: Cinnamon, Cloves, Mahogany Wood</li><li>Base Notes: Sandalwood, Cedar, Vetiver</li></ul>',
                'tags'       => 'hugo boss,bottled,mens perfume,woody,classic,edt',
                'image_seed' => 'hugoboss-bottled',
                'price'      => 9000,
                'discount'   => ['type' => 'no', 'amount' => 0],
                'variants'   => [
                    ['50ml',  9000,  40],
                    ['100ml', 15000, 30],
                    ['200ml', 25000, 10],
                ],
            ],
            [
                'title'      => 'Bleu de Chanel EDP',
                'bn_title'   => 'ব্লু ডি শ্যানেল ইডিপি',
                'brand'      => 'Chanel',
                'category'   => 'mens',
                'sub_cat'    => 'woody',
                'is_featured'=> 1,
                'is_tranding'=> 1,
                'todays_deal'=> 1,
                'feature'    => 'Sophisticated, vibrant and strong. The ultimate luxury mens fragrance.',
                'bn_feature' => 'পরিশীলিত, প্রাণবন্ত ও শক্তিশালী – আলটিমেট লাক্সারি পুরুষের সুগন্ধি।',
                'description'=> '<p>Bleu de Chanel EDP is a woody, aromatic fragrance for men that expresses total freedom. Citrus, incense and sandalwood combine with the signature freshness of Chanel to create a bold, unique and desirable scent.</p><ul><li>Top Notes: Citrus, Labdanum, Mint</li><li>Heart Notes: Incense, Jasmine, Ginger</li><li>Base Notes: Sandalwood, Patchouli, Vetiver</li></ul>',
                'tags'       => 'chanel,bleu de chanel,mens perfume,woody,luxury,edp',
                'image_seed' => 'bleu-de-chanel',
                'price'      => 22000,
                'discount'   => ['type' => 'percentage', 'amount' => 5],
                'variants'   => [
                    ['50ml',  22000, 15],
                    ['100ml', 36000, 20],
                    ['150ml', 48000, 8],
                ],
            ],
            [
                'title'      => 'YSL L\'Homme EDP',
                'bn_title'   => 'ওয়াইএসএল এল\'হোম ইডিপি',
                'brand'      => 'YSL',
                'category'   => 'mens',
                'sub_cat'    => 'fresh',
                'is_featured'=> 0,
                'is_tranding'=> 0,
                'todays_deal'=> 0,
                'feature'    => 'Elegant, virile and spicy. The epitome of masculine refinement.',
                'bn_feature' => 'মার্জিত, পৌরুষদীপ্ত ও মশলাদার – পুরুষালী পরিমার্জনার প্রতীক।',
                'description'=> '<p>YSL L\'Homme EDP is a refined and sensual scent for the modern man. Fresh ginger and basil open the fragrance, followed by a heart of Vetiver and cedar, and a warm base of benzoin and white musk.</p><ul><li>Top Notes: Ginger, Bergamot, Basil</li><li>Heart Notes: Sage, Vetiver, Cedar</li><li>Base Notes: Benzoin, White Musk, Tonka Bean</li></ul>',
                'tags'       => 'ysl,l homme,mens perfume,fresh,elegant,edp',
                'image_seed' => 'ysl-lhomme',
                'price'      => 14500,
                'discount'   => ['type' => 'flat', 'amount' => 1000],
                'variants'   => [
                    ['60ml',  14500, 25],
                    ['100ml', 21000, 20],
                ],
            ],
            [
                'title'      => 'Tom Ford Tobacco Vanille EDP',
                'bn_title'   => 'টম ফোর্ড টোব্যাকো ভ্যানিলে ইডিপি',
                'brand'      => 'Tom Ford',
                'category'   => 'mens',
                'sub_cat'    => 'woody',
                'is_featured'=> 1,
                'is_tranding'=> 0,
                'todays_deal'=> 0,
                'feature'    => 'Warm, rich and luxurious. A masterpiece of oriental tobacco and vanilla.',
                'bn_feature' => 'উষ্ণ, সমৃদ্ধ ও বিলাসবহুল – তামাক ও ভ্যানিলার একটি মাস্টারপিস।',
                'description'=> '<p>Tom Ford Tobacco Vanille is one of the most beloved fragrances from the Private Blend collection. A rich, warm oriental fragrance that blends tobacco leaf with sweet vanilla, cacao and dried fruits for an indulgent, cozy experience.</p><ul><li>Top Notes: Tobacco Leaf, Spices</li><li>Heart Notes: Tobacco Blossom, Jasmine, Cacao</li><li>Base Notes: Vanilla, Dried Fruits, Wood Sap</li></ul>',
                'tags'       => 'tom ford,tobacco vanille,mens perfume,woody,luxury,oriental,edp',
                'image_seed' => 'tomford-tobacco-vanille',
                'price'      => 38000,
                'discount'   => ['type' => 'no', 'amount' => 0],
                'variants'   => [
                    ['50ml',  38000, 10],
                    ['250ml', 135000, 5],
                ],
            ],
            [
                'title'      => 'Gucci Guilty Pour Homme EDT',
                'bn_title'   => 'গুচি গিলটি পুর হোম ইডিটি',
                'brand'      => 'Gucci',
                'category'   => 'mens',
                'sub_cat'    => 'woody',
                'is_featured'=> 0,
                'is_tranding'=> 1,
                'todays_deal'=> 0,
                'feature'    => 'Bold, daring and sensual. Fragrance for the man who breaks the rules.',
                'bn_feature' => 'সাহসী, দুঃসাহসী ও কামুক – নিয়ম ভাঙা পুরুষের সুগন্ধি।',
                'description'=> '<p>Gucci Guilty Pour Homme EDT is a powerful and seductive masculine fragrance. Lemon and lavender open the scent, followed by a heart of orange blossom and cedar, and a base of patchouli and sandalwood.</p><ul><li>Top Notes: Pink Pepper, Lemon</li><li>Heart Notes: Lavender, Orange Blossom, Cedar</li><li>Base Notes: Patchouli, Sandalwood</li></ul>',
                'tags'       => 'gucci,guilty,mens perfume,woody,bold,edt',
                'image_seed' => 'gucci-guilty-homme',
                'price'      => 11500,
                'discount'   => ['type' => 'percentage', 'amount' => 12],
                'variants'   => [
                    ['50ml',  11500, 30],
                    ['90ml',  18500, 20],
                ],
            ],
            [
                'title'      => 'Jo Malone Wood Sage & Sea Salt Cologne',
                'bn_title'   => 'জো মালোন উড সেজ ও সি সল্ট কোলন',
                'brand'      => 'Jo Malone',
                'category'   => 'unisex',
                'sub_cat'    => null,
                'is_featured'=> 1,
                'is_tranding'=> 0,
                'todays_deal'=> 0,
                'feature'    => 'Windswept, fresh and natural. The raw beauty of nature in a bottle.',
                'bn_feature' => 'বায়ু-ঝাড়া, তাজা ও প্রাকৃতিক – একটি বোতলে প্রকৃতির অদম্য সৌন্দর্য।',
                'description'=> '<p>Jo Malone Wood Sage & Sea Salt Cologne is a windswept, natural fragrance that evokes the raw beauty of cliffs and coastlines. Ambrette seeds mingle with sea salt in a cologne that is beautifully restrained and utterly compelling.</p><ul><li>Top Notes: Sea Salt</li><li>Heart Notes: Sage, Ambrette Seeds</li><li>Base Notes: Driftwood</li></ul>',
                'tags'       => 'jo malone,wood sage,sea salt,unisex perfume,fresh,cologne',
                'image_seed' => 'jomalone-woodsage',
                'price'      => 18000,
                'discount'   => ['type' => 'no', 'amount' => 0],
                'variants'   => [
                    ['30ml',  10500, 15],
                    ['100ml', 18000, 20],
                ],
            ],
            [
                'title'      => 'Calvin Klein Eternity for Men EDT',
                'bn_title'   => 'ক্যালভিন ক্লেইন ইটার্নিটি ফর মেন ইডিটি',
                'brand'      => 'Calvin Klein',
                'category'   => 'mens',
                'sub_cat'    => 'fresh',
                'is_featured'=> 0,
                'is_tranding'=> 0,
                'todays_deal'=> 0,
                'feature'    => 'Clean, fresh and timeless. The classic scent of eternity.',
                'bn_feature' => 'পরিষ্কার, তাজা ও কালজয়ী – অনন্তকালের ক্লাসিক সুগন্ধি।',
                'description'=> '<p>Calvin Klein Eternity for Men EDT is an elegant and sophisticated masculine fragrance. Fresh green botanicals and spices open the scent, with a heart of lavender and sandalwood, and a warm woody base.</p><ul><li>Top Notes: Mandarin, Sage, Basil, Lavender</li><li>Heart Notes: Lily of the Valley, Jasmine, Geranium</li><li>Base Notes: Sandalwood, Amber, Vetiver</li></ul>',
                'tags'       => 'calvin klein,eternity,mens perfume,fresh,classic,edt',
                'image_seed' => 'ck-eternity-men',
                'price'      => 8500,
                'discount'   => ['type' => 'percentage', 'amount' => 10],
                'variants'   => [
                    ['50ml',  8500,  35],
                    ['100ml', 13500, 25],
                    ['200ml', 22000, 10],
                ],
            ],

            // ── WOMEN ────────────────────────────────────────────────────────
            [
                'title'      => 'Chanel No. 5 EDP',
                'bn_title'   => 'শ্যানেল নং ৫ ইডিপি',
                'brand'      => 'Chanel',
                'category'   => 'womens',
                'sub_cat'    => 'floral',
                'is_featured'=> 1,
                'is_tranding'=> 1,
                'todays_deal'=> 1,
                'feature'    => 'The world\'s most iconic fragrance. Timeless elegance in a bottle.',
                'bn_feature' => 'বিশ্বের সবচেয়ে আইকনিক সুগন্ধি – একটি বোতলে কালজয়ী মার্জিততা।',
                'description'=> '<p>Chanel No. 5 EDP is the world\'s most famous fragrance and the ultimate symbol of femininity. A classic floral aldehyde fragrance that opened a new era of perfumery. Rose and jasmine combine with a rich woody base to create an unforgettable, timeless scent.</p><ul><li>Top Notes: Neroli, Aldehyde, Ylang-Ylang</li><li>Heart Notes: May Rose, Jasmine, Iris</li><li>Base Notes: Sandalwood, Vetiver, Vanilla, Amber</li></ul>',
                'tags'       => 'chanel,no 5,womens perfume,floral,iconic,luxury,edp',
                'image_seed' => 'chanel-no5',
                'price'      => 28000,
                'discount'   => ['type' => 'no', 'amount' => 0],
                'variants'   => [
                    ['35ml',  17000, 12],
                    ['50ml',  28000, 18],
                    ['100ml', 42000, 10],
                    ['200ml', 72000, 5],
                ],
            ],
            [
                'title'      => 'Dior Miss Dior Blooming Bouquet EDT',
                'bn_title'   => 'ডিওর মিস ডিওর ব্লুমিং বুকে ইডিটি',
                'brand'      => 'Dior',
                'category'   => 'womens',
                'sub_cat'    => 'floral',
                'is_featured'=> 1,
                'is_tranding'=> 1,
                'todays_deal'=> 0,
                'feature'    => 'Light, romantic and floral. A bouquet of the most beautiful flowers.',
                'bn_feature' => 'হালকা, রোমান্টিক ও ফ্লোরাল – সবচেয়ে সুন্দর ফুলের তোড়া।',
                'description'=> '<p>Dior Miss Dior Blooming Bouquet EDT is a light and playful floral fragrance that blooms with the freshness of peony and the sweetness of white musk. An irresistible, vibrant scent for the modern woman.</p><ul><li>Top Notes: Sicilian Mandarin, Peach</li><li>Heart Notes: Pink Peony, Rose</li><li>Base Notes: White Musk, Apricot Wood</li></ul>',
                'tags'       => 'dior,miss dior,womens perfume,floral,romantic,edt',
                'image_seed' => 'dior-missdior',
                'price'      => 16500,
                'discount'   => ['type' => 'percentage', 'amount' => 8],
                'variants'   => [
                    ['30ml',  10000, 20],
                    ['50ml',  16500, 25],
                    ['100ml', 24000, 15],
                ],
            ],
            [
                'title'      => 'YSL Black Opium EDP',
                'bn_title'   => 'ওয়াইএসএল ব্ল্যাক ওপিয়াম ইডিপি',
                'brand'      => 'YSL',
                'category'   => 'womens',
                'sub_cat'    => 'sweet',
                'is_featured'=> 1,
                'is_tranding'=> 1,
                'todays_deal'=> 1,
                'feature'    => 'Bold, sexy and addictive. The rock \'n\' roll fragrance for women.',
                'bn_feature' => 'সাহসী, সেক্সি ও আসক্তিমূলক – মহিলাদের জন্য রক এন রোল সুগন্ধি।',
                'description'=> '<p>YSL Black Opium EDP is an addictive and bold fragrance for women. Coffee and vanilla combine with white florals to create an intense, sensual and feminine scent that is unlike anything else.</p><ul><li>Top Notes: Pink Pepper, Orange Blossom, Pear</li><li>Heart Notes: Coffee, Jasmine, Licorice</li><li>Base Notes: Vanilla, Patchouli, Cedarwood</li></ul>',
                'tags'       => 'ysl,black opium,womens perfume,sweet,bold,coffee,edp',
                'image_seed' => 'ysl-blackopium',
                'price'      => 17500,
                'discount'   => ['type' => 'percentage', 'amount' => 10],
                'variants'   => [
                    ['30ml',  11000, 20],
                    ['50ml',  17500, 30],
                    ['90ml',  26000, 15],
                ],
            ],
            [
                'title'      => 'Gucci Bloom EDP',
                'bn_title'   => 'গুচি ব্লুম ইডিপি',
                'brand'      => 'Gucci',
                'category'   => 'womens',
                'sub_cat'    => 'floral',
                'is_featured'=> 1,
                'is_tranding'=> 0,
                'todays_deal'=> 0,
                'feature'    => 'Rich, full-bodied floral. A garden in full bloom captured in a bottle.',
                'bn_feature' => 'সমৃদ্ধ, পূর্ণাঙ্গ ফ্লোরাল – পূর্ণ প্রস্ফুটিত বাগান একটি বোতলে।',
                'description'=> '<p>Gucci Bloom EDP is a rich and creamy floral fragrance that celebrates femininity. Tuberose and jasmine blend with a heart of Rangoon Creeper flower to create a natural, authentic and overwhelmingly beautiful floral scent.</p><ul><li>Top Notes: Rangoon Creeper</li><li>Heart Notes: Jasmine, Tuberose</li><li>Base Notes: Sandalwood, Skin Musk</li></ul>',
                'tags'       => 'gucci,bloom,womens perfume,floral,luxury,edp',
                'image_seed' => 'gucci-bloom',
                'price'      => 15000,
                'discount'   => ['type' => 'flat', 'amount' => 1000],
                'variants'   => [
                    ['30ml',  9500,  20],
                    ['50ml',  15000, 25],
                    ['100ml', 22000, 12],
                ],
            ],
            [
                'title'      => 'Armani Si EDP',
                'bn_title'   => 'আর্মানি সি ইডিপি',
                'brand'      => 'Giorgio Armani',
                'category'   => 'womens',
                'sub_cat'    => 'floral',
                'is_featured'=> 0,
                'is_tranding'=> 1,
                'todays_deal'=> 0,
                'feature'    => 'Modern, feminine and powerful. The fragrance for the woman who says yes to life.',
                'bn_feature' => 'আধুনিক, মেয়েলি ও শক্তিশালী – জীবনকে হ্যাঁ বলা মহিলার সুগন্ধি।',
                'description'=> '<p>Armani Si EDP is a modern, feminine and empowering fragrance for women. The juicy blackcurrant opens the scent, followed by a heart of rose May and a warm base of vanilla and wood that is timeless and feminine.</p><ul><li>Top Notes: Cassis (Blackcurrant Nectar)</li><li>Heart Notes: Rose May, Freesia</li><li>Base Notes: Ambrewood, Vanilla, White Musk</li></ul>',
                'tags'       => 'armani,si,womens perfume,floral,modern,edp',
                'image_seed' => 'armani-si',
                'price'      => 16000,
                'discount'   => ['type' => 'no', 'amount' => 0],
                'variants'   => [
                    ['30ml',  10000, 18],
                    ['50ml',  16000, 22],
                    ['100ml', 24500, 12],
                ],
            ],
            [
                'title'      => 'Tom Ford Black Orchid EDP',
                'bn_title'   => 'টম ফোর্ড ব্ল্যাক অর্কিড ইডিপি',
                'brand'      => 'Tom Ford',
                'category'   => 'womens',
                'sub_cat'    => 'sweet',
                'is_featured'=> 1,
                'is_tranding'=> 0,
                'todays_deal'=> 0,
                'feature'    => 'Luxurious, dark and captivating. An opulent black orchid and dark florals.',
                'bn_feature' => 'বিলাসবহুল, অন্ধকার ও মনোমুগ্ধকর – কালো অর্কিড ও অন্ধকার ফুলের সমন্বয়।',
                'description'=> '<p>Tom Ford Black Orchid EDP is a dark, sensual and iconic luxury fragrance. A rich and sumptuous blend of black truffle, ylang ylang and black orchid creates a memorable fragrance that is seductive and mysterious.</p><ul><li>Top Notes: Truffle, Gardenia, Black Currant</li><li>Heart Notes: Orchid, Spices, Lotus Wood</li><li>Base Notes: Patchouli, Vanilla, Balsam</li></ul>',
                'tags'       => 'tom ford,black orchid,womens perfume,oriental,dark,luxury,edp',
                'image_seed' => 'tomford-blackorchid',
                'price'      => 32000,
                'discount'   => ['type' => 'percentage', 'amount' => 5],
                'variants'   => [
                    ['30ml',  19000, 10],
                    ['50ml',  32000, 15],
                    ['100ml', 52000, 8],
                ],
            ],
            [
                'title'      => 'Jo Malone Peony & Blush Suede Cologne',
                'bn_title'   => 'জো মালোন পিওনি ও ব্লাশ সুয়েড কোলন',
                'brand'      => 'Jo Malone',
                'category'   => 'womens',
                'sub_cat'    => 'floral',
                'is_featured'=> 1,
                'is_tranding'=> 0,
                'todays_deal'=> 0,
                'feature'    => 'Lush, sensuous and flirtatious. The most romantic of all Jo Malone fragrances.',
                'bn_feature' => 'প্রাণবন্ত, ইন্দ্রিয়গ্রাহী ও রোমান্টিক – জো মালোনের সবচেয়ে রোমান্টিক সুগন্ধি।',
                'description'=> '<p>Jo Malone Peony & Blush Suede Cologne is a luxurious and feminine fragrance. The lushness of peonies, the warmth of red apple and the sensuality of suede create a beautiful and irresistible floral scent.</p><ul><li>Top Notes: Red Apple</li><li>Heart Notes: Peony, Jasmine, Gillyflower</li><li>Base Notes: Suede</li></ul>',
                'tags'       => 'jo malone,peony,blush suede,womens perfume,floral,luxury,cologne',
                'image_seed' => 'jomalone-peony',
                'price'      => 19000,
                'discount'   => ['type' => 'no', 'amount' => 0],
                'variants'   => [
                    ['30ml',  11500, 12],
                    ['100ml', 19000, 18],
                ],
            ],
            [
                'title'      => 'Versace Bright Crystal EDT',
                'bn_title'   => 'ভার্সাচে ব্রাইট ক্রিস্টাল ইডিটি',
                'brand'      => 'Versace',
                'category'   => 'womens',
                'sub_cat'    => 'floral',
                'is_featured'=> 0,
                'is_tranding'=> 1,
                'todays_deal'=> 1,
                'feature'    => 'Vibrant, sensual and fresh. A sensual, energizing feminine fragrance.',
                'bn_feature' => 'প্রাণবন্ত, কামুক ও তাজা – একটি উদ্দীপনামূলক মেয়েলি সুগন্ধি।',
                'description'=> '<p>Versace Bright Crystal EDT is a vibrant and feminine fragrance that opens with refreshing pomegranate and yuzu. The heart blooms with peony and magnolia, while a warm amber and musk base adds sensuality.</p><ul><li>Top Notes: Pomegranate, Yuzu, Frozen Accord</li><li>Heart Notes: Peony, Magnolia, Lotus</li><li>Base Notes: Mahogany, Musk, Amber</li></ul>',
                'tags'       => 'versace,bright crystal,womens perfume,floral,fresh,edt',
                'image_seed' => 'versace-brightcrystal',
                'price'      => 10000,
                'discount'   => ['type' => 'percentage', 'amount' => 15],
                'variants'   => [
                    ['30ml',  6500,  30],
                    ['50ml',  10000, 40],
                    ['90ml',  15500, 20],
                ],
            ],
            [
                'title'      => 'Calvin Klein Euphoria for Women EDP',
                'bn_title'   => 'ক্যালভিন ক্লেইন ইউফোরিয়া ফর উইমেন ইডিপি',
                'brand'      => 'Calvin Klein',
                'category'   => 'womens',
                'sub_cat'    => 'sweet',
                'is_featured'=> 0,
                'is_tranding'=> 0,
                'todays_deal'=> 0,
                'feature'    => 'Mysterious, sensual and exotic. Discover your own euphoria.',
                'bn_feature' => 'রহস্যময়, কামুক ও বিদেশী – আপনার নিজের আনন্দ আবিষ্কার করুন।',
                'description'=> '<p>Calvin Klein Euphoria for Women EDP is a mysteriously sensual and exotic fragrance. Black orchid and pomegranate open the scent, leading to a heart of black violet and orchid, and a warm base of amber, cream and mahogany.</p><ul><li>Top Notes: Black Orchid, Pomegranate, Green Notes</li><li>Heart Notes: Black Violet, Orchid</li><li>Base Notes: Amber, Cream, Mahogany</li></ul>',
                'tags'       => 'calvin klein,euphoria,womens perfume,oriental,sensual,edp',
                'image_seed' => 'ck-euphoria-women',
                'price'      => 9500,
                'discount'   => ['type' => 'percentage', 'amount' => 10],
                'variants'   => [
                    ['30ml',  6000,  25],
                    ['50ml',  9500,  35],
                    ['100ml', 15000, 20],
                ],
            ],
            [
                'title'      => 'Hugo Boss Ma Vie Pour Femme EDP',
                'bn_title'   => 'হুগো বস মা ভি পুর ফেম ইডিপি',
                'brand'      => 'Hugo Boss',
                'category'   => 'womens',
                'sub_cat'    => 'floral',
                'is_featured'=> 0,
                'is_tranding'=> 0,
                'todays_deal'=> 0,
                'feature'    => 'Fresh, feminine and uplifting. Celebrate the joy of life.',
                'bn_feature' => 'তাজা, মেয়েলি ও উদ্দীপনামূলক – জীবনের আনন্দ উদযাপন করুন।',
                'description'=> '<p>Hugo Boss Ma Vie Pour Femme EDP is a fresh and feminine fragrance that celebrates the zest for life. Freesia and magnolia heart notes bloom over a warm vetiver and musk base for an uplifting, energizing effect.</p><ul><li>Top Notes: Cassis, Bergamot</li><li>Heart Notes: Freesia, Magnolia</li><li>Base Notes: Vetiver, Musk, Cedar</li></ul>',
                'tags'       => 'hugo boss,ma vie,womens perfume,floral,fresh,edp',
                'image_seed' => 'hugoboss-mavie',
                'price'      => 8500,
                'discount'   => ['type' => 'no', 'amount' => 0],
                'variants'   => [
                    ['30ml',  5500,  30],
                    ['50ml',  8500,  40],
                    ['75ml',  12000, 20],
                ],
            ],
        ];

        foreach ($products as $data) {
            $this->command->line("  → {$data['title']}");

            $thumb = $this->downloadImage(
                "https://picsum.photos/seed/{$data['image_seed']}/500/500",
                "perfume_{$data['image_seed']}.jpg"
            );

            $gallery1 = $this->downloadImage(
                "https://picsum.photos/seed/{$data['image_seed']}-g1/500/500",
                "perfume_{$data['image_seed']}_g1.jpg"
            );

            $gallery2 = $this->downloadImage(
                "https://picsum.photos/seed/{$data['image_seed']}-g2/500/500",
                "perfume_{$data['image_seed']}_g2.jpg"
            );

            $categoryKey = $data['category'];
            $category    = $cats[$categoryKey];
            $subCat      = $data['sub_cat'] ? $cats[$data['sub_cat']] : null;
            $brand       = $brands[$data['brand']];

            $product = Product::create([
                'title'           => $data['title'],
                'bn_title'        => $data['bn_title'],
                'brand_id'        => $brand->id,
                'category_id'     => $category->id,
                'sub_category_id' => $subCat?->id ?? 0,
                'type'            => 'variation',
                'variant_product' => 1,
                'attributes'      => json_encode([$sid]),
                'purchase_price'  => round($data['variants'][0][1] * 0.6),
                'price'           => $data['price'],
                'discount_type'   => $data['discount']['type'],
                'discount_amount' => $data['discount']['amount'],
                'current_stock'   => array_sum(array_column($data['variants'], 1)),
                'is_featured'     => $data['is_featured'],
                'is_tranding'     => $data['is_tranding'],
                'todays_deal'     => $data['todays_deal'],
                'sold_qty'        => rand(50, 500),
                'code'            => strtoupper(substr(md5($data['title']), 0, 8)),
                'weight'          => '150',
                'unit_type'       => 'ml',
                'minimum_qty'     => 1,
                'thumbnail_image' => $thumb,
                'thumbnail_image2'=> $gallery1,
                'feature'         => $data['feature'],
                'bn_feature'      => $data['bn_feature'],
                'description'     => $data['description'],
                'is_active'       => 1,
                'tags'            => $data['tags'],
                'meta_title'      => $data['title'] . ' | Buy Original Perfume Online',
                'meta_description'=> strip_tags($data['feature']),
                'meta_keywords'   => $data['tags'],
            ]);

            // Variant stocks (sizes)
            foreach ($data['variants'] as [$size, $price, $qty]) {
                ProductStocks::create([
                    'product_id'     => $product->id,
                    'variant'        => $sid,
                    'variant_output' => $size,
                    'sku'            => strtoupper(substr(md5($data['title'] . $size), 0, 10)),
                    'price'          => $price,
                    'qty'            => $qty,
                    'is_active'      => 1,
                ]);
            }

            // Update current_stock accurately
            $product->current_stock = array_sum(array_column($data['variants'], 2));
            $product->save();

            // Gallery images
            ProductImage::create(['product_id' => $product->id, 'image' => $gallery1]);
            ProductImage::create(['product_id' => $product->id, 'image' => $gallery2]);

            // Category assignments
            ProductWithCategory::create(['product_id' => $product->id, 'category_id' => $category->id]);
            if ($subCat) {
                ProductWithCategory::create(['product_id' => $product->id, 'category_id' => $subCat->id]);
            }
        }
    }

    // ─── Image download helper ────────────────────────────────────────────────

    private function downloadImage(string $url, string $filename): string
    {
        $dir = public_path('images/product');
        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        $path = $dir . DIRECTORY_SEPARATOR . $filename;

        if (!file_exists($path)) {
            $ctx = stream_context_create([
                'http' => [
                    'timeout'         => 20,
                    'user_agent'      => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
                    'follow_location' => true,
                ],
                'ssl'  => ['verify_peer' => false, 'verify_peer_name' => false],
            ]);

            $content = @file_get_contents($url, false, $ctx);
            if ($content !== false) {
                file_put_contents($path, $content);
            }
        }

        return $filename;
    }
}
