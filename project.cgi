#! /bin/perl -w

# perlgeo.cgi - show a form and do simple calculations
#
# D Provine, 20 Feb 2021
# A Caruso, 9 Apr 2021

use strict;
use CGI qw(:param);  # only using library to get parameters

print "Content-type: text/html\n\n";

# stole this from 'template.html'
print '
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
  <title>
    Golf Score Tracker
  </title>
  <meta charset="utf-8" />
  <meta name="Author" content="Alex Caruso" />
  <meta name="generator" content="Perl" />
  <style>
    a { text-decoration: none; }
    a:hover { text-decoration: underline; }
  </style>
</head>
';

print '

  <p>This website will track the average score of users on specific golf courses, and provide statistics based on those scores.</p>
  <form method="POST" action="project.cgi">
    <fieldset>
      <legend>Shapes </legend>
      <table>
	<tbody><tr>
	  <td>
	    <input type="radio" name="shape" value="circle" id="shaCircle">
	    <label for="shaCircle">Circle</label>
	  </td>
	  <td>
	    <label for="height">Height</label>
	  </td>
	  <td>
	    <input type="text" name="height" id="height">
	  </td>
	</tr>	
	<tr>
	  <td>
	    <input type="radio" name="shape" value="rectangle" id="shaRectangle">
	    <label for="shaRectangle">Rectangle</label>
	  </td>
	  <td>
	    <label for="width">Width</label>
	  </td>
	  <td>
	    <input type="text" name="width" id="width">
	  </td>
	</tr>	
	<tr>
	  <td>
	    <input type="radio" name="shape" value="triangle" id="shaTriangle">
	    <label for="shaTriangle">Triangle</label>
	  </td>
	  <td>
	    <label for="radius">Radius</label>
	  </td>
	  <td>
	    <input type="text" name="radius" id="radius">
	  </td>
	</tr>
	<tr>
	  <td>
	    <input type="checkbox" name="rightTri" value="rightTri" id="rightTri">
	    <label for="rightTri">Right Triangle?</label>
	  </td>
	</tr>
	<tr>
	  <td>
	    <input type="checkbox" name="area" value="area" id="area">
	    <label for="area">Area</label>
	  </td>
	</tr>	
	<tr>
	  <td>
	    <input type="checkbox" name="perimeter" value="perimeter" id="perimeter">
	    <label for="perimeter">Perimeter</label>
	  </td>
	  <td>

	  </td>
	  <td>
	    <input type="submit" value="Submit">
	    <input type="reset" value="Reset">
	  </td>
	</tr>
      </tbody></table>
    </fieldset>
  </form> 

<p>
  <img src="./perlgeopic.cgi"
       style="border: 2px solid black;"
       alt="drawing" />
</p>
', "\n";

print ' 
<br>
<br>';





#old code
my $shape = param('shape');
my $height = param('height');
my $width = param('width');
my $radius = param('radius');
my $area = param('area');
my $perimeter = param('perimeter');
my $rightTri = param('rightTri');
if($area eq '' and $perimeter eq ''){
    print 'Please select a computation!';
    print '<br>';
}
if($shape eq 'rectangle'){
    if($height ne ''){
	if($width ne ''){
	    if($area ne ''){
		my $computearea = $height * $width;
		print 'The area is: ';
		print $computearea;
		print '<br>';
	    } else{
		print '';
		print '<br>';
	    }
	    if($perimeter ne ''){
		my $computeperimeter = 2*$height + 2*$width;
		print 'The perimeter is: ';
		print $computeperimeter;
		print '<br>';
	    } else{
		print '';
		print '<br>';
	    }
	} else{
	    print 'Width is empty!';
	}
    } else{
	print 'Height is empty!';
    }
} elsif($shape eq 'triangle'){
    if($height ne ''){
	if($width ne ''){
	    if($area ne ''){
		my $computearea = $height * $width / 2;
		print 'The area is: ';
		print $computearea;
		print '<br>';
	    } else{
		print '';
		print '<br>';
	    }
	    if($perimeter ne ''){
		if($rightTri ne ''){
		my $computeperimeter = $height + $width + sqrt($height**2 + $width**2);
		print 'The perimeter is: ';
		print $computeperimeter;
		print '<br>';
		} else{
		    print 'Triangle must be a right triangle to compute perimeter!';
		}
	    } else{
		print '';
		print '<br>';
	    }	
	} else{
	    print 'Width is empty!';
	}
    } else{
	print 'Height is empty!';
    }
} elsif($shape eq 'circle'){
    if ($radius ne ''){
	if($area ne ''){
		my $computearea = 3.14159265359 * $radius**2;
		print 'The area is: ';
		print $computearea;
		print '<br>';
	    } else{
		print '';
		print '<br>';
	    }
	    if($perimeter ne ''){
		my $computeperimeter = 2 * 3.14159265359 * $radius;
		print 'The perimeter is: ';
		print $computeperimeter;
		print '<br>';
	    } else{
		print '';
		print '<br>';
	    }
    } else{
	print 'Radius is empty!';
	print '<br>';
    }
} else{
    print 'No shape selected!';
    print '<br>';
}

print ' 
<br>
<br>
<br>';

# stole this from 'template.html', too
print '
<footer style="border-top: 1px solid blue">
 <a href="http://elvis.rowan.edu/~caruso18/"
    title="Link to my home page">
    A. Caruso
 </a>

<span style="float: right;">
<a href="http://validator.w3.org/check/referer">HTML5</a> /
<a href="http://jigsaw.w3.org/css-validator/check/referer?profile=css3">
    CSS3 </a>
</span>
</footer>

</body>
</html>
';

