<!DOCTYPE html>
<html>
<head>
<title>BEER!</title>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="css/bootstrap-responsive.css" rel="stylesheet" />
</head>
<body>
<?php
$batchNumber = $_GET["batchNumber"];
$numBottles = $_GET["numBottles"];
if (!isset($_GET['submit'])) 
  { // if page is not submitted to itself echo the form
?>

<form class="well" method="get" action=<php echo $PHP_SELF;?>">  
<label>Batch print form</label>
<input type="text" class="span3" placeholder="Batch number...">
  <span class="help-inline">Type batch number in the text-field.</span>
  <label class="span3">
    <input type="text"> 
  </label>
  <button type="submit" class="btn">Submit</button>
</form>

<?php
}
else 
{
$con = mysql_connect("localhost","beer","cerveza");
if (!$con)
  {
    die('Could not connect: ' . mysql_error());
  }
$batch = $_GET["batch"];
mysql_select_db("beer",$con);
$batchData = mysql_query("SELECT * FROM batches WHERE batchNumber = $batch");
$batchNumber=14;
$batchName="Sturdy little helper";
$numBottles=4;
$brewDate="2012.10.02";
$filename="batch_".$batchNumber;
echo "filename = $filename"."\n";
$file=fopen($filename.".tex", "w");
$preamble = "\\documentclass[a4paper,12pt]{article}
\\usepackage[nynorsk]{babel}
\\usepackage{graphicx}
\\usepackage[utf8]{inputenc}
\\usepackage[T1]{fontenc}
\\usepackage[newdimens]{labels}
\\usepackage{rotating}
\\usepackage{pst-barcode}
\\LabelCols=4
\\LabelRows=6
\\LeftPageMargin=15mm
\\RightPageMargin=15mm
\\TopPageMargin=13.5mm
\\BottomPageMargin=13.5mm
\\InterLabelColumn=6mm
\\InterLabelRow=6mm
\\LeftLabelBorder=0mm
\\RightLabelBorder=0mm
\\TopLabelBorder=0mm
\\BottomLabelBorder=0mm
%\\LabelGridtrue
\\begin{document}
\\tiny
\\begin{labels}
";
fwrite($file,$preamble);

writelabels($file,$batchName,$batchNumber,$numBottles,$brewDate);
function writeLabels($file,$batchName,$batchNumber,$numBottles,$brewDate)
{

  for ($i = 25; $i <=(24+$numBottles);$i++){
    $label = "  \\makebox{
    \\makebox[0mm]{
      \\raisebox{12mm}{
        \\hspace{40mm}
        \\emph{Batch $batchNumber} \\hfill \\emph{Flaske $i}
      }
    }
    \\makebox[0mm]{
      \\raisebox{-17mm}{
        \\hspace{15mm}
        \\psbarcode{http://www.brutalzorz.org/qr/index.php?batch=$batchNumber\&bottle=$i}{height=1 width=1 eclevel=H}{qrcode}
      }
    }
    \\makebox[0mm]{
      \\raisebox{0mm}{
        \\begin{rotate}{-90}
          \\raggedleft
          \\makebox[0mm]{
            \\raisebox{36mm}{
              $batchName
            }
          }
       \\end{rotate}
      }
    }
    \\makebox[0mm]{
      \\raisebox{0mm}{
        \\begin{rotate}{90} 
          \\makebox[0mm]{
            \\raisebox{-3mm}{
              $brewDate
            }
          }
        \\end{rotate}
      }
    }
    \\makebox[0mm]{
      \\raisebox{-20mm}{
        \\hspace{40mm}
        www.brutalzorz.org
      }
    }
  }";
      fwrite($file,$label."\n"."\n");
  }
  fwrite($file,"\\end{labels}
\\end{document}");
}

fclose($file);
exec("latex -interaction=nonstopmode ".$filename);
exec("dvips ".$filename.".dvi "."-o ".$filename.".ps");
exec("ps2pdf ".$filename.".ps ".$filename.".pdf");
exec("evince ".$filename.".pdf");
}
?>
      <p>
	<a class="btn btn-primary btn-large">
	  Learn more
	</a>
	<a class="btn btn-large">
	  Leave a message
	</a>
      </p>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>