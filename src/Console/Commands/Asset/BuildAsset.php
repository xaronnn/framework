<?php

    namespace Eskirex\Component\Web\Console\Commands\Asset;

    use Eskirex\Component\Console\Command;
    use Eskirex\Component\Console\Output;
    use Eskirex\Component\Console\Input;

    class BuildAsset extends Command
    {
        public function configure()
        {
            $this->setName('asset:build')
                ->setDescription('asset build description')
                ->setHelp('asset build help')
                ->setOption('compress', 'c', 'Compress');
        }


        public function execute(Input $input, Output $output)
        {
            echo 'asd';
        }
    }