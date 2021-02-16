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

        function rata() {
            console.log('kematian1', kematian1);
            console.log('kematian2', kematian2);
            document.getElementById('rata').innerHTML = "rata-ratanya (" + kematian1 + " + " + kematian2 + ")/2 = " + (parseInt(kematian1) + parseInt(kematian2)) / 2;
        }
    </script>

</body>

</html>