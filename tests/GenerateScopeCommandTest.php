<?php

class GenerateScopeCommandTest extends TestCase
{
    public function testScopeCommand()
    {
        $this->artisan('app:scope', ['name' => 'ModelName']);

        //$this->assertContains('app:model <name>', $this->consoleOutput());
        $this->assertDirectoryExists($this->getPath() .'/Models/ModelName/Traits/Scope');
        $this->assertFileExists($this->getPath() .'/Models/ModelName/Traits/Scope/ModelNameScope.php');
    }

    public function testScopeWithNamespaceStratgy()
    {
    	$this->artisan('app:scope', ['name' => 'ModelName', '--namespace' => 'Strategy']);

    	$this->assertDirectoryExists($this->getPath() .'/Models/Strategy/Traits/Scope');
    	$this->assertFileExists($this->getPath() .'/Models/Strategy/Traits/Scope/ModelNameScope.php');
    }
}
