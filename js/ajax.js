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
                document.querySelector('#cust_alamat').innerHTML = '<p>'+data[0].alamat+'</p>'
                
                document.querySelector('#cust_penjualan').innerHTML = '<p>Description : '+data[0].customer_description+'</p><br/><p>Total : '+data[0].total+'</p>'

            
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