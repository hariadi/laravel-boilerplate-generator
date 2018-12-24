<?php

class GenerateRelationshipCommandTest extends TestCase
{
    public function testRelationshipCommand()
    {
        $this->artisan('app:relationship', ['name' => 'ModelName']);

        //$this->assertContains('app:model <name>', $this->consoleOutput());
        $this->assertDirectoryExists($this->getPath() .'/Models/ModelName/Traits/Relationship');
        $this->assertFileExists($this->getPath() .'/Models/ModelName/Traits/Relationship/ModelNameRelationship.php');
    }

    public function testRelationshipWithNamespaceStratgy()
    {
    	$this->artisan('app:relationship', ['name' => 'ModelName', '--namespace' => 'Strategy']);

    	$this->assertDirectoryExists($this->getPath() .'/Models/Strategy/Traits/Relationship');
    	$this->assertFileExists($this->getPath() .'/Models/Strategy/Traits/Relationship/ModelNameRelationship.php');
    }
}
