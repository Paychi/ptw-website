<!DOCTYPE html>
<html>
    <head>
        <title>e-mail</title>
    </head>
    <body>
    <table style="background: #ffffff; border: 15px solid #ecf0f1; color: #7f8c8d; max-width: 600px; height: 520px; font-family: 'Open Sans', Arial,sans-serif;">
        <tbody>
            <tr>
                <td>
                    <table style="border: 5px solid #ffffff; width: 100%; height: 100%;">
                        <tbody>
                            <tr>
                                <td style="border-bottom: 2px solid #ecf0f1;"><img src='{{ URL::to("/img/logo/logo.png") }}' alt='ptw' width = '64' height = '64'/></td>
                                <td style="text-align: right; font-size: 21px; border-bottom: 2px solid #ecf0f1;">   Cont&aacute;ctanos Telemedicina Waslala - Nicaragua</td>
                            </tr>
                            <tr>
                                <td colspan='2' style='color: #34495e;'>Estimado: {{{$firstname}}} {{{$lastname}}}</td>
                            </tr>
                            <tr>
                                <td colspan='2'>Gracias por cont&aacute;ctarnos, tu informaci&oacute;n descrita abajo fue enviada a los responsables del proyecto: </td>
                            </tr>
                            <tr>
                                <td>Nombre: </td>
                                <td>{{{$firstname}}} {{{$lastname}}}</td>
                            </tr>
                            <tr>
                                <td>Correo: </td>
                                <td>{{{$email}}}</td>
                            </tr>
                            <tr>
                                <td>Mensaje: </td>
                                <td>{{{$bodyMessage}}}</td>
                            </tr>
                            <tr>
                                <td colspan='2'>Nos pondremos en contacto con usted lo m&aacute;s pronto posible, Saludos!!!</td>
                            </tr>
                            <tr>
                                <td colspan='2'> <a href='http://telemedicina.org.ni' style='display: inline-block; text-decoration: none; text-align: right; color: #34495e;'>Telemedicina Website</a></td>
                            </tr>
                            <tr>
                                <td colspan='2'>© Copyright 2015 by Telehealth Project - All Rights Reserved.</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    </body>
</html>