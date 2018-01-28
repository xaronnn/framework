<?php

    namespace Eskirex\Component\Framework;

    use Eskirex\Component\Config\Config;
    use Eskirex\Component\Console\Console;
    use Eskirex\Component\Framework\Configurations\FrameworkConfiguration;
    use Eskirex\Component\Framework\Exceptions\KernelNotFoundException;
    use Eskirex\Component\Framework\Exceptions\RuntimeException;
    use Eskirex\Component\Framework\Exceptions\InvalidArgumentException;

    class Framework
    {
        /**
         * Framework constructor.
         * @param string $kernel
         * @throws InvalidArgumentException
         * @throws KernelNotFoundException
         * @throws RuntimeException
         */
        public function __construct(string $kernel)
        {
            if (!FrameworkConfiguration::$baseDir) {
                throw new RuntimeException('Base dir not setted');
            }

            $kernelConfig = new Config('Kernel');
            $applicationConfig = new Config('Application');

            if (!$kernels = $kernelConfig->get($kernel)) {
                throw new KernelNotFoundException('Kernel not found');
            }

            if ($kernel === FrameworkConfiguration::CLI_KERNEL) {
                $console = new Console($applicationConfig->get('console_name'), $applicationConfig->get('console_version'), $applicationConfig->get('language'));
            }

            foreach ($kernels as $class) {
                if (!class_exists($class)) {
                    throw new InvalidArgumentException("Invalid kernel class {$class}");
                }

                if(isset($console)){
                    $console->addCommand(new $class());
                }else{
                    new $class();
                }
            }
        }


        public static function configure(array $data)
        {
            new FrameworkConfiguration($data);
        }
    }