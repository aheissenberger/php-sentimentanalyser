<?php

function w1($file) {
  $row=0;
  if (($handle = fopen($file, "r")) !== FALSE) {
      
      while (($data = fgetcsv($handle, 1000, "\t")) !== FALSE) {
          $row++;
          list($word, $pos) = explode('|',$data[0]);
          $polarity = (float)$data[1];
          $word = $word;

          echo "'$word'=>$polarity,";
          if (count($data)>2) {
            $master_word = $word;
            $words = explode(',',$data[2]);
            foreach ($words as $word) {

              $word = $word;
              echo "'$word'=>$polarity,";
            }
          }
      }
      fclose($handle);

  }
}


echo "<?php\n\$dict=[";
w1("./SentiWS_v1/SentiWS_v1.8c_Positive.txt");
w1("./SentiWS_v1/SentiWS_v1.8c_Negative.txt");
echo "];\n";
