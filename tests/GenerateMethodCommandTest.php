<?php

class GenerateMethodCommandTest extends TestCase
{
    public function testMethodCommand()
    {
        $this->artisan('app:method', ['name' => 'ModelName']);

        //$this->assertContains('app:model <name>', $this->consoleOutput());
        $this->assertDirectoryExists($this->getPath() .'/Models/ModelName/Traits/Method');
        $this->assertFileExists($this->getPath() .'/Models/ModelName/Traits/Method/ModelNameMethod.php');
    }

    public function testMethodWithNamespaceStratgy()
    {
    	$this->artisan('app:method', ['name' => 'ModelName', '--namespace' => 'Strategy']);

    	$this->assertDirectoryExists($this->getPath() .'/Models/Strategy/Traits/Method');
    	$this->assertFileExists($this->getPath() .'/Models/Strategy/Traits/Method/ModelNameMethod.php');
    }
}
