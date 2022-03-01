<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0;">
        <meta name="format-detection" content="telephone=no"/>
    </head>
    <style>
        table {
            width: 80%;
            margin: 50px auto;
            caption-side: bottom;
            border-collapse: collapse;
        }
        .table-bordered, .table-bordered td, .table-bordered th {
            border: 1px solid #eff2f7;
        }
        tbody, td, tfoot, th, thead, tr {
            border: 0 solid;
            border-color: inherit;
        }
        .table .table-light {
            color: #495057;
            border-color: #eff2f7;
            background-color: #f8f9fa;
        }
        .table-bordered, .table-bordered td, .table-bordered th {
            border: 1px solid #eff2f7;
        }
    </style>
    <body>
        <table class="table table-bordered">
            <thead></thead>
            @if($is_contact == 'on')
            <tbody>
                <!-- checkbox -->
                <tr>
                    <td class="table-light" scope="row">Subject</td>
                    <td >{{$subject}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">Name</td>
                    <td >{{$name}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">Email</td>
                    <td >{{$email}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">phone</td>
                    <td >{{$phone}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">country</td>
                    <td >{{$country}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">city</td>
                    <td >{{$city}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">comment</td>
                    <td >{{$comment}}</td>
                </tr>
                
            </tbody>
            @else
            <tbody>
                <!-- checkbox -->
                <tr>
                    <td class="table-light" scope="row">Name</td>
                    <td >{{$inqu_name}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">Email</td>
                    <td >{{$inqu_email}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">Comtact No</td>
                    <td >{{$inqu_mobile}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">Address</td>
                    <td >{{$inqu_address}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">Country</td>
                    <td >{{$inqu_country}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">City</td>
                    <td >{{$inqu_city}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">Vehicle Name</td>
                    <td style="text-transform: uppercase;">{{$vehicle_name}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">FOB Price</td>
                    <td >{{$fob_price}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">Insurance</td>
                    <td >{{$insurance}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">Inspection</td>
                    <td >{{$inspection}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">Port Name</td>
                    <td >{{$inqu_port}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">Total Price</td>
                    <td >{{$total_price}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">Web Link</td>
                    <td ><a href="{{$site_url}}">{{$site_url}}</a></td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">comment</td>
                    <td >{{$inqu_comment}}</td>
                </tr>
                
            </tbody>
            @endif
        </table>
    </body>
</html>
