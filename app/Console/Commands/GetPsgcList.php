<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Spatie\SimpleExcel\SimpleExcelReader;
use App\Region;
use App\Province;
use App\SubMunicipality;
use App\Barangay;
use App\City;
use App\District;
use App\Municipality;

class GetPsgcList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'psgc:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parses the PSGC csv file to distribute the different data to their corresponding databases.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $rows = SimpleExcelReader::create(Storage::path('psgc.csv'))->getRows();

        $this->truncateTables();

        $tier = [];

        $rows->each(function($row) use (&$tier) {

            switch($row['geographic_level']) {
                case 'Reg':
                    $tier[1] = Region::create($row);
                    break;
                /*---------------------------------*/
                case 'Prov':
                    $tier[2] = $this->fillData(new Province, $row);
                    $tier[1]->provinces()->save($tier[2]);
                    break;
                case 'Dist':
                    $tier[2] = $this->fillData(new District, $row);
                    $tier[1]->districts()->save($tier[2]);
                    break;
                /*---------------------------------*/
                case 'City':
                    $tier[3] = $this->fillData(new City, $row);
                    $tier[2]->cities()->save($tier[3]);
                    break;
                case 'Mun':
                    $tier[3] = $this->fillData(new Municipality, $row);
                    $tier[2]->municipalities()->save($tier[3]);
                    break;
                case 'SubMun':
                    $tier[3] = $this->fillData(new SubMunicipality, $row);
                    $tier[2]->subMunicipalities()->save($tier[3]);
                    break;
                /*---------------------------------*/
                case 'Bgy':
                    $tier[4] = $this->fillData(new Barangay, $row);
                    $tier[3]->barangays()->save($tier[4]);
                    break;
            }

        });

    }

    private function truncateTables()
    {
        Region::truncate();
        Province::truncate();
        District::truncate();
        City::truncate();
        Municipality::truncate();
        SubMunicipality::truncate();
        Barangay::truncate();
    }

    private function fillData($model, $data)
    {
        foreach($data as $key => $value) {
            $model->$key = $value;
        }

        return $model;
    }
}
