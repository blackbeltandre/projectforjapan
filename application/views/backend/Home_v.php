   
                    <div id="tab-general">
                        <div id="sum_box" class="row mbl">
                            <div class="col-sm-6 col-md-3">
                                <div class="panel profit db mbm">
                                    <div class="panel-body">
                                        <p class="icon">
                                            <i class="icon fa fa-shopping-cart"></i>
                                        </p>
                                        <h4 class="value">
                                            <span data-counter="" data-start="10" data-end="50" data-step="1" data-duration="0">
                                            </span><span><?php
                                                    $ip = $_SERVER['REMOTE_ADDR'];
                                                    ?> <?php echo $ip; ?></span></h4>
                                        <p class="description">
                                            IP Address</p>
                                        <div class="progress progress-sm mbn">
                                            <div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 80%;" class="progress-bar progress-bar-success">
                                                <span class="sr-only">80% Complete (success)</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="panel income db mbm">
                                    <div class="panel-body">
                                        <p class="icon">
                                            <i class="icon fa fa-money"></i>
                                        </p>
                                        <h4 class="value">
                                            <span><?php
                                            echo gethostbyaddr($_SERVER['REMOTE_ADDR']); ?></span><span></span></h4>
                                        <p class="description">
                                            Computer Name</p>
                                        <div class="progress progress-sm mbn">
                                            <div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 60%;" class="progress-bar progress-bar-info">
                                                <span class="sr-only">60% Complete (success)</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="panel task db mbm">
                                    <div class="panel-body">
                                        <p class="icon">
                                            <i class="icon fa fa-signal"></i>
                                        </p>
                                        <h4 class="value">
                                            <span><?php
                                                $pengguna->level_login = $pengguna->level_login;
                                                $pengguna->level_login1 = ('1');
                                                $pengguna->level_login2 = ('2');
                                                ?>
                                                <?php
                                                if ($pengguna->level_login1  == $pengguna->level_login) {
                                                    echo "ADMINISTRATOR";
                                                } elseif ($pengguna->level_login2 == $pengguna->level_login) {
                                                    echo "PEGAWAI";
                                                }
                                                ?></span></h4>
                                        <p class="description">
                                             Status Login :</p>
                                        <div class="progress progress-sm mbn">
                                            <div role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 50%;" class="progress-bar progress-bar-danger">
                                                <span class="sr-only">50% Complete (success)</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="panel visit db mbm">
                                    <div class="panel-body">
                                        <p class="icon">
                                            <i class="icon fa fa-group"></i>
                                        </p>
                                        <h4 class="value">
                                            <span>1</span></h4>
                                        <p class="description">
                                            User Aktif:</p>
                                        <div class="progress progress-sm mbn">
                                            <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 70%;" class="progress-bar progress-bar-warning">
                                                <span class="sr-only">70% Complete (success)</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
           
                        <!-- Top Stats -->
                       
                                <!--/ END Statistic Widget -->
                           
                            
                        <!--/ Top Stats -->

                        <!-- Website States -->
                              
            
                                    <!--/ panel-toolbar -->
                                    <!-- panel-body -->
                                   

    <script type="text/javascript">
    $(document).ready(function() {
        $('#category_article').highcharts({
       chart: {
                type: 'column'
            },
            title: {
                text: 'Persentase Category Article'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
        type : 'Category Article'
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Statistic Article With Spesific Category'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{point.key} </td>' +
                    '<td style="padding:0"><b>{point.y} article </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name:"CATEGORY ARTICLE",
            data: [<?php
                foreach($category_article as $val){
                            echo "{name: '".$val["category"]."', y:".$val["id_category"]."},";
                }   
                ?>
                    ]
                }]
        });
    
        $('#counter_article').highcharts({
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Counter Visitor Article'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
        type : 'Counter Article'
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Perolehan '
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{point.key} </td>' +
                    '<td style="padding:0"><b>{point.y} x dilihat</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
        data: [<?php
            foreach($counter_article as $val){
                        echo "{name: '".$val["title"]."', y:".$val["counter"]."},";
            }   
            ?>
                ]
            }]
        });
  $('#visitor').highcharts({
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Persentase Visitor '
            },
            subtitle: {
                text: ''
            },
            xAxis: {
        type : 'Visitor'
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Traffic Visitor  '
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{point.key} </td>' +
                    '<td style="padding:0"><b>{point.y} visitor</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
         name:"VISITOR",
        data: [<?php
            foreach($visitor as $val){
                        echo "{name: '".$val["browser"]."', y:".$val["count"]."},";
            }   
            ?>
                ]
            }]
        });


       $('#category_gallery').highcharts({
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Persentase Visitor Gallery'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
        type : 'Gallery'
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Traffic Visitor To Gallery '
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{point.key} </td>' +
                    '<td style="padding:0"><b>{point.y} x dilihat</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
        data: [<?php
            foreach($category_gallery as $val){
                        echo "{name: '".$val["title"]."', y:".$val["counter"]."},";
            }   
            ?>
                ]
            }]
        });

    
        $('#counter_gallery').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Statistic Category Gallery With Spesific Article'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
        type : 'Category Gallery'
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Persentase Gallery'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{point.key} </td>' +
                    '<td style="padding:0"><b>{point.y} article </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
        data: [<?php
            foreach($counter_gallery as $val){
                        echo "{name: '".$val["category"]."', y:".$val["id_category_gallery"]."},";
            }   
            ?>
                ]
            }]
        });
    });

    </script><div class="row"><div class="col-md-12">
               <div class="col-md-4">
                    <div id="category_article"></div>
               </div>
                 <div class="col-md-4">
                    <div id="counter_article"></div>
                </div>
       <div class="col-md-4">
                    <div id="visitor"></div>
                </div>
              <!--  <div class="col-md-6">
                 <div id="category_gallery"></div>
                </div>
                  <div class="col-md-6">
                    <div id="counter_gallery"></div>
                 </div>    
         -->
   
</div>
      </div>
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

  </body>
</html>
