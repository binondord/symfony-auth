<?php
/**
 * Created by PhpStorm.
 * User: clouduser
 * Date: 9/27/19
 * Time: 5:56 PM
 */

namespace AppBundle\Controller;


use AppBundle\Form\LoginForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="security_login")
     */
    public function loginAction()
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        $form = $this->createForm(LoginForm::class, [
            '_username' => $lastUsername
        ]);

        return $this->render(
            'security/login.html.twig',
            [
                'form' => $form->createView(),
                'error' => $error
            ]
        );
    }
}