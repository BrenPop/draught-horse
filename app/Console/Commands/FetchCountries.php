<?php

namespace App\Console\Commands;

use App\Models\Country;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class FetchCountries extends Command
{
    protected $signature = 'fetch-create:countries';

    protected $description = 'Fetch countries data from API and seed the countries table';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $cachedCountries = Cache::get('countries');

        if ($cachedCountries) {
            $this->info('Countries fetched from cache.');

            $countries = $cachedCountries;
        } else {
            $response = Http::get('https://restcountries.com/v3.1/all');

            $countries = $response->json();

            Cache::put('countries', $countries, Carbon::now()->addWeek());

            $this->info('Countries fetched from API and cached.');
        }

        $data = [];
        foreach ($countries as $country) {
            $data[] = [
                'common_name' => $country['name']['common'] ?? null,
                'official_name' => $country['name']['official'] ?? null,
                'region' => $country['region'] ?? null,
                'sub_region' => $country['subregion'] ?? null,
                'cca2' => $country['cca2'] ?? null,
                'ccn3' => $country['ccn3'] ?? null,
                'cca3' => $country['cca3'] ?? null,
                'cioc' => $country['cioc'] ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Country::insert($data);

        // Update South Africa to be active
        Country::where('common_name', 'South Africa')->update(['active' => true]);

        $this->info('Countries seeded successfully.');
    }
}
