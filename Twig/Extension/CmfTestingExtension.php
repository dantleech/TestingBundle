<?php

namespace Symfony\Cmf\Bundle\TestingBundle\Twig\Extension;

use Symfony\Cmf\Bundle\CoreBundle\Templating\Helper\CmfHelper;
use Symfony\Component\Config\FileLocator;

class CmfTestingExtension extends \Twig_Extension
{
    protected $config;
    protected $fileLocator;

    public function __construct($config, FileLocator $fileLocator, \Twig_Environment $twig)
    {
        $this->config = $config;
        $this->fileLocator = $fileLocator;
        $this->twig = $twig;
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('cmf_testing_expose', array(
                $this, 'expose'
            )),
        );
    }

    public function expose($filename)
    {
        $realFilename = $this->fileLocator->locate($filename);
        $content = file_get_contents($realFilename);
        $uid = uniqid();
        $basename = basename($realFilename);

        return $this->twig->render('CmfTestingBundle:Expose:default.html.twig', array(
            'filename' => $filename,
            'content' => $content,
            'uid' => $uid,
            'basename' => $basename,
        ));
    }

    public function getGlobals()
    {
        return array(
            'cmf_testing_config' => $this->config,
        );
    }

    public function getName()
    {
        return 'cmf_testing';
    }
}

