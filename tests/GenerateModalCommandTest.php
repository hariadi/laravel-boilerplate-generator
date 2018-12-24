<?php

class GenerateModalCommandTest extends TestCase
{
    public function testModelCommand()
    {
        $this->artisan('app:model', ['name' => 'ModelName']);

        //$this->assertContains('app:model <name>', $this->consoleOutput());
        $this->assertDirectoryExists($this->getPath() .'/Models/ModelName');
        $this->assertFileExists($this->getPath() .'/Models/ModelName/ModelName.php');
        $this->assertDirectoryExists($this->getPath() .'/Models/ModelName/Traits/Attribute');
        $this->assertFileExists($this->getPath() .'/Models/ModelName/Traits/Attribute/ModelNameAttribute.php');
        $this->assertDirectoryExists($this->getPath() .'/Models/ModelName/Traits/Method');
        $this->assertFileExists($this->getPath() .'/Models/ModelName/Traits/Method/ModelNameMethod.php');
        $this->assertDirectoryExists($this->getPath() .'/Models/ModelName/Traits/Scope');
        $this->assertFileExists($this->getPath() .'/Models/ModelName/Traits/Scope/ModelNameScope.php');
        $this->assertDirectoryExists($this->getPath() .'/Models/ModelName/Traits/Relationship');
        $this->assertFileExists($this->getPath() .'/Models/ModelName/Traits/Relationship/ModelNameRelationship.php');
    }

    public function testModelWithNamespaceStratgy()
    {
    	$this->artisan('app:model', ['name' => 'ModelName', '--namespace' => 'Strategy']);

    	$this->assertDirectoryExists($this->getPath() .'/Models/Strategy');
    	$this->assertFileExists($this->getPath() .'/Models/Strategy/ModelName.php');
        $this->assertDirectoryExists($this->getPath() .'/Models/Strategy/Traits/Attribute');
        $this->assertFileExists($this->getPath() .'/Models/Strategy/Traits/Attribute/ModelNameAttribute.php');
        $this->assertDirectoryExists($this->getPath() .'/Models/Strategy/Traits/Method');
        $this->assertFileExists($this->getPath() .'/Models/Strategy/Traits/Method/ModelNameMethod.php');
        $this->assertDirectoryExists($this->getPath() .'/Models/Strategy/Traits/Scope');
        $this->assertFileExists($this->getPath() .'/Models/Strategy/Traits/Scope/ModelNameScope.php');
        $this->assertDirectoryExists($this->getPath() .'/Models/Strategy/Traits/Relationship');
        $this->assertFileExists($this->getPath() .'/Models/Strategy/Traits/Relationship/ModelNameRelationship.php');
    }
}
