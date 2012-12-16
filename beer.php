<?php
$con = mysql_connect("localhost","beer","cerveza");
if (!$con)
  {
    die('Could not connect: ' . mysql_error());
  }

echo "haha","<br>";
$batchNumber=15;
$batchName="Sturdy little helper";
$numBottles=21;
$brewDate="2012.11.02";
$filename="batch_".$batchNumber;
echo "filename = $filename"."\n";
$file=fopen($filename.".tex", "w");
#echo $file;
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
\\LeftLabelBorder=1mm
\\RightLabelBorder=1mm
\\TopLabelBorder=0mm
\\BottomLabelBorder=0mm
\\begin{document}
\\tiny
\\begin{labels}
";
fwrite($file,$preamble);
#echo $preamble;
writelabels($file,$batchName,$batchNumber,$numBottles,$brewDate);
function writeLabels($file,$batchName,$batchNumber,$numBottles,$brewDate)
{

  for ($i = 1; $i <=$numBottles;$i++){
    $label = "  \\makebox{
    \\makebox[0mm]{
      \\raisebox{15mm}{
        \\hspace{40mm}
        \\emph{Batch $batchNumber} \\hfill \\emph{Flaske $i}
      }
    }
    \\makebox[0mm]{
      \\raisebox{-14mm}{
        \\hspace{15mm}
        \\psbarcode{http://www.brutalzorz.org/index.php?ba=$batchNumber\&bo=$i}{height=1 width=1 eclevel=H}{qrcode}
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
?>