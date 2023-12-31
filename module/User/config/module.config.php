<?php

declare(strict_types=1);

namespace User;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;


//ya no necesitamos decalarar al controlador porque ya usamos el Use User/controller y asiganmos el nomnbre en composer.json


return [
    'router' => [
        'routes' => [
            'user' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '[/user/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ],
                ],
            ],
        ],
        
    ],
    'service_manager' => [
        'factories' => [
            Db\UserModel::class    => InvokableFactory::class,
            Db\TableGateway::class => Db\Factory\TableGatewayFactory::class,
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => Controller\Factory\IndexControllerFactory::class,
        ],
    ],
    'form_elements'      => [
        'factories' => [
            Form\Fieldset\AcctDataFieldset::class    => Form\Fieldset\Factory\AcctDataFieldsetFactory::class,
            Form\Fieldset\LoginFieldset::class       => Form\Fieldset\Factory\LoginFieldsetFactory::class,
            Form\Fieldset\PasswordFieldset::class    => Form\Fieldset\Factory\PasswordFieldsetFactory::class,
            Form\UserForm::class                     => Form\Factory\UserFormFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack'      => [
            __DIR__ . '/../view',
        ],
    ],
];