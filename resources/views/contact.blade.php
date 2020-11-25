<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact us - Jobs on High</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <style>
        body {
            background: #59ABE3;
            margin: 0
        }

        .form {
            width: 340px;
            height: 440px;
            background: #e6e6e6;
            border-radius: 8px;
            box-shadow: 0 0 40px -10px #000;
            margin: calc(50vh - 220px) auto;
            padding: 20px 30px;
            max-width: calc(100vw - 40px);
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
            position: relative
        }

        h2 {
            margin: 10px 0;
            padding-bottom: 10px;
            width: 180px;
            color: #78788c;
            border-bottom: 3px solid #78788c
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            background: none;
            outline: none;
            resize: none;
            border: 0;
            font-family: 'Montserrat', sans-serif;
            transition: all .3s;
            border-bottom: 2px solid #bebed2
        }

        input:focus {
            border-bottom: 2px solid #78788c
        }

        p:before {
            content: attr(type);
            display: block;
            margin: 28px 0 0;
            font-size: 14px;
            color: #5a5a5a
        }

        button {
            float: right;
            padding: 8px 12px;
            margin: 8px 0 0;
            font-family: 'Montserrat', sans-serif;
            border: 2px solid #78788c;
            background: 0;
            color: #5a5a6e;
            cursor: pointer;
            transition: all .3s
        }

        button:hover {
            background: #78788c;
            color: #fff
        }

        div {
            content: 'Hi';
            position: absolute;
            bottom: -15px;
            right: -20px;
            background: #50505a;
            color: #fff;
            width: 320px;
            padding: 16px 4px 16px 0;
            border-radius: 6px;
            font-size: 13px;
            box-shadow: 10px 10px 40px -14px #000
        }

        span {
            margin: 0 5px 0 15px
        }
    </style>

</head>

<body>
    @if(Session::has('success'))
    <h1 style="text-align: center; color: white">{{ Session::get('success') }}</h1>
    @endif

    <form class="form" method="POST" action="/post/contact">
        @csrf
        <h2>CONTACT US</h2>
        <p type="Name:"><input placeholder="Write your name here.." name="name" required></input></p>
        <p type="Email:"><input placeholder="Email to call you back.." name="email" required></input></p>
        <p type="Message:"><input placeholder="What would you like to tell us.." name="message" required></input></p>
        <button type="submit">Send Message</button>
    </form>
</body>

</html>
