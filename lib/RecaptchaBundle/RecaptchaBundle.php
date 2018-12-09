<?php
/**
 * Created by PhpStorm.
 * User: meg4r0m
 * Date: 09/12/18
 * Time: 14:12
 */

namespace Meg4R0M\RecaptchaBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class RecaptchaBundle extends Bundle
{

    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new RecaptchaCompilerPass());
    }

}