
        import QrScanner from "./qr-scanner.min.js";

        const video = document.getElementById('qr-video');
        const videoContainer = document.getElementById('video-container');
        const camList = document.getElementById('cam-list');
        const camQrResult = document.getElementById('cam-qr-result');

        function setResult(label, result) {
            $("#qr-code-modal").modal('hide')
            scanner.stop();
            $("#register-vtr").modal('show');

            $('#vicle_type').val('adm')
            selectedata('adm')

            alert(result.data)






        }

        // ####### Web Cam Scanning #######

        const scanner = new QrScanner(video, result => setResult(camQrResult, result), {
            highlightScanRegion: true,
            highlightCodeOutline: true,
        });

        const updateFlashAvailability = () => {
            scanner.hasFlash().then(hasFlash => {
                    document.getElementById('flash-btn').style.display = hasFlash ? 'inline-block' : 'none';
            });
        };


        document.getElementById('flash-btn').addEventListener('click', () => {
            scanner.toggleFlash().then(() => document.getElementById('flash-btn').className = scanner.isFlashOn() ? 'btn btn-success' : 'btn btn-secondary');
        });


        // for debugging
        window.scanner = scanner;
        scanner._updateOverlay();


        camList.addEventListener('change', event => {
            scanner.setCamera(event.target.value).then(updateFlashAvailability);
        });


        document.getElementById('qr-read').addEventListener('click', () => {
            scanner.start().then(() => {
            updateFlashAvailability();
            // List cameras after the scanner started to avoid listCamera's stream and the scanner's stream being requested
            // at the same time which can result in listCamera's unconstrained stream also being offered to the scanner.
            // Note that we can also start the scanner after listCameras, we just have it this way around in the demo to
            // start the scanner earlier.
        });
        });

        document.getElementById('qr-stop').addEventListener('click', () => {
            scanner.stop();
        });

