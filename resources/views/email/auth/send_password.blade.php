<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>

<body>
    <div style="width: 700px; margin: 0 auto; text-align: center;">
        <h2 style="padding: 1.3em 0 0.4em;">Halo {{ $name }}</h2>
        <div
            style="text-align: left; padding: 1em 1.2em; border-top: 0.3em solid #46b5d1; border-bottom: 0.1em solid #46b5d1; border-top-left-radius: 20px; border-top-right-radius: 20px;">
            <p>
                Anda berhasil terdaftar di situs <strong>{{ config('app.name') }}</strong> <br>
                Silahkan gunakan data di bawah ini untuk login ke member area.
            </p>
            <p style="margin: 0.5em 0;">
                <table>
                    <tr>
                        <td width="35%"><strong>Nama</strong></td>
                        <td>:</td>
                        <td>{{ $name }}</td>
                    </tr>
                    <tr>
                        <td width="35%"><strong>Email</strong></td>
                        <td>:</td>
                        <td>{{ $email }}</td>
                    </tr>
                    <tr>
                        <td width="35%"><strong>Password</strong></td>
                        <td>:</td>
                        <td>{{ $password }}</td>
                    </tr>
                </table>
            </p>
            <div style="padding: 0.5em 0; text-align: center;">
                @php
                $nameHash = Hash::make($name);
                $url = url('/login?aut=' . $nameHash . '&usr=' . $name . '&frm=email&reg=true');
                @endphp
                <p>
                    <a href="{{ $url }}"
                        style="background-color: #32407b; border-radius: 0.2em; padding: 0.5em; text-decoration: none; color: #ffffff;">
                        Masuk Member Area
                    </a>
                </p>
            </div>
        </div>
        <div style="padding: 1.3em 0;">
            <small>
                {{ env('APP_COMPANY_NAME') }} <br>
                {{ env('APP_COMPANY_ADDRESS') }} <br>
                {{ env('APP_COMPANY_PROVINCE') }} <br>
                <br>
                &copy; {{ date('Y') }} <a href="{{ config('app.url') }}">{{ config('app.name') }}</a>. All Rights
                Reserved.
            </small>
        </div>
    </div>
</body>

</html>
