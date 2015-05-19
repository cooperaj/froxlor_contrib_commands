<?php namespace Froxlor;

class Template
{
    protected $twig;

    public function __construct()
    {
        $twigLoader = new \Twig_Loader_Filesystem(SRC_DIR . '/Froxlor/Resources/Views');
        $this->twig = new \Twig_Environment($twigLoader);
    }

    public function render($template, array $data)
    {
        return $this->twig->render($template, $data);
    }
}
