<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        table h4 {
            margin: 0;
            background: cornflowerblue;
            color: white;
            text-transform: uppercase;
            padding: 10px 0px;
            border-radius: 5px;
        }

        table p {
            border: 1px solid rgb(189, 189, 189);
            padding: 5px;
            min-height: 150px;
            background: rgb(243, 243, 243);
        }
    </style>
</head>

<body>
    <table style="width: 575px;font-family: sans-serif;border: 1px solid rgb(187, 187, 187);
            border-radius: 5px;
            padding: 10px;">
        <tr>
            <td style="text-align: center;">
                <img src="http://akaunter.com/backend/assets/images/logo.png" alt="">
            </td>
        </tr>
        <tr>
            <td>
                <table style="width: 100%;">
                    <tr>
                        <td colspan="3">
                            <p>{{$data['messgae']}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center">
                            <a href="{{ $data['invoice_link'] }}"
                                style="
                                    text-decoration: none;
                                    display: inline-block;
                                    padding: 10px 25px;
                                    text-align: center;
                                    border-radius: 5px;
                                    color: white;
                                    background-color: cornflowerblue;
                                    font-weight: bold;
                                ">
                                Click Here To Download
                                {{-- {{ $data['invoice_name'] }} --}}
                            </a>
                            <br>
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 35%;font-weight: bold;font-size: 14px;">Any Delivery Information</td>
                        <td style="width: 3px;">:</td>
                        <td>+880 1566339339</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;background: cornflowerblue; color: white;line-height: 26px;border-radius: 5px;">
                Thanks By <br>
                ORIKA CORPORATION
            </td>
        </tr>
    </table>
</body>

</html>
