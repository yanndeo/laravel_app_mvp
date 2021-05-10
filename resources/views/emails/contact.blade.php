<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <style>
        p {
            font-size: 12px;
        }

    </style>
</head>

<body>
    <div style="border: 2px solid purple; background-color:whitesmoke">
        <h3>Hello admin,</h3>

        <p>You have been contacted <br />

            - by : {{ $contact_email }} <br />
            - about : {{ $subject }} <br />
            - text : {{ $text }} <br />
        </p>
        Thanks,<br>
        {{ config('app.name') }}
    </div>
</body>

</html>
