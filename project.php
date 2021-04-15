<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
   <title>Geometry Output</title>
   <meta charset="utf-8" />
   <meta name="Author" content="Darren Provine" />
</head>

<body>

<?php

if ( ! empty( $_GET['debug'] ) ) {
	echo "$_GET contains:\n<pre>\n";
    print_r($_GET);
    echo "</pre>\n";
}

if ( ! empty($_SERVER['HTTP_REFERER']) ) {
    echo "<p>Processing data from: " . $_SERVER['HTTP_REFERER'] . "</p>\n";
} else {
    echo "<p>You must not have used a form <b>or</b> you have " .
         " your privacy settings on high.  (I respect that.)</p>\n";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<p>This program requires get, not post.</p>\n";
}

$valid_keys = array("shape",
               "height2d", "width2d", "radius2d",
               "area2d", "perimeter",
               "solid",
               "height3d", "radius3d",
               "area3d", "volume");

foreach ($_GET as $key => $value) {
    if ( ! in_array( $key, $valid_keys ) ) {
        echo "<p>I don't know the key '$key'.</p>\n";
    }
}

                                
?>


<h1>[Advanced] Web Programming Geometry Form Output</h1>

<?php

$pi = 3.14159265358979323;

if ( ! empty($_GET['shape']) ) {
    echo "<p>Processing Shape Information.</p>\n";
    if ( empty($_GET['height2d']) &&
         empty($_GET['width2d'])  &&
         empty($_GET['radius2d'])    ) {

        echo "<p>You did not enter any numbers.</p>\n";

    } else {
        $height = $_GET['height2d'];
        $width  = $_GET['width2d'];
        $radius = $_GET['radius2d'];
    
        if ( $_GET['shape'] == 'circle' ) {
            $area  = $pi * $radius * $radius;
            $perim = $pi * $radius * 2;
            echo "<h2>Circle</h2>\n";

        } else if ( $_GET['shape'] == 'rectangle' ) {
            $area  = $height * $width;
            $perim = ($height + $width) * 2;
            echo "<h2>Rectangle</h2>\n";
        } else if ( $_GET['shape'] == 'triangle' ) {
            $area  = $height * $width / 2;
            $perim = 'perimeter of triangle not computable';
            echo "<h2>Triangle</h2>\n";
        } else {
            echo "<p>You chose a shape I don't know.</p>\n";
            exit;
        }
    }
}

if ( ! empty($_GET['solid']) ) {
    echo "<p>Processing Solid Information.</p>\n";
    if ( empty($_GET['height3d']) &&
         empty($_GET['radius3d'])    ) {

        echo "<p>You did not enter any numbers.</p>\n";

    } else {
        $height = $_GET['height3d'];
        $radius = $_GET['radius3d'];

        if ( $_GET['solid'] == 'sphere' ) {
            $area  = 4 * $pi * $radius * $radius;
            $volume = 4 * $pi * pow($radius, 3) / 3;
            echo "<h2>Sphere</h2>\n";
        } else if ( $_GET['solid'] == 'cylinder' ) {
            $area  = 2 * ( $pi * $radius * $radius ) +
                     $height * $pi * $radius * 2;
            $volume = $pi * $radius * $radius * $height;
            echo "<h2>Cylinder</h2>\n";
        } else if ( $_GET['solid'] == 'cube' ) {
            $area   = 6 * pow ( $height, 2 );
            $volume = pow ( $height, 3 );
            echo "<h2>Cube</h2>\n";
        } else {
            echo "<p>You chose a solid I don't know.</p>\n";
            exit;
        }
    }
}

echo "<h2>Input data:</h2>\n";

echo "<p>\n";
if ( ! empty($_GET['height2d']) ) {
    echo "height = $height <br>\n";
}
if ( ! empty($_GET['width2d']) ) {
    echo "width = $width <br>\n";
}
if ( ! empty($_GET['radius2d']) ) {
    echo "radius = $radius <br>\n";
}
if ( ! empty($_GET['height3d']) ) {
    echo "height = $height <br>\n";
}
if ( ! empty($_GET['radius3d']) ) {
    echo "radius = $radius <br>\n";
}
echo "</p>\n";

echo "<h2>Results:</h2>\n";

if (! empty($_GET['area2d']) || ! empty($_GET['area3d'])  ) {
    echo "<p>Area = $area</p>\n";
}
if (! empty($_GET['perimeter'] ) ) {
    echo "<p>Perimeter = $perim</p>\n";
}
if (! empty($_GET['volume'] ) ) {
    echo "<p>Volume = $volume</p>\n";
}
if (empty($_GET['perimeter']) && empty($_GET['area2d']) &&
    empty($_GET['volume']) && empty($_GET['area3d']) ) {
    echo "<p>You didn't ask for any information.</p>\n";
}
?>



<footer style="border: 1px solid blue; padding: 1px 5px;">
D. Provine

<span style="float: right;">
<a href="http://validator.w3.org/check/referer">HTML5</a> /
<a href="http://jigsaw.w3.org/css-validator/check/referer?profile=css3">
    CSS3 </a>
</span>
</footer>



</body>
</html>
