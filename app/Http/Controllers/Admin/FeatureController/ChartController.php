<?php

namespace App\Http\Controllers\Admin\FeatureController;

use App\Http\Controllers\Controller;
use App\Models\Chart;
use Illuminate\Support\Facades\Http;

class ChartController extends Controller
{
    public function index(){

        $codes = [
            'Issyk-kul_region' => [
                'Ak-Suu' => '41702205000000',
                'Jety-Oguz' => '41702210000000',
                'Issyk-Kul' => '41702215000000',
                'Ton' => '41702220000000',
                'Tyup' => '41702225000000',
            ],
            'Djalal-Abad_region' => [
                'Ala-Buka' => '41703204000000',
                'Bazar-Korgon' => '41703207000000',
                'Aksy' => '41703211000000',
                'Nooken' => '41703215000000',
                'Suzak' => '41703220000000',
                'Toguz-Toroo' => '41703223000000',
                'Toktogul' => '41703225000000',
                'Chatkal' => '41703230000000',
            ],
            'Naryn_region' => [
                'Ak-Talaa' => '41704210000000',
                'At-Bashy' => '41704220000000',
                'Jumgal' => '41704230000000',
                'Kochkor' => '41704235000000',
                'Naryn' => '41704245000000',
            ],
            'Batken_region' => [
                'Batken' => '41705214000000',
                'Leylek' => '41705236000000',
                'Kadamjay' => '41705258000000',
            ],
            'Osh_region' => [
                'Alay' => '41706207000000',
                'Aravan' => '41706211000000',
                'Kara-Suu' => '41706226000000',
                'Nookat' => '41706242000000',
                'Kara-Kuldja' => '41706246000000',
                'Uzgen' => '41706255000000',
                'Chon-Alay' => '41706259000000',
            ],
            'Talas_region' => [
                'Kara-Buura' => '41707215000000',
                'Bakay-Ata' => '41707220000000',
                'Manas' => '41707225000000',
                'Talas' => '41707232000000',
            ],
            'Chui_region' => [
                'Alamydyn' => '41708203000000',
                'Issyk-Ata' => '41708206000000',
                'Jayil' => '41708209000000',
                'Kemin' => '41708213000000',
                'Moskovskyi' => '41708217000000',
                'Panfilov' => '41708219000000',
                'Sokuluk' => '41708222000000',
                'Chui' => '41708223000000',
            ]
        ];

        $regionCodes = [
            'Issyk-kul_region' => '41702000000000',
            'Djalal-Abad_region' => '41703000000000',
            'Naryn_region' => '41704000000000',
            'Batken_region' => '41705000000000',
            'Osh_region' => '41706000000000',
            'Talas_region' => '41707000000000',
            'Chui_region' => '41708000000000',
        ];

        $districtCodes = [
            'Ak-Suu' => '41702205000000',
            'Jety-Oguz' => '41702210000000',
            'Issyk-Kul' => '41702215000000',
            'Ton' => '41702220000000',
            'Tyup' => '41702225000000',

            'Ala-Buka' => '41703204000000',
            'Bazar-Korgon' => '41703207000000',
            'Aksy' => '41703211000000',
            'Nooken' => '41703215000000',
            'Suzak' => '41703220000000',
            'Toguz-Toroo' => '41703223000000',
            'Toktogul' => '41703225000000',
            'Chatkal' => '41703230000000',


            'Ak-Talaa' => '41704210000000',
            'At-Bashy' => '41704220000000',
            'Jumgal' => '41704230000000',
            'Kochkor' => '41704235000000',
            'Naryn' => '41704245000000',


            'Batken' => '41705214000000',
            'Leylek' => '41705236000000',
            'Kadamjay' => '41705258000000',


            'Alay' => '41706207000000',
            'Aravan' => '41706211000000',
            'Kara-Suu' => '41706226000000',
            'Nookat' => '41706242000000',
            'Kara-Kuldja' => '41706246000000',
            'Uzgen' => '41706255000000',
            'Chon-Alay' => '41706259000000',


            'Kara-Buura' => '41707215000000',
            'Bakay-Ata' => '41707220000000',
            'Manas' => '41707225000000',
            'Talas' => '41707232000000',


            'Alamydyn' => '41708203000000',
            'Issyk-Ata' => '41708206000000',
            'Jayil' => '41708209000000',
            'Kemin' => '41708213000000',
            'Moskovskyi' => '41708217000000',
            'Panfilov' => '41708219000000',
            'Sokuluk' => '41708222000000',
            'Chui' => '41708223000000',
        ];

        foreach ($regionCodes as $region => $regionCode){
            $tempVariable = $this->requestToApi('https://budget.okmot.kg/ru/get-incomes?countryCode=' . $regionCode . '&regionCode=&districtCode=&dateFrom=&dateTo=');
            $data[$region]['local_budget_plan'] = $tempVariable[1]['rayon_p'] + $tempVariable[1]['gorod_p'] + $tempVariable[1]['ao_p'];
            $data[$region]['local_budget_fact'] = $tempVariable[1]['rayon'] + $tempVariable[1]['gorod'] + $tempVariable[1]['ao'];
            $data[$region]['tax_plan'] = $tempVariable[0][0]['rb_p'] + $tempVariable[0][0]['rayon_p'] + $tempVariable[0][0]['gorod_p'] + $tempVariable[0][0]['ao_p'];
            $data[$region]['tax_fact'] = $tempVariable[0][0]['rb'] + $tempVariable[0][0]['rayon'] + $tempVariable[0][0]['gorod'] + $tempVariable[0][0]['ao'];
        }

        foreach ($regionCodes as $region => $regionCode){
            foreach ($codes[$region] as $district => $districtCode){
                $tempVariable = $this->requestToApi('https://budget.okmot.kg/ru/get-incomes?countryCode=' . $regionCode . '&regionCode=' . $districtCode . '&districtCode=&dateFrom=&dateTo=');
                $data[$district]['local_budget_plan'] = $tempVariable[1]['rayon_p'] + $tempVariable[1]['gorod_p'] + $tempVariable[1]['ao_p'];
                $data[$district]['local_budget_fact'] = $tempVariable[1]['rayon'] + $tempVariable[1]['gorod'] + $tempVariable[1]['ao'];
                $data[$district]['tax_plan'] = $tempVariable[0][0]['rb_p'] + $tempVariable[0][0]['rayon_p'] + $tempVariable[0][0]['gorod_p'] + $tempVariable[0][0]['ao_p'];
                $data[$district]['tax_fact'] = $tempVariable[0][0]['rb'] + $tempVariable[0][0]['rayon'] + $tempVariable[0][0]['gorod'] + $tempVariable[0][0]['ao'];
            }
        }

        Chart::truncate();

        foreach ($data as $key => $item){
            $item['city'] = $key;
            Chart::create($item);
        }

        return redirect()->back();
    }

    private function requestToApi($url){
        $response = Http::get($url);
        return $response->json();
    }

    public function getData(){
        return response()->json(['data' => Chart::all()]);
    }
}
