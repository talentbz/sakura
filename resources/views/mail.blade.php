
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
           /* -------------------------------------
          GLOBAL RESETS
      ------------------------------------- */
      
      /*All the styling goes here*/
      
      img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%; 
      }

      body {
        background-color: #f6f6f6;
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%; 
      }

      table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%; }
        table td {
          font-family: sans-serif;
          font-size: 14px;
          vertical-align: top; 
      }

      /* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */

      .body {
        background-color: #f6f6f6;
        width: 100%; 
      }

      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
      .container {
        display: block;
        margin: 0 auto !important;
        /* makes it centered */
        max-width: 580px;
        padding: 10px;
        width: 580px; 
      }

      /* This should also be a block element, so that it will fill 100% of the .container */
      .content {
        box-sizing: border-box;
        display: block;
        margin: 0 auto;
        max-width: 580px;
        padding: 10px; 
      }

      /* -------------------------------------
          HEADER, FOOTER, MAIN
      ------------------------------------- */
      .main {
        background: #ffffff;
        border-radius: 3px;
        width: 100%; 
      }

      .wrapper {
        box-sizing: border-box;
        padding: 20px; 
      }

      .content-block {
        padding-bottom: 10px;
        padding-top: 10px;
      }

      .footer {
        clear: both;
        margin-top: 10px;
        text-align: center;
        width: 100%; 
      }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color: #999999;
          font-size: 12px;
          text-align: center; 
      }

      /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
      h1,
      h2,
      h3,
      h4 {
        color: #000000;
        font-family: sans-serif;
        font-weight: 400;
        line-height: 1.4;
        margin: 0;
        margin-bottom: 30px; 
      }

      h1 {
        font-size: 35px;
        font-weight: 300;
        text-align: center;
        text-transform: capitalize; 
      }

      p,
      ul,
      ol {
        font-family: sans-serif;
        font-size: 14px;
        font-weight: normal;
        margin: 0;
        margin-bottom: 15px; 
      }
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px; 
      }

      a {
        color: #3498db;
        text-decoration: underline; 
      }

      /* -------------------------------------
          BUTTONS
      ------------------------------------- */
      .btn {
        box-sizing: border-box;
        width: 100%; }
        .btn > tbody > tr > td {
          padding-bottom: 15px; }
        .btn table {
          width: auto; 
      }
        .btn table td {
          background-color: #ffffff;
          border-radius: 5px;
          text-align: center; 
      }
        .btn a {
          background-color: #ffffff;
          border: solid 1px #3498db;
          border-radius: 5px;
          box-sizing: border-box;
          color: #3498db;
          cursor: pointer;
          display: inline-block;
          font-size: 14px;
          font-weight: bold;
          margin: 0;
          padding: 12px 25px;
          text-decoration: none;
          text-transform: capitalize; 
      }

      .btn-primary table td {
        background-color: #3498db; 
      }

      .btn-primary a {
        background-color: #3498db;
        border-color: #3498db;
        color: #ffffff; 
      }

      /* -------------------------------------
          OTHER STYLES THAT MIGHT BE USEFUL
      ------------------------------------- */
      .last {
        margin-bottom: 0; 
      }

      .first {
        margin-top: 0; 
      }

      .align-center {
        text-align: center; 
      }

      .align-right {
        text-align: right; 
      }

      .align-left {
        text-align: left; 
      }

      .clear {
        clear: both; 
      }

      .mt0 {
        margin-top: 0; 
      }

      .mb0 {
        margin-bottom: 0; 
      }

      .preheader {
        color: transparent;
        display: none;
        height: 0;
        max-height: 0;
        max-width: 0;
        opacity: 0;
        overflow: hidden;
        mso-hide: all;
        visibility: hidden;
        width: 0; 
      }

      .powered-by a {
        text-decoration: none; 
      }

      hr {
        border: 0;
        border-bottom: 1px solid #f6f6f6;
        margin: 20px 0; 
      }

      /* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
      @media only screen and (max-width: 620px) {
        table.body h1 {
          font-size: 28px !important;
          margin-bottom: 10px !important; 
        }
        table.body p,
        table.body ul,
        table.body ol,
        table.body td,
        table.body span,
        table.body a {
          font-size: 16px !important; 
        }
        table.body .wrapper,
        table.body .article {
          padding: 10px !important; 
        }
        table.body .content {
          padding: 0 !important; 
        }
        table.body .container {
          padding: 0 !important;
          width: 100% !important; 
        }
        table.body .main {
          border-left-width: 0 !important;
          border-radius: 0 !important;
          border-right-width: 0 !important; 
        }
        table.body .btn table {
          width: 100% !important; 
        }
        table.body .btn a {
          width: 100% !important; 
        }
        table.body .img-responsive {
          height: auto !important;
          max-width: 100% !important;
          width: auto !important; 
        }
      }

      /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
      @media all {
        .ExternalClass {
          width: 100%; 
        }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%; 
        }
        .apple-link a {
          color: inherit !important;
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          text-decoration: none !important; 
        }
        #MessageViewBody a {
          color: inherit;
          text-decoration: none;
          font-size: inherit;
          font-family: inherit;
          font-weight: inherit;
          line-height: inherit;
        }
        .btn-primary table td:hover {
          background-color: #34495e !important; 
        }
        .btn-primary a:hover {
          background-color: #34495e !important;
          border-color: #34495e !important; 
        } 
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
            @elseif($is_contact == 'off')
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
            @elseif($is_contact == 'reply')
            <tr>
                <td>
                <p>{!! nl2br(e($reply)) !!}</p>
                <p><a href="https://sakuramotors.com/">Sakuramotors.com</a></p>
                </td>
            </tr>
            @else
            <tr>
                <td>
                @if($max_status == 2)
                    <p>Dear, {{$user->name}}</p>
                    <p>Thank you for confirming your order. Please kindly arrange your payment within 48 hours.</p>
                    <p>After you have done the payment kindly send bank TT copy or swift copy to start shipping process for speed shipping.</p><br>
                @elseif(max_status == 3)
                    <p>Dear, {{$user->name}}</p>
                    <p>We received your payment. Thank you very much.</p>
                @elseif(max_status == 4)
                    <p>Dear, {{$user->name}}</p>
                    <p>This is to inform you that we have already started shipping your vehicle, We will inform you the date and ship name as soon as possible.</p>
                @else
                    <p>Dear, {{$user->name}}</p>
                    <p>We have already sent the document by DHL. Please kindly use tracking number to track your document.</p>
                @endif
                    <p>Thank you and Best Regards.</p><br>
                    <a href="https://sakuramotors.com/">Sakura Motors Co.Ltd.</a><br>
                    <p>Address : 3-48-48, Gakuen Minami, Tsukuba-Shi,</p>
                    <p>Ibaraki Prefecture, Japan 305-0818.</p>
                    <p>E-mail : <a href="mailto:info@sakuramotors.com">info@sakuramotors.com</a></p>
                    <p>Tel : <a href="tel:+81298190850"> +81-29-819-0850</a></p>
                    <p>Fax : <a href="tel:+81298683669">+81-29-868-3669</a></p>
                    <p>WhatsApp : <a href="https://wa.me/819093450908">+81-90-9345-0908</a></p>
                </td>
            </tr>
            @endif
        </table>
    </body>
</html>


<!-- include status and reply email-->



