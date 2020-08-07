<?php

use App\Models\TemporalLink;
use Illuminate\Database\Seeder;

class TemporalLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TemporalLink::query()->create([
                'link' => TemporalLink::generateLink(),
                'route_name' => 'welcome',
                'route_data' => [],
        ]);

        dump(TemporalLink::query()->get()->toArray());
    }
}
