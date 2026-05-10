<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictAreaSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('Seeding Districts & Areas...');

        if (District::count() > 0) {
            $this->command->line('  Districts already exist, skipping.');
            return;
        }

        foreach ($this->data() as $districtData) {
            $district = District::create([
                'name'            => $districtData['name'],
                'bn_name'         => $districtData['bn_name'],
                'shipping_charge' => $districtData['charge'],
                'is_active'       => 1,
            ]);

            foreach ($districtData['areas'] as [$areaEn, $areaBn]) {
                Area::create([
                    'name'        => $areaEn,
                    'district_id' => $district->id,
                    'is_active'   => 1,
                ]);
            }

            $this->command->line("  + {$districtData['name']} (" . count($districtData['areas']) . " areas)");
        }

        $this->command->info('Done! ' . District::count() . ' districts, ' . Area::count() . ' areas seeded.');
    }

    private function data(): array
    {
        return [
            [
                'name'   => 'Dhaka',
                'bn_name'=> 'ঢাকা',
                'charge' => 60,
                'areas'  => [
                    ['Dhanmondi',       'ধানমন্ডি'],
                    ['Mirpur',          'মিরপুর'],
                    ['Mohammadpur',     'মোহাম্মদপুর'],
                    ['Uttara',          'উত্তরা'],
                    ['Gulshan',         'গুলশান'],
                    ['Banani',          'বনানী'],
                    ['Badda',           'বাড্ডা'],
                    ['Demra',           'ডেমরা'],
                    ['Rampura',         'রামপুরা'],
                    ['Khilgaon',        'খিলগাঁও'],
                    ['Jatrabari',       'যাত্রাবাড়ী'],
                    ['Lalbagh',         'লালবাগ'],
                    ['New Market',      'নিউ মার্কেট'],
                    ['Paltan',          'পল্টন'],
                    ['Motijheel',       'মতিঝিল'],
                    ['Wari',            'ওয়ারী'],
                    ['Kotwali',         'কোতোয়ালি'],
                    ['Sabujbagh',       'সবুজবাগ'],
                    ['Tejgaon',         'তেজগাঁও'],
                    ['Shyampur',        'শ্যামপুর'],
                ],
            ],
            [
                'name'   => 'Chattogram',
                'bn_name'=> 'চট্টগ্রাম',
                'charge' => 120,
                'areas'  => [
                    ['Agrabad',         'আগ্রাবাদ'],
                    ['GEC Circle',      'জিইসি সার্কেল'],
                    ['Nasirabad',       'নাসিরাবাদ'],
                    ['Pahartali',       'পাহাড়তলী'],
                    ['Halishahar',      'হালিশহর'],
                    ['Khulshi',         'খুলশী'],
                    ['Panchlaish',      'পাঁচলাইশ'],
                    ['Kotwali',         'কোতোয়ালি'],
                    ['Chandgaon',       'চান্দগাঁও'],
                    ['Bayazid',         'বায়েজিদ'],
                ],
            ],
            [
                'name'   => 'Sylhet',
                'bn_name'=> 'সিলেট',
                'charge' => 130,
                'areas'  => [
                    ['Zindabazar',      'জিন্দাবাজার'],
                    ['Amberkhana',      'আম্বরখানা'],
                    ['Shibganj',        'শিবগঞ্জ'],
                    ['Upashahar',       'উপশহর'],
                    ['Shahjalal',       'শাহজালাল'],
                    ['Tilagarh',        'তিলাগড়'],
                ],
            ],
            [
                'name'   => 'Rajshahi',
                'bn_name'=> 'রাজশাহী',
                'charge' => 130,
                'areas'  => [
                    ['Boalia',          'বোয়ালিয়া'],
                    ['Motihar',         'মতিহার'],
                    ['Shah Makhdum',    'শাহ মখদুম'],
                    ['Rajpara',         'রাজপাড়া'],
                    ['Paba',            'পবা'],
                ],
            ],
            [
                'name'   => 'Khulna',
                'bn_name'=> 'খুলনা',
                'charge' => 130,
                'areas'  => [
                    ['Khalishpur',      'খালিশপুর'],
                    ['Sonadanga',       'সোনাডাঙ্গা'],
                    ['Khan Jahan Ali',  'খান জাহান আলী'],
                    ['Daulatpur',       'দৌলতপুর'],
                    ['Rupsha',          'রূপসা'],
                ],
            ],
            [
                'name'   => 'Barishal',
                'bn_name'=> 'বরিশাল',
                'charge' => 130,
                'areas'  => [
                    ['Kotwali',         'কোতোয়ালি'],
                    ['Bandar',          'বন্দর'],
                    ['Sher-E-Bangla',   'শেরে বাংলা নগর'],
                    ['Airport',         'এয়ারপোর্ট'],
                ],
            ],
            [
                'name'   => 'Rangpur',
                'bn_name'=> 'রংপুর',
                'charge' => 140,
                'areas'  => [
                    ['Kotwali',         'কোতোয়ালি'],
                    ['Mahiganj',        'মাহিগঞ্জ'],
                    ['Tajhat',          'তাজহাট'],
                    ['Mithapukur',      'মিঠাপুকুর'],
                ],
            ],
            [
                'name'   => 'Mymensingh',
                'bn_name'=> 'ময়মনসিংহ',
                'charge' => 120,
                'areas'  => [
                    ['Kotwali',         'কোতোয়ালি'],
                    ['Trishal',         'ত্রিশাল'],
                    ['Muktagacha',      'মুক্তাগাছা'],
                    ['Phulbaria',       'ফুলবাড়িয়া'],
                ],
            ],
            [
                'name'   => 'Gazipur',
                'bn_name'=> 'গাজীপুর',
                'charge' => 80,
                'areas'  => [
                    ['Gazipur Sadar',   'গাজীপুর সদর'],
                    ['Tongi',           'টঙ্গী'],
                    ['Kaliakoir',       'কালিয়াকৈর'],
                    ['Kapasia',         'কাপাসিয়া'],
                    ['Sreepur',         'শ্রীপুর'],
                ],
            ],
            [
                'name'   => 'Narayanganj',
                'bn_name'=> 'নারায়ণগঞ্জ',
                'charge' => 80,
                'areas'  => [
                    ['Siddhirganj',     'সিদ্ধিরগঞ্জ'],
                    ['Fatullah',        'ফতুল্লাহ'],
                    ['Bandar',          'বন্দর'],
                    ['Rupganj',         'রূপগঞ্জ'],
                    ['Araihazar',       'আড়াইহাজার'],
                ],
            ],
            [
                'name'   => 'Cumilla',
                'bn_name'=> 'কুমিল্লা',
                'charge' => 110,
                'areas'  => [
                    ['Kotwali',         'কোতোয়ালি'],
                    ['Adarsha Sadar',   'আদর্শ সদর'],
                    ['Debidwar',        'দেবিদ্বার'],
                    ['Brahmanpara',     'ব্রাহ্মণপাড়া'],
                ],
            ],
            [
                'name'   => 'Bogura',
                'bn_name'=> 'বগুড়া',
                'charge' => 130,
                'areas'  => [
                    ['Bogura Sadar',    'বগুড়া সদর'],
                    ['Shibganj',        'শিবগঞ্জ'],
                    ['Gabtali',         'গাবতলী'],
                    ['Shahjahanpur',    'শাহজাহানপুর'],
                ],
            ],
            [
                'name'   => 'Narsingdi',
                'bn_name'=> 'নরসিংদী',
                'charge' => 90,
                'areas'  => [
                    ['Narsingdi Sadar', 'নরসিংদী সদর'],
                    ['Palash',          'পলাশ'],
                    ['Shibpur',         'শিবপুর'],
                    ['Raipura',         'রায়পুরা'],
                ],
            ],
            [
                'name'   => 'Manikganj',
                'bn_name'=> 'মানিকগঞ্জ',
                'charge' => 90,
                'areas'  => [
                    ['Manikganj Sadar', 'মানিকগঞ্জ সদর'],
                    ['Singair',         'সিংগাইর'],
                    ['Saturia',         'সাটুরিয়া'],
                ],
            ],
            [
                'name'   => 'Munshiganj',
                'bn_name'=> 'মুন্সীগঞ্জ',
                'charge' => 90,
                'areas'  => [
                    ['Munshiganj Sadar','মুন্সীগঞ্জ সদর'],
                    ['Srinagar',        'শ্রীনগর'],
                    ['Sirajdikhan',     'সিরাজদিখান'],
                ],
            ],
        ];
    }
}
