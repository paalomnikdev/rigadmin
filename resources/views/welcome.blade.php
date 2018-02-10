<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>not found</title>

        <style>
            html {
                height: 100%;
                background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHJhZGlhbEdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgY3g9IjUwJSIgY3k9IiIgcj0iMTAwJSI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzAxMjY0ZCIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzAwMDAwMSIvPjwvcmFkaWFsR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
                background-size: 100%;
                background-image: radial-gradient(ellipse cover at center, #01264d 0%, #000001 100%);
            }

            body {
                height: 100%;
                overflow: hidden;
            }

            .sprite, .body, .head, .rainbow span, .feet, .tail span, .stars .star {
                position: absolute;
                background-position: 0 0px,0 5px,0 10px,0 15px,0 20px,0 25px,0 30px,0 35px,0 40px,0 45px,0 50px,0 55px,0 60px,0 65px,0 70px,0 75px,0 80px,0 85px,0 90px,0 95px,0 100px,0 105px,0 110px,0 115px,0 120px,0 125px;
                background-size: 100% 5px;
                background-repeat: no-repeat;
            }

            .wrapper {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 400px;
                height: 300px;
                margin-top: -150px;
                margin-left: -200px;
                border-width: 1px;
                overflow: hidden;
                border-style: solid;
                border-color: #0259b2;
                background: #013366;
                -webkit-box-shadow: 0 10px 100px rgba(0, 0, 0, 0.3);
                box-shadow: 0 10px 100px rgba(0, 0, 0, 0.3);
            }

            .nyan-cat {
                position: absolute;
                left: 50%;
                top: 50%;
                width: 165px;
                height: 100px;
                margin-top: -50px;
                margin-left: -82px;
                -webkit-animation: nyan 400ms step-start infinite;
                animation: nyan 400ms step-start infinite;
            }

            .body {
                left: 35px;
                top: 0;
                width: 105px;
                height: 90px;
            }

            .head {
                left: 85px;
                top: 25px;
                width: 80px;
                height: 65px;
                -webkit-animation: head 400ms linear infinite;
                animation: head 400ms linear infinite;
            }

            .rainbow {
                position: absolute;
                left: 0;
                top: 50%;
                margin-top: -35px;
                width: 50%;
                height: 65px;
                overflow: hidden;
            }
            .rainbow span {
                display: block;
                position: relative;
                top: 0;
                width: 100%;
                height: 130px;
                background-size: 80px 5px;
                background-repeat: repeat-x;
                -webkit-animation: rainbow 400ms step-start infinite;
                animation: rainbow 400ms step-start infinite;
            }

            .feet {
                left: 20px;
                top: 75px;
                width: 120px;
                height: 25px;
                -webkit-animation: feet 400ms infinite;
                animation: feet 400ms infinite;
            }

            .tail {
                position: relative;
                width: 25px;
                height: 30px;
                overflow: hidden;
                top: 30px;
                left: 10px;
            }
            .tail span {
                width: 25px;
                height: 120px;
                -webkit-animation: tail 200ms step-start infinite alternate;
                animation: tail 200ms step-start infinite alternate;
            }

            .stars {
                position: relative;
                width: 100%;
                height: 100%;
                -webkit-animation: moveleft 1000ms linear infinite;
                animation: moveleft 1000ms linear infinite;
            }
            .stars .star {
                width: 28px;
                height: 28px;
                overflow: hidden;
            }
            .stars .star span {
                position: absolute;
                left: 0;
                width: 112px;
                height: 28px;
                background-position: 0 0px,0 2px,0 4px,0 6px,0 8px,0 10px,0 12px,0 14px,0 16px,0 18px,0 20px,0 22px,0 24px,0 26px,0 28px;
                background-size: 112px 2px;
                background-repeat: no-repeat;
                -webkit-animation: star 300ms step-start infinite alternate;
                animation: star 300ms step-start infinite alternate;
            }

            .star:nth-child(1) {
                top: -10px;
                left: 70px;
            }

            .star:nth-child(2) {
                top: 30px;
                left: 250px;
            }

            .star:nth-child(3) {
                top: 70px;
                left: 350px;
            }

            .star:nth-child(4) {
                top: 100px;
                left: 20px;
            }

            .star:nth-child(5) {
                top: 200px;
                left: 300px;
            }

            .star:nth-child(6) {
                top: 250px;
                left: 100px;
            }

            .star:nth-child(7) {
                top: -10px;
                left: 470px;
            }

            .star:nth-child(8) {
                top: 30px;
                left: 650px;
            }

            .star:nth-child(9) {
                top: 70px;
                left: 750px;
            }

            .star:nth-child(10) {
                top: 100px;
                left: 420px;
            }

            .star:nth-child(11) {
                top: 200px;
                left: 700px;
            }

            .star:nth-child(12) {
                top: 250px;
                left: 500px;
            }

            .body {
                background-image: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 10px, #000000 10px, #000000 95px, rgba(0, 0, 0, 0) 95px, rgba(0, 0, 0, 0) 105px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 5px, #000000 5px, #000000 10px, #f9d28f 10px, #f9d28f 95px, #000000 95px, #000000 100px, rgba(0, 0, 0, 0) 100px, rgba(0, 0, 0, 0) 105px), linear-gradient(to right, #000000 0%, #000000 5px, #f9d28f 5px, #f9d28f 20px, #fe91fe 20px, #fe91fe 85px, #f9d28f 85px, #f9d28f 100px, #000000 100px, #000000 105px), linear-gradient(to right, #000000 0%, #000000 5px, #f9d28f 5px, #f9d28f 15px, #fe91fe 15px, #fe91fe 45px, #f90297 45px, #f90297 50px, #fe91fe 50px, #fe91fe 60px, #f90297 60px, #f90297 65px, #fe91fe 65px, #fe91fe 90px, #f9d28f 90px, #f9d28f 100px, #000000 100px, #000000 105px), linear-gradient(to right, #000000 0%, #000000 5px, #f9d28f 5px, #f9d28f 10px, #fe91fe 10px, #fe91fe 20px, #f90297 20px, #f90297 25px, #fe91fe 25px, #fe91fe 95px, #f9d28f 95px, #f9d28f 100px, #000000 100px, #000000 105px), linear-gradient(to right, #000000 0%, #000000 5px, #f9d28f 5px, #f9d28f 10px, #fe91fe 10px, #fe91fe 80px, #f90297 80px, #f90297 85px, #fe91fe 85px, #fe91fe 95px, #f9d28f 95px, #f9d28f 100px, #000000 100px, #000000 105px), linear-gradient(to right, #000000 0%, #000000 5px, #f9d28f 5px, #f9d28f 10px, #fe91fe 10px, #fe91fe 95px, #f9d28f 95px, #f9d28f 100px, #000000 100px, #000000 105px), linear-gradient(to right, #000000 0%, #000000 5px, #f9d28f 5px, #f9d28f 10px, #fe91fe 10px, #fe91fe 40px, #f90297 40px, #f90297 45px, #fe91fe 45px, #fe91fe 95px, #f9d28f 95px, #f9d28f 100px, #000000 100px, #000000 105px), linear-gradient(to right, #000000 0%, #000000 5px, #f9d28f 5px, #f9d28f 10px, #fe91fe 10px, #fe91fe 95px, #f9d28f 95px, #f9d28f 100px, #000000 100px, #000000 105px), linear-gradient(to right, #000000 0%, #000000 5px, #f9d28f 5px, #f9d28f 10px, #fe91fe 10px, #fe91fe 25px, #f90297 25px, #f90297 30px, #fe91fe 30px, #fe91fe 95px, #f9d28f 95px, #f9d28f 100px, #000000 100px, #000000 105px), linear-gradient(to right, #000000 0%, #000000 5px, #f9d28f 5px, #f9d28f 10px, #fe91fe 10px, #fe91fe 45px, #f90297 45px, #f90297 50px, #fe91fe 50px, #fe91fe 95px, #f9d28f 95px, #f9d28f 100px, #000000 100px, #000000 105px), linear-gradient(to right, #000000 0%, #000000 5px, #f9d28f 5px, #f9d28f 10px, #fe91fe 10px, #fe91fe 15px, #f90297 15px, #f90297 20px, #fe91fe 20px, #fe91fe 95px, #f9d28f 95px, #f9d28f 100px, #000000 100px, #000000 105px), linear-gradient(to right, #000000 0%, #000000 5px, #f9d28f 5px, #f9d28f 10px, #fe91fe 10px, #fe91fe 95px, #f9d28f 95px, #f9d28f 100px, #000000 100px, #000000 105px), linear-gradient(to right, #000000 0%, #000000 5px, #f9d28f 5px, #f9d28f 10px, #fe91fe 10px, #fe91fe 35px, #f90297 35px, #f90297 40px, #fe91fe 40px, #fe91fe 95px, #f9d28f 95px, #f9d28f 100px, #000000 100px, #000000 105px), linear-gradient(to right, #000000 0%, #000000 5px, #f9d28f 5px, #f9d28f 15px, #fe91fe 15px, #fe91fe 20px, #f90297 20px, #f90297 25px, #fe91fe 25px, #fe91fe 90px, #f9d28f 90px, #f9d28f 100px, #000000 100px, #000000 105px), linear-gradient(to right, #000000 0%, #000000 5px, #f9d28f 5px, #f9d28f 20px, #fe91fe 20px, #fe91fe 85px, #f9d28f 85px, #f9d28f 100px, #000000 100px, #000000 105px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 5px, #000000 5px, #000000 10px, #f9d28f 10px, #f9d28f 95px, #000000 95px, #000000 100px, rgba(0, 0, 0, 0) 100px, rgba(0, 0, 0, 0) 105px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 10px, #000000 10px, #000000 95px, rgba(0, 0, 0, 0) 95px, rgba(0, 0, 0, 0) 105px);
            }

            .head {
                background-image: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 10px, #000000 10px, #000000 20px, rgba(0, 0, 0, 0) 20px, rgba(0, 0, 0, 0) 60px, #000000 60px, #000000 70px, rgba(0, 0, 0, 0) 70px, rgba(0, 0, 0, 0) 105px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 5px, #000000 5px, #000000 10px, #9d9d9d 10px, #9d9d9d 20px, #000000 20px, #000000 25px, rgba(0, 0, 0, 0) 25px, rgba(0, 0, 0, 0) 55px, #000000 55px, #000000 60px, #9d9d9d 60px, #9d9d9d 70px, #000000 70px, #000000 75px, rgba(0, 0, 0, 0) 75px, rgba(0, 0, 0, 0) 80px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 5px, #000000 5px, #000000 10px, #9d9d9d 10px, #9d9d9d 25px, #000000 25px, #000000 30px, rgba(0, 0, 0, 0) 30px, rgba(0, 0, 0, 0) 50px, #000000 50px, #000000 55px, #9d9d9d 55px, #9d9d9d 70px, #000000 70px, #000000 75px, rgba(0, 0, 0, 0) 75px, rgba(0, 0, 0, 0) 80px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 5px, #000000 5px, #000000 10px, #9d9d9d 10px, #9d9d9d 30px, #000000 30px, #000000 35px, #000000 35px, #000000 50px, #9d9d9d 50px, #9d9d9d 70px, #000000 70px, #000000 75px, rgba(0, 0, 0, 0) 75px, rgba(0, 0, 0, 0) 80px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 5px, #000000 5px, #000000 10px, #9d9d9d 10px, #9d9d9d 70px, #000000 70px, #000000 75px, rgba(0, 0, 0, 0) 75px, rgba(0, 0, 0, 0) 80px), linear-gradient(to right, #000000 0%, #000000 5px, #9d9d9d 5px, #9d9d9d 75px, #000000 75px, #000000 80px), linear-gradient(to right, #000000 0%, #000000 5px, #9d9d9d 5px, #9d9d9d 20px, #ffffff 20px, #ffffff 25px, #000000 25px, #000000 30px, #9d9d9d 30px, #9d9d9d 55px, #ffffff 55px, #ffffff 60px, #000000 60px, #000000 65px, #9d9d9d 65px, #9d9d9d 75px, #000000 75px, #000000 80px), linear-gradient(to right, #000000 0%, #000000 5px, #9d9d9d 5px, #9d9d9d 20px, #000000 20px, #000000 30px, #9d9d9d 30px, #9d9d9d 45px, #000000 45px, #000000 50px, #9d9d9d 50px, #9d9d9d 55px, #000000 55px, #000000 65px, #9d9d9d 65px, #9d9d9d 75px, #000000 75px, #000000 80px), linear-gradient(to right, #000000 0%, #000000 5px, #9d9d9d 5px, #9d9d9d 10px, #ff9593 10px, #ff9593 20px, #9d9d9d 20px, #9d9d9d 65px, #ff9593 65px, #ff9593 75px, #000000 75px, #000000 80px), linear-gradient(to right, #000000 0%, #000000 5px, #9d9d9d 5px, #9d9d9d 10px, #ff9593 10px, #ff9593 20px, #9d9d9d 20px, #9d9d9d 25px, #000000 25px, #000000 30px, #9d9d9d 30px, #9d9d9d 40px, #000000 40px, #000000 45px, #9d9d9d 45px, #9d9d9d 55px, #000000 55px, #000000 60px, #9d9d9d 60px, #9d9d9d 65px, #ff9593 65px, #ff9593 75px, #000000 75px, #000000 80px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 5px, #000000 5px, #000000 10px, #9d9d9d 10px, #9d9d9d 25px, #000000 25px, #000000 60px, #9d9d9d 60px, #9d9d9d 70px, #000000 70px, #000000 75px, rgba(0, 0, 0, 0) 75px, rgba(0, 0, 0, 0) 80px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 10px, #000000 10px, #000000 15px, #9d9d9d 15px, #9d9d9d 65px, #000000 65px, #000000 70px, rgba(0, 0, 0, 0) 70px, rgba(0, 0, 0, 0) 80px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 15px, #000000 15px, #000000 65px, rgba(0, 0, 0, 0) 65px, rgba(0, 0, 0, 0) 80px);
            }

            .rainbow > span {
                background-image: -webkit-gradient(linear, left top, right top, from(#fe0000), color-stop(50%, #fe0000), color-stop(50%, rgba(0, 0, 0, 0)), to(rgba(0, 0, 0, 0))), -webkit-gradient(linear, left top, right top, from(#fe0000), to(#fe0000)), -webkit-gradient(linear, left top, right top, from(#ffa500), color-stop(50%, #ffa500), color-stop(50%, #fe0000), to(#fe0000)), -webkit-gradient(linear, left top, right top, from(#ffa500), to(#ffa500)), -webkit-gradient(linear, left top, right top, from(#ffff00), color-stop(50%, #ffff00), color-stop(50%, #ffa500), to(#ffa500)), -webkit-gradient(linear, left top, right top, from(#ffff00), to(#ffff00)), -webkit-gradient(linear, left top, right top, from(#00fb00), color-stop(50%, #00fb00), color-stop(50%, #ffff00), to(#ffff00)), -webkit-gradient(linear, left top, right top, from(#00fb00), to(#00fb00)), -webkit-gradient(linear, left top, right top, from(#009eff), color-stop(50%, #009eff), color-stop(50%, #00fb00), to(#00fb00)), -webkit-gradient(linear, left top, right top, from(#009eff), to(#009eff)), -webkit-gradient(linear, left top, right top, from(#6531ff), color-stop(50%, #6531ff), color-stop(50%, #009eff), to(#009eff)), -webkit-gradient(linear, left top, right top, from(#6531ff), to(#6531ff)), -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, 0)), color-stop(50%, rgba(0, 0, 0, 0)), color-stop(50%, #6531ff), to(#6531ff)), -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, 0)), color-stop(50%, rgba(0, 0, 0, 0)), color-stop(50%, #fe0000), to(#fe0000)), -webkit-gradient(linear, left top, right top, from(#fe0000), to(#fe0000)), -webkit-gradient(linear, left top, right top, from(#fe0000), color-stop(50%, #fe0000), color-stop(50%, #ffa500), to(#ffa500)), -webkit-gradient(linear, left top, right top, from(#ffa500), to(#ffa500)), -webkit-gradient(linear, left top, right top, from(#ffa500), color-stop(50%, #ffa500), color-stop(50%, #ffff00), to(#ffff00)), -webkit-gradient(linear, left top, right top, from(#ffff00), to(#ffff00)), -webkit-gradient(linear, left top, right top, from(#ffff00), color-stop(50%, #ffff00), color-stop(50%, #00fb00), to(#00fb00)), -webkit-gradient(linear, left top, right top, from(#00fb00), to(#00fb00)), -webkit-gradient(linear, left top, right top, from(#00fb00), color-stop(50%, #00fb00), color-stop(50%, #009eff), to(#009eff)), -webkit-gradient(linear, left top, right top, from(#009eff), to(#009eff)), -webkit-gradient(linear, left top, right top, from(#009eff), color-stop(50%, #009eff), color-stop(50%, #6531ff), to(#6531ff)), -webkit-gradient(linear, left top, right top, from(#6531ff), to(#6531ff)), -webkit-gradient(linear, left top, right top, from(#6531ff), color-stop(50%, #6531ff), color-stop(50%, rgba(0, 0, 0, 0)), to(rgba(0, 0, 0, 0)));
                background-image: linear-gradient(to right, #fe0000 0%, #fe0000 50%, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0) 100%), linear-gradient(to right, #fe0000 0%, #fe0000 100%), linear-gradient(to right, #ffa500 0%, #ffa500 50%, #fe0000 50%, #fe0000 100%), linear-gradient(to right, #ffa500 0%, #ffa500 100%), linear-gradient(to right, #ffff00 0%, #ffff00 50%, #ffa500 50%, #ffa500 100%), linear-gradient(to right, #ffff00 0%, #ffff00 100%), linear-gradient(to right, #00fb00 0%, #00fb00 50%, #ffff00 50%, #ffff00 100%), linear-gradient(to right, #00fb00 0%, #00fb00 100%), linear-gradient(to right, #009eff 0%, #009eff 50%, #00fb00 50%, #00fb00 100%), linear-gradient(to right, #009eff 0%, #009eff 100%), linear-gradient(to right, #6531ff 0%, #6531ff 50%, #009eff 50%, #009eff 100%), linear-gradient(to right, #6531ff 0%, #6531ff 100%), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 50%, #6531ff 50%, #6531ff 100%), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 50%, #fe0000 50%, #fe0000 100%), linear-gradient(to right, #fe0000 0%, #fe0000 100%), linear-gradient(to right, #fe0000 0%, #fe0000 50%, #ffa500 50%, #ffa500 100%), linear-gradient(to right, #ffa500 0%, #ffa500 100%), linear-gradient(to right, #ffa500 0%, #ffa500 50%, #ffff00 50%, #ffff00 100%), linear-gradient(to right, #ffff00 0%, #ffff00 100%), linear-gradient(to right, #ffff00 0%, #ffff00 50%, #00fb00 50%, #00fb00 100%), linear-gradient(to right, #00fb00 0%, #00fb00 100%), linear-gradient(to right, #00fb00 0%, #00fb00 50%, #009eff 50%, #009eff 100%), linear-gradient(to right, #009eff 0%, #009eff 100%), linear-gradient(to right, #009eff 0%, #009eff 50%, #6531ff 50%, #6531ff 100%), linear-gradient(to right, #6531ff 0%, #6531ff 100%), linear-gradient(to right, #6531ff 0%, #6531ff 50%, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0) 100%);
            }

            .feet {
                background-image: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 10px, #000000 10px, #000000 25px, rgba(0, 0, 0, 0) 25px, rgba(0, 0, 0, 0) 120px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 5px, #000000 5px, #000000 10px, #9d9d9d 10px, #9d9d9d 110px, rgba(0, 0, 0, 0) 110px, rgba(0, 0, 0, 0) 120px), linear-gradient(to right, #000000 0%, #000000 5px, #9d9d9d 5px, #9d9d9d 20px, #000000 20px, #000000 35px, #9d9d9d 35px, #9d9d9d 40px, #000000 40px, #000000 80px, #9d9d9d 80px, #9d9d9d 110px, #000000 110px, #000000 115px, rgba(0, 0, 0, 0) 115px, rgba(0, 0, 0, 0) 120px), linear-gradient(to right, #000000 0%, #000000 5px, #9d9d9d 5px, #9d9d9d 15px, #000000 15px, #000000 20px, rgba(0, 0, 0, 0) 20px, rgba(0, 0, 0, 0) 25px, #000000 25px, #000000 30px, #9d9d9d 30px, #9d9d9d 40px, #000000 40px, #000000 45px, rgba(0, 0, 0, 0) 45px, rgba(0, 0, 0, 0) 75px, #000000 75px, #000000 80px, #9d9d9d 80px, #9d9d9d 90px, #000000 90px, #000000 95px, rgba(0, 0, 0, 0) 95px, rgba(0, 0, 0, 0) 100px, #000000 100px, #000000 105px, #9d9d9d 105px, #9d9d9d 115px, #000000 115px, #000000 120px), linear-gradient(to right, #000000 0%, #000000 15px, rgba(0, 0, 0, 0) 15px, rgba(0, 0, 0, 0) 30px, #000000 30px, #000000 45px, rgba(0, 0, 0, 0) 45px, rgba(0, 0, 0, 0) 80px, #000000 80px, #000000 95px, rgba(0, 0, 0, 0) 95px, rgba(0, 0, 0, 0) 105px, #000000 105px, #000000 120px);
            }

            .tail > span {
                background-image: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 5px, #000000 5px, #000000 15px, rgba(0, 0, 0, 0) 15px), linear-gradient(to right, #000000 0%, #000000 5px, #9d9d9d 5px, #9d9d9d 15px, #000000 15px, #000000 20px, rgba(0, 0, 0, 0) 20px), linear-gradient(to right, #000000 0%, #000000 5px, #9d9d9d 5px, #9d9d9d 15px, #000000 15px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 5px, #000000 5px, #000000 10px, #9d9d9d 10px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 10px, #000000 10px, #000000 20px, #9d9d9d 20px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 15px, #000000 15px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 100%), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 5px, #000000 5px, #000000 20px, rgba(0, 0, 0, 0) 20px), linear-gradient(to right, #000000 0%, #000000 5px, #9d9d9d 5px, #9d9d9d 15px, #000000 15px), linear-gradient(to right, #000000 0%, #000000 10px, #9d9d9d 10px, #9d9d9d 25px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 10px, #000000 10px, #000000 20px, #9d9d9d 20px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 20px, #000000 20px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 100%), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 20px, #000000 20px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 10px, #000000 10px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 5px, #000000 5px, #000000 10px, #9d9d9d 10px), linear-gradient(to right, #000000 0%, #000000 5px, #9d9d9d 5px, #9d9d9d 20px, #000000 20px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 5px, #000000 5px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 20px, #000000 20px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 15px, #000000 15px, #000000 20px, #9d9d9d 20px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 10px, #000000 10px, #000000 15px, #9d9d9d 15px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 5px, #000000 5px, #000000 10px, #9d9d9d 10px, #9d9d9d 20px, #000000 20px), linear-gradient(to right, #000000 0%, #000000 5px, #9d9d9d 5px, #9d9d9d 15px, #000000 15px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 5px, #000000 5px, #000000 15px, rgba(0, 0, 0, 0) 15px);
            }

            .star > span {
                background-image: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 12px, #ffffff 12px, #ffffff 16px, rgba(0, 0, 0, 0) 16px, rgba(0, 0, 0, 0) 112px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 12px, #ffffff 12px, #ffffff 16px, rgba(0, 0, 0, 0) 16px, rgba(0, 0, 0, 0) 112px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 4px, #ffffff 4px, #ffffff 8px, rgba(0, 0, 0, 0) 8px, rgba(0, 0, 0, 0) 20px, #ffffff 20px, #ffffff 24px, rgba(0, 0, 0, 0) 24px, rgba(0, 0, 0, 0) 40px, #ffffff 40px, #ffffff 44px, rgba(0, 0, 0, 0) 44px, rgba(0, 0, 0, 0) 68px, #ffffff 68px, #ffffff 72px, rgba(0, 0, 0, 0) 72px, rgba(0, 0, 0, 0) 112px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 4px, #ffffff 4px, #ffffff 8px, rgba(0, 0, 0, 0) 8px, rgba(0, 0, 0, 0) 20px, #ffffff 20px, #ffffff 24px, rgba(0, 0, 0, 0) 24px, rgba(0, 0, 0, 0) 40px, #ffffff 40px, #ffffff 44px, rgba(0, 0, 0, 0) 44px, rgba(0, 0, 0, 0) 68px, #ffffff 68px, #ffffff 72px, rgba(0, 0, 0, 0) 72px, rgba(0, 0, 0, 0) 112px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 68px, #ffffff 68px, #ffffff 72px, rgba(0, 0, 0, 0) 72px, rgba(0, 0, 0, 0) 112px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 68px, #ffffff 68px, #ffffff 72px, rgba(0, 0, 0, 0) 72px, rgba(0, 0, 0, 0) 112px), linear-gradient(to right, #ffffff 0%, #ffffff 4px, rgba(0, 0, 0, 0) 4px, rgba(0, 0, 0, 0) 24px, #ffffff 24px, #ffffff 28px, rgba(0, 0, 0, 0) 28px, rgba(0, 0, 0, 0) 32px, #ffffff 32px, #ffffff 36px, rgba(0, 0, 0, 0) 36px, rgba(0, 0, 0, 0) 40px, #ffffff 40px, #ffffff 44px, rgba(0, 0, 0, 0) 44px, rgba(0, 0, 0, 0) 48px, #ffffff 48px, #ffffff 52px, rgba(0, 0, 0, 0) 52px, rgba(0, 0, 0, 0) 60px, #ffffff 60px, #ffffff 68px, rgba(0, 0, 0, 0) 68px, rgba(0, 0, 0, 0) 72px, #ffffff 72px, #ffffff 80px, rgba(0, 0, 0, 0) 80px, rgba(0, 0, 0, 0) 96px, #ffffff 96px, #ffffff 100px, rgba(0, 0, 0, 0) 100px, rgba(0, 0, 0, 0) 112px), linear-gradient(to right, #ffffff 0%, #ffffff 4px, rgba(0, 0, 0, 0) 4px, rgba(0, 0, 0, 0) 24px, #ffffff 24px, #ffffff 28px, rgba(0, 0, 0, 0) 28px, rgba(0, 0, 0, 0) 32px, #ffffff 32px, #ffffff 36px, rgba(0, 0, 0, 0) 36px, rgba(0, 0, 0, 0) 40px, #ffffff 40px, #ffffff 44px, rgba(0, 0, 0, 0) 44px, rgba(0, 0, 0, 0) 48px, #ffffff 48px, #ffffff 52px, rgba(0, 0, 0, 0) 52px, rgba(0, 0, 0, 0) 60px, #ffffff 60px, #ffffff 68px, rgba(0, 0, 0, 0) 68px, rgba(0, 0, 0, 0) 72px, #ffffff 72px, #ffffff 80px, rgba(0, 0, 0, 0) 80px, rgba(0, 0, 0, 0) 96px, #ffffff 96px, #ffffff 100px, rgba(0, 0, 0, 0) 100px, rgba(0, 0, 0, 0) 112px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 68px, #ffffff 68px, #ffffff 72px, rgba(0, 0, 0, 0) 72px, rgba(0, 0, 0, 0) 112px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 68px, #ffffff 68px, #ffffff 72px, rgba(0, 0, 0, 0) 72px, rgba(0, 0, 0, 0) 112px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 4px, #ffffff 4px, #ffffff 8px, rgba(0, 0, 0, 0) 8px, rgba(0, 0, 0, 0) 20px, #ffffff 20px, #ffffff 24px, rgba(0, 0, 0, 0) 24px, rgba(0, 0, 0, 0) 40px, #ffffff 40px, #ffffff 44px, rgba(0, 0, 0, 0) 44px, rgba(0, 0, 0, 0) 68px, #ffffff 68px, #ffffff 72px, rgba(0, 0, 0, 0) 72px, rgba(0, 0, 0, 0) 112px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 4px, #ffffff 4px, #ffffff 8px, rgba(0, 0, 0, 0) 8px, rgba(0, 0, 0, 0) 20px, #ffffff 20px, #ffffff 24px, rgba(0, 0, 0, 0) 24px, rgba(0, 0, 0, 0) 40px, #ffffff 40px, #ffffff 44px, rgba(0, 0, 0, 0) 44px, rgba(0, 0, 0, 0) 68px, #ffffff 68px, #ffffff 72px, rgba(0, 0, 0, 0) 72px, rgba(0, 0, 0, 0) 112px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 12px, #ffffff 12px, #ffffff 16px, rgba(0, 0, 0, 0) 16px, rgba(0, 0, 0, 0) 112px), linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 12px, #ffffff 12px, #ffffff 16px, rgba(0, 0, 0, 0) 16px, rgba(0, 0, 0, 0) 112px);
            }

            @-webkit-keyframes rainbow {
                0% {
                    top: 0;
                }
                50% {
                    top: 0;
                }
                100% {
                    top: -65px;
                }
            }

            @keyframes rainbow {
                0% {
                    top: 0;
                }
                50% {
                    top: 0;
                }
                100% {
                    top: -65px;
                }
            }
            @-webkit-keyframes moveleft {
                0% {
                    left: 0;
                }
                100% {
                    left: -400px;
                }
            }
            @keyframes moveleft {
                0% {
                    left: 0;
                }
                100% {
                    left: -400px;
                }
            }
            @-webkit-keyframes star {
                0% {
                    left: 0;
                }
                25% {
                    left: 0;
                }
                49.99% {
                    left: 0;
                }
                50% {
                    left: -28px;
                }
                74.99% {
                    left: -28px;
                }
                75% {
                    left: -56px;
                }
                99.99% {
                    left: -56px;
                }
                100% {
                    left: -84px;
                }
            }
            @keyframes star {
                0% {
                    left: 0;
                }
                25% {
                    left: 0;
                }
                49.99% {
                    left: 0;
                }
                50% {
                    left: -28px;
                }
                74.99% {
                    left: -28px;
                }
                75% {
                    left: -56px;
                }
                99.99% {
                    left: -56px;
                }
                100% {
                    left: -84px;
                }
            }
            @-webkit-keyframes nyan {
                0% {
                    margin-top: -50px;
                }
                10% {
                    margin-top: -50px;
                }
                80% {
                    margin-top: -53px;
                }
                100% {
                    margin-top: -50px;
                }
            }
            @keyframes nyan {
                0% {
                    margin-top: -50px;
                }
                10% {
                    margin-top: -50px;
                }
                80% {
                    margin-top: -53px;
                }
                100% {
                    margin-top: -50px;
                }
            }
            @-webkit-keyframes feet {
                0% {
                    left: 20px;
                }
                100% {
                    left: 30px;
                }
            }
            @keyframes feet {
                0% {
                    left: 20px;
                }
                100% {
                    left: 30px;
                }
            }
            @-webkit-keyframes head {
                0% {
                    top: 25px;
                    left: 85px;
                }
                24.99% {
                    top: 25px;
                    left: 85px;
                }
                25% {
                    top: 22px;
                    left: 88px;
                }
                49.99% {
                    top: 22px;
                    left: 88px;
                }
                50% {
                    top: 22px;
                    left: 85px;
                }
                74.99% {
                    top: 22px;
                    left: 85px;
                }
                75% {
                    top: 22px;
                    left: 82px;
                }
                99.99% {
                    top: 22px;
                    left: 82px;
                }
                100% {
                    top: 25px;
                    left: 85px;
                }
            }
            @keyframes head {
                0% {
                    top: 25px;
                    left: 85px;
                }
                24.99% {
                    top: 25px;
                    left: 85px;
                }
                25% {
                    top: 22px;
                    left: 88px;
                }
                49.99% {
                    top: 22px;
                    left: 88px;
                }
                50% {
                    top: 22px;
                    left: 85px;
                }
                74.99% {
                    top: 22px;
                    left: 85px;
                }
                75% {
                    top: 22px;
                    left: 82px;
                }
                99.99% {
                    top: 22px;
                    left: 82px;
                }
                100% {
                    top: 25px;
                    left: 85px;
                }
            }
            @-webkit-keyframes tail {
                0% {
                    top: 0;
                }
                25% {
                    top: 0;
                }
                49.99% {
                    top: 0;
                }
                50% {
                    top: -30px;
                }
                74.99% {
                    top: -30px;
                }
                75% {
                    top: -60px;
                }
                99.99% {
                    top: -60px;
                }
                100% {
                    top: -90px;
                }
            }
            @keyframes tail {
                0% {
                    top: 0;
                }
                25% {
                    top: 0;
                }
                49.99% {
                    top: 0;
                }
                50% {
                    top: -30px;
                }
                74.99% {
                    top: -30px;
                }
                75% {
                    top: -60px;
                }
                99.99% {
                    top: -60px;
                }
                100% {
                    top: -90px;
                }
            }

        </style>
    </head>
    <body>
    <div class='wrapper'>
        <div class='rainbow'>
            <span></span>
        </div>
        <div class='nyan-cat'>
            <div class='feet'></div>
            <div class='tail'>
                <span></span>
            </div>
            <div class='body'></div>
            <div class='head'></div>
        </div>
        <div class='stars'>
            <div class='star'>
                <span></span>
            </div>
            <div class='star'>
                <span></span>
            </div>
            <div class='star'>
                <span></span>
            </div>
            <div class='star'>
                <span></span>
            </div>
            <div class='star'>
                <span></span>
            </div>
            <div class='star'>
                <span></span>
            </div>
            <div class='star'>
                <span></span>
            </div>
            <div class='star'>
                <span></span>
            </div>
            <div class='star'>
                <span></span>
            </div>
            <div class='star'>
                <span></span>
            </div>
            <div class='star'>
                <span></span>
            </div>
            <div class='star'>
                <span></span>
            </div>
        </div>
    </div>

    </body>
</html>
