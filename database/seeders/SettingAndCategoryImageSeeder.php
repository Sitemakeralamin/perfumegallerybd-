<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingAndCategoryImageSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('Seeding site settings...');
        $this->seedSettings();

        $this->command->info('Adding category images...');
        $this->seedCategoryImages();

        $this->command->info('Done!');
    }

    private function seedSettings(): void
    {
        if (Setting::count() > 0) {
            $this->command->line('  Settings already exist, skipping.');
            return;
        }

        $logo    = $this->downloadImage('https://picsum.photos/seed/site-logo/300/80',    'logo.png',    'website');
        $favicon = $this->downloadImage('https://picsum.photos/seed/site-favicon/32/32',  'favicon.png', 'website');

        Setting::create([
            'name'             => 'Perfume BD',
            'header_logo'      => $logo,
            'footer_logo'      => $logo,
            'favicon'          => $favicon,
            'email'            => 'info@perfumebd.com',
            'phone'            => '01700000000',
            'address'          => 'Dhaka, Bangladesh',
            'facebook'         => 'https://facebook.com',
            'instagram'        => 'https://instagram.com',
            'twitter'          => 'https://twitter.com',
            'youtube'          => 'https://youtube.com',
            'minimum_point'    => 100,
            'equivalent_point' => 1,
            'meta_title'       => 'Perfume BD | Premium Fragrances Online',
            'meta_description' => 'Buy authentic perfumes online in Bangladesh. Chanel, Dior, Versace, Tom Ford and more.',
            'meta_keywords'    => 'perfume bangladesh,buy perfume online,authentic fragrance bd',
        ]);

        $this->command->line('  Settings created.');
    }

    private function seedCategoryImages(): void
    {
        $categoryImages = [
            "Men's Perfume"    => ['seed' => 'mens-perfume-cat',    'banner_seed' => 'mens-perfume-banner'],
            "Women's Perfume"  => ['seed' => 'womens-perfume-cat',  'banner_seed' => 'womens-perfume-banner'],
            'Unisex Perfume'   => ['seed' => 'unisex-perfume-cat',  'banner_seed' => 'unisex-perfume-banner'],
            'Woody & Spicy'    => ['seed' => 'woody-spicy-cat',     'banner_seed' => null],
            'Fresh & Aquatic'  => ['seed' => 'fresh-aquatic-cat',   'banner_seed' => null],
            'Oriental & Musky' => ['seed' => 'oriental-musky-cat',  'banner_seed' => null],
            'Floral'           => ['seed' => 'floral-cat',          'banner_seed' => null],
            'Sweet & Fruity'   => ['seed' => 'sweet-fruity-cat',    'banner_seed' => null],
        ];

        foreach ($categoryImages as $title => $data) {
            $category = Category::where('title', $title)->first();
            if (!$category) {
                continue;
            }

            if ($category->image) {
                $this->command->line("  Skipping '{$title}' (image exists).");
                continue;
            }

            $image = $this->downloadImage(
                "https://picsum.photos/seed/{$data['seed']}/400/400",
                "cat_{$data['seed']}.jpg",
                'category'
            );

            $banner = null;
            if ($data['banner_seed']) {
                $banner = $this->downloadImage(
                    "https://picsum.photos/seed/{$data['banner_seed']}/1200/400",
                    "cat_banner_{$data['banner_seed']}.jpg",
                    'category'
                );
            }

            $category->update(array_filter([
                'image'  => $image,
                'banner' => $banner,
            ]));

            $this->command->line("  Updated '{$title}'.");
        }
    }

    private function downloadImage(string $url, string $filename, string $subdir): string
    {
        $dir = public_path("images/{$subdir}");
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
