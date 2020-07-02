<?php

class GenerateRelationshipCommandTest extends TestCase
{
    public function testRelationshipCommand()
    {
        $this->artisan('app:relationship', ['name' => 'ModelName']);

        //$this->assertContains('app:model <name>', $this->consoleOutput());
        $this->assertDirectoryExists($this->getPath() .'/ModelName/Traits/Relationship');
        $this->assertFileExists($this->getPath() .'/ModelName/Traits/Relationship/ModelNameRelationship.php');
    }

    public function testRelationshipWithNamespaceStratgy()
    {
    	$this->artisan('app:relationship', ['name' => 'ModelName', '--namespace' => 'Strategy']);

    	$this->assertDirectoryExists($this->getPath() .'/Strategy/Traits/Relationship');
    	$this->assertFileExists($this->getPath() .'/Strategy/Traits/Relationship/ModelNameRelationship.php');
    }
}
