<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5 - Multiple markers in google map using gmaps.js</title>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyDgVWRXkJMRBT5mtdbDLm3ctMl9gf7r_3g"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>

    <style type="text/css">
        #mymap {
            top: 12px;
            width: 90%;
            height: 500px;
            background: #fff;
            padding: 15px;
            box-shadow: 0 0 20px #999;
            border-radius: 2px;
            margin: auto;
        }

        .search-branch-container {
            width: 90%;
            height: 73px;
            margin: auto;
            margin-top: 17px;
        }

        .modal {
            text-align: center;
            padding: 0!important;
        }

        .modal:before {
            content: '';
            display: inline-block;
            height: 100%;
            vertical-align: middle;
            margin-right: -4px;
        }

        .modal-dialog {
            display: inline-block;
            text-align: left;
            vertical-align: middle;
        }

        /* footer footnotes */
        footer ol {
            border-top: 1px solid #eee;
            margin-top: 40px;
            padding-top: 15px;
            padding-left: 20px;
        }

        /* Bootstrap Docs */
        .bs-example {
            position: relative;
            padding: 45px 15px 15px;
            margin: 0 -15px 15px;
            border-color: #e5e5e5 #eee #eee;
            border-style: solid;
            border-width: 1px 0;
            -webkit-box-shadow: inset 0 3px 6px rgba(0,0,0,.05);
            box-shadow: inset 0 3px 6px rgba(0,0,0,.05);
        }
        .bs-example:after {
            position: absolute;
            top: 15px;
            left: 15px;
            font-size: 12px;
            font-weight: 700;
            color: #959595;
            text-transform: uppercase;
            letter-spacing: 1px;
            content: "Example";
        }
        .bs-example-padded-bottom {
            padding-bottom: 24px;
        }
        @media (min-width: 768px){
            .bs-example {
                margin-right: 0;
                margin-left: 0;
                background-color: #fff;
                border-color: #ddd;
                border-width: 1px;
                border-radius: 4px 4px 0 0;
                -webkit-box-shadow: none;
                box-shadow: none;
            }
        }
        .bs-example+.code {
            margin: -15px -15px 15px;
            border-width: 0 0 1px;
            border-radius: 0;
        }
        @media (min-width: 768px){
            .bs-example+.code {
                margin-top: -16px;
                margin-right: 0;
                margin-left: 0;
                border-width: 1px;
                border-bottom-right-radius: 4px;
                border-bottom-left-radius: 4px;
            }
        }

        .customize-select{
            width: 231px;
        }
    </style>

</head>
<body>
<div class="search-branch-container">
    <div class="form-group">
        <label for="sel1">Select list:</label>
        <select class="form-control customize-select" id="select-branch">
            @foreach($locations as $data)
                <option>{{$data->city}}</option>
            @endforeach
        </select>
    </div>
</div>
<div id="mymap"></div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <p></p>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script>

    $( document ).ready(function() {
        var locations = <?php print_r(json_encode($locations)) ?>;

        $( "#select-branch" )
            .change(function () {


                $.each( locations, function( index, value ){

                    if(value.city == $('#select-branch').val()){
                        var mymap = new GMaps({
                            el: '#mymap',
                            lat: value.lat,
                            lng: value.lng,
                            zoom:18
                        });

                        mymap.addMarker({
                            lat: value.lat,
                            lng: value.lng,
                            title: value.city,
                            click: function(e) {
                                $('#myModal').modal('show')
                                $('.modal-title').text(value.city)
                                $('.modal-body p').text(value.lng + ' ' + value.lat)
                            }
                        });
                    }
                });

            })
            .change();

    });

</script>

</body>
</html>