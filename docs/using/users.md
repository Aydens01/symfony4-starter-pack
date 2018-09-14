# Manage Your Users With FOSUserBundle

## Install FOSUserBundle

```sh
$ php composer.phar require friendsofsymfony/user-bundle
```

## Create An User Entity

### User Entity

You have to create an entity which take the entity *User* of FOSUserBundle as parent. 

    // src/Entity/User.php

    <?php

    namespace App\Entity;

    use FOS\UserBundle\Model\User as BaseUser;
    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity
     * @ORM\Table(name="user")
     */
    class User extends BaseUser
    {
        /**
         * @ORM\Id
         * @ORM\Column(type="integer")
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        protected $id;

        public function __contruct()
        {
            parent::__construct();
        } 
    }


### Add A Role

To add a role on the registration, Symfony allows you to use an event listener. Here a example :

    // src\EventListener\RegistrationListener.php

    <?php

    namespace App\EventListener;

    use FOS\UserBundle\FOSUserEvents;
    use FOS\UserBundle\Event\FormEvent;
    use Symfony\Component\EventDispatcher\EventSubscriberInterface;
    use App\Entity\User;

    /**
     * Listener responsible for adding the default user role at registration
     */
    class RegistrationListener implements EventSubscriberInterface
    {
        public static function getSubscribebEvents()
        {
            return array(
                FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess',
            );
        }

        public function onRegistrationSuccess(FormEvent $event)
        {
            /** @var $user \FOS\UserBundle\Model\UserInterface */
            $user = $event->getForm()->getData();

            $role = array('ROLE_SIMPLE');

            $user->setRoles($role);
        }
    } 

## Configure FOSUserBundle

First you have to create a file called **fos_user.yaml** in **config/packages/**. It'll be in this file that we are going to configure FOSUserBundle. 

    // config/packages/fos_user.yaml

    fos_user:
        db_driver: orm
        firewall_name: main
        user_class: App\Entity\User
        from_email:
            adresse: "your_address_mail"
            sender_name: "your_sender_name"


## FOSUserBundle Routes

The thing is that FOSUserBundle provides many controllers with an associated template. If you want to use it you have to define the routes in your **\\config\routes.yaml** file. Here, the basic routes that you may use :

    # config\routes.yaml

    # ...

    # login, logout ...
    fos_user_security:
        resource: "@FOSUserBundle/Resources/config/routing/security.xml"

    # user profile
    fos_user_profile:
        resource: "@FOSUserBundle/Resources/config/routing/profile.xml"
        prefix: /profile

    # registration
    fos_user_register:
        resource: "@FOSUserBundle/Resources/config/routing/registration.xml"
        prefix: /register

    # user profile edition
    fos_user_resetting:
        resource: "@FOSUserBundle/Resources/config/routing/resetting.xml"
        prefix: /resetting

    # change password
    fos_user_change_password:
        resource: "@FOSUserBundle/Resources/config/routing/change_password.xml"
        prefix: /profile

-------
Find here all the routes provide by FOSUserBundle : [FOSUserBundle Routes](../attachments/fosuserRoutes.md)

-------

## Override FOSUserBundle Templates

As we said FOSUserBundle provides severals templates for registration, connection, etc ... You can change them by overriding. For instance : you would like to change the registration template (*register_content.html.twig*). So you have to create a copy of this file in the following path : **\\templates\bundles\FOSUserBundle\Registration\\** .

By changing the contents of this copy, you'll modify the view.

## FOSUserBundle Commands

There are several FOSUserBundle commands to manage your users. Here some of them :

```sh
# Create a user
$ php bin/console fos:user:create username usermail userpwd
# Add a role to a user
$ php bin/console fos:user:promote username ROLE
# Delete a role to a user
$ php bin/console fos:user:demote username ROLE
# Activate a user account
$ php bin/console fos:user:activate username
# Deactivate a user account
$ php bin/console fos:user:deactivate username
# Change the user password
$ php bin/console fos:user:change-password username newpwd
```
