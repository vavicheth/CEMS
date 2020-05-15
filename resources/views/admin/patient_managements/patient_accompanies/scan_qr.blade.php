@extends('layouts.main')

@section('css_after')
    <style>
        body {
            font-family: 'Ropa Sans', sans-serif;
            color: #333;
            /*max-width: 640px;*/

            margin: 0 auto;
            position: relative;
        }

        #githubLink {
            position: absolute;
            right: 0;
            top: 12px;
            color: #2D99FF;
        }

        #loadingMessage {
            text-align: center;
            padding: 40px;
            background-color: #eee;
        }

        #canvas {
            width: 100%;
            height: 80%;
        }

        #output {
            margin-top: 20px;
            background: #eee;
            padding: 10px;
            padding-bottom: 0;
        }

        #output div {
            padding-bottom: 10px;
            word-wrap: break-word;
        }

        #noQRFound {
            text-align: center;
        }
    </style>
@endsection


@section('body_block')

    <div id="page-container" class="{{\Illuminate\Support\Facades\Auth::user()->ui_user() ? \Illuminate\Support\Facades\Auth::user()->ui_user() : 'sidebar-o enable-cookies sidebar-dark side-scroll page-header-fixed page-header-dark '}}">

            <audio id="myAudio">
                <source src="{{asset('media/sounds/beep.mp3')}}" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>

            <div id="loadingMessage"><i class="fa fa-video"></i> Unable to access video stream (please make sure you have a webcam enabled)</div>
            <canvas id="canvas" hidden></canvas>
            <div style="width: 100%" id="output" hidden>
                <div id="outputMessage">No QR code detected.</div>
                <div hidden><b>Data:</b> <span id="outputData"></span></div>
            </div>

            <div class="block-content block-content-full text-center">
                <button id="btn-try" class="btn btn-info">Try again</button>
            </div>


        <!-- Footer -->
        <footer id="page-footer" class="bg-body-light">
            <div class="content py-3">
                <div class="row font-size-sm">
                    <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-left">
                        <a class="font-w600" href="https://1.envato.market/AVD6j" target="_blank">{{env('COMPANY_NAME')}}</a> &copy; <span data-toggle="year-copy"></span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END Footer -->


    </div>
    <!-- END Page Container -->

@endsection

@section('js_after')
    <script src="{{asset('js/plugins/jsQR/jsQR.js')}}"></script>
    <script>
        // Sound for scan qrcode
        var x = document.getElementById("myAudio");

        var video = document.createElement("video");
        var canvasElement = document.getElementById("canvas");
        var canvas = canvasElement.getContext("2d");
        var loadingMessage = document.getElementById("loadingMessage");
        var outputContainer = document.getElementById("output");
        var outputMessage = document.getElementById("outputMessage");
        var outputData = document.getElementById("outputData");

        function drawLine(begin, end, color) {
            canvas.beginPath();
            canvas.moveTo(begin.x, begin.y);
            canvas.lineTo(end.x, end.y);
            canvas.lineWidth = 4;
            canvas.strokeStyle = color;
            canvas.stroke();
        }

        // Use facingMode: environment to attemt to get the front camera on phones
        navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } }).then(function(stream) {
            video.srcObject = stream;
            video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
            video.play();
            requestAnimationFrame(tick);
        });

        function tick() {
            loadingMessage.innerText = "âŒ› Loading video..."
            if (video.readyState === video.HAVE_ENOUGH_DATA) {
                loadingMessage.hidden = true;
                canvasElement.hidden = false;
                outputContainer.hidden = false;

                canvasElement.height = video.videoHeight;
                canvasElement.width = video.videoWidth;
                canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
                var imageData = canvas.getImageData(0, 0, canvasElement.width, canvasElement.height);
                var code = jsQR(imageData.data, imageData.width, imageData.height, {
                    inversionAttempts: "dontInvert",
                });
                if (code) {
                    drawLine(code.location.topLeftCorner, code.location.topRightCorner, "#FF3B58");
                    drawLine(code.location.topRightCorner, code.location.bottomRightCorner, "#FF3B58");
                    drawLine(code.location.bottomRightCorner, code.location.bottomLeftCorner, "#FF3B58");
                    drawLine(code.location.bottomLeftCorner, code.location.topLeftCorner, "#FF3B58");
                    outputMessage.hidden = true;
                    // window.location.href = "http://stackoverflow.com";
                    outputData.parentElement.hidden = false;
                    outputData.innerText = code.data;
                    x.play();
                    getDataFromServer(code.data);
                    code.pause();

                } else {
                    outputMessage.hidden = false;
                    outputData.parentElement.hidden = true;
                    // alert('test 2');
                }
            }
            requestAnimationFrame(tick);
        }



        $("#btn-try").click(function(){
            location.reload(true);
        });

        function getDataFromServer($id) {
            $record='';
            $.ajax({
                async: false,
                {{--data: {--}}
                {{--    "id": $id,--}}
                {{--    "_token": "{{ csrf_token() }}",--}}
                {{--},--}}
                url: 'patient_accompanies/' + $id,
                type: 'GET',
                success: function (data) {
                    window.location.href="show_data/" + data;
                },
                error: function (data) {
                    console.log(data);
                    One.helpers('notify', {
                        type: 'danger',
                        icon: 'fa fa-times mr-1',
                        message: "QR Code is not correct or expired, pleas try again !"
                    });
                }
            });
            return $record;
        }



    </script>
@endsection



