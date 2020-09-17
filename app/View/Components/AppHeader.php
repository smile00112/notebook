<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppHeader extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $main_phone = '666 666 666';
    public $main_menu = [];
    
    public function __construct()
    {
        $this->main_phone = '8 800 222-55-66';
        $this->main_menu= [
            'Главная' => ['url' => '/', 'children' => []],
            'Город' => ['url' => '#', 'children' => [ 'Брянск' => ['url' => 'bruansk.'.config('app.name')], 'Тверь' => ['url' => 'bruansk.'.config('app.name')] ]],
            'Ремонт телефонов' => ['url' => '/phone-repare', 'children' => ['Apple' => ['url' => '/phone-repare/apple'], 'Huawey' => ['url' => '/phone-repare/hyawey'], ]],
           'Ремонт компьютеров' => ['url' => '/comp-repare', 'children' => ['Ноутбук' => ['url' => '/comp-repare/noutbook'], 'Планшет' => ['url' => '/comp-repare/tablet'], ]],            
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {

        //https://laravel.demiart.ru/blade-komponenty-v-laravel-7/

        return view('components.app-header');
    }
}
