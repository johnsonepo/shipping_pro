<style>

@import url('https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i');

.row {
    display: flex;
}

.col-7-12 {
    flex: 7;
    padding: 10px;
}

.col-5-12 {
    flex: 5;
    padding: 10px;
}

.col-5-12 > div {
    margin: 10px;
    padding: 15px;
}

/* Track Form */
.track-section {
    width: 80%;
}

.track-form-two {
    position: relative;
    margin-top: 24px;
}

.track-form-two .form-group {
    position: relative;
    display: block;
    z-index: 1;
    margin-bottom: 5px;
}

.track-form-two .form-group label {
    position: relative;
    color: #777777;
    font-size: 18px;
}

.track-form-two .form-group input[type="text"],
.track-form-two .form-group input[type="tel"],
.track-form-two .form-group input[type="email"],
.track-form-two .form-group textarea {
    position: relative;
    display: block;
    width: 100%;
    height: 50px;
    font-size: 14px;
    color: #848484;
    line-height: 34px;
    padding: 10px 10px;
    font-weight: 400;
    background: #ffffff;
    border-radius: 8px;
    border: 1px solid #cccccc;
    transition: all 500ms ease;
    -webkit-transition: all 500ms ease;
    -ms-transition: all 500ms ease;
    -o-transition: all 500ms ease;
}

.track-form-two .form-group input[type="email"]:focus {
    border-color: #00bff3;
}

.track-form-two .form-group .submit-btn {
    position: absolute;
    top: 0px;
    right: 0px;
    cursor: pointer;
    line-height: 24px;
    background: #eb0028;
    color: #ffffff;
    font-size: 18px;
    padding: 13px 25px;
    text-transform: capitalize;
    border-radius: 0px 8px 8px 0px;
    border: 0px;
}

/* Tracking Info Detail */

.tracking-info-detail {
    position: relative;
    margin-top: 40px;
    margin-bottom: 45px;
}

.tracking-info-detail .tracking-box {
    position: relative;
}

.tracking-info-detail .tracking-box .tracking-time-box {
    position: relative;
    margin-right: 30px;
    display: inline-block;
}

.tracking-info-detail .tracking-box .tracking-time {
    position: relative;
    color: #222222;
    font-size: 18px;
    font-weight: 400;
    font-family: 'Montserrat', sans-serif;
}

.tracking-info-detail .tracking-box span {
    position: relative;
    font-size: 14px;
    color: #777777;
}

.tracking-info-detail .tracking-box .tracking-location {
    position: relative;
    font-size: 14px;
    color: #777777;
    padding-left: 70px;
    padding-bottom: 40px;
    display: inline-block;
}

.tracking-info-detail .tracking-box .tracking-location:before {
    position: absolute;
    content: '';
    left: 0px;
    top: 0px;
    width: 1px;
    height: 100%;
    background-color: #d6d6d6;
}

.tracking-info-detail .tracking-box .tracking-location strong {
    position: relative;
    color: #222222;
    font-size: 16px;
    font-weight: 400;
    display: block;
    font-family: 'Montserrat', sans-serif;
}

.tracking-info-detail .tracking-box .tracking-location:after {
    position: absolute;
    content: '';
    left: -16px;
    top: -2px;
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background-color: #01a95a;
    display: inline-block;
}

.tracking-info-detail .tracking-box .tracking-location.style-two::after {
    background-color: #4dcefe;
}

.tracking-info-detail .tracking-box .tracking-location.style-three::after {
    background: #ffffff;
    border: 1px solid #d6d6d6;
}

.tracking-info-detail .tracking-box .tracking-location .dott {
    position: absolute;
    content: '';
    left: -3px;
    top: 11px;
    width: 9px;
    height: 9px;
    z-index: 1;
    border-radius: 50%;
    background-color: #d6d6d6;
}

.tracking-info-detail .tracking-box:last-child .tracking-location {
    padding-bottom: 0px;
}

.tracking-info-detail .tracking-box:last-child .tracking-location:before {
    display: none;
}

.map-data {
    text-align: center;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.8em;
}

.map-data h6 {
    font-size: 16px;
    font-weight: 700;
    text-align: center;
    margin-bottom: 5px;
    color: #121212;
}

.map-outer {
    /*background-color: #343541;
    padding: 20px;*/
    border: 1px solid #848484;
}


.map-canvas {
    height: 500px;
    border: 1px #121212;
}

.sec-title {
    position: relative;
    margin-bottom: 40px;
}

.sec-title h3 {
    position: relative;
    font-size: 48px;
    color: #222222;
    font-weight: 700;
    line-height: 1.3em;
}

.sec-title .separater {
    position: relative;
    width: 106px;
    height: 7px;
    margin-top: 8px !important;
    margin-bottom: 6px;
    background: url(../images/icons/separater.png) no-repeat;
}

.page-title h2 {
    position: relative;
}

.page-title .separater {
    position: relative;
    width: 106px;
    height: 7px;
    margin-top: 8px !important;
    margin-bottom: 6px;
    background: url(../images/icons/separater.png) no-repeat;
    text-align: center;
    margin: 0 auto;
}

.sec-title .text {
    position: relative;
    font-size: 16px;
    color: #777777;
    font-weight: 400;
    line-height: 1.3em;
    margin-top: 12px;
}

.sec-title.centered .separater {
    margin: 0 auto;
}

.sec-title.light h3 {
    color: #ffffff;
}

.sec-title.centered {
    text-align: center;
}

.sec-title-two {
    position: relative;
    margin-bottom: 20px;
    z-index: 1;
}

.services-section-two .sec-title-two {
    margin-bottom: 30px;
    text-align: center;
}

.sec-title-two h2 {
    position: relative;
    font-size: 48px;
    color: #222222;
    font-weight: 700;
    line-height: 1.3em;
    font-family: 'Raleway', sans-serif;
}

.sec-title-two h2 span,
.sec-title h3 span {
    color: #eb0028;
}

.sec-title-two.blue h2 span,
.sec-title.blue h3 span {
    color: #1b8af3;
}

.sec-title-two.light h2 {
    color: #ffffff;
}

.sender-info,
.receiver-info {
    border: 1px solid #ddd;
    padding: 5px;
    margin-bottom: 20px;
}

.sender-info h3,
.receiver-info h3 {
    font-size: 18px;
    font-weight: 500;
    margin-bottom: 15px;
    color: #333;
}

.sender-info p,
.receiver-info p {
    color: #222222;
    font-size: 14px;
    font-weight: 400;
    font-family: 'Montserrat', sans-serif;
    margin-bottom: 10px;
}

.with_25 {
    width: 190px;
}

.pl-1 {
    padding-left: 10px;
}

.pl-2 {
    padding-left: 20px;
}

.pl-3 {
    padding-left: 30px;
}

.pl-4 {
    padding-left: 40px;
}

.pl-5 {
    padding-left: 50px;
}

.cl-main {
    color: #1b8af3;
}

@keyframes blink {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0;
    }
}

.blink {
    animation: blink 2s infinite; 
}

.center-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100px; 
}

.barcode-image {
    padding-top: 50px;
    padding-bottom: 30px;
    max-width: 300px; 
    height: auto;
}

#leaflet-map { height: 600px; width: 100%; margin: auto; }
.leaflet-marker-icon {
    width: 20px;
    height: 20px;
    margin-left: -10px!important;
    margin-top: -10px!important;
    transform: translate3d(112px, 367px, 0px);
    z-index: 367;
}
.moving-marker i {
    font-size: 40px;
    color: red;
    animation: bounce 2s infinite;
}
@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-40px);
    }
    60% {
        transform: translateY(-20px);
    }
}

.leaflet-routing-container {
    display: none;
}


</style>

  
<div class="track-section">
    <div class="sec-title-two sec-title">
        <h2>Track &amp; <span>Trace Shipment</span></h2>
        <div class="separater"></div>
    </div>

    <div class="track-form-two">
    <form id="shippo-tracking-form" method="get" action="">
            <div class="form-group">
                <label>Enter Tracking Number Here</label>
            </div>
            <div class="form-group">
                <input id="tracking_number" type="text" name="tracking_number" placeholder="Enter your tracking number e.g CRG-11-XXXX" value="<?php echo isset($_GET['tracking_number']) ? htmlspecialchars($_GET['tracking_number']) : ''; ?>">
                <button type="submit" class="theme-btn submit-btn" value="<?php _e('Search', 'shippo-x'); ?>">Track Your Shipment</button>
            </div>

        </form>
    </div>
    <?php 
        if($this->shipment){
            //var_dump($this->shipment);
            ?>
            <div class="center-container">
                <?php
                $random_barcode_image_src = plugin_dir_url(__FILE__). '../assets/images/barcode.png';
                ?>
                <img src="<?= $random_barcode_image_src ?>" alt="Barcode" class="barcode-image">
            </div>
            <div class="row">
                <div class="col-7-12">
                    <div class="tracking-info-detail">
                        <div class="tracking-box">
                            <div class="tracking-time-box">
                                <div class="tracking-time with_25">Sender name</div>
                                <span> <?=$this->shipment->_sender_name?> </span>
                            </div>
                            <div class="tracking-location style-three">
                                <span class="dott"></span>
                                <strong>Receiver name </strong>
                                <?=$this->shipment->_receiver_name?> 
                            </div>
                        </div>

                        <div class="tracking-box">
                            <div class="tracking-time-box">
                                <div class="tracking-time with_25">Sender email</div>
                                <span> <?=$this->shipment->_sender_email?> </span>
                            </div>
                            <div class="tracking-location style-three">
                                <span class="dott"></span>
                                <strong>Receiver email </strong>
                                <?=$this->shipment->_receiver_email?> 
                            </div>
                        </div>

                        <div class="tracking-box">
                            <div class="tracking-time-box">
                                <div class="tracking-time with_25">Sender phone</div>
                                <span> <?=$this->shipment->_sender_phone?> </span>
                            </div>
                            <div class="tracking-location style-three">
                                <span class="dott"></span>
                                <strong>Receiver phone </strong>
                                <?=$this->shipment->_receiver_phone?> 
                            </div>
                        </div>

                        <div class="tracking-box">
                            <div class="tracking-time-box">
                                <div class="tracking-time with_25">Sender state</div>
                                <span> <?=$this->shipment->_sender_state?> </span>
                            </div>
                            <div class="tracking-location style-three">
                                <span class="dott"></span>
                                <strong>Receiver state </strong>
                                <?=$this->shipment->_receiver_state?> 
                            </div>
                        </div>

                        <div class="tracking-box">
                            <div class="tracking-time-box">
                                <div class="tracking-time with_25">Sender city</div>
                                <span> <?=$this->shipment->_sender_city?> </span>
                            </div>
                            <div class="tracking-location style-three">
                                <span class="dott"></span>
                                <strong>Receiver city </strong>
                                <?=$this->shipment->_receiver_city?> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5-12">
                    <div class="sender-info">
                        <h3>Package Information</h3>
                        <p>Weight:  <span class="pl-3"> <?= $this->shipment->_package_weight ?> </span></p>
                        <p>Sending location: <span class="pl-3"> <?= $this->shipment->_original_destination ?? $this->shipment->_sender_city ?> </span></p>
                        <p>Destination: <span class="pl-3"> <?= $this->shipment->_final_destination ?? $this->shipment->_receiver_city ?> </span></p>
                        <p>Current Location: <span class="pl-3"> <?= $this->shipment->_current_location ?> </span></p>
                        <p>Status: <span class="pl-3 cl-main blink"> <?= $this->shipment->_status ?> </span></p>
                        <p>Sending date: <span class="pl-3"> <?= date('d/m/Y H:i', strtotime($this->shipment->_sending_date)) ?> </span></p>
                        <p>Expected delivery date: <span class="pl-3"> <?= date('d/m/Y H:i', strtotime($this->shipment->_expected_delivery_date)) ?> </span></p>
                    </div>
                    
                </div>
            </div>
    

            <div class="map-outer">
                <div id="map" class="map-canvas" style="height: 400px; width: 100%;"></div>

            </div>
        </div>
    <?php    
    }
?>

<style>
#map { height: 600px; width: 700px; margin: auto; }
.leaflet-marker-icon {
    width: 20px;
    height: 20px;
    margin-left: -10px!important;
    margin-top: -10px!important;
    transform: translate3d(112px, 367px, 0px);
    z-index: 367;
}
.my-div-icon i {
    font-size: 20px;
}
.original-marker i,
.final-marker i {
    font-size: 40px;
}
.current-marker i {
    font-size: 40px;
    color: red;
    animation: bounce 2s infinite;
}
@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-40px);
    }
    60% {
        transform: translateY(-20px);
    }
}

.leaflet-routing-container {
    display: none;
}
</style>


<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>


<script>
        document.addEventListener('DOMContentLoaded', async function () {
            const apiKey = '812c428cac0d44b4ab8697a2177666e4';
            const cities = ['<?= $this->shipment->_original_destination ?? $this->shipment->_sender_city ?>', '<?= $this->shipment->_final_destination ?? $this->shipment->_receiver_city ?>'];

            const startDate = new Date('<?= date('Y-m-d\TH:i:s', strtotime($this->shipment->_sending_date)) ?>');
            const endDate = new Date('<?= date('Y-m-d\TH:i:s', strtotime($this->shipment->_expected_delivery_date)) ?>');
            const numberOfMilliseconds = endDate - startDate;
            const numberOfDays = numberOfMilliseconds / (1000 * 60 * 60 * 24);

            const map = L.map('map').setView([0, 0], 2);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            function createMarker(lat, lon, className, isCurrent, tooltipText) {
                const iconHtml = isCurrent ? '<i class="fas fa-map-marker-alt" style="color: red;"></i>' : '<i class="fas fa-map-marker-alt" style="color: inherit;"></i>';
                const marker = L.marker([lat, lon], {
                    icon: L.divIcon({
                        className: className,
                        html: iconHtml,
                        iconSize: [40, 40],
                        iconAnchor: [20, 40]
                    })
                });

                if (isCurrent) {
                    marker.bindTooltip(tooltipText, {
                        direction: 'top',
                        offset: [0, -20]
                    });
                } else {
                    marker.bindTooltip(tooltipText, {
                        direction: 'bottom',
                        offset: [0, 20]
                    });
                }

                return marker;
            }

            async function geocodeAndCreateMarker(city, isFinal = false, tooltipPrefix = '') {
                const response = await fetch(`https://api.opencagedata.com/geocode/v1/json?q=${city}&key=${apiKey}`);
                const data = await response.json();
                const result = data.results[0];

                if (result) {
                    const {
                        lat,
                        lng
                    } = result.geometry;
                    const className = isFinal ? 'final-marker' : 'original-marker';
                    const tooltipText = result.formatted || `${tooltipPrefix} Location: ${lat.toFixed(4)}, ${lng.toFixed(4)}`;
                    const marker = createMarker(lat, lng, className, false, tooltipText).addTo(map);

                    if (!isFinal) {
                        marker.bindTooltip(tooltipText, {
                            direction: 'bottom',
                            offset: [0, 20]
                        });
                    }

                    return marker;
                } else {
                    console.error(`Could not geocode city: ${city}`);
                    return null;
                }
            }

            const originalMarkerPromise = geocodeAndCreateMarker(cities[0], false, 'Sender');
            const finalMarkerPromise = geocodeAndCreateMarker(cities[1], true, 'Receiver');

            Promise.all([originalMarkerPromise, finalMarkerPromise]).then(([originalMarker, finalMarker]) => {
                const movingMarker = createMarker(originalMarker.getLatLng().lat, originalMarker.getLatLng().lng, 'current-marker', true, 'Actual Location');
                movingMarker.addTo(map);

                const polyline = L.polyline([], {
                    color: 'red',
                    opacity: 1,
                    weight: 2
                }).addTo(map);

                L.Routing.control({
                    waypoints: [
                        L.latLng(originalMarker.getLatLng().lat, originalMarker.getLatLng().lng),
                        L.latLng(finalMarker.getLatLng().lat, finalMarker.getLatLng().lng)
                    ],
                    routeWhileDragging: true,
                    fitSelectedRoutes: 'smart'
                }).addTo(map);

                const bounds = L.latLngBounds(originalMarker.getLatLng(), finalMarker.getLatLng());
                map.fitBounds(bounds, {
                    padding: [50, 50]
                });

                const interval = 5000;

                setInterval(async () => {
                    const elapsed = Date.now() - startDate.getTime();
                    const newPosition = calculateNewPosition(elapsed, numberOfDays, originalMarker.getLatLng(), finalMarker.getLatLng());

                    movingMarker.setLatLng([newPosition.lat, newPosition.lng]);
                    polyline.addLatLng([newPosition.lat, newPosition.lng]);

                    const response = await fetch(`https://api.opencagedata.com/geocode/v1/json?q=${newPosition.lat}+${newPosition.lng}&key=${apiKey}`);
                    const data = await response.json();
                    const result = data.results[0];

                    if (result) {
                        const tooltipText = result.formatted || `Location: ${newPosition.lat.toFixed(4)}, ${newPosition.lng.toFixed(4)}`;
                        movingMarker.setTooltipContent(tooltipText);
                    }
                }, interval);
            });

            function calculateNewPosition(elapsed, numberOfDays, start, end) {
                const progress = Math.min(elapsed / (numberOfDays * 24 * 60 * 60 * 1000), 1);
                const lat = start.lat + (end.lat - start.lat) * progress;
                const lng = start.lng + (end.lng - start.lng) * progress;
                return {
                    lat,
                    lng
                };
            }
        });
    </script>