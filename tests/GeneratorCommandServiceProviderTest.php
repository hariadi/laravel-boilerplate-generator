<?php

namespace Hariadi\Boilerplate;

use Mockery as m;
use PHPUnit\Framework\TestCase;
use Hariadi\Boilerplate\Commands\AppModelCommand;

class GeneratorCommandServiceProviderTest extends TestCase
{
    public function tearDown(): void
    {
        m::close();
    }

	/** @test */
	public function registers_boilerplate_generator()
	{
        $app = $this->getMockConsole(['addToParent']);
        $command = m::mock('Illuminate\Console\Command');
        $command->shouldReceive('setLaravel')->once()->with(m::type('Illuminate\Contracts\Foundation\Application'));
        $app->expects($this->once())->method('addToParent')->with($this->equalTo($command))->will($this->returnValue($command));
        $result = $app->add($command);
        $this->assertEquals($command, $result);
    }

    protected function getMockConsole(array $methods)
    {
        $app = m::mock('Illuminate\Contracts\Foundation\Application', ['version' => '7.2']);
        $events = m::mock('Illuminate\Contracts\Events\Dispatcher', ['dispatch' => null]);
        $console = $this->getMockBuilder('Illuminate\Console\Application')->setMethods($methods)->setConstructorArgs([
            $app, $events, 'test-version',
        ])->getMock();
        return $console;
    }

}
