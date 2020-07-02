<?php

class GenerateMethodCommandTest extends TestCase
{
    public function testMethodCommand()
    {
        $this->artisan('app:method', ['name' => 'ModelName']);

        //$this->assertContains('app:model <name>', $this->consoleOutput());
        $this->assertDirectoryExists($this->getPath() .'/ModelName/Traits/Method');
        $this->assertFileExists($this->getPath() .'/ModelName/Traits/Method/ModelNameMethod.php');
    }

    public function testMethodWithNamespaceStratgy()
    {
    	$this->artisan('app:method', ['name' => 'ModelName', '--namespace' => 'Strategy']);

    	$this->assertDirectoryExists($this->getPath() .'/Strategy/Traits/Method');
    	$this->assertFileExists($this->getPath() .'/Strategy/Traits/Method/ModelNameMethod.php');
    }
}
