<div class="row">
    <div class="container w3-margin-top">
        <img src="images/placeholder.jpg" data-src="images/placeholder.jpg" class="img-fluid rounded" style="height:100px" />

        <div class="w3-padding-medium">

        </div>

        <h4>{{ $picture->user->username? $picture->user->username : $picture->user->firstname.' '.$picture->user->lastname }}</h4>

        <p>{{ $picture->caption}}</p>

        <div class="div-divider">

        </div>

        <div class="container-fluid">
            <div class="w3-center">
                <div>
                    <i class="fa fa-thumbs-up fa-3x"></i>
                    <br>
                    <h4>1678</h4>
                </div>
            </div>

            <div class="div-divider">

            </div>

            <div class="w3-center">
                <div>
                    <i class="fa fa-download fa-3x"></i>
                    <br>
                    <h4>1473</h4>
                </div>
            </div>

            <div class="div-divider">

            </div>

            <div class="w3-center">
                <div>
                    <i class="fa fa-eye fa-3x"></i>
                    <br>
                    <h4>2193</h4>
                </div>
            </div>
        </div>

        <div class="div-divider">

        </div>

        <div class="container-fluid">
            <button id="toggleExifDataBtn" class="btn btn-info"> Picture Details</button>
            <div id="exif-data" class="w3-left-align w3-margin-top" style="display: none">
                <div class="row">
                    <div class="col-5">
                        Image Type
                    </div>
                    <div class="col">
                        : jpeg(JPEG)
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        Camera Brand
                    </div>
                    <div class="col">
                        : Nikon Corporation
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        Camera Model
                    </div>
                    <div class="col">
                        : Nikon D700
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        Date Taken
                    </div>
                    <div class="col">
                        : 2013:03:27 11:13:23
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        Exposure Time
                    </div>
                    <div class="col">
                        : 8 sec
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        Aperture Value
                    </div>
                    <div class="col">
                        : 8.3 EV (f/18.0)
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        Focal Length
                    </div>
                    <div class="col">
                        : 105.0 mm
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        Software
                    </div>
                    <div class="col">
                        : Adobe PhotoShop CS4 Macintosh
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
