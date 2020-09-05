<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use YandexMetrika;

class metrikaApi extends Controller
{
    //
    private $token      = "AgAAAAANPUq_AAaDliHJL2qaJEhNjXFWZ59zeGs";
    private $url_api    = "https://api-metrika.yandex.ru/";
    private $counter_id = "28667266";

/*
ПУБЛИКАЦИЯ 
https://cli.vuejs.org/ru/guide/deployment.html#github-pages

Права:
Получение статистики, чтение параметров своих и доверенных счётчиков

ID: 8619f97c17554075b9b0c37a1a41f91d
Пароль: 833bbe1929b24863b25d364df90336a7
token: AgAAAAANPUq_AAaDliHJL2qaJEhNjXFWZ59zeGs
Callback URL: https://oauth.yandex.ru/verification_code

https://oauth.yandex.ru/authorize?response_type=token&client_id=8619f97c17554075b9b0c37a1a41f91d

Время жизни токена: Не менее, чем 1 год
Дата создания: 7/23/2020



YandexMetrika::getVisitsViewsUsers();   //По умолчанию - за последние 30 дней
//Пример
YandexMetrika::getVisitsViewsUsers(10); //За последние 10 дней
//За период
YandexMetrika::getVisitsViewsUsersForPeriod(DateTime $startDate, DateTime $endDate) //За указанный период

//Обработка полученных данных для построения графика Highcharts › Basic line
YandexMetrika::getVisitsViewsUsers()->adapt();
Самые просматриваемые страницы
YandexMetrika::getTopPageViews();       //По умолчанию за последние 30 дней, количество результатов - 10
//Пример
YandexMetrika::getTopPageViews(10, 50); //За последние 10 дней, максимум 50 результатов
//За период
YandexMetrika::getTopPageViewsForPeriod(DateTime $startDate, DateTime $endDate, $maxResults = 10)   //По умолчанию максимум 10 результатов
//Обработка полученных данных
YandexMetrika::getTopPageViews()->adapt();


Отчет "Источники - Сводка"
YandexMetrika::getSourceSummary();      //По умолчанию за последние 30 дней
//Пример
YandexMetrika::getSourceSummary(7);     //За последние 10 дней
//За период
YandexMetrika::getSourcesSummaryForPeriod(DateTime $startDate, DateTime $endDate)
//Обработка полученных данных
YandexMetrika::getSourcesSummary()->adapt();
Отчет "Источники - Поисковые фразы"
YandexMetrika::getSourcesSearchPhrases();       //По умолчанию за последние 30 дней, количество результатов - 10
//Пример
YandexMetrika::getSourcesSearchPhrases(15, 20); //За последние 15 дней, максимум 20 результатов
//За период
YandexMetrika::getSourcesSearchPhrasesForPeriod(DateTime $startDate, DateTime $endDate, $maxResult = 10)    //По максимум - 10 результатов
//Обработка полученных данных
YandexMetrika::getSourcesSearchPhrases()->adapt();


Отчет "Технологии - Браузеры"
YandexMetrika::getTechPlatforms();      //По умолчанию за последние 30 дней, макс количество результатов - 10
//Пример
YandexMetrika::getTechPlatforms(12, 5); //За последние 12 дней, максимум 5 результатов
//За период
YandexMetrika::getTechPlatformsForPeriod(DateTime $startDate, DateTime $endDate, $maxResult = 10)   //По умолчанию максимум 10 результатов
//Обработка полученных данных
YandexMetrika::getTechPlatforms()->adapt();


Количество визитов и посетителей с учетом поисковых систем
YandexMetrika::getVisitsUsersSearchEngine();    //По умолчанию за последние 30 дней, макс количество результатов - 10
//Пример
YandexMetrika::getVisitsUsersSearchEngine(24, 60);  //За последние 24 дня, максимум 60 результатов
//За период
YandexMetrika::getVisitsUsersSearchEngineForPeriod(DateTime $startDate, DateTime $endDate, $maxResult = 10) //По умолчанию максимум 10 результатов
//Обработка полученных данных
YandexMetrika::getVisitsUsersSearchEngine()->adapt();


Количество визитов с заданной глубиной просмотра
YandexMetrika::getVisitsViewsPageDepth();       //По умолчанию за последние 30 дней, количество просмотренных страниц - 5
//Пример
YandexMetrika::getVisitsViewsPageDepth(14, 30);   //За последние 14 дней, макс количество результатов - 30
//За период
YandexMetrika::getVisitsViewsPageDepthForPeriod(DateTime $startDate, DateTime $endDate, $pages = 5) //По умолчанию - 5 страниц
//Обработка полученных данных
YandexMetrika::getVisitsViewsPageDepth()->adapt();


Отчеты о посещаемости сайта с распределением по странам и регионам
YandexMetrika::getGeoCountry();   //По умолчанию за последние 7 дней, макс количество результатов - 100
//Пример
YandexMetrika::getGeoCountry(12, 30);   //За последние 12 дней, макс количество результатов - 30
//За период
YandexMetrika::getGeoCountryForPeriod(DateTime $startDate, DateTime $endDate, $maxResult = 100) //По умолчанию максимум 100 результатов
//Обработка полученных данных для построения графика Highcharts.js > Pie with drilldown
YandexMetrika::getGeoCountry()->adapt()();


Отчеты о посещаемости сайта с распределением по областям и городам
YandexMetrika::getGeoArea();   //По умолчанию за последние 7 дней, макс количество результатов - 100, Страна - Россия (id-225)
//Пример
YandexMetrika::getGeoArea(12, 30, 187);   //За последние 12 дней, макс количество результатов - 30, страна - Украина
//За период
YandexMetrika::getGeoAreaForPeriod(DateTime $startDate, DateTime $endDate, $maxResult = 100, $countryId = 225)
//Обработка полученных данных для построения графика Highcharts.js > Pie with drilldown
YandexMetrika::getGeoArea()->adapt()();
Для методов getGeoCountry() и getGeoArea() - метод обработки данных общий - adaptGeoPie()

Произвольный запрос к Api Yandex Metrika
//Параметры запроса
$urlParams = [
            'ids'           => '123456',                        //id счетчика
            'date1'         => Carbon::today()->subDays(10),    //Начальная дата
            'date2'         => Carbon::today(),                 //Конечная дата
            'metrics'       => 'ym:s:visits',
            'filters'       => 'ym:s:pageViews>5'
        ];
//Запрос
YandexMetrika::getRequestToApi($urlParams);

все регионы яндекса
https://api.content.market.yandex.ru/v2/geo/regions

список регионов

ymaps.ready(function () {
   ymaps.regions.load('RU').then(function (result) {
      lastCollection = result.geoObjects;
      lastCollection.each(function (reg) {
         console.log( reg.properties.get('name')) ;
      });
   });
});

https://github.com/alexusmai/yandex-metrika/blob/master/README.md
*/

    public function show(){
        
    //    $rez = $this->get_traffic(
    //         date("Ymd"),
    //         date("Ymd")
    //     );
    //     echo '<pre>';
    //     print_r($rez);
    //     echo '</pre>';

   // YandexMetrika::setCounter($token, $counterId, $cache)->getVisitsViewsUsers();
       $rez =  YandexMetrika::getGeoArea(200, 1000);
     
       echo '<pre>';
        print_r($rez);
        echo '</pre>';  
    }

    public function widgets()
    {
        $data = [];
        return view('widgets', $data);
    }

    public function get_traffic($date1, $date2)
    {

        // return $this->get_data(
        //     $this->url_api .
        //     "stat/v1/data?id=" .
        //     $this->counter_id .
        //     "&metrics=ym:s:users,ym:s:visits,ym:s:pageviews" .
        //     "&pretty=1" .
        //     "&date1=" . $date1 .
        //     "&date2=" . $date2 .
        //     "&oauth_token=" .
        //     $this->token
        // );
    }

    private function get_data($url)
    {

//$url = 'https://api-metrika.yandex.net/stat/v1/data?preset=sources_summary&id=44147844';
/*
[ '151234' , 'Якутия' , 'RU-SA'],
[ '190090' , 'Красноярский край' , 'RU-KYA'],
[ '140337' , 'Архангельская область' , 'RU-ARK'],
[ '145454' , 'Иркутская область' , 'RU-IRK'],
[ '191706' , 'Ямало-Ненецкий автономный округ' , 'RU-YAN'],
[ '140296' , 'Ханты-Мансийский автономный округ' , 'RU-KHM'],
[ '151233' , 'Камчатский край' , 'RU-KAM'],
[ '151223' , 'Хабаровский край' , 'RU-KHA'],
[ '151231' , 'Чукотский автономный округ' , 'RU-CHU'],
[ '115136' , 'Республика Коми' , 'RU-KO'],
[ '274048' , 'Ненецкий автономный округ' , 'RU-NEN'],
[ '394235' , 'Сахалинская область' , 'RU-SAK'],
[ '151228' , 'Магаданская область' , 'RU-MAG'],
[ '145729' , 'Бурятия' , 'RU-BU'],
[ '145730' , 'Забайкальский край' , 'RU-ZAB'],
[ '147166' , 'Амурская область' , 'RU-AMU'],
[ '140295' , 'Томская область' , 'RU-TOM'],
[ '2099216' , 'Мурманская область' , 'RU-MUR'],
[ '115106' , 'Вологодская область' , 'RU-VLG'],
[ '140291' , 'Тюменская область' , 'RU-TYU'],
[ '151225' , 'Приморский край' , 'RU-PRI'],
[ '79379' , 'Свердловская область' , 'RU-SVE'],
[ '77669' , 'Оренбургская область' , 'RU-ORE'],
[ '393980' , 'Республика Карелия' , 'RU-KR'],
[ '145195' , 'Тыва' , 'RU-TY'],
[ '140294' , 'Новосибирская область' , 'RU-NVS'],
[ '115135' , 'Пермский край' , 'RU-PER'],
[ '144764' , 'Алтайский край' , 'RU-ALT'],
[ '115100' , 'Кировская область' , 'RU-KIR'],
[ '176095' , 'Ленинградская область' , 'RU-LEN'],
[ '77677' , 'Башкортостан' , 'RU-BA'],
[ '72193' , 'Саратовская область' , 'RU-SAR'],
[ '140292' , 'Омская область' , 'RU-OMS'],
[ '2095259' , 'Тверская область' , 'RU-TVE'],
[ '77687' , 'Челябинская область' , 'RU-CHE'],
[ '85606' , 'Ростовская область' , 'RU-ROS'],
[ '77665' , 'Волгоградская область' , 'RU-VGG'],
[ '108083' , 'Калмыкия' , 'RU-KL'],
[ '79374' , 'Татарстан' , 'RU-TA'],
[ '72195' , 'Нижегородская область' , 'RU-NIZ'],
[ '144763' , 'Кемеровская область' , 'RU-KEM'],
[ '85963' , 'Костромская область' , 'RU-KOS'],
[ '145194' , 'Республика Алтай' , 'RU-AL'],
[ '140290' , 'Курганская область' , 'RU-KGN'],
[ '89331' , 'Новгородская область' , 'RU-NGR'],
[ '108082' , 'Краснодарский край' , 'RU-KDA'],
[ '112819' , 'Астраханская область' , 'RU-AST'],
[ '190911' , 'Хакасия' , 'RU-KK'],
[ '51490' , 'Московская область' , 'RU-MOS'],
[ '155262' , 'Псковская область' , 'RU-PSK'],
[ '72194' , 'Самарская область' , 'RU-SAM'],
[ '109876' , 'Дагестан' , 'RU-DA'],
[ '108081' , 'Ставропольский край' , 'RU-STA'],
[ '72181' , 'Воронежская область' , 'RU-VOR'],
[ '81996' , 'Смоленская область' , 'RU-SMO'],
[ '72192' , 'Ульяновская область' , 'RU-ULY'],
[ '72182' , 'Пензенская область' , 'RU-PNZ'],
[ '72639' , 'Республика Крым' , 'UA-43'],
[ '72197' , 'Владимирская область' , 'RU-VLA'],
[ '147167' , 'Еврейская автономная область' , 'RU-YEV'],
[ '81994' , 'Ярославская область' , 'RU-YAR'],
[ '81997' , 'Брянская область' , 'RU-BRY'],
[ '72196' , 'Мордовия' , 'RU-MO'],
[ '115114' , 'Марий Эл' , 'RU-ME'],
[ '71950' , 'Рязанская область' , 'RU-RYA'],
[ '115134' , 'Удмуртия' , 'RU-UD'],
[ '72223' , 'Курская область' , 'RU-KRS'],
[ '81995' , 'Калужская область' , 'RU-KLU'],
[ '83184' , 'Белгородская область' , 'RU-BEL'],
[ '72180' , 'Тамбовская область' , 'RU-TAM'],
[ '85617' , 'Ивановская область' , 'RU-IVA'],
[ '72224' , 'Орловская область' , 'RU-ORL'],
[ '81993' , 'Тульская область' , 'RU-TUL'],
[ '72169' , 'Липецкая область' , 'RU-LIP'],
[ '103906' , 'Калининградская область' , 'RU-KGD'],
[ '80513' , 'Чувашия' , 'RU-CU'],
[ '253256' , 'Адыгея' , 'RU-AD'],
[ '109877' , 'Чечня' , 'RU-CE'],
[ '109878' , 'Карачаево-Черкесия' , 'RU-KC'],
[ '109879' , 'Кабардино-Балкария' , 'RU-KB'],
[ '110032' , 'Северная Осетия' , 'RU-SE'],
[ '102269' , 'Москва' , 'RU-MOW'],
[ '337422' , 'Санкт-Петербург' , 'RU-SPE'],
[ '253252' , 'Ингушетия' , 'RU-IN'],
[ '1574364' , 'Севастополь' , 'UA-40'],
]




*/

        return false;
    }

}
