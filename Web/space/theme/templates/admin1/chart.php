<div id='main-wrapper'>
    <div class='page-title'>
        <h3 class='breadcrumb-header'>溫室溫度</h3>
    </div>
    <div class='alert alert-default' role='alert'>
        溫室狀態每一小時更新一次
    </div>

    <canvas id='chart-temper' width='800' height='450'></canvas>
        <script>
            var tem= <?php echo json_encode($tem)?>;
            var datatime = <?php echo json_encode($datatime)?>;
            var name = <?php echo json_encode($greenhouse_name)?>;
            new Chart(document.getElementById('chart-temper'), {
                type: 'line',
                    data: {
                        labels: [datatime[11],datatime[10],datatime[9],datatime[8],datatime[7],datatime[6],datatime[5],datatime[4],datatime[3],datatime[2],datatime[1],datatime[0]],
                        datasets: [{ 
                            data: [tem[11],tem[10],tem[9],tem[8],tem[7],tem[6],tem[5],tem[4],tem[3],tem[2],tem[1],tem[0]],
                        label: name,
                        borderColor: '#3e95cd',
                        fill: false
                                    }]
                    },
                    options: {
                        title: {
                        display: true,
                        text: '單位 : (row : time  ,  colum : °C)'
                        }
                    }
            });
        </script>
    <div class="page-title">
        <h3 class="breadcrumb-header">溫室溼度</h3>
    </div>
    <div class="alert alert-default" role="alert">
        溫室狀態每一小時更新一次
    </div>

    <canvas id="chart-humidy" width="800" height="450"></canvas>
    <script>
        var hum = <?php echo json_encode($hum)?>;
        var datatime = <?php echo json_encode($datatime)?>;
        var name = <?php echo json_encode($greenhouse_plantname)?>;
        new Chart(document.getElementById("chart-humidy"), {
            type: 'line',
            data: {
                labels: [datatime[11],datatime[10],datatime[9],datatime[8],datatime[7],datatime[6],datatime[5],datatime[4],datatime[3],datatime[2],datatime[1],datatime[0]],
                datasets: [{ 
                data: [hum[11],hum[10],hum[9],hum[8],hum[7],hum[6],hum[5],hum[4],hum[3],hum[2],hum[1],hum[0]],
                label: name,
                borderColor: "#3e95cd",
                fill: false
                }]
            },
            options: {
                title: {
                display: true,
                text: '單位 : (row : time  ,  colum : %)'
                }
            }
        });
    </script>
</div>