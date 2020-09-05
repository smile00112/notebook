<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Заказы</title>

        <!-- Styles 
        <link rel="stylesheet" href=" {{ asset('tmpl/css/style.default.css') }}" rel="stylesheet" >
        -->

        <link href="/tmpl2/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Menu CSS -->
        <link href="/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
        <!-- toast CSS -->
        <link href="/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
        <!-- morris CSS -->
        <link href="/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
        <!-- chartist CSS -->
        <link href="/plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
        <link href="/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
        <!-- Calendar CSS -->
        <link href="/plugins/bower_components/calendar/dist/fullcalendar.css" rel="stylesheet" />
        <!-- animation CSS -->
        <link href="/tmpl2/css/animate.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="/tmpl2/css/style.css" rel="stylesheet">
        <!-- color CSS -->
        <link href="/tmpl2/css/colors/default.css" id="theme" rel="stylesheet">
        

        <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />


    </head>
    <body class="fix-header">
        <div class="preloader" >
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
            </svg>
        </div>

        <div id="wrapper">

            @include('common/header')

        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Метрики</h4> </div>

                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                
 <!-- /row -->
                <!-- ============================================================== -->
                <!-- SALES analyitics widgets -->
                <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- Sales, finance & Expance widgets -->
                        <!-- ============================================================== -->
                        <!-- .row -->
                        <div class="row">
                            <!-- col-md-3 -->
                            <div class="col-md-6 col-lg-5 col-sm-12">
                                <div class="white-box">
                                    <h3 class="box-title">Продажи</h3>
                                    <div id="morris-donut-chart" style="height:318px; padding-top: 50px;"></div>
                                    <div class="row p-t-30">
                                        <div class="col-xs-8 p-t-30">
                                            <h3 class="font-medium">Всего продаж</h3>
                                            <h5 class="text-muted m-t-0">238</h5></div>
                                        <div class="col-xs-8 p-t-30">
                                            <h3 class="font-medium">На сумму</h3>
                                            <h5 class="text-muted m-t-0">1 128 660 <i class="fa fa-rub"></i></h5></div>                                            
                                            
                                        <div class="col-xs-4 p-t-30">
                                            <div class="circle-md pull-right circle bg-info"><i class="ti-shopping-cart"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- col-md-3 -->
    
                            <div class="col-lg-6 col-md-6">
                                <div class="white-box">
                                    <h3 class="box-title">Выручка</h3>
                                    <ul class="country-state">
                                        <li>
                                            <h2>508 239<i class="fa fa-rub"></i></h2> <small>Май</small>
                                            <div class="pull-right">45% <i class="fa fa-level-up text-success"></i></div>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:48%;"> <span class="sr-only">48% Complete</span></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2>186 780<i class="fa fa-rub"></i></h2> <small>Июнь</small>
                                            <div class="pull-right">13% <i class="fa fa-level-up text-success"></i></div>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:98%;"> <span class="sr-only">98% Complete</span></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2>277 622<i class="fa fa-rub"></i></h2> <small>Июль</small>
                                            <div class="pull-right">35% <i class="fa fa-level-down text-danger"></i></div>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:75%;"> <span class="sr-only">75% Complete</span></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2>156 019<i class="fa fa-rub"></i></h2> <small>Август</small>
                                            <div class="pull-right">7% <i class="fa fa-level-up text-success"></i></div>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:48%;"> <span class="sr-only">48% Complete</span></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <!-- /.row -->
                        <!-- ============================================================== -->
                        <!-- finance & Expance widgets -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-md-7 col-lg-7 col-sm-6 col-xs-12">
                                <div class="white-box">
                                    <h3 class="box-title">SALES ANALYTICS</h3>
                                    <ul class="list-inline text-center">
                                        <li>
                                            <h5><i class="fa fa-circle m-r-5" style="color: #dadada;"></i>Site A View</h5> </li>
                                        <li>
                                            <h5><i class="fa fa-circle m-r-5" style="color: #e2eff8;"></i>Site B View</h5> </li>
                                    </ul>
                                    <div id="morris-area-chart3" style="height: 380px;"></div>
                                </div>
                            </div>
                            <div class="col-md-5 col-lg-5 col-sm-6 col-xs-12">
                                <div class="white-box">
                                    <h3 class="box-title">Посетители</h3>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6  m-t-30">
                                            <h1 class="text-warning">6778</h1>
                                            <p class="text-muted">APRIL 2016</p> <b>(843 продаж)</b> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div id="sales1" class="text-center"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-lg-5 col-sm-6 col-xs-12">
                                <div class="white-box">
                                    <h3 class="box-title">Всего выручки</h3>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6  m-t-30">
                                            <h1 class="text-info">5 122 585<i class="fa fa-rub"></i></h1>
                                            <p class="text-muted"></p> <b></b> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div id="sales2" class="text-center"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                        <div class="row">
                            <div class="col-md-12 col-lg-8 col-sm-12">
                                <div class="calendar-widget m-b-30">
                                    <div class="cal-left">
                                        <h1>23</h1>
                                        <h4>Thursday</h4> <span></span>
                                        <h5>March 2017</h5>
                                        <div class="cal-btm-text"> <a href="">3 TASKS</a>
                                            <h5>Prepare project</h5> </div>
                                    </div>
                                    <div class="cal-right bg-extralight">
                                        <table class="cal-table">
                                            <tbody>
                                                <tr>
                                                    <td colspan="5">
                                                        <h1>March</h1></td>
                                                    <td></td>
                                                    <td><a href="" class="cal-add"><i class="ti-plus"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>SUN</td>
                                                    <td>MON</td>
                                                    <td>TUE</td>
                                                    <td>WED</td>
                                                    <td>THU</td>
                                                    <td>FRI</td>
                                                    <td>SAT</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td>2</td>
                                                    <td>3</td>
                                                    <td>4</td>
                                                    <td>5</td>
                                                    <td>6</td>
                                                </tr>
                                                <tr>
                                                    <td>7</td>
                                                    <td>8</td>
                                                    <td>9</td>
                                                    <td>10</td>
                                                    <td>11</td>
                                                    <td>12</td>
                                                    <td>13</td>
                                                </tr>
                                                <tr>
                                                    <td>14</td>
                                                    <td>15</td>
                                                    <td>16</td>
                                                    <td>17</td>
                                                    <td>18</td>
                                                    <td>19</td>
                                                    <td>20</td>
                                                </tr>
                                                <tr>
                                                    <td>21</td>
                                                    <td>22</td>
                                                    <td class="cal-active">23</td>
                                                    <td>24</td>
                                                    <td>25</td>
                                                    <td>26</td>
                                                    <td>27</td>
                                                </tr>
                                                <tr>
                                                    <td>28</td>
                                                    <td>29</td>
                                                    <td>30</td>
                                                    <td>31</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="7"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4 col-sm-12">
                                <div class="white-box">
                                    <h3 class="box-title">Finance</h3>
                                    <div id="diagram"></div>
                                    <div class="get">
                                        <div class="arc"> <span class="text">Aug</span>
                                            <input type="hidden" class="percent" value="95" />
                                            <input type="hidden" class="color" value="#53e69d" /> </div>
                                        <div class="arc"> <span class="text">Sep</span>
                                            <input type="hidden" class="percent" value="90" />
                                            <input type="hidden" class="color" value="#ff7676" /> </div>
                                        <div class="arc"> <span class="text">Oct</span>
                                            <input type="hidden" class="percent" value="80" />
                                            <input type="hidden" class="color" value="#88B8E6" /> </div>
                                        <div class="arc"> <span class="text">Nov</span>
                                            <input type="hidden" class="percent" value="53" />
                                            <input type="hidden" class="color" value="#BEDBE9" /> </div>
                                        <div class="arc"> <span class="text">Dec</span>
                                            <input type="hidden" class="percent" value="45" />
                                            <input type="hidden" class="color" value="#EDEBEE" /> </div>
                                    </div>
                                    <div class="row p-t-30">
                                        <div class="col-xs-8">
                                            <h1 class="font-medium m-t-0">56%</h1>
                                            <h5 class="text-muted m-t-0">increase in November</h5></div>
                                        <div class="col-xs-4">
                                            <div class="circle-md pull-right circle bg-success"><i class="ti-stats-up"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- wallet, & manage users widgets -->
                        

                        <!-- /.col -->


                <!-- /.row -->
                <!-- ============================================================== -->
                <script src="/plugins/bower_components/jquery/dist/jquery.min.js"></script>
                <!-- Bootstrap Core JavaScript --> 
                <script src="/tmpl2/bootstrap/dist/js/bootstrap.min.js"></script>
                <!-- Menu Plugin JavaScript -->
                <script src="/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
                <!--slimscroll JavaScript -->
                <script src="/tmpl2/js/jquery.slimscroll.js"></script>
                <!--Wave Effects -->
                <script src="/tmpl2/js/waves.js"></script>
                <!--Morris JavaScript -->
                <script src="/plugins/bower_components/raphael/raphael-min.js"></script>
                <script src="/plugins/bower_components/morrisjs/morris.js"></script>
                <!-- jQuery for carousel -->
                <script src="/plugins/bower_components/owl.carousel/owl.carousel.min.js"></script>
                <script src="/plugins/bower_components/owl.carousel/owl.custom.js"></script>
                <!-- Flot Charts JavaScript -->
                <script src="/plugins/bower_components/flot/jquery.flot.js"></script>
                <script src="/plugins/bower_components/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
                <!-- Animated skill bar -->
                <script src="/plugins/bower_components/AnimatedSkillsDiagram/js/animated-bar.js"></script>
                <!-- Sparkline chart JavaScript -->
                <script src="/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
                <!-- chartist chart -->
                <script src="/plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
                <script src="/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
                <!-- Guage chart -->
                <script src="/plugins/bower_components/Minimal-Gauge-chart/js/cmGauge.js"></script>
                <!-- Custom Theme JavaScript -->
                <script src="/tmpl2/js/custom.min.js"></script>
               <!--   <script src="/tmpl2/js/widget-ext.js"></script>
               Custom tab JavaScript -->
                <script src="/tmpl2/js/cbpFWTabs.js"></script>
                <script type="text/javascript">
                // (function() {
                //     [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
                //         new CBPFWTabs(el);
                //     });
                // })();
                </script>
                <!--Style Switcher -->
                <script src="/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>

            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2020 &copy;bolshoy.ru </footer>
        </div>

        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
        
        <script>
            $(document).ready(function () {
            Morris.Area({
                        element: 'morris-area-chart3',
                        data: [{
                                period: '2010',
                                SiteA: 0,
                                SiteB: 0,

                        }, {
                                period: '2011',
                                SiteA: 130,
                                SiteB: 100,

                        }, {
                                period: '2012',
                                SiteA: 80,
                                SiteB: 60,

                        }, {
                                period: '2013',
                                SiteA: 70,
                                SiteB: 200,

                        }, {
                                period: '2014',
                                SiteA: 180,
                                SiteB: 150,

                }, {
                        period: '2015',
                        SiteA: 105,
                        SiteB: 90,

                },
                    {
                        period: '2016',
                        SiteA: 250,
                        SiteB: 150,

                }],
                    xkey: 'period',
                    ykeys: ['SiteA', 'SiteB'],
                    labels: ['Site A', 'Site B'],
                    pointSize: 0,
                    fillOpacity: 0.4,
                    pointStrokeColors: ['#b4becb', '#2cabe3'],
                    behaveLikeLine: true,
                    gridLineColor: '#e0e0e0',
                    lineWidth: 0,
                    smooth: false,
                    hideHover: 'auto',
                    lineColors: ['#b4becb', '#2cabe3'],
                    resize: true

            });

            // Morris donut chart
            Morris.Donut({
                element: 'morris-donut-chart',
                data: [{
                    label: "Май",
                    value: 87,
            }, {
                    label: "Июнь",
                    value: 43,
            }, {
                    label: "Июль",
                    value: 64,
            }, {
                    label: "Август",
                    value: 44
                }],
                resize: true,
                colors: ['#f33155', '#7460ee', '#7ace4c', '#11a0f8']
            });

        });
        </script>
           
        
        </div>
         <!--<div id="app">
            <main-app/>
            Покупатели Покупатели Покупатели Покупатели 
        </div>
       <script src="{{ asset('js/app.js') }}"></script> -->
    </body>
</html>
