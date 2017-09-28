<?php 

/**
*  Corresponding Class to test YourClass class
*
*  For each class in your library, there should be a corresponding Unit-Test for it
*  Unit-Tests should be as much as possible independent from other test going on.
*
*  @author yourname
*/
class SentimentTest extends PHPUnit_Framework_TestCase{
	
  /**
  * Just check if the YourClass has no syntax error 
  *
  * This is just a simple check to make sure your library has no syntax error. This helps you troubleshoot
  * any typo before you even use this library in a real project.
  *
  */
  public function testIsThereAnySyntaxError(){
	$var = new aheissenberger\sentimentanalyser\Sentiment;
	$this->assertTrue(is_object($var));
	unset($var);
  }
  
  /**
  * Just check if the YourClass has no syntax error 
  *
  * This is just a simple check to make sure your library has no syntax error. This helps you troubleshoot
  * any typo before you even use this library in a real project.
  *
  */
  public function testLongText(){
	$var = new aheissenberger\sentimentanalyser\Sentiment;
	$this->assertEquals( -0.1779, $var->analyse('Einen Schlagabtausch lieferten sich die weltoffene Richterin und der gelben Parteichef aber nicht. Hans nahm die Rolle des höflichen Gesprächspartners ein.Seine Tonalität war 45 Minuten gemäßigt. "Doppelstaatsbürgerschaften finde ich empörend", war schon der heftigste Sager des XXX-Chefs. So viel Gentleman-Attitüde zeigte Hans noch nie.'));
	unset($var);
  }
/**
  * Just check if the YourClass has no syntax error 
  *
  * This is just a simple check to make sure your library has no syntax error. This helps you troubleshoot
  * any typo before you even use this library in a real project.
  *
  */
  public function testNegativHauptwort(){
  $var = new aheissenberger\sentimentanalyser\Sentiment;
  $this->assertEquals(-0.9686, $var->analyse('Schuld') );
  unset($var);
  }  

  public function testNegativAbwandlung(){
  $var = new aheissenberger\sentimentanalyser\Sentiment;
  $this->assertEquals(-0.0048, $var->analyse('Schuftigerer') );
  unset($var);
  } 

  public function testIstHauptwort(){
  $var = new aheissenberger\sentimentanalyser\Sentiment;
  $this->assertEquals(-0.0048, $var->analyse('abnutzung') );
  unset($var);
  } 

  public function testKeinHauptwort(){
  $var = new aheissenberger\sentimentanalyser\Sentiment;
  $this->assertEquals(-0.3203, $var->analyse('Übertrieben') );
  unset($var);
  } 

}