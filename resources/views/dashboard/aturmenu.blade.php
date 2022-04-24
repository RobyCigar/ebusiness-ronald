<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
</head>
<body>

<h1>Form Produk Baru</h1>
    <form action='#create_data' id='data_list'>
        <table border='0'>
            <tr>
                <td>Nama Produk</td>
                <td>
                    <input id="name" class='form-user-input' type='text' name='nama_produk' style='width: 40em'>
                </td>
            </tr>
            <tr>

            <tr>
                <td>Dekripsi Produk</td>
                <td>
                    <input id="description" class='form-user-input' type='text' name='harga_produk' style='width: 40em'>
                </td>
            </tr>
            <tr>
            <tr>
                <td>Stok Produk</td>
                <td>
                    <input id="stock" class='form-user-input' type='number' name='stok_produk' style='width: 40em'>
                </td>
            </tr>
            <tr>
                <td>HPP</td>
                <td>
                    <input id="production_cost" class='form-user-input' type='number' name='stok_produk' style='width: 40em'>
                </td>
            </tr>

            <tr>
            <td>Harga Jual</td>
            <td>
                <input id="price" class='form-user-input' name='deks_produk'>
            </td>
            </tr>
        
            </tr>
            <tr>
                <td colspan='2' style='text-align: right;'>
                    <button id="btn" type='submit'>Kirim Data</button>
                </td>
            </tr>
        </table>
    </form>
    <script>
        $(document).ready(function(){


            $('#btn').click(e => {
                e.preventDefault()
                const name = $('#name').val()
                const description = $('#description').val()
                const price = parseInt($('#price').val())
                const stock = parseInt($('#stock').val())
                const production_cost = parseInt($('#production_cost').val())
                
                const data = {name, description, price, stock, production_cost}

                $.ajax("{{route('product.store')}}", {
                    type : 'POST',
                    data : data,
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    },
                    success: function (data){
                        console.log('here')
                    },
                    error: function (jqXHR, textStatus, errorMessage) {
                        alert('Error : ' + errorMessage)
                    }
                })
            })
        });
    </script>

</body>
</html>