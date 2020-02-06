<?php
namespace extas\commands;

use extas\components\SystemContainer;
use extas\interfaces\envs\IEnv;
use extas\interfaces\envs\IEnvRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class EnvCommand
 *
 * @package extas\commands
 * @author jeyroik@gmail.com
 */
class EnvCommand extends Command
{
    protected const VERSION = '0.1.0';
    protected const OPTION__TEMPLATE_PATH = 'path';
    protected const DEFAULT__PATH = '.env.dist';

    /**
     * Configure the current command.
     */
    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('env')
            ->setAliases([])

            // the short description shown while running "php bin/console list"
            ->setDescription('Generate .env template according to extas packages.')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command allows you to generate .env template file.')
            ->addOption(
                static::OPTION__TEMPLATE_PATH,
                'p',
                InputOption::VALUE_OPTIONAL,
                'Relative path 9from the CWD) for saving result template',
                static::DEFAULT__PATH
            )
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int|mixed
     * @throws
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $start = microtime(true);

        /**
         * @var $repo IEnvRepository
         * @var $envParams IEnv[]
         */
        $repo = SystemContainer::getItem(IEnvRepository::class);
        $envParams = $repo->all([]);

        $lines = [];
        foreach ($envParams as $envParam) {
            $lines[] = '# ' . $envParam->getTitle() . ' (' . $envParam->getDescription() . ')';
            $lines[] = $envParam->getName() . '="' . $envParam->getValue() . '"';
            $lines[] = ''; // just for pretty view
        }

        $path = getcwd() . '/' . $input->getOption(static::OPTION__TEMPLATE_PATH);
        file_put_contents($path, implode(PHP_EOL, $lines));

        $output->writeln([
            '<info>Env template generating finished. See ' . $path . '</info>'
        ]);

        $end = microtime(true) - $start;
        $output->writeln(['<info>Finished in ' . $end . ' s.</info>']);

        return 0;
    }
}
