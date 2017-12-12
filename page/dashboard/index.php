
<div id="wrapper">
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="margin: 0;"></h2>
                </div>
            </div><br/>


            <div class="row">
                <div class="col-md-6">
                    
                </div>
                <div class="col-md-6">
                    
                </div>
            </div><br/><br/>
            <div class="row">
                <div class="col-md-12">
                    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Usulan & Realisasi'
    },
    subtitle: {
        
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rp'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>Rp. {point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        },
        series: {
        borderWidth: 0,
        dataLabels: {
            enabled: true,
            format: 'Rp. {point.y}'
        }
    },
        
    },
    series: [{
        name: 'Usulan',
        data: [
            <?php
                for($i=1; $i<=12; $i++) {
                    $sql1 = mysql_query("SELECT 
                    Sum(((volumejasa*hrgsatuanjasa)+(volumematerial*hrgsatuanmaterial))) AS usulan 
                    FROM newdetailanggaran 
                    INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid 
                    where newdetailanggaran.status = '3' AND MONTH(tartglmulai)=$i AND headeranggaran.kodeapp = '$_SESSION[kodeapp]'") or die(mysql_error());
                    $row1 = mysql_fetch_array($sql1);
    
                    $data1 = !empty($row1['usulan']) ? $row1['usulan'] : 0;
    
                    $a1[] = $data1;
                }
    
                $b1 = implode(',', $a1);
    
                echo $b1;
            ?>
        ]

    }, {
        name: 'Realisasi',
        data: [
            <?php
                for($j=1; $j<=12; $j++) {
                    $sql2 = mysql_query("SELECT 
                        SUM(nilaikontrak) AS realisasi,
                        headeranggaran.*
                        FROM realisasi
                        INNER JOIN headeranggaran ON realisasi.randomid = headeranggaran.randomid
                        where realisasi.status = '9' AND MONTH(tglkontrak)=$j AND headeranggaran.kodeapp = '$_SESSION[kodeapp]'") or die(mysql_error());
                    $row2 = mysql_fetch_array($sql2);
    
                    $data2 = !empty($row2['realisasi']) ? $row2['realisasi'] : 0;
    
                    $a2[] = $data2;
                }
    
                $b2 = implode(',', $a2);
    
                echo $b2;
            ?>
        ]

    }]
});
		</script>
