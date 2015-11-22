<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset="UTF-8">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="Styles/StyleSheet.css"/>
        <script
            src="http://maps.googleapis.com/maps/api/js">
        </script>

        <script>
            function initialize() {
                var mapProp = {
                    center:new google.maps.LatLng(6.9021963,79.8613574),
                    zoom:17,
                    mapTypeId:google.maps.MapTypeId.ROADMAP
                };
                var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>

    </head>
    <body>
        <div id="wrapper">
            <div id="banner">
                
            </div>
            
            <nav id="navigation">
                <ul id="nav">
                    <!--<li><a href="#">Contact us</a></li>-->
                    <li><a href="index.php">Home</a></li>
                    <li><a href="Bakery.php">Bakery</a></li>
                    <li><a href="#">Catering</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="Management.php">Management</a></li>

                </ul>
                
                
            </nav>
            
            <div id ="content_area">
                <//?php /*echo $content; */?>
            </div>
            
            <div id="sidebar">
                
            </div>
        <div>
            <h2>Our Location</h2>
            <div id="googleMap" style="margin-left:20px;align:center;width:500px;height:380px;">google Map</div>
        </div>

        <footer>
            <p>All rights reserved</p>
        </footer>
        </div>
    </body>
</html>
