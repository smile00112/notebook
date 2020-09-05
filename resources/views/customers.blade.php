<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Покупатели</title>

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
                        <h4 class="page-title">Покупатели</h4> </div>

                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Список клиентов</h3>
                            <p class="text-muted m-b-30"></p>
                            <div class="table-responsive">
                                <table border="0" cellspacing="5" cellpadding="5" id="filter">
                                    <tbody><tr>
                                        <td>Город:</td>
                                        <td>
                                            <select id="city" name="city">
                                                <option value="">Выберите город</option>
                                            </select>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Покупок:</td>
                                        <td><input type="text" placeholder="от" id="order_from" name="order_from"></td>
                                        <td><input type="text" placeholder="до" id="order_to" name="order_to"></td>
                                    </tr>
                                    <tr>
                                        <td>Сумма заказа:</td>
                                        <td><input type="text" placeholder="от" id="total_from" name="total_from"></td>
                                        <td><input type="text" placeholder="до" id="total_to" name="total_to"></td>
                                    </tr>                                    
                                </tbody>
                                </table>
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>ФИО</th>
                                            <th>Город</th>
                                            <th>email</th>
                                            <th>Телефон</th>
                                            <th>Покупок</th>
                                            <th>На сумму</th>
                                            <th>Добавлен</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($customers as $customer)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $customer['firstname'] }} {{ $customer['lastname'] }} </td>
                                                <td>{{ $customer['city'] }}</td>
                                                <td>{{ $customer['email'] }}</td>
                                                <td>{{ $customer['telephone'] }}</td>
                                                <td>{{ $customer['orders'] }}</td>
                                                <td>{{ $customer['total'] }}</td>
                                                <td>{{ $customer['date_added'] }}</td> 

                                            </tr>                                       
                                        @endforeach
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
            @include('common/footer')
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2020 &copy;bolshoy.ru </footer>
        </div>

        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
        
        
           


            <script>

                $.fn.dataTable.ext.search.push(
                    function( settings, data, dataIndex ) {
                        var min = parseInt( $('#order_from').val(), 10 );
                        var max = parseInt( $('#order_to').val(), 10 );
                        var orders = parseFloat( data[5] ) || 0; // use data for the age column
                
                        if ( ( isNaN( min ) && isNaN( max ) ) ||
                            ( isNaN( min ) && orders <= max ) ||
                            ( min <= orders   && isNaN( max ) ) ||
                            ( min <= orders   && orders <= max ) )
                        {
                            return true;
                        }
                        return false;
                    }
                );
                $.fn.dataTable.ext.search.push(
                    function( settings, data, dataIndex ) {
                        var min = parseInt( $('#total_from').val(), 10 );
                        var max = parseInt( $('#total_to').val(), 10 );
                        var totals = parseFloat( data[6] ) || 0; // use data for the age column
                
                        if ( ( isNaN( min ) && isNaN( max ) ) ||
                            ( isNaN( min ) && totals <= max ) ||
                            ( min <= totals   && isNaN( max ) ) ||
                            ( min <= totals   && totals <= max ) )
                        {
                            return true;
                        }
                        return false;
                    }
                );


                $(document).ready(function() {
                    var table =  $('#myTable').DataTable();
                    $('#order_from, #order_to, #total_from, #total_to').keyup( function() {
                        table.draw();
                    } );
                    $(document).ready(function() {
                    //     var table = $('#example').DataTable({
                    //         "columnDefs": [{
                    //             "visible": false,
                    //             "targets": 2
                    //         }],
                    //         "order": [
                    //             [2, 'asc']
                    //         ],
                    //         "displayLength": 25,
                    //         "drawCallback": function(settings) {
                    //             var api = this.api();
                    //             var rows = api.rows({
                    //                 page: 'current'
                    //             }).nodes();
                    //             var last = null;
                    //             api.column(2, {
                    //                 page: 'current'
                    //             }).data().each(function(group, i) {
                    //                 if (last !== group) {
                    //                     $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                    //                     last = group;
                    //                 }
                    //             });
                    //         }
                    //     });
                    //     // Order by the grouping
                    //     $('#example tbody').on('click', 'tr.group', function() {
                    //         var currentOrder = table.order()[0];
                    //         if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    //             table.order([2, 'desc']).draw();
                    //         } else {
                    //             table.order([2, 'asc']).draw();
                    //         }
                    //     });
                     });
                });
                // $('#example23').DataTable({
                //     dom: 'Bfrtip',
                //     buttons: [
                //         'copy', 'csv', 'excel', 'pdf', 'print'
                //     ]
                // });
                </script>

        </div>
         <!--<div id="app">
            <main-app/>
            Покупатели Покупатели Покупатели Покупатели 
        </div>
       <script src="{{ asset('js/app.js') }}"></script> -->
    </body>
</html>
