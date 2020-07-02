<?php

class GenerateModalCommandTest extends TestCase
{
    public function testModelCommand()
    {
        $this->artisan('app:model', ['name' => 'ModelName']);

        //$this->assertContains('app:model <name>', $this->consoleOutput());
        $this->assertDirectoryExists($this->getPath() .'/ModelName');
        $this->assertFileExists($this->getPath() .'/ModelName/ModelName.php');
        $this->assertDirectoryExists($this->getPath() .'/ModelName/Traits/Attribute');
        $this->assertFileExists($this->getPath() .'/ModelName/Traits/Attribute/ModelNameAttribute.php');
        $this->assertDirectoryExists($this->getPath() .'/ModelName/Traits/Method');
        $this->assertFileExists($this->getPath() .'/ModelName/Traits/Method/ModelNameMethod.php');
        $this->assertDirectoryExists($this->getPath() .'/ModelName/Traits/Scope');
        $this->assertFileExists($this->getPath() .'/ModelName/Traits/Scope/ModelNameScope.php');
        $this->assertDirectoryExists($this->getPath() .'/ModelName/Traits/Relationship');
        $this->assertFileExists($this->getPath() .'/ModelName/Traits/Relationship/ModelNameRelationship.php');
    }

    public function testModelWithNamespaceStratgy()
    {
    	$this->artisan('app:model', ['name' => 'ModelName', '--namespace' => 'Strategy']);

    	$this->assertDirectoryExists($this->getPath() .'/Strategy');
    	$this->assertFileExists($this->getPath() .'/Strategy/ModelName.php');
        $this->assertDirectoryExists($this->getPath() .'/Strategy/Traits/Attribute');
        $this->assertFileExists($this->getPath() .'/Strategy/Traits/Attribute/ModelNameAttribute.php');
        $this->assertDirectoryExists($this->getPath() .'/Strategy/Traits/Method');
        $this->assertFileExists($this->getPath() .'/Strategy/Traits/Method/ModelNameMethod.php');
        $this->assertDirectoryExists($this->getPath() .'/Strategy/Traits/Scope');
        $this->assertFileExists($this->getPath() .'/Strategy/Traits/Scope/ModelNameScope.php');
        $this->assertDirectoryExists($this->getPath() .'/Strategy/Traits/Relationship');
        $this->assertFileExists($this->getPath() .'/Strategy/Traits/Relationship/ModelNameRelationship.php');
    }
}
