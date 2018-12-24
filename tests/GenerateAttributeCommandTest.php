<?php

class GenerateAttributeCommandTest extends TestCase
{
    public function testAttributeCommand()
    {
        $this->artisan('app:attribute', ['name' => 'ModelName']);

        //$this->assertContains('app:model <name>', $this->consoleOutput());
        $this->assertDirectoryExists($this->getPath() .'/Models/ModelName/Traits/Attribute');
        $this->assertFileExists($this->getPath() .'/Models/ModelName/Traits/Attribute/ModelNameAttribute.php');
    }

    public function testAttributeWithNamespaceStratgy()
    {
    	$this->artisan('app:attribute', ['name' => 'ModelName', '--namespace' => 'Strategy']);

    	$this->assertDirectoryExists($this->getPath() .'/Models/Strategy/Traits/Attribute');
    	$this->assertFileExists($this->getPath() .'/Models/Strategy/Traits/Attribute/ModelNameAttribute.php');
    }
}
