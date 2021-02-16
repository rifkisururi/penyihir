<!DOCTYPE html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <table>

        <tr>
            <td>Usia Kematian</td>
            <td><input type="number" id="usia1" value="" onchange="getJmlKematian(1)"></td>
        </tr>
        <tr>
            <td>Tahun Kematian</td>
            <td><input type="number" id="th1" value="" onchange="getJmlKematian(1)"></td>
        </tr>
        <tr>
            <td colspan="2">--------------------------------------------------</td>
        </tr>

        <tr>
            <td>Usia Kematian</td>
            <td><input type="number" id="usia2" value="" onchange="getJmlKematian(2)"></td>
        </tr>
        <tr>
            <td>Tahun Kematian</td>
            <td><input type="number" id="th2" value="" onchange="getJmlKematian(2)"></td>
        </tr>
    </table>

    <br><br>
    <div id="rata"></div>

    <script>
        var kematian1 = 0;
        var kematian2 = 0;

        function getJmlKematian(kematian) {
            if (kematian == 1) {
                var usia = document.getElementById('usia1').value;
                var th = document.getElementById('th1').value;
            } else {
                var usia = document.getElementById('usia2').value;
                var th = document.getElementById('th2').value;
            }
            var jml = 0;
            if (usia != 0 && th != 0) {
                if (parseInt(th) - parseInt(usia) > 90) {
                    alert('system error, cannot more than 90 year');
                } else {
                    var urlProses = "<?php echo base_url() ?>index.php/Welcome/getComponenRataRata?usia=" + usia + "&tk=" + th;
                    $.get(urlProses, function(data) {
                        console.log(data);
                        if (kematian == 1) {
                            kematian1 = data;
                        } else {
                            kematian2 = data;
                        }
                        rata();
                    });
                }

            }

        }

        function rata() {


            document.getElementById('rata').innerHTML = "rata-ratanya ( " + numberWithCommas(kematian1) + " + " + numberWithCommas(kematian2) + " ) / 2 = " + numberWithCommas((parseInt(kematian1) + parseInt(kematian2)) / 2);
        }

        function numberWithCommas(x) {
            x = x.toString();
            var pattern = /(-?\d+)(\d{3})/;
            while (pattern.test(x))
                x = x.replace(pattern, "$1,$2");
            return x;
        }
    </script>

</body>

</html>