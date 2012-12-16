<?php
$con = mysql_connect("localhost","beer","cerveza");
if (!$con)
  {
    die('Could not connect: ' . mysql_error());
  }

echo "haha","<br>";
$batchNumber=31;
$batchName="Juleøl 2";
$batchCode="J2";
$numBottles=21;
$filename="batch_".$batchNumber.".tex";
echo "filename = $filename"."\n";
$file=fopen($filename, "w");
#echo $file;
$preamble = "\documentclass[a4paper,12pt]{article}
\usepackage[nynorsk]{babel}
\usepackage{graphicx}
\usepackage[utf8]{inputenc}
\usepackage[T1]{fontenc}
\usepackage[newdimens]{labels}
\usepackage{rotating}
\usepackage{pst-barcode}
\LabelCols=4% Number of columns of labels per page
\LabelRows=6% Number of rows of labels per page
\LeftPageMargin=15mm% These four parameters give the
\RightPageMargin=15mm% page gutter sizes. The outer edges of
\TopPageMargin=13.5mm% the outer labels are the specified
\BottomPageMargin=13.5mm% distances from the edge of the paper.
\InterLabelColumn=6mm% Gap between columns of labels
\InterLabelRow=6mm% Gap between rows of labels
\LeftLabelBorder=1mm% These four parameters give the extra
\RightLabelBorder=1mm% space used around the text on each
\TopLabelBorder=0mm% actual label.
\BottomLabelBorder=0mm%
\LabelGridtrue
\LabelInfotrue
\\newcommand{\batchName}{}
\\newcommand{\batchCode}{}
\\newcommand{\batchNumber}{}
\\newcommand{\bottleNumber}{}
\\newcommand{\qrText}{}
";
fwrite($file,$preamble);
#echo $preamble;
$labelTemplate = "  \\raisebox{-44mm}[0mm][40mm]{\parbox{0.95\columnwidth}{Batch \#\batchNumber{}Flaske \#\bottleNumber{}    \makebox{Juleøl (J2)}}}
  \\raisebox{22mm}{\makebox{%
      \parbox{0.95\columnwidth}{\psbarcode{\qrText}{height=1 width=1}{qrcode}}
      \parbox{0.95\columnwidth}{\psbarcode[rotate=90]{000\batchNumber0\bottleNumber}{height=0.4 includetext}{ean8}}
    }}
\n";
writelabels($file,$batchName,$batchCode,$batchNumber,$numBottles,$labelTemplate);
function writeLabels($file,$batchName,$batchCode,$batchNumber,$numBottles,$labelTemplate)
{
  $batchConstants = "\\renewcommand{\batchName}{".$batchName."}
\\renewcommand{\batchCode}{".$batchCode."}
\\renewcommand{\batchNumber}{".$batchNumber."}
\\renewcommand{\qrText}{Dette er batchnummer \batchNumber{} flaskenummer \bottleNumber{}}\n";
  fwrite($file,"\begin{document}
  \\footnotesize
  \begin{labels}");
  fwrite($file,$batchConstants);
  for ($i = 1; $i <=$numBottles;$i++){
    fwrite($file,"\\renewcommand{\bottleNumber}{".$i."}\n");
    fwrite($file,$labelTemplate);
  }
  fwrite($file,"\\end{labels}
\\end{document}");
}

fclose($file);

?>