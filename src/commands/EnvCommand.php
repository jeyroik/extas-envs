<?php
namespace extas\commands;

use extas\components\options\TConfigure;
use extas\components\SystemContainer;
use extas\interfaces\envs\IEnv;
use extas\interfaces\envs\IEnvRepository;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class EnvCommand
 *
 * @package extas\commands
 * @author jeyroik@gmail.com
 */
class EnvCommand extends DefaultCommand
{
    use TConfigure;

    protected const VERSION = '0.1.0';
    protected const OPTION__TEMPLATE_PATH = 'path';
    protected const DEFAULT__PATH = '.env.dist';

    protected string $commandVersion = '0.2.0';
    protected string $commandTitle = 'Extas env dist generator';

    /**
     * Configure the current command.
     */
    protected function configure()
    {
        $this
            ->setName('env')
            ->setAliases([])
            ->setDescription('Generate .env template according to extas packages.')
            ->setHelp('This command allows you to generate .env template file.')
            ->addOption(
                static::OPTION__TEMPLATE_PATH,
                'p',
                InputOption::VALUE_OPTIONAL,
                'Relative path 9from the CWD) for saving result template',
                static::DEFAULT__PATH
            )
        ;

        $this->configureWithOptions('extas-env', [static::OPTION__TEMPLATE_PATH => true]);
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function dispatch(InputInterface $input, OutputInterface &$output): void
    {
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
    }
}
