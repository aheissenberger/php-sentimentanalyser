Composer Library Template
=========================

Simple german text sentiment analyser

Features
--------

* German sentiment word dictionary "SentiWS"
* PSR-4 autoloading compliant structure
* Unit-Testing with PHPUnit

Installation
============

To get the latest version of  Sentiment Analysis, simply add the following line to the require block of your composer.json file:

```
composer require aheissenberger/sentimentanalyser:dev-master
```


Usage
-----
Returns a positive number for positive sentiment association and negative number for negative sentiment association.

```
$var = new aheissenberger\sentimentanalyser\Sentiment;
echo $var->analyse('Es ist nicht so toll'));
//=> (negative)
```


Create Dictionary from SentiWS
------------------------------

```
php -f ./helper/create_dict.php > ./src/dicts/de.php
```


Credits
-------

This project is based on this javascript implementation:
https://github.com/syzer/sentiment-analyser

German sentiment word dictionary "SentiWS"
http://wortschatz.uni-leipzig.de/de/download

R. Remus, U. Quasthoff & G. Heyer: SentiWS - a Publicly Available German-language Resource for Sentiment Analysis.
In: Proceedings of the 7th International Language Ressources and Evaluation (LREC'10), pp. 1168-1171, 2010