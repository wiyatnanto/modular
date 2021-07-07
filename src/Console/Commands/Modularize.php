<?php

namespace InterNACHI\Modular\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use InterNACHI\Modular\Support\ModuleConfig;
use InterNACHI\Modular\Support\ModuleRegistry;
use LogicException;
use Symfony\Component\Console\Input\InputOption;
use Throwable;

trait Modularize
{
	protected function module() : ?ModuleConfig
	{
		if ($module = $this->option('module')) {
			return $this->getLaravel()
				->make(ModuleRegistry::class)
				->module($module);
		}
		
		return null;
	}
	
	protected function configure()
	{
		parent::configure();
		
		$this->getDefinition()->addOption(
			new InputOption(
				'--module',
				null,
				InputOption::VALUE_REQUIRED,
				'Run inside an application module'
			)
		);
	}
}
