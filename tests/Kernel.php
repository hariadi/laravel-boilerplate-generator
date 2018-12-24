<?php

class Kernel extends \Illuminate\Foundation\Console\Kernel
{
	/**
	 * The bootstrap classes for the application.
	 *
	 * @return void
	 */
	protected $bootstrappers = [];

	/**
	 * The Artisan commands provided by your application.
	 *
	 * @var array
	 */
	protected $commands = [];

	/**
	 * Report the exception to the exception handler.
	 *
	 * @param  \Exception $e
	 *
	 * @return void
	 *
	 * @throws \Exception
	 */
	protected function reportException(Exception $e)
	{
		throw $e;
	}

	public function getArtisan()
	{
		return $this->app['artisan'];
	}
}
