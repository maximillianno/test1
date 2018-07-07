<?php

namespace App\Http\Controllers;

use App\Events\NewEvent;
use Illuminate\Http\Request;

class StartController extends Controller
{
    //
    public function index(){
        $url_data = [
          [
              'title' => 'Maxus-dev',
              'url' => 'localhost'
          ],
          [
              'title' => 'Youtube',
              'url' => 'http://youtube.com'
          ],
        ];
        return view('home', ['url_data' => $url_data]);

    }
    public function getJson(){
        return [
            [
                'title' => 'Maxus-dev',
                'url' => 'localhost'
            ],
            [
                'title' => 'Youtube',
                'url' => 'http://youtube.com'
            ],
        ];
    }

    public function dataChart(){

        return [
            'labels' => ['март', 'апрель', 'май', 'июнь'],
            'datasets' => [
                [
                'label' => 'Золото',
                'backgroundColor' => '#F26202',
                'data' => [rand(0, 40000), rand(0, 40000), rand(0, 40000), rand(0, 40000)]
                ],
                [
                'label' => 'Серебро',
                'backgroundColor' => '#226202',
                'data' => [rand(0, 40000), rand(0, 40000), rand(0, 40000), rand(0, 40000)]
                ]
            ],
        ];
    }

    public function newEvent(Request $request){

        $result = [
            'labels' => ['март', 'апрель', 'май', 'июнь'],
            'datasets' => [
                [
                    'label' => 'Золото',
                    'backgroundColor' => '#F26202',
                    'data' => [rand(0, 40000), rand(0, 40000), rand(0, 40000), rand(0, 40000)]
                ],
            ],
        ];


        if ($request->has('label')){
            $result['labels'][] = $request->input('label');
            $result['datasets'][0]['data'][] = $request->input('sale');
        }

        //Это для сокет-ио
        if ($request->has('realtime')){
            if ($request->input('realtime') == 'true'){
                event(new newEvent($result));

            }
        }

        //Это для аякс запроса
        return $result;

    }
}
