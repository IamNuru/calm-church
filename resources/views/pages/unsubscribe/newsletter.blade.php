
<x-guest-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wsub->idth=device-wsub->idth, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Unsubscribe </title>

    <style>
        .wrapper{
            max-width: 450px;
            margin: auto;
            box-shadow: 10px 10px 5px 50px rgba(0,0,0,0.25);
            -webkit-box-shadow: 10px 10px 5px 50px rgba(0,0,0,0.25);
            -moz-box-shadow: 10px 10px 5px 50px rgba(0,0,0,0.25);
            padding: 6px;
            margin-top: 10%;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        @if ($sub->status == true)
            <p style="">
                You are about to unsubscribe from our newsletter
            </p>
            <p style="">
                Click on unsubcribe button below to unsubscribe or click <a href="/">here</a> to go to site.
            </p>
            <div class="wrap-form">
                <form action="{{route('unsub.newsletter', $sub->id)}}" method="post">
                    @csrf
                    <button type="submit" class="btn py-2 bg-blue-600">unsubscribe</button>
                </form>
            </div>
        @else
            <p style="">
                You've already unsubcribe, click subscribe button below to subscribe  or click <a href="/">here</a> to go to site.
            </p>
            <div class="wrap-form">
                <form action="{{route('sub.newsletter', $sub->id)}}" method="post">
                    @csrf
                    <button type="submit" class="btn w-48 py-2 bg-blue-600">subscribe</button>
                </form>
            </div>
        @endif
    </div>
</body>
</html>
</x-guest-layout>