<?php 

namespace aheissenberger\sentimentanalyser;

/**
*  German Sentiment analysis library for PHP
*
*  @author Andreas Heissenberger
*/
class Sentiment{

   /**  @var string $m_SampleProperty define here what this variable is for, do this for every instance variable */
   private $m_SampleProperty = '';
 
  /**  @var function $tokenize reference to the used tokenizer */
  private $tokenize = 'tokenizer';
  /**  @var array $dict reference to sentimental dictionary */
  private $dict = [];
  /**  @var string $negate a regex with strings which negeate the following word */
  private $negate = '';
  /**  @var array $sentiment_dics a mapping to the dictionaries for different languages */
  private $sentiment_dics = ["de" => "dicts/de.php"];

  private function tokenizer(/*.string.*/ $el) {
   return preg_split('/((^\p{P}+)|(\p{P}*\s+\p{P}*)|(\p{P}+$)|([.,;:!?"]))/', $el, -1, PREG_SPLIT_NO_EMPTY);
  }

  /**
  * create a sentiment parser 
  *
  * @param string $lang an ISO code for the language - e.g. "de": german
  * @param array $options overide the default settings for tokenize, negate
  *
  * @return Float - the sentimental value for the text
  */

  function __construct(/*.string.*/ $lang = 'de', /*.array.*/ $options = []) {

   if (array_key_exists('tokenize',$options)) {
     $this->tokenize=$options['tokenize'];
   }
   if ($lang === 'de') {
     include $this->sentiment_dics[$lang];
     $this->dict = &$dict;
     $this->negate = '/^(nein|nicht|keine)$/';
   }
   if (array_key_exists('negate',$options)) {
     $this->negate=$options['negate'];
   }
  }

  /**
  * Sentiment analysis on Text in german 
  *
  * @param string $str A string with the text to be analysed
  *
  * @return Float - the sentimental value for the text
  */

  function analyse($str){
   $tokens = $this->tokenizer($str);
   $prev = '';
   
   $sum = 0;
   for ($i=0; $i < count($tokens); $i++) {
     $score = 0;
     $word=$tokens[$i];
     if (array_key_exists($word, $this->dict) || array_key_exists( ($word = mb_strtolower($word)) , $this->dict) ) {
      $score = ( preg_match($this->negate, $word) ? -$this->dict[$word] : $this->dict[$word] );
     }
     $sum += $score;
     $prev = $word;
   }
   return $sum;
  }
}