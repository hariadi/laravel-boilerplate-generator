<?php

class GenerateEventCommandTest extends TestCase
{
    public function testEventCreatedCommand()
    {
        $this->artisan('event:created', [
            'name' => 'ModelName'
        ]);
        // dd($this->consoleOutput());
        // $this->assertContains('event <name>', $this->consoleOutput());
        $this->assertDirectoryExists($this->getPath() .'/Events/Backend/ModelName');
        $this->assertFileExists($this->getPath() .'/Events/Backend/ModelName/ModelNameCreated.php');
        $this->assertFileExists($this->getPath() .'/Events/Backend/ModelName/ModelNameUpdated.php');
        $this->assertFileExists($this->getPath() .'/Events/Backend/ModelName/ModelNameDeleted.php');

        $this->assertFileExists($this->getPath() .'/Listeners/Backend/ModelName/ModelNameEventListener.php');
    }
}
