# Clog 
### - a simple logger class based on [lydia/Clog](https://github.com/mosbth/lydia/blob/master/src/CLog/CLog.php)


This class has no dependencies and can easily be implemented in any project. It saves timestamps in memory and renders a table at the end of the page.

## Code Example

Create the $Clog object in the top of your script

```php
$Clog = new Toeswade\Log\Clog();
```

Later use it in the classes you want to log . Note that the logger has to be accessible from your class

```php
class Test 
{
	private $logger;

	public function __construct( \Toeswade\Log\Clog $Clog) {
		$this->logger = $Clog;
	}

	/*
	 * Some method
	 */
	public function test() {
		$this->logger->stamp(__CLASS__, __METHOD__, 'Method starts');
		// Some code
		$this->logger->stamp(__CLASS__, __METHOD__, 'Method ends');
	}
}
```

When you have logged all the timestamps of interest echo out the log table at the end of your script

```php
echo $Clog->renderLog();
```

To see the class in action look at the example that comes with the package, starting in toeswade/log/webroot/index.php

## Usage together with [Anax-MVC](https://github.com/mosbth/Anax-MVC)

#### Installation
To start using toeswade/log together with Anax-MVC start with adding it to your composer.json `"toeswade/log": "dev-master"` and then run `composer update` to install the package.

#### Add the logger to DI and test it
Once you have downloaded that package add the logger to your DI-container

```php
        $this->setShared('logger', function () {
            $logger = new \Toeswade\Log\Clog();
            return $logger;
        });
```

Then you can use it to set timestamps where ever you need in your code. For example in src/ThemeEngine/CThemeBasic

```php
    public function render()
    {
        $this->di->logger->stamp(__CLASS__, __METHOD__, 'render starts');

        //...

        $this->di->logger->stamp(__CLASS__, __METHOD__, 'render ends');
    }
```

To see your log just echo it at the end of your script 

```php
// Render the response using theme engine.
$app->theme->render();
echo $app->logger->renderLog();
```

#### Clean out the example code
Note that the code in webroot and src/Test isn't necessary for the package to work.


## Motivation

This class is part of a task in the course phpmvc at BTH, Sweden.

