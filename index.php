<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles/style.css" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/ajax.js"></script>

</head>

<body>
    <div class="wrapper">
        <div class="inner-wrapper">
            <div class="filter-wrapper">
                <label for="customerName">Nama Customer:</label>
                <select id="customerName" name="customerName" class="select-custom">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="fiat">Fiat</option>
                    <option value="audi">Audi</option>
                </select>
            </div>
            <p>Alamat</p>
            <div class="alamat-wrapper" id="cust_alamat">
                <p>Belum ada</p>
            </div>
            <p>Penjualan 1 Tahun Terakhir</p>
            <div class="penjualan-wrapper" id="cust_penjualan">
                <p>Belum ada</p>
            </div>

        </div>
    </div>
    <script>
    window.addEventListener('load', function() {

        function loadData() {

            $.ajax({
                url: 'get-list.php',
                dataType: "json",
                type: 'get',
                success: function(data) {
                    const custParent = document.querySelector('#customerName');

                    let result = '<option value="-" > belum ada</option>';
                    for (let i = 0; i < data.length; i++) {
                        console.log('halo')
                        result += '<option value="' + data[i].customerid + '">' + data[i]
                            .customer_name + '</option>';
                    }
                    console.log(result)
                    custParent.innerHTML = result;
                    $('#contentData').html(data);
                },
                error: function(data) {
                    console.log(data)
                },
            });
        }

        function loadDataFilter(id) {


            $.ajax({
                url: 'get-customer.php',
                dataType: "json",
                data: {
                    id: id
                },
                type: 'get',
                success: function(data) {
                    console.log(data)

                    const custParent = document.querySelector('#customerName');
                    document.querySelector('#cust_alamat').innerHTML = '<p>' + data[0].alamat +
                        '</p>'

                    document.querySelector('#cust_penjualan').innerHTML = '<p>Description : ' +
                        data[0].customer_description + '</p><br/><p>Total : ' + data[0].total +
                        '</p>'


                },
                error: function(data) {
                    console.log(data)
                },
            });
        }

        loadData();

        let selectOption = document.querySelector('#customerName');
        selectOption.addEventListener('change', function() {
            if (selectOption.value !== '-') {
                const dataSelect = $('#customerName').val();

                loadDataFilter(dataSelect)
            } else {
                document.querySelector('#cust_alamat').innerHTML = '<p>Belum ada</p>'
                document.querySelector('#cust_penjualan').innerHTML = '<p>Belum ada</p>'
            }
        })
    })
    </script>
</body>

</html>