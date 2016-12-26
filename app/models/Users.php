<?php

use Phalcon\Mvc\Model\Validator\Email as Email;

class Users extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=10, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(type="string", length=70, nullable=false)
     */
    public $username;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $password;

    /**
     *
     * @var string
     * @Column(type="string", length=70, nullable=false)
     */
    public $email;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $active;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $create_date;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=false)
     */
    public $deleted;

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
        $validator = new Validation();

        $validator->add(
            'email', //your field name
            new EmailValidator([
                'model' => $this,
                'message' => 'Please enter a correct email address'
            ])
        );

        $validator->add(
            'username',
            new UniquenessValidator([
                'model' => $this,
                'message' => 'Sorry, That username is already taken',
            ])
        );

        return $this->validate($validator);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'users';
    }

}
