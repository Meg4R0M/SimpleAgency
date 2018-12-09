<?php
/**
 * Created by PhpStorm.
 * User: meg4r0m
 * Date: 09/12/18
 * Time: 14:31
 */

namespace Meg4R0M\RecaptchaBundle;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class RecaptchaCompilerPass implements CompilerPassInterface
{

    public function process(ContainerBuilder $container)
    {
        if ($container->hasParameter('twig.form.resources')) {
            $resources = $container->getParameter('twig.form.resources') ?: [];
            array_unshift($resources, '@Recaptcha/fields.html.twig');
            $container->setParameter('twig.form.resources', $resources);
        }
    }

}